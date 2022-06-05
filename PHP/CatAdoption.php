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
    <title>Cat Adoption</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
    <!-- <script src="./selector.js"></script> -->
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

        <div class="head">
            <img class="catAdopt" src="../Resources/cat.png" alt="cat adopt">
            <p>Cat Adoption</p>
        </div>

        <div class="selector">
            <ul class="animalList">

                <li class="animalItem">Gender
                    <ul class="itemdrop">
                        <li><a href="#">Female</a></li>
                        <li><a href="#">Male</a></li>
                    </ul>
                </li>


                <li class="catItem">Breed
                    <ul class="catItemDrop">
                        <li><a href="#">Persian</a></li>
                        <li><a href="#">Main coon</a></li>
                        <li><a href="#">Cat Bombay</a></li>
                        <li><a href="#">Russian Blue</a></li>
                        <li><a href="#">Siamese</a></li>
                        <li><a href="#">Radgoll</a></li>
                        <li><a href="#">Bengal</a></li>
                        <li><a href="#">Sfinks don</a></li>
                        <li><a href="#">Thai cat</a></li>
                        <li><a href="#">Burmese cat</a></li>
                    </ul>
                </li>

                <li class="animalItem">Shelter
                    <ul class="itemdrop">
                        <li><a href="#">Jakarta</a></li>
                        <li><a href="#">Bekasi</a></li>
                        <li><a href="#">Bogor</a></li>
                        <li><a href="#">Depok</a></li>
                        <li><a href="#">Tangerang</a></li>
                    </ul>
                </li>


            </ul>
        </div>

        <div class="catOption">
            <div class="catBox">
                <div class="cat">
                    <img src="../Resources/cutie.png" alt="">
                    <p class="name">Cutie</p>
                   <a href="cutieProfile.php"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class="tim" src="../Resources/tim.png" alt="">
                    <p class="name">Tim</p>
                    <a href="timProfile.php"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class= "abby" src="../Resources/abby.png" alt="">
                    <p class="name">Abby</p>
                    <a href="abbyProfile.php"><p>Learn More</p></a>
                </div>
            </div>
        </div>

        <div class="catOption">
            <div class="catBox">
                <div class="cat">
                    <img class = "bella" src="../Resources/bella.png" alt="">
                    <p class="name">Bella</p>
                   <a href="#"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class="jack" src="../Resources/jack.png" alt="">
                    <p class="name">Jack</p>
          <a href="#"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class="fiona" src="../Resources/fiona.png" alt="">
                    <p class="name">Fiona</p>
                    <a href="#"><p>Learn More</p></a>
                </div>
            </div>
        </div>

        <div class="catOption">
            <div class="catBox">
                <div class="cat">
                    <img class= "lily" src="../Resources/Lily.png" alt="">
                    <p class="name">Lily</p>
                   <a href="#"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class="leo" src="../Resources/Leo.png" alt="">
                    <p class="name">Leo</p>
          <a href="#"><p>Learn More</p></a>
                </div>

                <div class="cat">
                    <img class="ziggy" src="../Resources/ziggy.png" alt="">
                    <p class="name">Ziggy</p>
                    <a href="#"><p>Learn More</p></a>
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
