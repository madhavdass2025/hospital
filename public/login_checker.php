<?php
// if the user is not logged in, redirect to login page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=please_login");
    exit();
}
?>
