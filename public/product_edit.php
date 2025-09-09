<?php
// core configuration
include_once "../config/core.php";

// check if logged in as admin
include_once "admin_checker.php";

// get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// include classes
include_once '../src/Database.php';
include_once '../src/Product.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$product = new Product($db);

// set ID property of product to be edited
$product->id = $id;

// read the details of product to be edited
$product->readOne();

// set page header
$page_title = "Edit Product";
include_once "../templates/header.php";

// if the form was submitted
if($_POST){

    // set product property values
    $product->name = $_POST['name'];
    $product->sku = $_POST['sku'];
    $product->manufacturer = $_POST['manufacturer'];
    $product->supplier = $_POST['supplier'];
    $product->cost_price = $_POST['cost_price'];
    $product->selling_price = $_POST['selling_price'];
    $product->expiration_date = $_POST['expiration_date'];
    $product->hsn_code = $_POST['hsn_code'];
    $product->is_taxable = isset($_POST['is_taxable']) ? 1 : 0;
    $product->reorder_level = $_POST['reorder_level'];
    $product->stock_level = $_POST['stock_level'];

    // update the product
    if($product->update()){
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    }

    // if unable to update the product, tell the user
    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}

// include the HTML form for editing a product
include_once '../templates/product_edit.tpl.php';

// set page footer
include_once "../templates/footer.php";
?>
