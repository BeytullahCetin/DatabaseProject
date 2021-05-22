<?php
session_start();
ob_start();
include "dbconn.php";
include "dbconn2.php";
?>

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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

	<link rel="stylesheet" href="../css/login/style.css">
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
								<h2>Welcome</h2>
								<p>Hi, have a good time walking around the system. Try not to forget your bills. If you have any complaints, state them precisely. we are all human after all.</p>
							</div>
						</div>
						<div class="login-wrap p-4 p-lg-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign In</h3>
									<?php
									if (isset($_GET['fail'])) {
										if ($_GET['fail'] == "password") { ?>
											<div class='alert alert-fail mx-0 my-0 px-0 py-0' role='alert'><hr> Password is wrong <hr></div>
									<?php
										}
									}
									?>
								</div>
							</div>

							<!-- USER LOG ACTIONS -->
							<form action="login.php" class="signin-form" method="POST">
								<div class="form-group mb-3">
									<label class="label" for="name">Username</label>
									<input type="text" class="form-control" name="userName" placeholder="Username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password" required>
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

								$userName = htmlspecialchars($_POST['userName']);
								$password = htmlspecialchars($_POST['password']);

								// DB user check
								$checkUserInDB = $conn2->prepare("SELECT * FROM user WHERE userName=:userName AND password=:password");
								$checkUserInDB->execute(array(
									'userName' => $userName,
									'password' => $password
								));
								$int = $checkUserInDB->rowCount();

								// If user find, then int equals 1 and sessions stared
								if ($int == 1) {
									$pullinfo = $checkUserInDB->fetch(PDO::FETCH_ASSOC);

									// Create sessions
									$_SESSION['userID'] = $pullinfo['userID'];
									$_SESSION['user'] = $pullinfo;
									header("Location:home.php");
								}

								// If user cannot find, then int equals 0 and print error 
								elseif ($int == 0) {
									$pullinfo2 = $checkUserInDB->fetch(PDO::FETCH_ASSOC);
									$username2 = $pullinfo2['userUsername'];
									$password2 = $pullinfo2['userPassword'];
									echo $username2;
									echo $password2;
									if ($password != $userPassword) {
										header("Location:login.php?fail=password");
										exit;
									} elseif ($username != $userUsername) {
										header("Location:login.php?fail=username");
										exit;
									} else {
										header("Location:login.php?fail=fatal");
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



	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>