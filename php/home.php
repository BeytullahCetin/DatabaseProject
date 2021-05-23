<?php
include "header.php";
?>
<link rel="stylesheet" href="../css/home.css">

<main class="main-content">


	<div class="text-center py-5 col-md-3 mx-auto">
		<h1>ANNOUNCEMENTS</h1>
		<hr>
	</div>



	<section class="bg py-3" style="background-color: black;">
		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

			<div class="carousel-inner text-center">

				<div class="carousel-item active" style="color: white; background-color:black ; ">
					<h1>WELCOME ABG APARTMENT</h1>
				</div>
				<?php


				$bilgilerisor = $conn2->prepare("SELECT * FROM  announcement  ORDER BY announcementID DESC LIMIT 3");
				$bilgilerisor->execute();
				$sayi = 0;


				while ($bilgileriçek = $bilgilerisor->FETCH(PDO::FETCH_ASSOC)) {
					$color = $bilgileriçek['color'];
				?>


					<div class="carousel-item" style="color: <?php if($color=='yellow')echo 'black'; else echo 'white';  ?> ; background-color:<?php echo $color ?>;">
						<div>
							<h2>
								<p class="text-break"><?php echo $bilgileriçek['announcementText']; ?></p>
							</h2>
						</div>
					</div>
				<?php
					$sayi++;
				} ?>

			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</a>
		</div>
	</section>
	<br><br><br><br>






	<?php
	include "footer.php";
	?>