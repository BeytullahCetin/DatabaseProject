<?php
include "header.php";
$bilgilerim_sor = $conn2->prepare("SELECT * FROM announcement where announcementID=:announcementID");
$bilgilerim_sor->execute(array(
    'announcementID' => $_POST['announcementID']
));
$bilgilerim_cek = $bilgilerim_sor->fetch(PDO::FETCH_ASSOC);
?>

<div class="container col-md-4 my-5">

    <form action="announcementDB.php" method="POST">

        <div>
            <label for="exampleInputEmail1"> Announcement Color </label>
            <select class="form-select" aria-label="Default select example" name="color">
                <option value="red">red</option>
                <option value="green">green</option>
            </select>
        </div>
        <div class="form-group my-3">
            <label>Announcement Title</label>
            <input type="text" value="<?php echo $bilgilerim_cek['announcementTitle']; ?>" name="announcementTitle" class="form-control">
        </div>

        <div class="form-group my-3">
            <label>Announcement</label>
            <input type="text" value="<?php echo $bilgilerim_cek['announcementText']; ?>" name="announcementText" class="form-control">
        </div>

        <div class="d-grid gap-2 mb-3">
            <input type="hidden" name="announcementID" value="<?php echo $bilgilerim_cek['announcementID']; ?>">
            <input type="submit" class="btn btn-primary" onclick="formKontrol()" id="update" name="update">
        </div>

    </form>
</div>
<?php
include "footer.php";
?>