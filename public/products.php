<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "admin_checker.php";

// page title
$page_title = "Products";

// include classes
include_once '../src/Database.php';
include_once '../src/Product.php';

// instantiate database and product objects
$database = new Database();
$db = $database->getConnection();

$product = new Product($db);

// query products
$stmt = $product->read();
$num = $stmt->rowCount();

// include the page header
include_once '../templates/header.php';


// display the products if there are any
if($num>0){
    // include the product table template
    include_once '../templates/products.tpl.php';
} else {
    echo "<div class='alert alert-info'>No products found.</div>";
}

// include the page footer
include_once '../templates/footer.php';
?>
