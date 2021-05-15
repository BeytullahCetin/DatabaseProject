<?php 
session_start();
ob_start();
include "dbconn.php";

$ufdID = $_POST['ufdID'];

$query = "UPDATE userFlatDue SET paymentDate = '". date('Y-m-d') . "' WHERE userFlatDueID = $ufdID";
if(mysqli_query($conn, $query)){
    header("Location: showDues.php");
}else{
    echo "Başarısız";
}
?>