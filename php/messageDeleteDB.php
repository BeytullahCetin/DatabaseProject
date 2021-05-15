<?php 

include "header.php";

$messageID = $_POST['messageID'];

$query = "DELETE FROM message WHERE messageID = $messageID";

if(mysqli_query($conn, $query)){
    header("Location: message.php");

}else{
    header("Location: message.php?somethingWentWrong");
}


?>