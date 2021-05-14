<!--User submit their own infoo to database. We check database and info in there-->
<?php
include "header.php";

if (isset($_POST['submit'])) {
    $bilgilerim_id = $_SESSION['userID'];

    // If user old password equals the input
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
        userEmail=:userEmail

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
            'userEmail' => $_POST['userEmail']
        ));

        // WARNING 
        // The user is registered in the SESSION with the password your login. When you update your profile (when the password is changed), 
        // the old password remains in the SESSION.
        // So, I killed the old SESSION and create a new SESSION in there where the user id the same as the old one.
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
            }
            Header("Location:profile.php?Update=Successfull");
            exit;
        } else {
            Header("Location:profile.php?Update=Fail");
            exit;
        }
    } else {
        echo "<br><div class='alert alert-warning' role='alert'>Old Password is Wrong</div>";
        exit;
    }
}
?>