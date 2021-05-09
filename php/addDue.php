<?php
include "header.php";
?>

<div class="container col-md-4 my-5">

    <form action="addDue.php" method="POST">

        <div class="form-floating mb-3">
            <?php
            $myDate = date("Y-m");
            ?>
            <input class="form-control" type="month" id="duePeriod" name="duePeriod" value="<?php echo "$myDate"; ?>">
            <label for="duePeriod">Due Period</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="number" id="duePrice" name="duePrice" placeholder="Due Price">
            <label for="duePrice">Due Price</label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="submit" class="btn btn-primary" id="dueSubmit" name="dueSubmit">
        </div>
        
    </form>
</div>

<?php
include "footer.php";
?>