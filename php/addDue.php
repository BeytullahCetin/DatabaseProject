<?php
include "header.php";

$myDate = date("Y-m-d");
?>

<div class="container col-md-4 my-5">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">To Everyone</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">To a Person</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <form class="my-3" action="addDueDB.php" method="POST">

                <div class="form-floating mb-3">
                    <input class="form-control" required type="text" id="dueTitle" name="dueTitle" placeholder="Due Title">
                    <label for="dueTitle">Due Title</label>
                </div>

                <div class="form-floating mb-3">

                    <input class="form-control" type="date" id="duePeriot" name="duePeriot" value="<?php echo "$myDate"; ?>">
                    <label for="duePeriot">Due Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" required type="number" id="duePrice" name="duePrice" placeholder="Due Price">
                    <label for="duePrice">Due Price</label>
                </div>

                <div class="d-grid gap-2 mb-3">
                    <input type="submit" class="btn btn-primary" id="everyoneDueSubmit" name="everyoneDueSubmit">
                </div>

            </form>
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <form class="my-3" action="addDueDB.php" method="POST">

                <div class="form-floating mb-3">
                    <input class="form-control" required type="text" id="dueTitle" name="dueTitle" placeholder="Due Title">
                    <label for="dueTitle">Due Title</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" type="date" id="duePeriot" name="duePeriot" value="<?php echo "$myDate"; ?>">
                    <label for="duePeriot">Due Date</label>
                </div>

                <div class="form-floating mb-3">
                    <input class="form-control" required type="number" id="duePrice" name="duePrice" placeholder="Due Price">
                    <label for="duePrice">Due Price</label>
                </div>

                <div class="form-floating">
                    <select class="form-select" id="floatingSelect" name="userFlatID" aria-label="Floating label select example">
                        <?php
                        $query = "SELECT u.userName, u.userSurname, f.doorNo, uf.userFlatID 
                        FROM user u, userflat uf, flat f
                        WHERE u.userID = uf.userID AND uf.flatID = f.flatID AND exitDate IS NULL
                        ORDER BY doorNo";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $row['userFlatID']; ?>"><?php echo $row['doorNo'] . " - " . $row['userName'] . " " . $row['userSurname']; ?></option>
                        <?php }
                        ?>
                    </select>
                    <label for="floatingSelect">Door No - Resident Name</label>
                </div>

                <div class="d-grid gap-2 my-3">
                    <input type="submit" class="btn btn-primary" id="personDueSubmit" name="personDueSubmit">
                </div>

            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>