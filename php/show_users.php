<?php
include "header.php";
?>
<div class="container col-md-8 my-4">

<h1 class="text-center">Users</h1>
                <hr>

    <div class="accordion" id="accordionExample">

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Users
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                <div class="accordion-body p-0 m-0">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <?php
                                if ($_SESSION['user']['isAdmin'] == "admin") {
                                ?><th scope="col">Operations</th>
                                <?php
                                }
                                ?>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Number</th>
                                <th scope="col">Number2</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $query = "SELECT * FROM user u";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                <?php
                                if ($_SESSION['user']['isAdmin'] == "admin") {
                                ?>
                                    <td>
                                        <form action="userUpdate.php" method="GET">
                                            <input type="hidden" name="userID" value="<?php echo $row['userID']; ?>">
                                            <input class="btn btn-primary" type="submit" name="userUpdate" value="UPDATE USER">
                                        </form>
                                    </td>
                                <?php
                                }
                                ?>

                                <td><?php echo $row['birthDate']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['userName']; ?></td>
                                <td><?php echo $row['userSurname']; ?></td>
                                <td><?php echo $row['userGSM']; ?></td>
                                <td><?php echo $row['userGSM_2']; ?></td>
                                <td><?php echo $row['userEmail']; ?></td>

                                </tr>


                            <?php } ?>
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