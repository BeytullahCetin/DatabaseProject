<?php
include "header.php";
include "dbconn2.php";
?>

<link href="../css/addUser.css" rel="stylesheet">

<main class="main-content">

    <div class="main-item my-4">
        <!--UPDATE SUCCESSFUL OR FAILED MASSAGE-->
        <?php
        if (isset($_GET['userSign'])) {
            if ($_GET['userSign'] == "Successfull") {
                echo "<br><div class='alert alert-success' role='alert'>New user added Successfully</div>";
            } elseif ($_GET['userSign'] == "Fail") {
                echo "<br><div class='alert alert-danger' role='alert'>New user add was Failed</div>";
            } else {
                echo "<br><div class='alert alert-warning' role='alert'>FATAL ERROR</div>";
            }
        }
        ?>

        <div class="container col-md-6">

            <h1 class="text-center">Add User</h1>
            <hr>

            <form class="was-validated" action="addUserDB.php" method="POST">

                <div class="label">

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="text" id="userName" name="userName" required>
                        <label for="userName">User Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="text" id="userSurname" name="userSurname" required>
                        <label for="userSurname">User Surname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="tel" id="userGSM" name="userGSM" required>
                        <label for="userGSM">User GSM - 1</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="tel" id="userGSM_2" name="userGSM_2" required>
                        <label for="userGSM_2">User GSM - 2</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="mail" id="userEmail" name="userEmail" required>
                        <label for="userEmail">User Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" required>
                        <label for="birthDate">Birth Date</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="gender" id="gender" class="form-control" required>
                            <option style="display: none;" disabled selected></option>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
                        <label for="gender">Gender</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="isAdmin" id="isAdmin" class="form-control" required>
                            <option style="display: none;" disabled selected></option>
                            <option value='admin'>Admin</option>
                            <option value='user'>User</option>
                        </select>
                        <label for="isAdmin">Role</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="password" id="password" name="password" required>
                        <label for="password">User Password</label>
                    </div>
                </div>


                <div class="d-grid gap-2 d-md-flex justify-content-md-center">

                <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" value="Add" required>
                <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" value="Reset" required>

                </div>
            </form>
        </div>


    </div>
</main>

<?php
include "footer.php";
?>