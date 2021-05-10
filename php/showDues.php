<?php
include "header.php";
?>

<div class="container col-md-8 my-5">

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
                                <th>Due Period</th>
                                <th>Due Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $query = "SELECT * FROM user u, userdue ud, due d, flat f WHERE u.userID = f.userID AND u.userID = ud.userID AND ud.dueID = d.dueID AND duePaymentDate IS NOT NULL";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <tr>
                                    <td>
                                        <form action="payDueDB.php" method="POST">
                                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                            <input type="hidden" name="dueID" value="<?php echo $row['dueID']; ?>">
                                            <input class="btn btn-success" type="submit" name="payDueSubmit" value="Pay">
                                        </form>
                                    </td>
                                    <td><?php echo $row['doorNo']; ?></td>
                                    <td><?php echo $row['userName'] . " " . $row['userSurname']; ?></td>
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
                                <th>Due Period</th>
                                <th>Due Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM user u, userdue ud, due d, flat f WHERE u.userID = f.userID AND u.userID = ud.userID AND ud.dueID = d.dueID AND duePaymentDate IS NULL";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['doorNo']; ?></td>
                                    <td><?php echo $row['userName'] . $row['userSurname']; ?></td>
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

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Old Users Dues
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                <div class="accordion-body">
                    Old Users Dues
                </div>
            </div>
        </div>

    </div>

</div>

<?php
include "footer.php";
?>