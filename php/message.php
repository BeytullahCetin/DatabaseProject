<?php include "header.php" ?>

<main>

    <div style="margin-bottom: 5rem; margin-left: 5rem; margin-right: 5rem;" class="my-4">

    <h1 class="text-center">Messages</h1>
                <hr>

        

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

                            <?php

                            $messageFrom = $_SESSION['userID'];
                            $messageTo = $row['userID'];

                            $query = "SELECT * 
                            FROM message 
                            WHERE (messageTo = $messageTo OR messageTo = $messageFrom ) AND (messageFrom = $messageTo OR messageFrom = $messageFrom)
                            ORDER BY messageTimeStamp
                            ";

                            $messageResult = mysqli_query($conn, $query);

                            while ($message = mysqli_fetch_array($messageResult)) {

                                if ($message['messageTo'] == $_SESSION['user']['userID']) {
                            ?>
                                    <p class="text-start"><?php echo $message['messageText']; ?></p>

                                <?php
                                } else {
                                ?>



                                    
                                    <form class="text-end" style="display: inline;" action="messageDeleteDB.php" method="POST">
                                    
                                    <p>
                                        <input type="hidden" name="messageID" value="<?php echo $message['messageID']; ?>">
                                        <input type="submit" class="btn-close p-0 m-0" name="messageDeleteButton" value="">
                                        <?php echo $message['messageText']; ?></p>

                                    </form>

                            <?php }
                            }

                            ?>

                            <form action="messageDB.php" method="POST">
                                <hr>
                                <textarea name="messageText" id="messageText" cols="60" rows="2"></textarea>
                                <input type="hidden" value="<?php echo $row['userID']; ?>" name="messageTo">

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Send</button>
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