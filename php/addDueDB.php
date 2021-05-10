<?php 
session_start();
ob_start();
include "dbconn.php";

$duePeriot = date("Y-m-d", strtotime($_POST['duePeriot']));
$duePrice = $_POST['duePrice'];

$query = "INSERT INTO due (duePrice, duePeriot) VALUES ($duePrice, '$duePeriot')";

if(mysqli_query($conn, $query)){
    header("Location: addDue.php?dueSuccesfullyAdded");
}else{
    echo "Error!" . $sql . "<br>" . mysqli_error($conn);
}

?>