<?php 
session_start();
ob_start();
include "dbconn.php";

$duePeriot = date("Y-m-d", strtotime($_POST['duePeriot']));
$duePrice = $_POST['duePrice'];

$query = "INSERT INTO due (duePrice, duePeriot) VALUES ($duePrice, '$duePeriot')";

if(mysqli_query($conn, $query)){
    $last_id = mysqli_insert_id($conn);

    $query = "SELECT * FROM userFlat WHERE exitDate IS NULL";
    $result = mysqli_query($conn, $query);
    
    while($row = mysqli_fetch_array($result)){
        $query = "INSERT INTO userFlatDue (dueID, userFlatID) VALUES ($last_id, ".$row['userFlatID'].")";
        if(mysqli_query($conn, $query)){
            echo "başarılı";
        }else{
            echo "başarısız";
        }
    }
}else{
    echo "Error!" . $sql . "<br>" . mysqli_error($conn);
}
