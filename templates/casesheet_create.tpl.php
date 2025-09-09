<div class="well">
    <h4>Patient: <?php echo htmlspecialchars($patient->pet_name, ENT_QUOTES); ?></h4>
    <p>Owner: <?php echo htmlspecialchars($patient->owner_name, ENT_QUOTES); ?></p>
</div>

<form action='casesheet_create.php?patient_id=<?php echo htmlspecialchars($patient_id, ENT_QUOTES); ?>' method='post'>
    <table class='table table-responsive table-bordered'>
        <tr>
            <td>Patient History</td>
            <td><textarea name='patient_history' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Symptoms</td>
            <td><textarea name='symptoms' class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td>Diagnosis</td>
            <td><textarea name='diagnosis' class='form-control' required></textarea></td>
        </tr>
        <tr>
            <td>Prescribed Medicines</td>
            <td><textarea name='prescribed_medicines' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Lab Tests Ordered</td>
            <td><textarea name='lab_tests_ordered' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Notes</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create Casesheet</button>
            </td>
        </tr>
    </table>
</form>
