<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">LOG-IN</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to the system</h2>
								<p>Don't have an account?</p>
								<a href="#" class="btn btn-white btn-outline-white">Sign Up</a>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>

							<!-- USER LOG ACTIONS -->
							<form action="login.php" class="signin-form">
								<div class="form-group mb-3">
									<label class="label" for="name">Username</label>
									<input type="text" class="form-control" name="userName" placeholder="Username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" class="form-control" name="userPassword" placeholder="Password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary submit px-3" name="signInBtn">Sign
										In</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">
										<label class="checkbox-wrap checkbox-primary mb-0">Remember Me<input type="checkbox" checked>
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
								</div>
							</form>
							<!-- USER LOG ACTIONS END -->


							<!-- USER CHECK IN DATABASE -->
							<?php
							if (isset($_POST['signInBtn'])) {
								$userUsername = htmlspecialchars($_POST['userName']);
								$userPassword = md5(htmlspecialchars($_POST['userPassword']));

								// DB user check
								//$checkUserInDB = $db->prepare("SELECT * FROM usersinfo WHERE
								//userUsername=:userUsername AND userPassword=:userPassword");
								//$checkUserInDB->execute(array(
								//    'userUsername' => $userUsername,
								//    'userPassword' => $userPassword
								//));
								$int = $checkUserInDB->rowCount();


								// If user find, then int equals 1 and sessions stared
								if ($int == 1) {
									$pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
									// Create sessions
									// IT MUST BE EDIT !!!!!!!
									$_SESSION['userID'] = $pullinfo['userID'];
									$_SESSION['userUsername'] = $userUsername;
									$_SESSION['userName'] = $pullinfo['userName'];
									$_SESSION['userPassword'] = $_POST['userPassword'];
									$_SESSION['userSurname'] = $pullinfo['userSurname'];
									$_SESSION['userFlatno'] = $pullinfo['userFlatno'];
									$_SESSION['userGSM'] = $pullinfo['userGSM'];
									$_SESSION['userEmail'] = $pullinfo['userEmail'];
								}

								// If user cannot find, then int equals 0 and print error 
								elseif ($int == 0) {
									$pullinfo2 = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
									$username = $pullinfo2['userUsername'];
									$password = $pullinfo2['userPassword'];
									if ($password != $userPassword) {
										header("Location:../log.php?fail=password");
										exit;
									} elseif ($username != $userUsername) {
										header("Location:../log.php?fail=username");
										exit;
									} else {
										header("Location:../log.php?fail=fail");
										exit;
									}
								}
							} ?>
							<!-- USER CHECK IN DATABASE END -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>