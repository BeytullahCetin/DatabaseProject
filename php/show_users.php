<?php
include "header.php";
?>
<div class="container col-md-8 my-5">

    <div class="accordion" id="accordionExample">

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Users
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                <div class="accordion-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Operations</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Number</th>
                                <th scope="col">Number2</th>
                                <th scope="col">Door No</th>
                                <th scope="col">Entry Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $query = "SELECT * FROM user u, flat f WHERE u.userID = f.userID";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>


                                <td>
                                    <form action="userUpdate.php" method="GET">
                                        <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                        <input class="btn btn-success" type="submit" name="userUpdate" value="UPDATE USER">
                                    </form>
                                </td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['userSurname']; ?></td>
                                <td><?php echo $row['userGSM']; ?></td>
                                <td><?php echo $row['userGSM_2']; ?></td>
                                <td><?php echo $row['doorNo']; ?></td>
                                <td><?php echo $row['registerDate']; ?></td>

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
                    Old Users
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                <div class="accordion-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>

                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Number</th>
                                <th scope="col">Number2</th>
                                <th scope="col">Door No</th>
                                <th scope="col">Arrival Date</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>

</div>



<?php
include "footer.php";
?>