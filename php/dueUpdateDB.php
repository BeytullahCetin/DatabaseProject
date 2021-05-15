<?php
session_start();
ob_start();
include "dbconn.php";

$duePeriot = date("Y-m-d", strtotime($_POST['duePeriot']));
$duePrice = $_POST['duePrice'];
$dueTitle = $_POST['dueTitle'];

$query = "UPDATE due SET dueTitle = '$dueTitle', duePrice =$duePrice, duePeriot = '$duePeriot'";
if(mysqli_query($conn, $query)){
    header("Location: dues.php?updateSuccesfull");
}else{
    header("Location: dues.php?somethingWentWrong");
}
?>