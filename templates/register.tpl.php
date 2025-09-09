<form action='register.php' method='post' id='register'>

    <table class='table table-responsive'>

        <tr>
            <td class='width-30-percent'>Username</td>
            <td><input type='text' name='username' class='form-control' required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required id='passwordInput'></td>
        </tr>

        <tr>
            <td>Role</td>
            <td>
                <select name="role" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Front Desk">Front Desk</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Medical Staff">Medical Staff</option>
                    <option value="Storekeeper" selected>Storekeeper</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Register
                </button>
            </td>
        </tr>

    </table>
</form>
