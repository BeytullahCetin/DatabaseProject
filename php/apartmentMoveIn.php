<?php
include "header.php";
$flatID = $_POST['flatID'];

?>

<div class="container col-md-4 my-5">

    <form action="apartmentMoveInDB.php" method="POST">
        
        <div class="form-floating mb-3">
            <input class="form-control" type="input" id="flatID" name="flatID" value="<?php echo $flatID; ?>" readonly>
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
            <input type="submit" class="btn btn-primary" id="apartmentMoveInSubmit" name="apartmentMoveInSubmit" value="Move In">
        </div>

    </form>
</div>

<?php
include "footer.php";
?>