<?php
session_start();
ob_start();
include "dbconn.php";

$dueID = $_POST['dueID'];

$query = "DELETE FROM due WHERE dueID = $dueID";
if(mysqli_query($conn, $query)){
    header("Location: dues.php?deleteSuccesfull");
}else{
    header("Location: dues.php?somethingWentWrong");
}
?>