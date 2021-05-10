<?php
include "header.php";
include "dbconn2.php"

?>
<div class="container col-md-5  my-5">

    <form action="" method="POST">
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="" value="<?php echo  $_SESSION['user']['userName']; ?>" readonly="">

        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Surname </label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" value="<?php echo  $_SESSION['user']['userSurname']; ?>" readonly="">

        </div>
        <div>
            <label for="exampleInputEmail1"> Complaint Title </label>
            <select class="form-select" aria-label="Default select example" name="complaintTitle">

                <option value="1">Garrage</option>
                <option value="2">Other</option>
            </select>
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Complaint&Request</label>

            <textarea class="form-control" rows="5" name="complaintMessage" id="complaintMessage"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php
$a= $_POST['complaintTitle'];
$b=$_POST['complaintMessage'];
if (isset($_POST['submit'])) {
    $userID = $_SESSION['userID'];
    $kaydet = $conn2->prepare("INSERT INTO complaint set       
		userID=:userID,
		complaintTitle=:complaintTitle,
		complaintMessage=:complaintMessage
	");


    $insert = $kaydet->execute(array(
        'userID' => $userID,
        'complaintTitle' =>$a,
        'complaintMesssage' =>$b ,
    ));

    if ($insert) {

        header("Location:complaint.php?durum=OK");
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