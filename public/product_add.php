<?php
// TODO: Add authentication and authorization check here.
// For example:
// if (!is_user_logged_in() || !current_user_can('manage_products')) {
//     die('Access denied.');
// }

// page title
$page_title = "Add Product";

// include database and object files
include_once '../src/Database.php';
include_once '../src/Product.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// pass connection to objects
$product = new Product($db);

// include page header
include_once '../templates/header.php';

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

    // create the product
    if($product->create()){
        echo "<div class='alert alert-success'>Product was created.</div>";
    }

    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create product.</div>";
    }
}

// include the HTML form for creating a product
include_once '../templates/product_add.tpl.php';

// include page footer
include_once '../templates/footer.php';
?>
