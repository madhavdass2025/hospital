<div class="well">
    <h3>Patient Information</h3>
    <p><strong>Pet Name:</strong> <?php echo htmlspecialchars($patient->pet_name, ENT_QUOTES); ?></p>
    <p><strong>Owner:</strong> <?php echo htmlspecialchars($patient->owner_name, ENT_QUOTES); ?> (Contact: <?php echo htmlspecialchars($patient->owner_contact, ENT_QUOTES); ?>)</p>
    <p><strong>Species/Breed:</strong> <?php echo htmlspecialchars($patient->pet_species, ENT_QUOTES); ?> / <?php echo htmlspecialchars($patient->pet_breed, ENT_QUOTES); ?></p>
    <p><strong>Sex:</strong> <?php echo htmlspecialchars($patient->pet_sex, ENT_QUOTES); ?></p>
    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($patient->pet_dob, ENT_QUOTES); ?></p>
</div>

<?php
// show a 'create casesheet' button to doctors and admins
if(isset($_SESSION['role']) && ($_SESSION['role'] == 'Doctor' || $_SESSION['role'] == 'Admin')){
    echo "<div class='right-button-margin'>";
        echo "<a href='casesheet_create.php?patient_id={$patient->id}' class='btn btn-primary pull-right'>";
            echo "<span class='glyphicon glyphicon-plus'></span> Create New Casesheet";
        echo "</a>";
    echo "</div>";
}
?>

<h3>Case History</h3>
<?php
if($stmt_casesheets->rowCount() > 0){
    while ($row = $stmt_casesheets->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        // get doctor name
        $doctor->id = $doctor_id;
        $doctor->readOne();

        echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'>";
                echo "<h3 class='panel-title'>Visit on " . date('F j, Y', strtotime($visit_date)) . " (Doctor: " . htmlspecialchars($doctor->username, ENT_QUOTES) . ")</h3>";
            echo "</div>";
            echo "<div class='panel-body'>";
                echo "<p><strong>History:</strong> " . nl2br(htmlspecialchars($patient_history, ENT_QUOTES)) . "</p>";
                echo "<p><strong>Symptoms:</strong> " . nl2br(htmlspecialchars($symptoms, ENT_QUOTES)) . "</p>";
                echo "<p><strong>Diagnosis:</strong> " . nl2br(htmlspecialchars($diagnosis, ENT_QUOTES)) . "</p>";
                echo "<p><strong>Prescribed Medicines:</strong> " . nl2br(htmlspecialchars($prescribed_medicines, ENT_QUOTES)) . "</p>";
                echo "<p><strong>Lab Tests Ordered:</strong> " . nl2br(htmlspecialchars($lab_tests_ordered, ENT_QUOTES)) . "</p>";
                echo "<p><strong>Notes:</strong> " . nl2br(htmlspecialchars($notes, ENT_QUOTES)) . "</p>";
            echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='alert alert-info'>No case history found for this patient.</div>";
}
?>
