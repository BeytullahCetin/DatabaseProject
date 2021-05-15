<?php 

include "header.php";


$messageText = $_POST['messageText'];
$messageFrom = $_SESSION['userID'];
$messageTo = $_POST['messageTo'];

$query = "INSERT INTO message (messageText, messageFrom, messageTo) VALUES ('$messageText', '$messageFrom' , '$messageTo')";

if(mysqli_query($conn, $query)){
    header("Location: message.php");
}else{
    echo "Error!" . $sql . "<br>" . mysqli_error($conn);
}

?>