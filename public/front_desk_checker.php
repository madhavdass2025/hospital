<?php
// front desk checker
// if the user is not logged in, redirect to login page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=please_login");
    exit();
}
// if the user is not a front desk or admin, redirect to home page
else if($_SESSION['role'] !== 'Front Desk' && $_SESSION['role'] !== 'Admin'){
    header("Location: {$home_url}index.php?action=access_denied");
    exit();
}
?>
