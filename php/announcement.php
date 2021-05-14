<?php
include "header.php";
?>
<div class="container col-md-8 my-5">
    <table class="table table-dark table-striped">

        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Announcement Color</th>
                <th scope="col">Announcement </th>
                <th scope="col">Announcement Date </th>
                
                <th scope="col">Operation</th>
                <th scope="col">Operation</th>
            </tr>

            <?php
            $sayı = 0;
            $bilgilerisor = $conn2->prepare("SELECT * FROM  announcement   ORDER BY announcementTime   ");
            $bilgilerisor->execute();

            while ($bilgileriçek = $bilgilerisor->FETCH(PDO::FETCH_ASSOC)) {
                $sayı++; ?>


                <tr>
                    <td><?php echo $sayı; ?></td>
                    <td><?php echo $bilgileriçek['announcementText']; ?></td>
                    <td><?php echo $bilgileriçek['announcementTitle']; ?></td>
                    <td><?php echo $bilgileriçek['announcementTime']; ?></td>
                    <td>
                    <form action="updateAnnouncement.php" method="POST">
                        <input type="hidden" name="announcementID" value="<?php echo $bilgileriçek['announcementID']; ?>">
                        <input class="btn btn-success" type="submit" name="submit" value="UPDATE">
                    </form>
                    </td>
                    <td>
                    <form action="announcementDB.php" method="POST">
                        <input type="hidden" name="announcementID" value="<?php echo $bilgileriçek['announcementID']; ?>">
                        <input class="btn btn-success" type="submit" name="submit" onclick="return confirm('Are you sure?')" value="DELETE" onclick="">
                    </form>
                    </td>

                </tr>
            <?php } ?>





    </table>
</div>

<?php
include "footer.php";
?>