<?php
// core configuration
include_once "../config/core.php";

// set page title
$page_title = "Login";

// include login checker
include_once "redirect_if_logged_in.php";

// default to false
$access_denied = false;

// include classes
include_once '../src/Database.php';
include_once '../src/User.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$user = new User($db);

// if the form was submitted
if($_POST){
    // check if user exists
    $user->email=$_POST['email'];
    $email_exists = $user->emailExists();

    // validate password
    if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status == 'active'){
        // if password is correct, start session
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;

        // redirect to dashboard
        header("Location: {$home_url}dashboard.php");
        exit();
    }else{
        $access_denied = true;
    }
}

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";

    // get 'action' value in url parameter
    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // tell the user he is not yet logged in
    if($action =='not_yet_logged_in'){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
    }

    // tell the user to login
    else if($action=='please_login'){
        echo "<div class='alert alert-info'>
            <strong>Please login to access that page.</strong>
        </div>";
    }

    // tell the user if access denied
    if($access_denied){
        echo "<div class='alert alert-danger margin-top-40' role='alert'>
            Access denied.<br /><br />
            Your username or password maybe incorrect
        </div>";
    }

    // include the login form
    include_once '../templates/login.tpl.php';

echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
