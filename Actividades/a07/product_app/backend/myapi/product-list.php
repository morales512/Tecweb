<?php
namespace MyApi;

require_once __DIR__ . "/Products.php";

$products = new Products();
$products->getAllProducts();  // Implementa getAllProducts en Products

echo $products->getData();
?>
