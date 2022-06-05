<?php
  session_start();
  require 'function.php';

  if(isset($_COOKIE['key']) && isset($_COOKIE['key2'])){
    $id = $_COOKIE['key'];
    $key = $_COOKIE['key2'];

    $result = mysqli_query($conn, "SELECT EmailCustomer FROM
      customer WHERE ID_Customer = $id");

    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row['EmailCustomer'])){
      $_SESSION['masuk'] = true;
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Nav.css">
    <link rel="stylesheet" href="../CSS/petEdu.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
    <title>Pet Education</title>
  </head>
  <body>
    <div id="mainBox">
      <nav class="nav">
          <!-- <div class="LogoandSearch"> -->
              <img class="logo" src="../Resources/logo.png" alt="logo">



          <ul class="navlist">
              <li class="navitem">
                  <a href="MainPage.php">  Home </a>

              </li>

              <li class="navitem">Pet Adoption
                  <ul class="itemdrop">
                      <li><a href="DogAdoption.php">Dog Adoption</a></li>
                      <li><a href="CatAdoption.php">Cat Adoption</a></li>
                  </ul>
              </li>


              <li class="navitem">Pet Needs
                  <ul class="itemdrop">
                      <li><a href="petNeeds.php?pet=dog&category=food">Dog Needs</a></li>
                      <li><a href="petNeeds.php?pet=cat&category=food">Cat Needs</a></li>
                  </ul>
              </li>


              <li class="navitem"><a href="petEdu.php">Pet Education</a></li>


              <li class="navitem">Donate</li>
          </ul>



          <div class="SearchandSignin">

              <form id="searchForm">
                  <input type="search" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
                  <button><img src="../Resources/Search.png" alt="searchBar"></button>
              </form>

              <?php if(isset($_SESSION['masuk'])) : ?>
              <a href="cart.php">
                <img src="../Resources/cart.png" alt="">
              </a>
              <a href="profile.php">
                <img src="../Resources/iconProfile.png" alt="">
              </a>

              <?php else : ?>
              <div class="Signin">
                  <a href="login.php">Sign In</a>

              </div>
              <?php endif; ?>
          </div>
      </nav>

      <div id="box1">
        <div id="box1Title">
          <h1>Pet Education</h1>
          <p>Hai penyayang hewan, di sini kami akan memberikan beberapa tips atau cara agar hewan kesayangan anda merasa nyaman dengan anda dan juga memiliki hubungan yang harmonis dengan anjing atau kucing yang kalian miliki. Berikut cara yang dapat anda lakukan kepada hewan kalian.</p>
        </div>
        <div id="box1Image">
          <img src="../Resources/petEdu.png" alt="">
        </div>
      </div>
      <div id="box2">
        <div id="box2Title">
          <h1>Things to know before adopting</h1>
        </div>
        <div id="box2Content">
          <div class="container">
            <img src="../Resources/edu1.png" alt="">
            <p>Sebelum  mengadopsi, persiapkan kebutuhan hewan peliharaan seperti tempat tidur yang nyaman.</p>
          </div>
          <div class="container">
            <img src="../Resources/edu2.png" alt="">
            <p>Kenali setiap karakteristik yang dimiliki oleh anjing atau kucing yang anda miliki.</p>
          </div>
          <div class="container">
            <img src="../Resources/edu3.png" alt="">
            <p>Kenali jenis makanan dan minuman yang akan Anda berikan kepada hewan peliharaan Anda</p>
          </div>
        </div>
      </div>
      <div id="box3">
        <div id="box3Image">
          <img src="../Resources/pawCat.png" alt="">
        </div>
        <div id="box3Content">
          <h1>Training a Cat</h1>
          <p>Perlakukan predator rumah Anda karena mereka pantas mendapatkannya. Hanya dengan daging & ikan asli sebagai pilihan terbaik untuk membuat kucing-kucing kita bahagia karena nutrisi yang terjamin optimal dan kesehatan yang baik.</p>
          <span class="learnMore">
            <a href="catEdu.php">Learn More</a>
            <img src="../Resources/arrow.png" alt="">
          </span>
        </div>
      </div>
      <div id="box4">
        <div id="box4Content">
          <h1>Training a Dog</h1>
          <p>Hormati naluri leluhur anjing Anda, ikuti hidungnya dan pilih produk terbaik untuk mereka! Pilihan terbaik untuk membuat anjing-anjing kita bahagia karena nutrisi yang terjamin optimal dan kesehatan yang baik</p>
          <span class="learnMore">
            <a href="dogEdu.php">Learn More</a>
            <img src="../Resources/arrowWhite.png" alt="">
          </span>
        </div>
        <div id="box4Image">
          <img src="../Resources/pawDog.png" alt="" id="paw1">
          <img src="../Resources/pawDog.png" alt="" id="paw2">
        </div>
      </div>

      <footer>
          <div class="location">
              <h3>
                  LOCATION
              </h3>

              <h5>
                  Jl. Pejaten Barat Raya No.2, RW.8, West
                  <br>
                  Pejaten, Pasar Minggu, South Jakarta
                  <br>
                  City, Jakarta 12540
              </h5>
          </div>

          <div class="contact">
              <h3>CONTACT US</h3>

              <div class="socmed">
                  <a href="#"> <img src="../Resources/ig.png" alt="instagram"></a>
                  <a href="#"><img src="../Resources/twt.png" alt="twitter"></a>
                 <a href="#"> <img src="../Resources/yt.png" alt="youtube"></a>
                 <a href="#"> <img src="../Resources/fb.png" alt="facebook"></a>
              </div>
          </div>

          <div class="info">
              <a href="#"><h3>HELP</h3></a>
              <a href="aboutsUs.php"><h3>ABOUT US</h3></a>
              <a href="#"><h3>PRIVACY POLICY</h3></a>
          </div>
      </footer>
    </div>
  </body>
</html>
