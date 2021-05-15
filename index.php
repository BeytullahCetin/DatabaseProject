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
      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta, omnis. Commodi quam accusamus pariatur in
        voluptate quibusdam fugit quas, impedit voluptates minima corporis officiis sunt voluptas autem alias cum,
        praesentium architecto! Asperiores, doloribus hic, dolorum eos sit praesentium pariatur modi fuga a id amet
        ipsam. At sunt id ipsa delectus facilis hic quae corrupti, a soluta explicabo cumque nostrum corporis
        quibusdam provident eum dolore illo laborum perferendis nihil quo ipsam velit. Omnis error dolorem mollitia
        officia molestiae nisi ipsum harum! Accusantium commodi vero fugiat pariatur id officiis, recusandae dolorum
        temporibus totam facilis ipsa hic aperiam autem nemo mollitia modi, cumque facere harum ipsam sint quasi!
        Magnam quam eius ipsum quibusdam id corrupti necessitatibus minus aut nam asperiores repellendus.Lorem ipsum
        dolor sit amet consectetur, adipisicing elit. Dicta, omnis. Commodi quam accusamus pariatur in voluptate
        quibusdam fugit quas, impedit voluptates minima corporis officiis sunt voluptas autem alias cum, praesentium
        architecto! Asperiores, doloribus hic, dolorum eos sit praesentium pariatur modi fuga a id amet ipsam.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta, omnis. Commodi quam accusamus pariatur in
        voluptate quibusdam fugit quas, impedit voluptates minima corporis officiis sunt voluptas autem alias cum,
        praesentium architecto! Asperiores, doloribus hic, dolorum eos sit praesentium pariatur modi fuga a id amet
        ipsam. At sunt id ipsa delectus facilis hic quae corrupti, a soluta explicabo cumque nostrum corporis
        quibusdam provident eum dolore illo laborum perferendis nihil quo ipsam velit. Omnis error dolorem mollitia
        officia molestiae nisi ipsum harum! Accusantium commodi vero fugiat pariatur id officiis, recusandae dolorum
        temporibus totam facilis ipsa hic aperiam autem nemo mollitia modi, cumque facere harum ipsam sint quasi!
        Magnam quam eius ipsum quibusdam id corrupti necessitatibus minus aut nam asperiores repellendus.Lorem ipsum
        dolor sit amet consectetur, adipisicing elit. Dicta, omnis. Commodi quam accusamus pariatur in voluptate
        quibusdam fugit quas, impedit voluptates minima corporis officiis sunt voluptas autem alias cum, praesentium
        architecto! Asperiores, doloribus hic, dolorum eos sit praesentium pariatur modi fuga a id amet ipsam.
      </p>
    </div>
  </div>
  <div style="height: 100px;"></div>
</div>
<?php
include "php/footer.php";
?>