    <!--
        It works with header scripts.
        Button active is a problem. I deactive all button active tags.
        All svg tags has been deleted. 
        All `href` changed to `#`
    --->
    <?php
    session_start();
    ob_start();
    include "dbconn.php";
    include "dbconn2.php";
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <?php
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../../DatabaseProject/index.php">Home</a>
                        </li>
                    <?php
                    }
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../php/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../php/show_users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../php/showDues.php">Dues</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../php/report.php">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../php/complaint.php">Complaint</a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../DatabaseProject/php/contact.php">Contact</a>
                    </li>
                </ul>


                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <a class="navbar-brand" href="profile.php"><b id="upper"><?php echo $_SESSION['user']['userName'] . " " . $_SESSION['user']['userSurname'] ?></b></a>
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-right">
                        <li class="nav-item">
                            <a class="nav-link" onclick="return confirm('Are you sure?')" href="logout.php">LOGOUT</a>
                        </li>
                    </ul>
                <?php
                } else {
                ?>
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-right">
                        <li class="nav-item">
                            <a class="nav-link" href="../../DatabaseProject/php/login.php">SIGN UP</a>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>