<?php 
session_start();
ob_start();
include "dbconn.php";

$userID = $_POST['userID'];
$flatID = $_POST['flatID'];
$entryDate = date("Y-m-d");

$query = "INSERT INTO userflat (userID, flatID, entryDate) VALUES ($userID, $flatID, '$entryDate')";

if(mysqli_query($conn, $query)){
    header("Location: apartment.php?succesfullyMoveIn");
}else{
    header("Location: apartment.php?error");
}
?>