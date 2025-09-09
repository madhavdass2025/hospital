<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "admin_checker.php";

// get ID of the product to be read
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include classes
include_once '../src/Database.php';
include_once '../src/Product.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

// set ID property of product to be read
$product->id = $id;

// read the details of product to be read
$product->readOne();

// set page headers
$page_title = "View Product";
include_once "../templates/header.php";

// read products button
echo "<div class='right-button-margin'>";
    echo "<a href='products.php' class='btn btn-primary pull-right'>";
        echo "<span class='glyphicon glyphicon-list'></span> View Products";
    echo "</a>";
echo "</div>";


// HTML table for displaying a product details
include_once '../templates/product_view.tpl.php';


// set footer
include_once "../templates/footer.php";
?>
