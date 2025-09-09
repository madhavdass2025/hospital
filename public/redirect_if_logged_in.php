<?php
// if the session value is not empty, user is already logged in, redirect to dashboard
if(!empty($_SESSION['logged_in'])){
    header("Location: {$home_url}dashboard.php");
    exit();
}
?>
