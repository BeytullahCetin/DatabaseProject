<?php
include "header.php";
?>

<link rel="stylesheet" href="../css/update.css">

<main>
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
    
    <div class="main-update">
        <form class="was-validated" action="userUpdate.php" method="POST">
            <div class="label">
                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" value="<?php echo $_SESSION['user']['birthDate'] ?>" required>
                    <label for="birthDate">Birth Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="gender" name="gender" value="<?php echo $_SESSION['user']['gender'] ?>" required>
                    <label for="gender">Gender</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="isAdmin" name="isAdmin" value="<?php echo $_SESSION['user']['isAdmin'] ?>" required>
                    <label for="isAdmin">isAdmin</label>
                </div>

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
                    <input class="form-control" id="basic-addon1" type="text" id="registerDate" name="registerDate" value="<?php echo $_SESSION['user']['registerDate'] ?>" required>
                    <label for="registerDate">registerDate</label>
                </div>

                <!-- SHOW USERS FLAT NUMBER -->
                <?php
                include "dbconn2.php";
                $userIDinDB = $_SESSION['userID'];
                $valueFlat = -1;
                // DB user check
                $checkUserInDB = $conn2->prepare("SELECT f.flatID FROM flat f, user u WHERE f.userID = u.userID and u.userID = $userIDinDB");
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

            </div>

            <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
            <label for="submit"></label>
            <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
            <label for="reset"></label>
        </form>
    </div>



    <?php

    // Go to the main page
    if (isset($_POST['backButton'])) {
        header("#");
    }
    if (isset($_POST['submit'])) {

        $bilgilerim_id = $_SESSION['userID'];

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


		where userID={$_SESSION['userID']}
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
            $updatedUserID = $_SESSION['userID'];
            session_destroy();
            session_start();
            // DB updated user check 
            $checkUserInDB = $conn2->prepare("SELECT * FROM user WHERE userID = $updatedUserID");
            $checkUserInDB->execute();
            $int = $checkUserInDB->rowCount();

            // If user find, then int equals 1 and sessions stared
            if ($int == 1) {
                $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);

                // Create sessions
                $_SESSION['userID'] = $pullinfo['userID'];
                $_SESSION['user'] = $pullinfo;
                Header("Location:userUpdate.php?Update=Successfull");
                exit;
            }
            exit;
        } else {
            //echo "kayıt başarısız";
            Header("Location:userUpdate.php?Update=Fail");
            exit;
        }
    }

    ?>
</main>


<?php
include "footer.php";
?>