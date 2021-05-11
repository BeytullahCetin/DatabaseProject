<?php
include "header.php";
include "dbconn2.php";
?>

<link href="../css/addUser.css" rel="stylesheet">

<main class="main-content">

    <div class="main-item">
        <!--UPDATE SUCCESSFUL OR FAILED MASSAGE-->
        <?php
        if (isset($_GET['userSign'])) {
            if ($_GET['userSign'] == "Successfull") {
                echo "<br><div class='alert alert-success' role='alert'>New user added Successfully</div>";
            } elseif ($_GET['userSign'] == "Fail") {
                echo "<br><div class='alert alert-danger' role='alert'>New user add was Failed</div>";
            } else {
                echo "<br><div class='alert alert-warning' role='alert'>FATAL ERROR</div>";
            }
        }
        ?>
        <form class="was-validated" action="#" method="POST">

            <div class="label">

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="date" id="birthDate" name="birthDate" required>
                    <label for="birthDate">Birth Date</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="gender" id="gender" class="form-control" required>
                        <option value='male'>Male</option>
                        <option selected value='female'>Female</option>
                    </select>
                    <label for="gender">Gender</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="isAdmin" id="isAdmin" class="form-control" required>
                        <option value='admin'>Admin</option>
                        <option selected value='user'>User</option>
                    </select>
                    <label for="isAdmin">Role</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="userName" name="userName" required>
                    <label for="userName">User Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="text" id="userSurname" name="userSurname" required>
                    <label for="userSurname">User Surname</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="tel" id="userGSM" name="userGSM" required>
                    <label for="userGSM">User GSM - 1</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="tel" id="userGSM_2" name="userGSM_2" required>
                    <label for="userGSM_2">User GSM - 2</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="mail" id="userEmail" name="userEmail" required>
                    <label for="userEmail">User Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" id="basic-addon1" type="password" id="password" name="password" required>
                    <label for="password">User Password</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="userFlatno" id="userFlatno" class="form-control" required>

                        <?php

                        // IT SHOWS THAT EMPTY FLATS IN APARTMENT.
                        $kontrol = $conn2->prepare("SELECT doorNo FROM flat");
                        $kontrol->execute();
                        $faltNos = array();
                        while ($pullinfo = $kontrol->fetch(PDO::FETCH_ASSOC)) {
                            array_push($faltNos, $pullinfo['doorNo']);
                        }
                        for ($i = 1; $i <= 20; $i++) {
                            if (!in_array($i, $faltNos)) {
                                echo "<option value='$i'>No : $i</option>";
                            }
                        }
                        ?>
                    </select>
                    <label for="userFlatno">User Flat No</label>

                </div>
            </div>

            <input type="submit" name="submit" id="submit" class="btn btn btn-primary me-md-2 btn-lg" required>
            <label for="submit"></label>
            <input type="reset" name="reset" id="reset" class="btn btn btn-danger me-md-2 btn-lg" required>
            <label for="reset"></label>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $kaydet = $conn2->prepare("INSERT into user set
            password=:password,
            birthDate=:birthDate,
            gender=:gender,
            isAdmin=:isAdmin,
            userName =:userName,
            userSurname =:userSurname,
            userGSM =:userGSM,
            userGSM_2 =:userGSM_2,
            userEmail =:userEmail
            ");

            $insert = $kaydet->execute(array(
                'password' => $_POST['password'],
                'birthDate' => $_POST['birthDate'],
                'gender' => $_POST['gender'],
                'isAdmin' => $_POST['isAdmin'],
                'userName' => $_POST['userName'],
                'userSurname' => $_POST['userSurname'],
                'userGSM' => $_POST['userGSM'],
                'userGSM_2' => $_POST['userGSM_2'],
                'userEmail' => $_POST['userEmail']
                // 'userEmail' => htmlspecialchars($_POST['userEmail']),

            ));
            if ($insert) {
                Header("Location:addUser.php?userSign=Successfull");
                exit;
            } else {
                Header("Location:addUser.php?userSign=Fail");
                exit;
            }
        }
        ?>
    </div>
</main>

<?php
include "footer.php";
?>