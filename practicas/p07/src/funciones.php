<?php
function gen_multiploaletorio($num) {
    if ($num % 5 == 0 && $num % 7 == 0) {
        return '<h3>R= El número ' . $num . ' SÍ es múltiplo de 5 y 7.</h3>';
    } else {
        return '<h3>R= El número ' . $num . ' NO es múltiplo de 5 y 7.</h3>';
    }
}



function generarSecuencia() {
    $matriz = [];
    $iteraciones = 0;
    $totalNumeros = 0;
    do {
        $fila = [];
        $fila[] = rand(1, 999); 
        $fila[] = rand(1, 999);
        $fila[] = rand(1, 999); 

        $matriz[] = $fila;
        $iteraciones++;
        $totalNumeros += 3;

        // Verificar si la secuencia es impar, par, impar
        $esSecuenciaValida = ($fila[0] % 2 != 0) && ($fila[1] % 2 == 0) && ($fila[2] % 2 != 0);
    } while (!$esSecuenciaValida);

    return [
        'matriz' => $matriz,
        'iteraciones' => $iteraciones,
        'totalNumeros' => $totalNumeros
    ];
}


function encontrarMultiploWhile($numeroDado) {
    $numeroAleatorio = rand(1, 999);
    while ($numeroAleatorio % $numeroDado !== 0) {
        $numeroAleatorio = rand(1, 999);
    }
    return $numeroAleatorio;
}

function encontrarMultiploDoWhile($numeroDado) {
    $numeroAleatorio = 0;
    do {
        $numeroAleatorio = rand(1, 999);
    } while ($numeroAleatorio % $numeroDado !== 0);
    return $numeroAleatorio;
}

function generarArregloAscii() {
    $arreglo = [];

    // Usar un ciclo for para llenar el arreglo
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i); // Asignar el carácter ASCII al índice
    }

    return $arreglo;
}

function verificarEdadSexo($edad, $sexo) {
    // Verificar si es femenina y tiene entre 18 y 35 años
    if ($sexo === 'femenino' && $edad >= 18 && $edad <= 35) {
        return "Bienvenida, usted está en el rango de edad permitido.";
    } else {
        return "Lo siento, no cumple con los requisitos.";
    }
}


function obtenerParqueVehicular() {
    return [
        'UBN6338' => [
            'Auto' => [
                'marca' => 'HONDA',
                'modelo' => 2020,
                'tipo' => 'camioneta',
            ],
            'Propietario' => [
                'nombre' => 'Alfonzo Esparza',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'C.U., Jardines de San Manuel',
            ],
        ],
        'UBN6339' => [
            'Auto' => [
                'marca' => 'MAZDA',
                'modelo' => 2019,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Ma. del Consuelo Molina',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => '97 oriente, Puebla',
            ],
        ],
        'XYZ1234' => [
            'Auto' => [
                'marca' => 'TOYOTA',
                'modelo' => 2021,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Carlos López',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Reforma, Puebla',
            ],
        ],
        'ABC5678' => [
            'Auto' => [
                'marca' => 'FORD',
                'modelo' => 2018,
                'tipo' => 'camioneta',
            ],
            'Propietario' => [
                'nombre' => 'Andrea Martínez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Vallarta 123, Puebla',
            ],
        ],
        'LMN2345' => [
            'Auto' => [
                'marca' => 'NISSAN',
                'modelo' => 2020,
                'tipo' => 'hachback',
            ],
            'Propietario' => [
                'nombre' => 'Raúl Sánchez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Monterrey 567, Puebla',
            ],
        ],
        'DEF8901' => [
            'Auto' => [
                'marca' => 'CHEVROLET',
                'modelo' => 2017,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Luis Hernández',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Revolución 890, Puebla',
            ],
        ],
        'GHJ5678' => [
            'Auto' => [
                'marca' => 'VOLKSWAGEN',
                'modelo' => 2016,
                'tipo' => 'camioneta',
            ],
            'Propietario' => [
                'nombre' => 'Jorge Pérez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Sol 456, Puebla',
            ],
        ],
        'KLM9012' => [
            'Auto' => [
                'marca' => 'BMW',
                'modelo' => 2022,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'María Gutiérrez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Boulevard 5 de Mayo 789, Puebla',
            ],
        ],
        'NOP3456' => [
            'Auto' => [
                'marca' => 'AUDI',
                'modelo' => 2021,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Roberto Gómez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Independencia 345, Puebla',
            ],
        ],
        'RST7890' => [
            'Auto' => [
                'marca' => 'KIA',
                'modelo' => 2020,
                'tipo' => 'hachback',
            ],
            'Propietario' => [
                'nombre' => 'Lucía Fernández',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Pino Suárez 567, Puebla',
            ],
        ],
        'UVW1234' => [
            'Auto' => [
                'marca' => 'TESLA',
                'modelo' => 2023,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Pedro Aguilar',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Londres 123, Puebla',
            ],
        ],
        'XYZ5678' => [
            'Auto' => [
                'marca' => 'HYUNDAI',
                'modelo' => 2019,
                'tipo' => 'camioneta',
            ],
            'Propietario' => [
                'nombre' => 'Carmen Rodríguez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Juárez 234, Puebla',
            ],
        ],
        'ABC9012' => [
            'Auto' => [
                'marca' => 'MERCEDES-BENZ',
                'modelo' => 2021,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Rosa Morales',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Av. Carranza 678, Puebla',
            ],
        ],
        'LMN3456' => [
            'Auto' => [
                'marca' => 'VOLVO',
                'modelo' => 2022,
                'tipo' => 'camioneta',
            ],
            'Propietario' => [
                'nombre' => 'Enrique Delgado',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Ávila Camacho 890, Puebla',
            ],
        ],
        'OPQ6789' => [
            'Auto' => [
                'marca' => 'FIAT',
                'modelo' => 2018,
                'tipo' => 'sedan',
            ],
            'Propietario' => [
                'nombre' => 'Sofía Ramírez',
                'ciudad' => 'Puebla, Pue.',
                'direccion' => 'Calle Zaragoza 567, Puebla',
            ],
        ],
    ];
}


// Función para buscar un vehículo por su matrícula
function buscarVehiculoPorMatricula($matricula) {
    $vehiculos = obtenerParqueVehicular();
    if (isset($vehiculos[$matricula])) {
        return $vehiculos[$matricula];
    }
    return null;
}

// Función para obtener todos los vehículos
function obtenerTodosLosVehiculos() {
    return obtenerParqueVehicular();
}


?>
