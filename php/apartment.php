<?php
include "header.php";
?>

<div class="container col-md-8 my-5">

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Action</th>
                <th>Door No</th>
                <th>Floor</th>
                <th>Address</th>
                <th>Name - Surname</th>
                <th>GSM</th>
                <th>Entry Date</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $query = "SELECT *
            FROM user u 
            INNER JOIN userflat uf ON u.userID = uf.userID
            RIGHT JOIN flat f ON f.flatID = uf.flatID  
            ORDER BY f.doorNo ASC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td>
                        <form action="apartmentDB.php" method="POST">
                            <input type="hidden" name="userFlatID" value="<?php echo $row['userFlatID']; ?>">
                            <input class="btn btn-success" type="submit" name="payDueSubmit" value="Pay">
                        </form>
                    </td>
                    <td><?php echo $row['doorNo']; ?></td>
                    <td><?php echo $row['floor'];?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
                    <td><?php echo $row['userGSM']; ?></td>
                    <td><?php echo $row['entryDate']; ?></td>
                    

                </tr>


            <?php } ?>
        </tbody>
    </table>

</div>

<?php
include "footer.php";
?>