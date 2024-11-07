// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
  "precio": 0.0,
  "unidades": 1,
  "modelo": "XX-000",
  "marca": "NA",
  "detalles": "NA",
  "imagen": "img/default.png"
};

function init() {
  var JsonString = JSON.stringify(baseJSON, null, 2);
  $('#description').val(JsonString);

  // Cargar la lista de productos al iniciar
  listarProductos();
}

function listarProductos() {
  $.ajax({
      url: './backend/myapi/product-list.php',
      type: 'GET',
      contentType: 'application/x-www-form-urlencoded',
      success: function(response) {
          let productos = JSON.parse(response);
          if (productos.length > 0) {
              let template = '';
              productos.forEach(producto => {
                  let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>`;
                  template += `
                    <tr productId="${producto.id}">
                      <td>${producto.id}</td>
                      <td><a href="#" class="product-select" data-id="${producto.id}">${producto.nombre}</a></td>
                      <td><ul>${descripcion}</ul></td>
                      <td>
                        <button class="product-delete btn btn-danger">Eliminar</button>
                      </td>
                    </tr>`;
              });
              $('#products').html(template);
          }
      }
  });
}

$('#search').on('keyup', function() {
  let search = $(this).val();
  $.ajax({
      url: './backend/myapi/product-search.php',
      type: 'GET',
      data: { search },
      success: function(response) {
          let productos = JSON.parse(response);
          let template = '';
          let template_bar = '';
          productos.forEach(producto => {
              let descripcion = `
                <li>precio: ${producto.precio}</li>
                <li>unidades: ${producto.unidades}</li>
                <li>modelo: ${producto.modelo}</li>
                <li>marca: ${producto.marca}</li>
                <li>detalles: ${producto.detalles}</li>`;
              template += `
                <tr productId="${producto.id}">
                  <td>${producto.id}</td>
                  <td>${producto.nombre}</td>
                  <td><ul>${descripcion}</ul></td>
                  <td>
                    <button class="product-delete btn btn-danger">Eliminar</button>
                  </td>
                </tr>`;
              template_bar += `<li>${producto.nombre}</li>`;
          });
          $('#products').html(template);
          $('#container').html(template_bar);
          $('#product-result').removeClass('d-none');
      }
  });
});

$('#product-form').submit(function(e) {
  e.preventDefault();
  
  let productoJsonString = $('#description').val();
  let finalJSON = JSON.parse(productoJsonString);
  finalJSON['nombre'] = $('#name').val().trim(); // Usar trim() para eliminar espacios
  finalJSON['marca'] = $('#marca').val().trim(); // Usar trim() para eliminar espacios

  // Validaciones
  if (finalJSON.nombre === "") {
      alert("El nombre del producto es requerido.");
      return;  // Evita el envío si el nombre está vacío
  }
  
  if (finalJSON.marca === "") {
      alert("La marca del producto es requerida.");
      return;  // Evita el envío si la marca está vacía
  }

  if (finalJSON.precio < 99) {
      alert("El precio debe ser mayor o igual a 99.");
      return;  // Evita el envío si el precio es menor a 99
  }
  
  if (finalJSON.detalles.length > 250) {
      alert("Los detalles deben tener 250 caracteres o menos.");
      return;  // Evita el envío si los detalles son demasiado largos
  }
  
  // Validaciones de otros campos requeridos
  if (finalJSON.unidades <= 0) {
      alert("Las unidades deben ser mayores que 0.");
      return;  // Evita el envío si las unidades son cero o negativas
  }
  
  if (finalJSON.modelo === "") {
      alert("El modelo del producto es requerido.");
      return;  // Evita el envío si el modelo está vacío
  }
  
  if (finalJSON.imagen === "") {
      alert("La imagen del producto es requerida.");
      return;  // Evita el envío si la imagen está vacía
  }

  let id = $('#productId').val();  // Si hay un ID, es una actualización

  if (id) {
      // Actualización del producto
      $.ajax({
          url: './backend/myapi/product-update.php',
          type: 'POST',
          contentType: "application/json;charset=UTF-8",
          data: JSON.stringify({ id: id, producto: finalJSON }),
          success: function(response) {
              let respuesta = JSON.parse(response);
              let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`;
              $('#container').html(template_bar);
              $('#product-result').removeClass('d-none');
              listarProductos();  // Refresca la lista de productos

              // Mostrar mensaje de error si la actualización falló
              if (respuesta.status !== "success") {
                  alert("Actualización fallida: " + respuesta.message);
              }
          },
          error: function(xhr, status, error) {
              // Manejo de error de AJAX
              alert("Error en la actualización: " + xhr.responseText);
          }
      });
  } else {
      // Agregar nuevo producto
      $.ajax({
          url: './backend/myapi/product-add.php',
          type: 'POST',
          contentType: "application/json;charset=UTF-8",
          data: JSON.stringify(finalJSON),
          success: function(response) {
              let respuesta = JSON.parse(response);
              let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`;
              $('#container').html(template_bar);
              $('#product-result').removeClass('d-none');
              listarProductos();  // Refresca la lista de productos
          },
          error: function(xhr, status, error) {
              // Manejo de error de AJAX
              alert("Error al agregar el producto: " + xhr.responseText);
          }
      });
  }
});

$(document).on('click', '.product-delete', function() {
  if (confirm("¿De verdad deseas eliminar el producto?")) {
      let id = $(this).closest('tr').attr('productId');
      $.ajax({
          url: './backend/myapi/product-delete.php',
          type: 'POST',
          data: { id },
          success: function(response) {
              let respuesta = JSON.parse(response);
              let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`;
              $('#container').html(template_bar);
              $('#product-result').removeClass('d-none');
              listarProductos();  // Refresca la lista de productos
          }
      });
  }
});

// Manejo de la selección del producto
$(document).on('click', '.product-select', function(e) {
  e.preventDefault();
  let id = $(this).data('id');
  
  $.ajax({
      url: './backend/myapi/product-get.php',
      type: 'GET',
      data: { id },
      success: function(response) {
          let producto = JSON.parse(response);
          $('#name').val(producto.nombre);
          $('#marca').val(producto.marca);
          $('#description').val(JSON.stringify(producto, null, 2));
          $('#productId').val(producto.id);
      }
  });
});

// Inicializar la aplicación
$(document).ready(function() {
  init();
});
