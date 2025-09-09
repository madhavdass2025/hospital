<?php
// core configuration
include_once "../config/core.php";

// check if logged in as clinical staff
include_once "clinical_staff_checker.php";

// include classes
include_once '../src/Database.php';
include_once '../src/Patient.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$patient = new Patient($db);

// query patients
$stmt = $patient->read();

// set page title
$page_title = "Patients";

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-md-12'>";
    // include the patients table template
    include_once '../templates/patients.tpl.php';
echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
