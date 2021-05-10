<?php
include "header.php";
include "footer.php";
?>
<link rel="stylesheet" href="../css/update.css">

<main>
<<<<<<< HEAD
    <div class="main-update">
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
=======
    <?php
    if (isset($_GET['userIDupdate'])) {

        // In the URL, takes user id and search in database
        $bilgilerimsor = $db->prepare("SELECT * from usersinfo where userID=:userID");
        $bilgilerimsor->execute(array(
            'userID' => $_GET['userID']
        ));

        // User informations come with `$bilgilerimcek`, then use it in inputs' value 
        $bilgilerimcek = $bilgilerimsor->fetch(PDO::FETCH_ASSOC);
    }
    ?>
>>>>>>> 73a66422080872ad6143bcb8f1012c137494812b

    <div class="main-update">
        <form action="update.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Name</span>
                <!--
                        input value is echo $bilgilerimcek['userName'] with php tags  
                        @param database column name $userName
                    -->
                <input type="text" required name="userName" class="form-control" value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Surname</span>
                <input type="text" required name="userSurname" class="form-control" value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Flat No</span>
                <input type="int" required name="userFlatno" class="form-control" value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">User Name</span>
                <input type="text" required name="userUsername" class="form-control" value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Mail</span>
                <input type="text" required name="userEmail" class="form-control" value="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">GSM</span>
                <input type="text" required name="userGSM" class="form-control" value="">
            </div>

            <input type="hidden" value="<?php echo $bilgilerimcek['userID'] ?>" name="userID"><br>
            <div class="buttons">
                <button type="submit" class="btn btn-success" id="update" name="updateButton">Update</button>
                <button type="submit" class="btn btn-secondary" id="back" name="backButton">Back</button>
            </div>
        </form>
    </div>


    <?php
    /*
		if(isset($_POST['backButton'])){
            // Go to the main page
			header("#");
		}
		if (isset($_POST['updateButton'])) {

			$bilgilerim_id = $_POST['userID'];

			$kaydet = $db->prepare("UPDATE usersinfo set
		userName=:userName,
		userSurname=:userSurname,
		userEmail=:userEmail,
		userUsername=:userUsername,
		userFlatno=:userFlatno,
		userGSM=:userGSM

		where userID={$_POST['userID']}
		");

			$insert = $kaydet->execute(array(

				'userName' => $_POST['userName'],
				'userSurname' => $_POST['userSurname'],
				'userEmail' => $_POST['userEmail'],
				'userUsername' => $_POST['userUsername'],
				'userFlatno' => $_POST['userFlatno'],
				'userGSM' => $_POST['userGSM']
			));



			if ($insert) {
				//echo "kayıt başarılı";
				Header("Location:../admin/adminInfo.php?durum=ok&bilgilerim_id=$bilgilerim_id");
				exit;
			} else {
				//echo "kayıt başarısız";
				Header("Location:../admin/adminInfo.php?durum=no&bilgilerim_id=$bilgilerim_id");
				exit;
			}
		}
        */
    ?>
</main>