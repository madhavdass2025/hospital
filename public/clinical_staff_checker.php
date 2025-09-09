<?php
// clinical staff checker
// if the user is not logged in, redirect to login page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=please_login");
    exit();
}
// if the user is not a doctor, medical staff, or admin, redirect to home page
else if($_SESSION['role'] !== 'Doctor' && $_SESSION['role'] !== 'Medical Staff' && $_SESSION['role'] !== 'Admin'){
    header("Location: {$home_url}index.php?action=access_denied");
    exit();
}
?>
