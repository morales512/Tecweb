<?php

$_myvar = 'Variable 1';
$_7var = 'Variable 2';
//myvar = 'Variable 3';
$myvar = 'Variable 4';
$var7 = 'Variable 5';  
$_element1 = 'Variable 6';
//$house*5 = 'Variable 7';

echo $_myvar;
echo '<br>';
echo $_7var.'<br>';
//echo myvar.'<br>';
echo $myvar.'<br>';
echo $var7.'<br>';
echo $_element1.'<br>';
//echo %$house*5.'<br>';

$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;

print_r($a);
echo '<br>';
print_r($b);
echo '<br>';
print_r($c);
echo '<br>';

$a = "PHP server";
$b = &$a;

print_r($a);
echo '<br>';
print_r($b);
echo '<br>';


// Paso 1
$a = "PHP5";
var_dump($a);
echo '<br>';
// Paso 2
$z[] = &$a;
var_dump($z[0]);
echo '<br>';

// Paso 3
$b = "5a version de PHP";
var_dump($b);
echo '<br>';

// Paso 4
$c = $b * 10;
var_dump($c);
echo '<br>';

// Paso 5
$a .= $b;
var_dump($a);
echo '<br>';

// Paso 6
$b *= $c;
var_dump($b);
echo '<br>';

// Paso 7
$z[0] = "MySQL";
var_dump($z[0]);
echo '<br>';

// Mostrar contenido final de $z
var_dump($z);
echo '<br>';

//INCISO 4

// Paso 1
$a = "PHP5";
$GLOBALS['a'] = $a;  // Asignar al arreglo global para su acceso
var_dump($GLOBALS['a']);
echo '<br>';

// Paso 2
$z[] = &$a;
$GLOBALS['z'] = $z;  // Asignar al arreglo global para su acceso
var_dump($GLOBALS['z'][0]);
echo '<br>';

// Paso 3
$b = "5a version de PHP";
$GLOBALS['b'] = $b;  // Asignar al arreglo global para su acceso
var_dump($GLOBALS['b']);
echo '<br>';

// Paso 4
$c = $b * 10;
$GLOBALS['c'] = $c;  // Asignar al arreglo global para su acceso
var_dump($GLOBALS['c']);
echo '<br>';

// Paso 5
$a .= $b;
$GLOBALS['a'] = $a;  // Actualizar la variable global
var_dump($GLOBALS['a']);
echo '<br>';

// Paso 6
$b *= $c;
$GLOBALS['b'] = $b;  // Actualizar la variable global
var_dump($GLOBALS['b']);
echo '<br>';

// Paso 7
$z[0] = "MySQL";
$GLOBALS['z'] = $z;  // Actualizar la variable global
var_dump($GLOBALS['z'][0]);
echo '<br>';

// Mostrar contenido final de $z
var_dump($GLOBALS['z']);
echo '<br>';

//(inciso 5)

$a = "7 personas";
$b = (integer) $a;
$a = "9E3";
$c = (double) $a;
echo '<br>'.'Inciso 5'.'<br>';

echo $a;
echo '<br>';
echo $b;
echo '<br>';
echo $c;
echo '<br>';

//INCISO 6
echo '<br>'.'Inciso 6'.'<br>';
$a = "Tengo sueño";  
$b = 10.0;   
$c = 1;            
$d = "";              
$e = null;          
$f = array();         

// Convertir las variables a booleano y mostrar sus valores con var_dump
echo "Valor booleano de \$a:\n";
var_dump((bool) $a); 
echo '<br>';

echo "Valor booleano de \$b:\n";
var_dump((bool) $b);
echo '<br>';

echo "Valor booleano de \$c:\n";
var_dump((bool) $c); 
echo '<br>';

echo "Valor booleano de \$d:\n";
var_dump((bool) $d);
echo '<br>';

echo "Valor booleano de \$e:\n";
var_dump((bool) $e);
echo '<br>';

echo "Valor booleano de \$f:\n";
var_dump((bool) $f);
echo '<br>';


?>


