<?php 
session_start();
ob_start();
include "dbconn.php";
?>

<html>

<h1><?php echo $_POST['userID'] . " " . $_POST['dueID']?></h1>

</html>