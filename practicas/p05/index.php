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



?>