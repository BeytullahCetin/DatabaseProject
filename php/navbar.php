    <!--
        It works with header scripts.
        Button active is a problem. I deactive all button active tags.
        All svg tags has been deleted. 
        All `href` changed to `#`
    --->
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">System</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Complaint</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NAME IS TEST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">NAME IS TEST</a>
                    </li>
                </ul>

                <!-- 
                    Without php TAGS !!!!
                    php echo  $_SESSION['userName'] . " " . $_SESSION['userSurname']
                    --->
                <a class="navbar-brand" href="#"><b id="upper">USER NAME</b></a>

                <ul class="navbar-nav mb-2 mb-lg-0 justify-content-right">
                    <li class="nav-item">
                        <a class="nav-link" onclick="logoutFun()">LOGOUT</a>
                    </li>
                </ul>
                <script>

                    //location dont have function!! It conneted to the logout.php.
                    function logoutFun() {
                        var bol = confirm("ARE YOU SURE TO LOG-OUT?");
                        if (bol) {
                            location = "";
                        }
                    }
                </script>
            </div>
        </div>
    </nav>