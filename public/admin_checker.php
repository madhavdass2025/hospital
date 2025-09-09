<?php
// admin checker
// if the user is not logged in, redirect to login page
if(empty($_SESSION['logged_in'])){
    header("Location: {$home_url}login.php?action=please_login");
    exit();
}
// if the user is not an admin or storekeeper, redirect to home page
else if($_SESSION['role'] !== 'Admin' && $_SESSION['role'] !== 'Storekeeper'){
    header("Location: {$home_url}index.php?action=access_denied");
    exit();
}
?>
