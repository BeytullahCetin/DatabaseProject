<?php
include "header.php";
?>

<div class="container col-md-4 my-5">

    <form action="addExpense.php" method="POST">

        <div class="form-floating mb-3">
            <input class="form-control" type="text" id="expenseTitle" name="expenseTitle" placeholder="Expense Title">
            <label for="expenseTitle">Expense Title</label>
        </div>

        <div class="form-floating mb-3">
            <?php
            $myDate = date("Y-m-d");
            ?>
            <input class="form-control" type="date" id="expenseDate" name="expenseDate" value="<?php echo "$myDate"; ?>">
            <label for="expenseDate">Expense Date</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" type="number" id="expensePrice" name="expensePrice" placeholder="Expense Price">
            <label for="expensePrice">Expense Price</label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="submit" class="btn btn-primary" id="expenseSubmit" name="expenseSubmit">
        </div>

    </form>
</div>

<?php
include "footer.php";
?>