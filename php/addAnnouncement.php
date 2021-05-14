<?php
include "header.php";
?>
<script text="javascript">
    function formKontrol() {
        var announcement = document.getElementById("announcement").value;

        if (announcement.length == 0 || announcement == null) {

            alert("PLEASE ENTER A ANNOUNCEMENT.");
        } else {
            alert("ANNOUNCEMENT HAS BEEN SHARED.");

        }
    }
</script>


<div class="container col-md-4 my-5">

    <form action="" method="POST">

        <div>
            <label for="exampleInputEmail1"> Announcement Color </label>
            <select class="form-select" aria-label="Default select example" name="announcementColor">
                <option value="red">red</option>
                <option value="green">green</option>
                <option value="green">black</option>
                <option value="green">yellow</option>
                <option value="green">blue</option>
            </select>
        </div>

        <div class="form-group my-3">
            <label for="exampleInputEmail1">Announcement</label>
         <textarea class="form-control" rows="5" name="announcement" id="announcement" required=''></textarea>
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="submit" class="btn btn-primary" onclick="formKontrol()" id="announcement" name="submit">
        </div>

    </form>
</div>
<?php

if (isset($_POST['submit'])) {
    $announcementText = $_POST['announcementColor'];
    $announcementTitle = $_POST['announcement'];
    $announcementTime = date("Y/m/d");
    

    $kaydet = $conn2->prepare("INSERT INTO announcement set       
		announcementTitle=:announcementTitle,
		announcementText=:announcementText,
		announcementTime=:announcementTime

	");

    $insert = $kaydet->execute(array(
        'announcementTitle' => $announcementTitle,
        'announcementText' => $announcementText,
        'announcementTime' => $announcementTime
    ));

    if ($insert) {

        header("Location:addAnnouncement.php");
        exit();
    } else {
        header("Location:complaint.php?durum=$insert");
        exit();
    }
}

?>
<?php
include "footer.php";
?>