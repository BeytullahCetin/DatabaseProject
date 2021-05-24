<?php
include "header.php";

$dueID = $_POST['dueID'];
$query = "SELECT *
FROM due
WHERE dueID = $dueID";
$due = mysqli_fetch_array(mysqli_query($conn, $query));


?>

<div class="container col-md-4 my-5">

    <form class="my-3" action="dueUpdateDB.php" method="POST">

        <input type="hidden" value="<?php echo $dueID; ?>" name="dueID">

        <div class="form-floating mb-3">
            <input class="form-control" required type="text" id="dueTitle" name="dueTitle" placeholder="Due Title" value="<?php echo $due['dueTitle']; ?>">
            <label for="dueTitle">Due Title</label>
        </div>

        <div class="form-floating mb-3">

            <input class="form-control" type="date" id="duePeriot" name="duePeriot" value="<?php echo $due['duePeriot']; ?>">
            <label for="duePeriot">Due Date</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" required type="number" id="duePrice" name="duePrice" placeholder="Due Price" value="<?php echo $due['duePrice']; ?>">
            <label for="duePrice">Due Price</label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="submit" class="btn btn-primary" id="everyoneDueSubmit" name="everyoneDueSubmit" value="Update">
        </div>

    </form>

</div>

<?php
include "footer.php";
?>