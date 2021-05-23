<?php
include "header.php";
$bilgilerim_sor = $conn2->prepare("SELECT * FROM announcement where announcementID=:announcementID");
$bilgilerim_sor->execute(array(
    'announcementID' => $_POST['announcementID']
));
$bilgilerim_cek = $bilgilerim_sor->fetch(PDO::FETCH_ASSOC);
?>

<div class="container col-md-4 my-4">

    <h1 class="text-center">Add Announcement</h1>
    <hr>

    <form action="announcementDB.php" method="POST">

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
            <label>Announcement Title</label>
            <input type="text" value="<?php echo $bilgilerim_cek['announcementTitle']; ?>" name="announcementTitle" class="form-control">
        </div>

        <div class="form-group my-3">
            <label>Announcement</label>
            <textarea class="form-control" rows="5" name="announcementText" id="announcementText" required=''><?php echo $bilgilerim_cek['announcementText']; ?></textarea>
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