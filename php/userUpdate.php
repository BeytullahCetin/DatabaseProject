<?php
include "header.php";
include "footer.php";
?>
<link rel="stylesheet" href="../css/update.css">

<main>
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