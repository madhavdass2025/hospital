<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? $page_title : "Vet Hospital"; ?></title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom css -->
    <link href="/assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <?php
        // show page header
        echo "<div class='page-header'>";
            echo "<h1>" . (isset($page_title) ? $page_title : "Vet Hospital") . "</h1>";
        echo "</div>";
        ?>
