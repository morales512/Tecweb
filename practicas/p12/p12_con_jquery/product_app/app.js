// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

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
      url: './backend/product-list.php',
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
      url: './backend/product-search.php',
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
    finalJSON['nombre'] = $('#name').val();
    
    let id = $('#productId').val();  // Si hay un ID, es una actualización
  
    if (id) {
      // Actualización del producto
      $.ajax({
        url: './backend/product-update.php',
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
        }
      });
    } else {
      // Agregar nuevo producto
      $.ajax({
        url: './backend/product-add.php',
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
        }
      });
    }
  });
  

  $(document).on('click', '.product-delete', function() {
    if (confirm("¿De verdad deseas eliminar el producto?")) {
      let id = $(this).closest('tr').attr('productId');
      $.ajax({
        url: './backend/product-delete.php',
        type: 'GET',
        data: { id },
        success: function(response) {
          let respuesta = JSON.parse(response);
          let template_bar = `
            <li style="list-style: none;">status: ${respuesta.status}</li>
            <li style="list-style: none;">message: ${respuesta.message}</li>`;
          $('#container').html(template_bar);
          $('#product-result').removeClass('d-none');
          listarProductos(); // Refresca la lista de productos
        }
      });
    }
  });

  $(document).on('click', '.product-select', function(e) {
    e.preventDefault();
    let id = $(this).data('id');
  
    // Llamada AJAX para obtener los datos del producto seleccionado
    $.ajax({
      url: './backend/product-get.php',
      type: 'GET',
      data: { id },
      success: function(response) {
        let producto = JSON.parse(response);
  
        // Cargar los datos en el formulario
        $('#name').val(producto.nombre);
        $('#productId').val(producto.id);
        let productoJson = {
          "precio": producto.precio,
          "unidades": producto.unidades,
          "modelo": producto.modelo,
          "marca": producto.marca,
          "detalles": producto.detalles,
          "imagen": producto.imagen
        };
        $('#description').val(JSON.stringify(productoJson, null, 2));
      }
    });
  });
  
  