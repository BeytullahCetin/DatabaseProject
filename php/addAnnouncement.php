<?php
include "header.php";
?>
<script text="javascript">
    function formKontrol() {
        var announcementText = document.getElementById("announcementText").value;

        if (announcementText.length == 0 || announcementText == null) {

            alert("PLEASE ENTER A ANNOUNCEMENT.");
        } else {
            alert("ANNOUNCEMENT HAS BEEN SHARED.");

        }
    }
</script>


<div class="container col-md-4 my-4">

<h1 class="text-center">Add Announcement</h1>
            <hr>

    <form action="" method="POST">

        <div>
            <label for="exampleInputEmail1"> Announcement Color </label>
            <select class="form-select " aria-label="Default select example" name="color">
                <option class="bg-danger" value="red">Red</option>
                <option class="bg-success" value="green">Green</option>
                <option class="bg-warning" value="yellow">Yellow</option>
                <option class="bg-dark text-light" value="black">Black</option>
            </select>
        </div>
        
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Announcement Title</label>
            <input class="form-control" required type="text" id="announcementTitle" name="announcementTitle" required=''>
        </div>

        <div class="form-group my-3">
            <label for="exampleInputEmail1">Announcement</label>
         <textarea class="form-control" rows="5" name="announcementText" id="announcementText" required=''></textarea>
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="submit" class="btn btn-primary" onclick="formKontrol()" id="announcement" name="submit" value="Add">
        </div>

    </form>
</div>
<?php

if (isset($_POST['submit'])) {
    $color = $_POST['color'];
    $announcementText = $_POST['announcementText'];
    $announcementTitle = $_POST['announcementTitle'];
    $announcementTime = date("Y/m/d");
    

    $kaydet = $conn2->prepare("INSERT INTO announcement set       
		announcementText=:announcementText,
        announcementTitle=:announcementTitle,
		color=:color,
		announcementTime=:announcementTime

	");

    $insert = $kaydet->execute(array(
        'color' => $color,
        'announcementText' => $announcementText,
        'announcementTitle' => $announcementTitle,
        'announcementTime' => $announcementTime
    ));

    if ($insert) {

        header("Location:addAnnouncement.php");
        exit();
    } else {
        header("Location:announcement.php?durum=$insert");
        exit();
    }
}

?>
<?php
include "footer.php";
?>