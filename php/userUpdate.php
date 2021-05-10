<?php
include "header.php";
include "dbconn2.php";
?>
<link rel="stylesheet" href="../css/update.css">

<main>

    <div class="main-update">
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
        $pullinfo = -1;
        // Catch the selected user id 

        $selectedUserID = $_GET['userID'];
        // DB user check
        $checkUserInDB = $conn2->prepare("SELECT * FROM user  WHERE userID = $selectedUserID");
        $checkUserInDB->execute();
        $int = $checkUserInDB->rowCount();
        if ($int != 0) {
            $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
        }


        ?>
        <form class="was-validated" action="" method="POST">
            <div class="label">

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" value="<?php echo $pullinfo['birthDate'] ?>" required>
                    <label for="birthDate">Birth Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="gender" name="gender" value="<?php echo $pullinfo['gender'] ?>" required>
                    <label for="gender">Gender</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="isAdmin" name="isAdmin" value="<?php echo  $pullinfo['isAdmin'] ?>" required>
                    <label for="isAdmin">isAdmin</label>
                </div>

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
                    <input class="form-control" id="basic-addon1" type="text" id="registerDate" name="registerDate" value="<?php echo $pullinfo['registerDate'] ?>" required>
                    <label for="registerDate">registerDate</label>
                </div>



                <!-- SHOW USERS FLAT NUMBER -->
                <?php

                $valueFlat = -1;
                // DB user check
                $checkUserInDB = $conn2->prepare("SELECT f.flatID FROM flat f, user u WHERE f.userID = u.userID and u.userID = $selectedUserID");
                $checkUserInDB->execute();
                $int = $checkUserInDB->rowCount();
                if ($int != 0) {
                    $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
                    $valueFlat = $pullinfo['flatID'];
                }
                ?>
                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="number" id="userFlatno" name="userFlatno" value="<?php echo $valueFlat ?>" required>
                    <label for="userFlatno">User Flat No</label>
                </div>


                <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
                <label for="submit"></label>
                <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
                <label for="reset"></label>
                <?php
                if (isset($_POST['backButton'])) {
                    // Go to the main page
                    header("#");
                }
                $bilgilerim_id = $selectedUserID;


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

		        where userID={$bilgilerim_id}
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
                        Header("Location:userUpdate.php?selectedUpdate=Successfull");
                        exit;
                    } else {
                        Header("Location:userUpdate.php?selectedUpdate=Failed");
                        exit;
                    }
                }

                ?>
        </form>


</main>
<?php
include "footer.php";
?>