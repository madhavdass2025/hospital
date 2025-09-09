<?php
// core configuration
include_once "../config/core.php";

// check if logged in as clinical staff
include_once "clinical_staff_checker.php";

// include classes
include_once '../src/Database.php';
include_once '../src/Patient.php';
include_once '../src/Casesheet.php';
include_once '../src/User.php';

// get patient id from URL
$patient_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing Patient ID.');

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$patient = new Patient($db);
$casesheet = new Casesheet($db);
$doctor = new User($db);

// set patient id
$patient->id = $patient_id;
$patient->readOne();

// set page title
$page_title = "Patient Details: " . htmlspecialchars($patient->pet_name, ENT_QUOTES);

// get all casesheets for this patient
$casesheet->patient_id = $patient_id;
$stmt_casesheets = $casesheet->readByPatient();

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-md-12'>";
    // include the patient details and casesheets template
    include_once '../templates/patient_view.tpl.php';
echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
