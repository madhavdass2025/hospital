<?php
// core configuration
include_once "../config/core.php";

// check if logged in as doctor or admin
include_once "doctor_checker.php";

// include classes
include_once '../src/Database.php';
include_once '../src/Patient.php';
include_once '../src/Casesheet.php';

// get patient id from URL
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : die('ERROR: Missing Patient ID.');

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$patient = new Patient($db);
$casesheet = new Casesheet($db);

// set patient id
$patient->id = $patient_id;
$patient->readOne(); // read patient details to display on the page

// set page title
$page_title = "Create Casesheet for " . htmlspecialchars($patient->pet_name, ENT_QUOTES);

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-md-12'>";

// if form was posted
if($_POST){
    // set casesheet property values
    $casesheet->patient_id = $patient_id;
    $casesheet->doctor_id = $_SESSION['user_id']; // get doctor id from session
    $casesheet->patient_history = $_POST['patient_history'];
    $casesheet->symptoms = $_POST['symptoms'];
    $casesheet->diagnosis = $_POST['diagnosis'];
    $casesheet->prescribed_medicines = $_POST['prescribed_medicines'];
    $casesheet->lab_tests_ordered = $_POST['lab_tests_ordered'];
    $casesheet->notes = $_POST['notes'];

    // create the casesheet
    if($casesheet->create()){
        echo "<div class='alert alert-success'>";
            echo "Casesheet was successfully created.";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger'>";
            echo "Unable to create casesheet.";
        echo "</div>";
    }
}

// include the casesheet form
include_once '../templates/casesheet_create.tpl.php';

echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
