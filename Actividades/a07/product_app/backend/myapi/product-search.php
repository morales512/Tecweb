<?php
namespace MyApi;

require_once __DIR__ . "/Products.php";

$products = new Products();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $products->searchProducts($search);  // Implementa searchProducts en Products
}

echo $products->getData();
?>
