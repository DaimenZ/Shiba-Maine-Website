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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Nav.css">
    <link rel="stylesheet" href="../CSS/dogEdu.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
    <title>Dog Education</title>
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
        <div id="box1Content">
          <div class="title">
            <h1>Dog Education</h1>
            <h2>Hai Cynophilist !</h2>
          </div>
          <div class="desc">
            <h1>Doggie</h1>
            <h2>Mengenal anjing lebih dekat</h2>
            <p>Tahukah kamu, anjing merupakan hewan yang sangat setia dengan tuannya. Hal ini disebabkan karena anjing masuk kedalam hewan sosial, dimana jika ia diperlakukan dengan baik, maka ia bisa membalas perlakuanmu lebih dari iitu.</p>

          </div>
        </div>
        <div id="box1Image"></div>
      </div>

      <div id="box2">
        <div id="box2Title">
          <h1>Hal yang harus diperhatikan</h1>
        </div>
        <div id="box2Point">
          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Berikan vaksin kepada anjing kalian agar terhindar dari virus atau penyakit.</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Ajak anjing kalian meakukan aktivitas fisik</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Kunjungi dokter secar rutin</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Ajak anjing kalian bermain</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Berikan makanan bernutrisi</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Selalu jaga kebersihan anjing</div>
          </div>
        </div>
      </div>

      <div id="box3">
        <div id="box3Title">
          <h1>Fakta menarik lainnya</h1>
          <h2>Disini terdapat fakta tambahan mengenai anjng kamu lho!</h2>
        </div>
        <div id="box3Content">
          <div class="box">
            <div class="number"></div>
            <div class="desc">Anjing juga dapat bermimpi seperti manusia. Dia bisa bermimpi baik dan juga buruk bahkan mengingau layaknya manusia.</div>
          </div>

          <div class="box">
            <div class="number"></div>
            <div class="desc">Banyak yang beranggapan bahwa anjing buta warna. Faktanya anjing dapat melihat warna hanya tidak sejelas mata manusia.</div>
          </div>

          <div class="box">
            <div class="number"></div>
            <div class="desc">Anjing memiliki tingkat kecerdasan seperti seorang anak berusia 2 tahun. Dia bahkan mampu mengingat lebih dari 100 kata.</div>
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
    </div>
  </body>
</html>
