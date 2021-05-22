<?php
include "php/header.php";

if (isset($_SESSION['user'])) {
  header("Location: php/home.php");
}

?>

<div class="container col-md-7 my-3">

  <div class="text-center">
    <h1 class="p-4">Welcome to Our Apartment </h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>

      </ol>
      <div class="carousel-inner text-center style=">
        <div class="carousel-item active ">
          <img src="images/houses2.jpg" class="d-block w-100" alt="house_picture1">
        </div>
        <div class="carousel-item">
          <img src="images/houses1.jpg" class="d-block w-100" alt="house_picture2">

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>
    </div>

    <div class="my-3">
    <hr>
      <p>
        Welcome to the apartment management system. Here you can comfortably do any work that needs to be done in apartments. 
        It includes many processes from paying your bill to the complaint section. 
        Thanks to its comfortable and informative use, you can easily access information in case you experience any difficulties.
      </p>
      <hr>
    </div>
  </div>
  <div style="height: 100px;"></div>
</div>
<?php
include "php/footer.php";
?>