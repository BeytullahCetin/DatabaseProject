<?php
session_start();
ob_start();
include "dbconn.php";

$dueID = $_POST['dueID'];
$duePeriot = $_POST['duePeriot'];
$duePrice = $_POST['duePrice'];
$dueTitle = $_POST['dueTitle'];

$query = "UPDATE due SET dueTitle = '$dueTitle', duePrice =$duePrice, duePeriot = '$duePeriot' WHERE dueID = $dueID";
if(mysqli_query($conn, $query)){
    header("Location: dues.php?updateSuccesfull");
}else{
    header("Location: dues.php?somethingWentWrong");
}
?>