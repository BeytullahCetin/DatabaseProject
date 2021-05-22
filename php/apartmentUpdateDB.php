<?php
session_start();
ob_start();
include "dbconn.php";

$userFlatID = $_POST['userFlatID'];
$userID = $_POST['userID'];
$flatID = $_POST['flatID'];
$exitDate = $entryDate = date("Y-m-d");

$query = "UPDATE userflat SET exitDate = '$exitDate' WHERE userFlatID = $userFlatID";
if (mysqli_query($conn, $query)) {
    
    $query = "INSERT INTO userflat (userID, flatID, entryDate) VALUES ($userID, $flatID, '$entryDate')";
    if (mysqli_query($conn, $query)) {
        header("Location: apartment.php?succesfullyUpdate");
    } else {
        header("Location: apartment.php?error");
    }

} else {
    header("Location: apartment.php?error");
}