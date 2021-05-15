<?php include "header.php" ?>

<main>

    <div style=" margin: 5rem;">



        <div class="row">
            <div class="d-grid gap-2 col-6">
                <div class="list-group d-grid gap-2" id="list-tab" role="tablist">


                    <?php

                    $query = "SELECT userID, userName, userSurname FROM user 
                    WHERE userID <> " . $_SESSION['userID'] . " ORDER BY userID";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#box<?php echo $row['userID']; ?>" role="tab"><?php echo $row['userName'] . " " . $row['userSurname'] ?></a>
                    <?php
                    }
                    ?>

                </div>
            </div>




            <div class="d-grid gap-2 col-6" style="border: 1px solid;">
                <div class="tab-content" id="nav-tabContent">

                    <?php

                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="tab-pane fade" id="box<?php echo $row['userID']; ?>" role="tabpanel">

                            <p class="text-end">i send message</p>
                            <p class="text-start">you send message to me</p>

                            <form action="messageDB.php">
                                <hr>
                                <textarea name="" id="" cols="60" rows="2">adasdasdasd</textarea>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Send </button>
                                </div><br>
                            </form>

                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</main>

<?php include "footer.php" ?>