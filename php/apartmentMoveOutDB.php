<?php 
session_start();
ob_start();
include "dbconn.php";

$userFlatID = $_POST['userFlatID'];
$exitDate = date("Y-m-d");

$query = "UPDATE userFlat SET exitDate = '$exitDate' WHERE userFlatID = $userFlatID";

if(mysqli_query($conn, $query)){
    header("Location: apartment.php?succesfullyMoveOut");
}else{
    header("Location: apartment.php?error");
}
?>