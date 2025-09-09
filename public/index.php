<?php
// Include the database connection class
require_once '../src/Database.php';

// Create a new Database object
$database = new Database();
// Get a database connection
$db = $database->getConnection();

// Check if the connection is successful
if($db){
    echo "Database connection successful!";
} else {
    echo "Database connection failed.";
}

?>
