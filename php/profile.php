<?php
include "header.php";
?>

<!--CSS added-->
<link rel="stylesheet" href="../css/profile.css">

<main class="main-content">

    <!-- value include php files. (php echo $_SESSION['userUsername'])-->
    <div class="main-item">
        <form class="was-validated" action="#" method="POST">

            <div class="label">

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="birthDate" name="birthDate" value="<?php echo $_SESSION['user']['birthDate'] ?>" required>
                    <label for="birthDate">Birth Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="gender" name="gender" value="<?php echo $_SESSION['user']['gender'] ?>" required>
                    <label for="gender">Gender</label>
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
                    <input class="form-control" id="basic-addon1" type="password" id="passwordOld" name="passwordOld" placeholder="Old Password" required>
                    <label for="passwordOld">User Old Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="password" id="password" name="password" placeholder="New Password" required>
                    <label for="password">User New Password</label>
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

            <label for="submit"></label>
            <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
            <label for="reset"></label>
            <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
        </form>


        <!--User submit their own infoo to database. We check database and info in there-->
        <?php

        if (isset($_POST['submit'])) {
            $bilgilerim_id = $_SESSION['userID'];
            if ($_POST['passwordOld'] == $_SESSION['user']['password']) {
                $newPass = $_POST['password'];
                echo $newPass;

                $kaydet = $conn2->prepare("UPDATE user set
                password=:password,
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
                    'password' => $newPass,
                    'birthDate' => $_POST['birthDate'],
                    'gender' => $_POST['gender'],
                    'isAdmin' => $_SESSION['user']['isAdmin'],
                    'userName' => $_POST['userName'],
                    'userSurname' => $_POST['userSurname'],
                    'userGSM' => $_POST['userGSM'],
                    'userGSM_2' => $_POST['userGSM_2'],
                    'userEmail' => $_POST['userEmail'],
                    'registerDate' => $_SESSION['user']['registerDate']
                ));
                if ($insert) {
                    //echo "kayıt başarılı";
                    Header("Location:profile.php?Updade=Successfull");
                    exit;
                } else {
                    //echo "kayıt başarısız";
                    Header("Location:profile.php?Updade=Fail");
                    exit;
                }
            } else {
                echo "<br><div class='alert alert-warning' role='alert'>Old Password is WRONG</div>";
            }
        }

        ?>

        <!--UPDATE SUCCESSFUL OR FAILED MASSAGE-->
        <?php
        /*
        if (isset($_GET['update'])) {
            if ($_GET['update'] == "ok") {
                echo "<br><div class='alert alert-success' role='alert'>Update is Successful</div>";
            } elseif ($_GET['update'] == "no") {
                echo "<br><div class='alert alert-warning' role='alert'>Update is Failed</div>";
            }
        }*/
        ?>

    </div>

</main>