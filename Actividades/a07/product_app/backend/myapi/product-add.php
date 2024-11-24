<?php
namespace MyApi;

require_once __DIR__ . "/Products.php";

$products = new Products();
$producto = file_get_contents('php://input');
$jsonOBJ = json_decode($producto, true);

if (!empty($jsonOBJ)) {
    $products->addProduct($jsonOBJ);  // Asegúrate de que `addProduct` esté implementado en Products
}

echo $products->getData();
?>
