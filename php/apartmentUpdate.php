<?php
include "header.php";
$userFlatID = $_POST['userFlatID'];
?>

<div class="container col-md-4 my-5">

    <form action="apartmentUpdateDB.php" method="POST">

        <?php
        $query = "SELECT * FROM userFlat WHERE userFlatID = $userFlatID";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        ?>

        <input type="hidden" name="userFlatID" value="<?php echo $userFlatID; ?>">

        <div class="form-floating mb-3">
            <input class="form-control" type="input" id="flatID" name="flatID" value="<?php echo $row['flatID']; ?>" readonly>
            <label for="flatID">Door No</label>
        </div>

        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="userID" aria-label="Floating label select example">
                <?php
                $query = "SELECT userID, userName, userSurname FROM user";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row['userID']; ?>"><?php echo $row['userName'] . " " . $row['userSurname']; ?></option>
                <?php }
                ?>
            </select>
            <label for="floatingSelect">Resident Name</label>
        </div>

        <div class="d-grid gap-2 my-3">
            <input type="submit" class="btn btn-primary" id="apartmentMoveInSubmit" name="apartmentMoveInSubmit" value="Update">
        </div>

    </form>
</div>

<?php
include "footer.php";
?>