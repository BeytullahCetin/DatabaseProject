<?php
include "header.php";
?>

<!--CSS added-->
<link rel="stylesheet" href="../css/profile.css">

<main class="main-content">

    <div class="main-item my-4">
        <!--UPDATE SUCCESSFUL OR FAILED MASSAGE-->
        <?php

        if (isset($_GET['Update'])) {
            if ($_GET['Update'] == "Successfull") {
                echo "<br><div class='alert alert-success' role='alert'>Update is Successful</div>";
            } elseif ($_GET['Update'] == "Fail") {
                echo "<br><div class='alert alert-danger' role='alert'>Update is Failed</div>";
            } else {
                echo "<br><div class='alert alert-danger' role='alert'>FATAL ERROR</div>";
            }
        }
        ?>

        <div class="container col-md-6">
            <h1 class="text-center">Profile</h1>
            <hr>

            <form class="was-validated" action="profileDB.php" method="POST">

                <div class="label">

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="text" id="userName" name="userName" value="<?php echo $_SESSION['user']['userName'] ?>" required>
                        <label for="userName">User Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="text" id="userSurname" name="userSurname" value="<?php echo $_SESSION['user']['userSurname'] ?>" required>
                        <label for="userSurname">User Surname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="tel" id="userGSM" name="userGSM" value="<?php echo $_SESSION['user']['userGSM'] ?>" required>
                        <label for="userGSM">User GSM - 1</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="tel" id="userGSM_2" name="userGSM_2" value="<?php echo $_SESSION['user']['userGSM_2'] ?>" required>
                        <label for="userGSM_2">User GSM - 2</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="mail" id="userEmail" name="userEmail" value="<?php echo $_SESSION['user']['userEmail'] ?>" required>
                        <label for="userEmail">User Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" value="<?php echo $_SESSION['user']['birthDate'] ?>" required>
                        <label for="birthDate">Birth Date</label>
                    </div>

                    <div class="form-floating mb-3">
                            <select name="gender" id="gender" class="form-control" required>
                                <option <?php if ($_SESSION['user']['gender'] == "male") echo "selected"; ?> value='male'>Male</option>
                                <option <?php if ($_SESSION['user']['gender'] == "female") echo "selected"; ?> value='female'>Female</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="password" id="passwordOld" name="passwordOld" placeholder="Old Password" required>
                        <label for="passwordOld">User Old Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input class="form-control" id="basic-addon1" type="password" id="password" name="password" placeholder="New Password" required>
                        <label for="password">User New Password</label>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
                <label for="submit"></label>
                <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
                <label for="reset"></label>
            </form>
        </div>
    </div>
</main>

<?php
include "footer.php";
?>