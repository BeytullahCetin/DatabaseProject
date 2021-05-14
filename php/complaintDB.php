<?php
include "dbconn2.php";
if (isset($_POST['delete'])) {
    $complaintID = $_POST['complaintID'];
    $silme = $conn2->prepare("DELETE from complaint where complaintID=:complaintID");
    $kont = $silme->execute(array(
        'complaintID' => $complaintID
    ));

if ($kont) {

    header("Location:complaint.php");
    exit();
} else {
    header("Location:complaint.php");
    exit();
}
}
?>