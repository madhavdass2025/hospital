<form action='patient_register.php' method='post'>
    <table class='table table-responsive table-bordered'>
        <tr>
            <td colspan="2"><strong>Owner Details</strong></td>
        </tr>
        <tr>
            <td>Owner Name</td>
            <td><input type='text' name='owner_name' class='form-control' required></td>
        </tr>
        <tr>
            <td>Owner Contact</td>
            <td><input type='text' name='owner_contact' class='form-control'></td>
        </tr>
        <tr>
            <td colspan="2"><strong>Pet Details</strong></td>
        </tr>
        <tr>
            <td>Pet Name</td>
            <td><input type='text' name='pet_name' class='form-control' required></td>
        </tr>
        <tr>
            <td>Species</td>
            <td><input type='text' name='pet_species' class='form-control'></td>
        </tr>
        <tr>
            <td>Breed</td>
            <td><input type='text' name='pet_breed' class='form-control'></td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>
                <select name="pet_sex" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Unknown" selected>Unknown</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type='date' name='pet_dob' class='form-control'></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Register Patient</button>
            </td>
        </tr>
    </table>
</form>
