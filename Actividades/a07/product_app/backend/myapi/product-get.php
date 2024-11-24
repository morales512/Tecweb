<?php
namespace MyApi;

require_once __DIR__ . "/Products.php";

$products = new Products();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products->getProductById($id);  // Implementa getProductById en Products
}

echo $products->getData();
?>
