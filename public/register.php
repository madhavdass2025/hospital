<?php
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Register";

// include login checker
include_once "redirect_if_logged_in.php";

// include classes
include_once '../src/Database.php';
include_once '../src/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-md-12'>";

// if form was posted
if($_POST){
    // set user property values
    $user->username=$_POST['username'];
    $user->email=$_POST['email'];
    $user->password=$_POST['password'];
    $user->role=$_POST['role'];

    // create the user
    if($user->create()){
        echo "<div class='alert alert-info'>";
            echo "Successfully registered. <a href='{$home_url}login.php'>Please login</a>.";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
    }
}

// include the registration form
include_once '../templates/register.tpl.php';

echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
