<?php
include "header.php";
?>

<div class="container col-md-8 my-5">

    <?php
    if ($_SESSION['user']['isAdmin'] == "admin") {
    ?>

        <div class="accordion" id="accordionExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Unpaid Dues
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                    <div class="accordion-body p-0">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Door No</th>
                                    <th>Name - Surname</th>
                                    <th>GSM</th>
                                    <th>Due Period</th>
                                    <th>Due Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT u.userName, u.userSurname, u.userGSM, f.doorNo, d.duePrice, d.duePeriot, ufd.userFlatDueID 
                    FROM user u, flat f, userFlat uf, userFlatDue ufd, due d 
                    WHERE u.userID = uf.userID AND uf.flatID = f.flatID AND uf.userFlatID = ufd.userFlatID AND ufd.dueID = d.dueID AND ufd.paymentDate IS NULL
                    ORDER BY d.duePeriot DESC, f.doorNo";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td>
                                            <form action="payDueDB.php" method="POST">
                                                <input type="hidden" name="ufdID" value="<?php echo $row['userFlatDueID']; ?>">
                                                <input class="btn btn-success" type="submit" name="payDueSubmit" value="Pay">
                                            </form>
                                        </td>
                                        <td><?php echo $row['doorNo']; ?></td>
                                        <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
                                        <td><?php echo $row['userGSM']; ?></td>
                                        <td><?php echo $row['duePeriot']; ?></td>
                                        <td><?php echo $row['duePrice']; ?></td>
                                        <td>NOT PAID</td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Paid Dues
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                    <div class="accordion-body p-0">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Door No</th>
                                    <th>Name - Surname</th>
                                    <th>GSM</th>
                                    <th>Due Period</th>
                                    <th>Due Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT u.userName, u.userSurname, u.userGSM, f.doorNo, d.duePrice, d.duePeriot 
                    FROM user u, flat f, userFlat uf, userFlatDue ufd, due d 
                    WHERE u.userID = uf.userID AND uf.flatID = f.flatID AND uf.userFlatID = ufd.userFlatID AND ufd.dueID = d.dueID AND ufd.paymentDate IS NOT NULL
                    ORDER BY d.duePeriot DESC, f.doorNo";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo $row['doorNo']; ?></td>
                                        <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
                                        <td><?php echo $row['userGSM']; ?></td>
                                        <td><?php echo $row['duePeriot']; ?></td>
                                        <td><?php echo $row['duePrice']; ?></td>
                                        <td>PAID</td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    <?php } else { ?>

        <div class="accordion" id="accordionExample">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Unpaid Dues
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                    <div class="accordion-body p-0">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Door No</th>
                                    <th>Name - Surname</th>
                                    <th>GSM</th>
                                    <th>Due Period</th>
                                    <th>Due Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT u.userID, u.userName, u.userSurname, u.userGSM, f.doorNo, d.duePrice, d.duePeriot, ufd.userFlatDueID 
                            FROM user u, flat f, userFlat uf, userFlatDue ufd, due d 
                            WHERE u.userID = uf.userID AND uf.flatID = f.flatID AND uf.userFlatID = ufd.userFlatID AND ufd.dueID = d.dueID AND
                            u.userID = " . $_SESSION['user']['userID'] . " AND ufd.paymentDate IS NULL
                            ORDER BY d.duePeriot DESC, f.doorNo";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td>
                                            <form action="payDueDB.php" method="POST">
                                                <input type="hidden" name="ufdID" value="<?php echo $row['userFlatDueID']; ?>">
                                                <input class="btn btn-success" type="submit" name="payDueSubmit" value="Pay">
                                            </form>
                                        </td>
                                        <td><?php echo $row['doorNo']; ?></td>
                                        <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
                                        <td><?php echo $row['userGSM']; ?></td>
                                        <td><?php echo $row['duePeriot']; ?></td>
                                        <td><?php echo $row['duePrice']; ?></td>
                                        <td>NOT PAID</td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Paid Dues
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                    <div class="accordion-body p-0">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Door No</th>
                                    <th>Name - Surname</th>
                                    <th>GSM</th>
                                    <th>Due Period</th>
                                    <th>Due Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT u.userName, u.userSurname, u.userGSM, f.doorNo, d.duePrice, d.duePeriot 
                            FROM user u, flat f, userFlat uf, userFlatDue ufd, due d 
                            WHERE u.userID = uf.userID AND uf.flatID = f.flatID AND uf.userFlatID = ufd.userFlatID AND ufd.dueID = d.dueID AND 
                            u.userID = " . $_SESSION['user']['userID'] . " AND ufd.paymentDate IS NOT NULL
                            ORDER BY d.duePeriot DESC, f.doorNo";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo $row['doorNo']; ?></td>
                                        <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
                                        <td><?php echo $row['userGSM']; ?></td>
                                        <td><?php echo $row['duePeriot']; ?></td>
                                        <td><?php echo $row['duePrice']; ?></td>
                                        <td>PAID</td>
                                    </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    <?php } ?>


</div>

<?php
include "footer.php";
?>