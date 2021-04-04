<?php
include "header.php";
?>

<!--CSS added-->
<link rel="stylesheet" href="../css/profile.css">

<main class="main-content">

    <!--User can see own info in there-->
    <div class="card main-item" style="width: 20rem;">
        <div class="card-header">
            <b><i>PERSONAL INFORMATION</i></b>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p>
                    User Name
                    <!-- php tags (php echo $_SESSION['userUsername'])-->
                </p>
            </li>
            <li class="list-group-item">
                <p>
                    First
                    <!--php echo $_SESSION['userName']-->
                </p>
            </li>
            <li class="list-group-item">
                <p>
                    Last:
                </p>
            </li>
            <li class="list-group-item">
                <p>
                    +90
                </p>
            </li>
            <li class="list-group-item">
                <p>
                    Email
                </p>
            </li>
            <li class="list-group-item">
                <p>
                    # Flat No
                </p>
            </li>
        </ul>
    </div>

    <!-- value include php files. (php echo $_SESSION['userUsername'])-->
    <div class="main-item">
        <form class="was-validated" action="account.php" method="POST">
            <div class="label">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">User Name</span>
                    <input type="text" name="userUsername" id="username" class="form-control" required value="User Name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">First</span>
                    <input type="text" name="userName" id="name" class="form-control" required value="userName">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Last</span>
                    <input type="text" name="userSurname" id="surname" class="form-control" required value="userSurname">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> +90 </span>
                    <input type="tel" name="userGSM" id="phone" class="form-control" required value="userGSM">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">userEmail</span>
                    <input type="email" name="userEmail" id="mail" class="form-control" required value="userEmail@usermail.com">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> Old Password</span>
                    <input type="password" name="userPassword" id="passwordOld" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> New Password</span>
                    <input type="password" name="userPasswordNEW" id="passwordNew" class="form-control" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"> # userFlatno</span>
                    <input type="int" name="userFlatno" id="userFlatno" class="form-control" required value="userFlatno">
                </div>
            </div>

            <label for="submit"></label>
            <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
            <label for="reset"></label>
            <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
        </form>


        <!--User submit their own infoo to database. We check database and info in there-->
        <?php
        /*
        if (isset($_POST['submit'])) {

            $bilgilerim_id = $_SESSION['userID'];
            if ($_POST['userPassword'] == $_SESSION['userPassword']) {

                $kaydet = $db->prepare("UPDATE usersinfo set
                userUsername=:userUsername,
                userName=:userName,
                userSurname=:userSurname,
                userEmail=:userEmail,
                userUsername=:userUsername,
                userFlatno=:userFlatno,
                userPassword=:userPassword,
                userGSM=:userGSM

                where userID={$_SESSION['userID']}
                ");

                $insert = $kaydet->execute(array(

                    'userName' => $_POST['userName'],
                    'userSurname' => $_POST['userSurname'],
                    'userEmail' => $_POST['userEmail'],
                    'userUsername' => $_POST['userUsername'],
                    'userFlatno' => $_POST['userFlatno'],
                    'userPassword' => md5($_POST['userPasswordNEW']),
                    'userGSM' => $_POST['userGSM']

                ));
                if ($insert) {
                    //echo "kayıt başarılı";
                    Header("location:account.php?update=ok&bilgilerim_id=$bilgilerim_id");
                    exit;
                } else {
                    //echo "kayıt başarısız";
                    Header("Location:account.php?update=no&bilgilerim_id=$bilgilerim_id");
                    exit;
                }
            } else {
                echo "<br><div class='alert alert-warning' role='alert'>Old Password is WRONG</div>";
            }
        }
        */
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