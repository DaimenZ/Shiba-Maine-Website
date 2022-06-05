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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
</head>
<body>


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

        <div class="aboutUs">
            <div class="aboutUstext">
                <p class="head">
                    About Us
                </p>

                <p class="text">
                    Kami lebih dari sekedar website adopsi hewan.
                    <br>
                    Di sini kamu bisa belajar bagaimana cara untuk
                    <br>
                    merawat binatang dengan baik dan juga hal apa
                    <br>
                    saja yang diperlukan binatang kalian agar merasa
                    <br>
                    nyaman dengan kalian.
                    <br>
                    <br>
                </p>

                <p class="text">
                    Kami memiliki tujuan untuk dapat mengedukasi
                    <br>
                    semua orang untuk bisa sayang terhadap binatang.
                    <br>
                    Seperti yang kita ketahui, banyak sekali kekerasan
                    <br>
                    terhadap binatang yang telah terjadi, maka dari itu
                    <br>
                    kami hadir untuk mengedukasi banyak orang tentang
                    <br>
                    betapa pentingnya mereka (binatang) di hidup kita.
                </p>
            </div>
            <img src="../Resources/paw.png" alt="">
        </div>

        <div class="ourService">
            <div class="ourServicetext">
                <p class="head">
                    Our Service
                </p>

                <p class="text">
                    Kami memberikan pelayanan terbaik untuk Anda dan
                    <br>
                    teman-teman bulu Anda
                </p>
            </div>

            <div class="ourServicebox">
                <div class="service">
                    <img src="../Resources/adopt.png" alt="">
                    <p class="text">Pet Adopt</p>
                </div>

                <div class="service">
                    <img src="../Resources/needs.png" alt="">
                    <p class="text">Pet Needs</p>
                </div>

                <div class="service">
                    <img src="../Resources/edu.png" alt="">
                    <p class="text">Pet Education</p>
                </div>
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
</body>
</html>
