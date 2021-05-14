<?php
include "header.php";
?>
<script text="javascript">
    function formKontrol() {
        var complaintMessage = document.getElementById("complaintMessage").value;

        if (complaintMessage.length == 0 || complaintMessage == null) {

            alert("PLEASE ENTER A COMPLAINT.");
        } else {
            alert("YOUR COMPLAINT HAS BEEN RECEIVED.");

        }
    }
</script>
    <?php
    if ($_SESSION['user']['isAdmin'] == "admin") { ?>
        <div class="container col-md-8 my-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>NAME</th>
                        <th>SURNAME</th>
                        <th>GSM </th>
                        <th>Complaint Title </th>
                        <th>Complaint</th>
                        <th>Operation</th>
                    </tr>
                    <?php
                    $sayı = 0;

                    $bilgilerisor = $conn2->prepare("SELECT * FROM  complaint c,user u WHERE u.userID=c.userID ORDER BY complaintDate DESC   ");
                    $bilgilerisor->execute();

                    while ($bilgileriçek = $bilgilerisor->FETCH(PDO::FETCH_ASSOC)) {
                        $sayı++; ?>



                        <tr>
                            <td><? echo $sayı; ?></td>
                            <td><?php echo $bilgileriçek['userName']; ?></td>
                            <td><?php echo $bilgileriçek['userSurname']; ?></td>
                            <td><?php echo $bilgileriçek['userGSM']; ?></td>
                            <td><?php echo $bilgileriçek['complaintTitle']; ?></td>
                            <td><?php echo $bilgileriçek['complaintMessage']; ?></td>
                            <td>
                                <form action="complaintDB.php" method="POST">
                                    <input type="hidden" name="complaintID" value="<?php echo $bilgileriçek['complaintID']; ?>">
                                    <input class="btn btn-success" type="submit" name="delete"  value="DELETE" onclick="return confirm('Are you sure?')">
                                </form>
                            </td>
                        </tr>

                    <?php } ?>
                   

                </thead>

            </table>

        </div>
    <?php
    }else{

    
    ?>
 <div class="container col-md-5 my-5">
    <form action="complaint.php" method="POST">
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
                <option value="Garrage">Garrage</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Complaint&Request</label>

            <textarea class="form-control" rows="5" name="complaintMessage" id="complaintMessage" required=''></textarea>
        </div>


        <button type="submit" class="btn btn-primary" onclick="formKontrol()" name="submit">Submit</button>
        <button type="reset" class="btn btn-danger" name="reset">Reset</button>
    </form>
</div>

<?php }
include 'dbconn2.php';

if (isset($_POST['submit'])) {
    $complaintTitle = $_POST['complaintTitle'];
    $complaintMessage = $_POST['complaintMessage'];
    $userID = $_SESSION['userID'];
    $complaintDate = date("Y/m/d");
    echo $complaintDate;


    $kaydet = $conn2->prepare("INSERT INTO complaint set       
		userID=:userID,
		complaintTitle=:complaintTitle,
		complaintMessage=:complaintMessage,
		complaintDate=:complaintDate
	");

    $insert = $kaydet->execute(array(
        'userID' => $userID,
        'complaintTitle' => $complaintTitle,
        'complaintMessage' => $complaintMessage,
        'complaintDate' => $complaintDate
    ));

    if ($insert) {

        header("Location:complaint.php");
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