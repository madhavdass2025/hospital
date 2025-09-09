<?php
// core configuration
include_once "../config/core.php";

// check if logged in
include_once "login_checker.php";

// set page title
$page_title = "Dashboard";

// include page header HTML
include_once '../templates/header.php';

echo "<div class='col-md-12'>";

    echo "<div class='alert alert-info'>";
        echo "Welcome, " . htmlspecialchars($_SESSION['username'], ENT_QUOTES) . "!";
    echo "</div>";

    echo "<h2>Dashboard</h2>";
    echo "<p>Welcome to the Veterinary Hospital Management System.</p>";

    echo "<h3>Available Actions:</h3>";
    echo "<ul>";
    if(isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Storekeeper')){
        echo "<li><a href='products.php'>Manage Products</a></li>";
    }
    echo "<li><a href='logout.php'>Logout</a></li>";
    echo "</ul>";

echo "</div>";

// include page footer HTML
include_once '../templates/footer.php';
?>
