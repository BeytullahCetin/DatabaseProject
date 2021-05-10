<?php 
session_start();
ob_start();
include "dbconn.php";

$expenseDate = $_POST['expenseDate'];
$expensePrice = $_POST['expensePrice'];
$expenseTitle = $_POST['expenseTitle'];

$query = "INSERT INTO expense (expenseDate, expensePrice, expenseTitle) VALUES ('$expenseDate', $expensePrice, '$expenseTitle')";

if(mysqli_query($conn, $query)){
    header("Location: addExpense.php?expenseAddedSuccesfully");
}else{
    echo "Error!" . $sql . "<br>" . mysqli_error($conn);
}

?>