<?php
include "header.php";
?>

<div class="container col-md-8 my-5">

    <?php if (isset($_GET['succesfullyMoveIn'])) { ?>
        <p class="text-success text-center">Succesfully Move In</p>
    <?php } ?>
    <?php if (isset($_GET['succesfullyMoveOut'])) { ?>
        <p class="text-success text-center">Succesfully Move Out</p>
    <?php } ?>

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
            INNER JOIN userflat uf ON u.userID = uf.userID AND uf.exitDate IS NULL
            RIGHT JOIN flat f ON f.flatID = uf.flatID
            ORDER BY f.doorNo ASC";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <tr>
                    <td>

                        <div class="row align-items-center justify-content-center">

                            <?php if (isset($row['userID'])) { ?>

                                <div class="col m-0">
                                    <form class="m-0" action="apartmentUpdate.php" method="POST">
                                        <input type="hidden" name="userFlatID" value="<?php echo $row['userFlatID']; ?>">
                                        <input class="btn btn-warning" type="submit" name="payDueSubmit" value="Update">
                                    </form>
                                </div>


                                <div class="col m-0">
                                    <form class="m-0" action="apartmentMoveOutDB.php" method="POST">
                                        <input type="hidden" name="userFlatID" value="<?php echo $row['userFlatID']; ?>">
                                        <input class="btn btn-danger" type="submit" name="payDueSubmit" value="Move Out">
                                    </form>
                                </div>



                            <?php } else { ?>

                                <div class="col m-0">
                                    <form class="m-0" action="apartmentMoveIn.php" method="POST">
                                        <input type="hidden" name="flatID" value="<?php echo $row['flatID']; ?>">
                                        <div class="d-grid gap-2">
                                            <input class="btn btn-success" type="submit" name="payDueSubmit" value="Move In">
                                        </div>

                                    </form>
                                </div>


                            <?php } ?>

                        </div>

                    </td>
                    <td><?php echo $row['doorNo']; ?></td>
                    <td><?php echo $row['floor']; ?></td>
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