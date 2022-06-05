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
    <link rel="stylesheet" href="../CSS/catEdu.css">
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
        <div id="box1Image"></div>
        <div id="box1Content">
          <div class="title">
            <h1>Cat Education</h1>
            <h2>Hai Ailurophile !</h2>
          </div>
          <div class="desc">
            <h1>Kitten</h1>
            <h2>Mengenal kucing lebih dekat</h2>
            <p>Tahukah kamu, kucing sehat bisa melompat sejauh 6x lipat dari panjang badannya lho! Lompatan nya yang tinggi biasa digunakannya untuk berburu mengejar burung, kupu-kupu, maupun capung untuk mengikuti instingnya.</p>

          </div>
        </div>
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
            <div class="desc">Pilih nutrisi atau makanan yang tepat untuk kucing anda</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Berikan vaksin kepada kucing kalian agar terhindar dari virus atau penyakit.</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Memandikan kucing anda karena bisa saja masih ada kutu di badannya.</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Menjaga kucing agar tetap steril.</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Perhatikan kebersihan pada tempat tidur, dan juga kotak pasirnya.</div>
          </div>

          <div class="point">
            <div class="check">
              <img src="../Resources/check.png" alt="">
            </div>
            <div class="desc">Ajak kucing bermain dan siapkan juga mainannya.</div>
          </div>
        </div>
      </div>

      <div id="box3">
        <div id="box3Title">
          <h1>Fakta menarik lainnya</h1>
          <h2>Disini terdapat fakta tambahan mengenai kucing kamu lho!</h2>
        </div>
        <div id="box3Content">
          <div class="box">
            <div class="number"></div>
            <div class="desc">Telinga kucing mampu berputar hingga 180° . Kucing memiliki jaringan otot sebanyak 32 jaringan yang dapat mengendalikan telinganya.</div>
          </div>

          <div class="box">
            <div class="number"></div>
            <div class="desc">Kucing dapat merasakan emosi manusia. Ketika kamu merasa sedih, biasanya beberapa kucing akan mengampiri dan berusaha menghiburmu.</div>
          </div>

          <div class="box">
            <div class="number"></div>
            <div class="desc">Kucing juga bisa berkeringat lho! Kucing memilki kelenjar keringat di bagian bawah bantalan kakinya dan dia mengeluarkan keringat melalui cakarnya saja.</div>
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
