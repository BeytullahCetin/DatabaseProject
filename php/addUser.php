<?php
include "header.php";
?>

<link href="../css/addUser.css" rel="stylesheet">

<main class="main-content">
    <div class="main-item">

        <form class="was-validated" action="#" method="POST">
            <div class="label">

                <div class="input-group mb-3">
                    <span class="input-group-text " id="basic-addon1">Name</span>
                    <input type="text" name="userName" id="userName" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a Name
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Surname</span>
                    <input type="text" name="userSurname" id="userSurname" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a Surname
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">User name</span>
                    <input type="text" name="userUsername" id="userUsername" class="form-control" required>
                    <div class="invalid-feedback">
                        Please enter a Username
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Flat No</span>
                    <select name="userFlatno" id="userFlatno" class="form-control" required>
                        <?php
                        // IT SHOWS THAT EMPTY FLATS IN APARTMENT.

                        // $kontrol = $db->prepare("SELECT userFlatno FROM usersinfo");
                        // $kontrol->execute();
                        // $faltNos = array();
                        // while ($pullinfo = $kontrol->fetch(PDO::FETCH_ASSOC)) {
                        //     array_push($faltNos, $pullinfo['userFlatno']);
                        // }
                        // for ($i = 1; $i <= 10; $i++) {
                        //     if (!in_array($i, $faltNos)) {
                        //         echo "<option value='$i'>No : $i</option>";
                        //     }
                        // }
                        ?>
                    </select>

                    <div class="invalid-feedback">
                        Please enter a Flat number
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">GSM</span>
                    <input type="text" name="userGSM" id="userGSM" class="form-control" required placeholder="5551234567">
                    <div class="invalid-feedback">
                        Please enter a GSM
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">E-MAIL</span>
                    <input type="text" name="userEmail" id="userEmail" class="form-control" required placeholder="example@example.com">
                    <div class="invalid-feedback">
                        Please enter a E-Mail address
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">PASSWORD</span>
                    <input type="text" name="userPassword" id="userPassword" class="form-control" required>
                    <div class="invalid-feedback">
                        Please describe the Password
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Role</span>
                    <select name="role" id="role" class="form-control" required>
                        <!-- IT SHOWS THAT Role : admin / user -->
                        <option value='null' selected>Select Role</option>
                        <option value='admin'>Role: Admin</option>
                        <option value='user'>Role: User</option>
                    </select>

                    <div class="invalid-feedback">
                        Please enter a Flat number
                    </div>
                </div>
            </div>


            <label for="submit"></label>
            <input type="submit" name="adminSignUser-btn" id="submit" class="btn btn-primary me-md-2 btn-lg" required>
            <label for="reset"></label>
            <input type="reset" name="reset" id="reset" class="btn btn-danger me-md-2 btn-lg" required>

            <?php
            // USER ADDED SUCCESS OR FAILED

            // if (isset($_GET['adminUserSign'])) {
            //     if ($_GET['adminUserSign'] == "success") {
            //         header("Location:adminInfo.php?successful");
            //         exit;
            //     } elseif ($_GET['adminUserSign'] == "failed") {
            //         echo "<div class='alert alert-danger' role='alert'>Failed</div>";
            //         exit;
            //     }
            // }
            ?>

        </form>

    </div>
</main>

<?
include "footer.php";
?>