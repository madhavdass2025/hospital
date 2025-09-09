<?php
// TODO: Add authentication and authorization check here.

// check if value was posted
if($_POST){

    // include database and object file
    include_once '../src/Database.php';
    include_once '../src/Product.php';

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare product object
    $product = new Product($db);

    // set product id to be deleted
    $product->id = $_POST['object_id'];

    // delete the product
    if($product->delete()){
        // http_response_code(200) is the default, so no need to set it explicitly
        echo "Object was deleted.";
    }

    // if unable to delete the product
    else{
        // set response code - 503 service unavailable
        http_response_code(503);
        echo "Unable to delete object.";
    }
}
?>
