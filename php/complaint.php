<?php
include "header.php";





if ($_SESSION['user']['isAdmin'] == "admin") { ?>


    <div class="container col-md-8 my-5">
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "successfull") {
                echo "<br><div class='alert alert-success' role='alert'>Deleted Successfully</div>";
            } else if ($_GET['status'] == "fail") {
                echo "<br><div class='alert alert-danger' role='alert'>Delete is Failed</div>";
            } else {
                echo "<br><div class='alert alert-warning' role='alert'>Fatal Error</div>";
            }
        }

        ?>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>GSM</th>
                    <th>Complaint Title </th>
                    <th>Complaint</th>
                    <th>Operation</th>
                </tr>
                <?php
                $sayı = 0;

                $bilgilerisor = $conn2->prepare("SELECT * FROM  complaint c,user u WHERE u.userID=c.userID ORDER BY complaintDate DESC");
                $bilgilerisor->execute();

                while ($bilgileriçek = $bilgilerisor->FETCH(PDO::FETCH_ASSOC)) {
                    $sayı++; ?>

                    <tr>
                        <td><?php echo $sayı; ?></td>
                        <td><?php echo $bilgileriçek['userName']; ?></td>
                        <td><?php echo $bilgileriçek['userSurname']; ?></td>
                        <td><?php echo $bilgileriçek['userGSM']; ?></td>
                        <td><?php echo $bilgileriçek['complaintTitle']; ?></td>
                        <td><?php echo $bilgileriçek['complaintMessage']; ?></td>
                        <td>
                            <form action="complaintDB.php" method="POST">
                                <input type="hidden" name="complaintID" value="<?php echo $bilgileriçek['complaintID']; ?>">
                                <input class="btn btn-danger" type="submit" name="delete" value="DELETE" onclick="return confirm('Are you sure?')">
                            </form>
                        </td>
                    </tr>

                <?php } ?>

            </thead>

        </table>

    </div>
<?php } else { ?>

    <div class="container col-md-5 my-5">
        <form action="complaint.php" method="POST">
            <div class="form-group my-3">
                <label for="userName">Name</label>
                <input type="text" name="userName" id="userName" class="form-control" aria-describedby="emailHelp" value="<?php echo  $_SESSION['user']['userName']; ?>" readonly>

            </div>
            <div class="form-group my-3">
                <label for="userSurname">Surname</label>
                <input type="text" name="userSurname" id="userSurname" class="form-control" aria-describedby="emailHelp" value="<?php echo  $_SESSION['user']['userSurname']; ?>" readonly>
            </div>
            <div>
                <label for="complaintTitle">Complaint Title</label>
                <select class="form-select" aria-label="Default select example" name="complaintTitle" id="complaintTitle">
                    <option value="Apartment">Apartment</option>
                    <option value="Garbage">Garbage</option>
                    <option value="Garden">Garden</option>
                    <option value="Flats">Flats</option>
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