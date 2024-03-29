<?php
include "header.php";
include "dbconn2.php";
?>
<link rel="stylesheet" href="../css/update.css">

<main>

    <div class="main-update my-4">
        <!--UPDATE SUCCESSFUL OR FAILED MASSAGE-->
        <?php
        if (isset($_GET['selectedUpdate'])) {
            if ($_GET['selectedUpdate'] == "Successfull") {
                echo "<br><div class='alert alert-success' role='alert'>Update is Successful</div>";
            } elseif ($_GET['selectedUpdate'] == "Fail") {
                echo "<br><div class='alert alert-danger' role='alert'>Update is Failed</div>";
            } else {
                echo "<br><div class='alert alert-danger' role='alert'>FATAL ERROR</div>";
            }
        }
        ?>
        <?php
        $pullinfo;
        // Catch the selected user id 
        if (isset($_GET['userID'])) {
            $selectedUserID = $_GET['userID'];
            // DB user check
            $checkUserInDB = $conn2->prepare("SELECT * FROM user  WHERE userID = $selectedUserID");
            $checkUserInDB->execute();
            $int = $checkUserInDB->rowCount();
            if ($int != 0) {
                $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
            }
        ?>

            <div class="container col-md-6">

                <h1 class="text-center">Update User</h1>
                <hr>

                <form class="was-validated" action="" method="POST">
                    <div class="label">

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="text" id="userName" name="userName" value="<?php echo $pullinfo['userName'] ?>" required>
                            <label for="userName">User Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="text" id="userSurname" name="userSurname" value="<?php echo $pullinfo['userSurname'] ?>" required>
                            <label for="userSurname">User Surname</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="tel" id="userGSM" name="userGSM" value="<?php echo $pullinfo['userGSM'] ?>" required>
                            <label for="userGSM">User GSM - 1</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="tel" id="userGSM_2" name="userGSM_2" value="<?php echo $pullinfo['userGSM_2'] ?>" required>
                            <label for="userGSM_2">User GSM - 2</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="mail" id="userEmail" name="userEmail" value="<?php echo $pullinfo['userEmail'] ?>" required>
                            <label for="userEmail">User Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" value="<?php echo $pullinfo['birthDate'] ?>" required>
                            <label for="birthDate">Birth Date</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select name="gender" id="gender" class="form-control" required>
                                <option <?php if ($pullinfo['gender'] == "male") echo "selected"; ?> value='male'>Male</option>
                                <option <?php if ($pullinfo['gender'] == "female") echo "selected"; ?> value='female'>Female</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="isAdmin" id="isAdmin" value="<?php echo  $pullinfo['isAdmin'] ?>" required>
                                <option <?php if ($pullinfo['isAdmin'] == "admin") echo "selected"; ?> value="admin">Admin</option>
                                <option <?php if ($pullinfo['isAdmin'] == "user") echo "selected"; ?> value="user">User</option>
                            </select>
                            <label for="isAdmin">Role</label>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" value="Update" required>
                            <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" value="Reset" required>
                        </div>

                </form>

            </div>

        <?php
            if (isset($_POST['submit'])) {

                $kaydet = $conn2->prepare("UPDATE user set
                    birthDate=:birthDate,
                    gender=:gender,
                    isAdmin=:isAdmin,
                    userName=:userName,
                    userSurname=:userSurname,
                    userGSM=:userGSM,
                    userGSM_2=:userGSM_2,
                    userEmail=:userEmail,
                    registerDate=:registerDate

                    where userID={$selectedUserID}
                    ");

                $insert = $kaydet->execute(array(

                    'birthDate' => $_POST['birthDate'],
                    'gender' => $_POST['gender'],
                    'isAdmin' => $_POST['isAdmin'],
                    'userName' => $_POST['userName'],
                    'userSurname' => $_POST['userSurname'],
                    'userGSM' => $_POST['userGSM'],
                    'userGSM_2' => $_POST['userGSM_2'],
                    'userEmail' => $_POST['userEmail'],
                    'registerDate' => $_POST['registerDate']
                ));

                if ($insert) {

                    // if the user is change own info's, then SESSION must be change
                    if ($_SESSION['userID'] == $selectedUserID) {
                        session_destroy();
                        session_start();
                        $checkUserInDB = $conn2->prepare("SELECT * FROM user WHERE userID = $selectedUserID");
                        $checkUserInDB->execute();
                        $int = $checkUserInDB->rowCount();
                        if ($int == 1) {
                            $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
                            $_SESSION['userID'] = $selectedUserID;
                            $_SESSION['user'] = $pullinfo;
                        }
                    }
                    Header("Location:userUpdate.php?selectedUpdate=Successfull&userID=$selectedUserID");
                    exit;
                } else {
                    Header("Location:userUpdate.php?selectedUpdate=Failed&userID=$selectedUserID");
                    exit;
                }
            }
        }
        ?>

</main>
<?php
include "footer.php";
?>