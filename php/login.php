<?php
//include "header.php";
?>
<link rel="stylesheet" href="../css/login.css">

<div class="hero">
    <div class="form-box">

        <h3>Welcome to Management System</h3>

        <!--USER LOG-IN-->
        <form id="log-in" action="login.php" method="POST" class="input-group">

            <input type="text" class="input-field" name="userUsername" placeholder="Username" required>
            <input type="password" class="input-field" name="userPassword" placeholder="Password" required>
            <input type="checkbox" name="rememberMe" class="chechk-box" value=<span>Remember Me</span>
            <button type="submit" class="sub-button" name="login-btn">Log-in</button><br><br>

            <!--When wrong information write and alert raise-->
            <?php
            if (isset($_GET['fail'])) {
                if ($_GET['fail'] == "username") {
                    echo "<div class='alert'>USERNAME WRONG - Login Failed</div>";
                } elseif ($_GET['fail'] == "password") {
                    echo "<div class='alert'>PASSWORD WRONG - Login Failed</div>";
                } elseif ($_GET['fail'] == "fail") {
                    echo "<div class='alert' role='alert'>WRONG ENTRY</div>";
                }
            }
            if (isset($_GET['sign'])) {
                if ($_GET['sign'] == "success") {
                    echo "<b style='color: green;'>your account created SUCCESSFUL</b>";
                } elseif ($_GET['sign'] == "failedDBsame") {
                    echo "<b style='color: red;'>Your account USERNAME or FLAT NUMBER has been used</b>";
                } elseif ($_GET['sign'] == "failed") {
                    echo "<b style='color: red;'>Your account created FAILED</b>";
                }
            }
            ?>
        </form>

        <!--User check-in-->
        <?php
        if (isset($_POST['login-btn'])) {

            $userUsername = htmlspecialchars($_POST['userUsername']);
            $userPassword = md5(htmlspecialchars($_POST['userPassword']));

            // DB user check
            //$checkUserInDB = $db->prepare("SELECT * FROM usersinfo WHERE
            //userUsername=:userUsername AND userPassword=:userPassword");
            //$checkUserInDB->execute(array(
            //    'userUsername' => $userUsername,
            //    'userPassword' => $userPassword
            //));
            $int = $checkUserInDB->rowCount();


            // If user find, then int equals 1 and sessions stared
            if ($int == 1) {
                $pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
                // Create sessions
                // IT MUST BE EDIT !!!!!!!
                $_SESSION['userID'] = $pullinfo['userID'];
                $_SESSION['userUsername'] = $userUsername;
                $_SESSION['userName'] = $pullinfo['userName'];
                $_SESSION['userPassword'] = $_POST['userPassword'];
                $_SESSION['userSurname'] = $pullinfo['userSurname'];
                $_SESSION['userFlatno'] = $pullinfo['userFlatno'];
                $_SESSION['userGSM'] = $pullinfo['userGSM'];
                $_SESSION['userEmail'] = $pullinfo['userEmail'];
            }

            // If user cannot find, then int equals 0 and print error 
            elseif ($int == 0) {
                $pullinfo2 = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
                $username = $pullinfo2['userUsername'];
                $password = $pullinfo2['userPassword'];
                if ($password != $userPassword) {
                    header("Location:../log.php?fail=password");
                    exit;
                } elseif ($username != $userUsername) {
                    header("Location:../log.php?fail=username");
                    exit;
                } else {
                    header("Location:../log.php?fail=fail");
                    exit;
                }
            }
        } ?>
    </div>
</div>

<?php
include "footer.php";
?>