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
?>