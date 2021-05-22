<?php
include "header.php";
?>

<div class="container col-md-8 my-4">

<h1 class="text-center">Due Update</h1>
            <hr>

<?php if(isset($_GET['deleteSuccesfull'])){
?>
<p class="text-center text-success">Delete Succesfully Completed</p>
<?php 
} ?>

<?php if(isset($_GET['updateSuccesfull'])){
?>
<p class="text-center text-success">Update Succesfully Completed</p>
<?php 
} ?>

<?php if(isset($_GET['somethingWentWrong'])){
?>
<p class="text-center text-danger">Something Went Wrong</p>
<?php 
} ?>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Action</th>
                <th>Due ID</th>
                <th>Due Title</th>
                <th>Due Price</th>
                <th>Due Date</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $query = "SELECT * FROM due";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td>
                    <div class="row align-items-center justify-content-center">
                        <div class="col m-0">
                            <form class="m-0" action="dueUpdate.php" method="POST">
                                <input type="hidden" name="dueID" value="<?php echo $row['dueID']; ?>">
                                <input class="btn btn-warning" type="submit" name="dueUpdateSubmit" value="Update">
                            </form>
                        </div>


                        <div class="col m-0">
                            <form class="m-0" action="dueDeleteDB.php" method="POST">
                                <input type="hidden" name="dueID" value="<?php echo $row['dueID']; ?>">
                                <input class="btn btn-danger" type="submit" name="dueDeleteSubmit" value="Delete">
                            </form>
                        </div>
                    </div>
                    </td>
                    <td><?php echo $row['dueID']; ?></td>
                    <td><?php echo $row['dueTitle']; ?></td>
                    <td><?php echo $row['duePrice']; ?></td>
                    <td><?php echo $row['duePeriot']; ?></td>
                </tr>


            <?php } ?>
        </tbody>
    </table>

</div>
<?php
include "footer.php";
?>