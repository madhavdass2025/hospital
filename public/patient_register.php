<?php
// core configuration
include_once "../config/core.php";

// check if logged in as front desk or admin
include_once "front_desk_checker.php";

// include classes
include_once '../src/Database.php';
include_once '../src/Patient.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$patient = new Patient($db);

// set page title
$page_title = "Register Patient";

// include page header HTML
include_once "../templates/header.php";

echo "<div class='col-md-12'>";

// if form was posted
if($_POST){
    // set patient property values
    $patient->owner_name = $_POST['owner_name'];
    $patient->owner_contact = $_POST['owner_contact'];
    $patient->pet_name = $_POST['pet_name'];
    $patient->pet_species = $_POST['pet_species'];
    $patient->pet_breed = $_POST['pet_breed'];
    $patient->pet_sex = $_POST['pet_sex'];
    $patient->pet_dob = $_POST['pet_dob'];

    // create the patient
    if($patient->create()){
        echo "<div class='alert alert-success'>";
            echo "Patient was successfully registered.";
        echo "</div>";
    }else{
        echo "<div class='alert alert-danger'>";
            echo "Unable to register patient.";
        echo "</div>";
    }
}

// include the registration form
include_once '../templates/patient_register.tpl.php';

echo "</div>";

// include page footer HTML
include_once "../templates/footer.php";
?>
