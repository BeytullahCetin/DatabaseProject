<?php
include "header.php";

if (isset($_POST['submit'])) {
    $announcementID = $_POST['announcementID'];
    $silme = $conn2->prepare("DELETE from announcement where announcementID=:announcementID");
    $kont = $silme->execute(array(
        'announcementID' => $announcementID
    ));

if ($kont) {

    header("Location:announcement.php");
    exit();
} else {
    header("Location:annuncement.php?durum=NO");
    exit();
}
}


if (isset($_POST['update'])) {
    $announcementText=$_POST['announcementText'];
    $announcementTitle=$_POST['announcementTitle'];

	$announcmeentID=$_POST['announcementID'];

	$kaydet=$conn2->prepare("UPDATE announcement set
		announcementText=:announcementText,             
		announcementTitle=:announcementTitle
		where announcementID={$_POST['announcementID']}

		");


	$insert=$kaydet->execute(array(
		'announcementText'=>$_POST['announcementText'],
		'announcementTitle'=>$_POST['announcementTitle'],
		
	));
    if($insert){
        header("Location:announcement.php");
        
        exit();
    }
}
    ?>