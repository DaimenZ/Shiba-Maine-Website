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

  $pet = $_GET["pet"];
  $category = $_GET["category"];

  $product = query("SELECT * FROM product WHERE ProductCategory = '$category' AND Product_for = '$pet' ORDER BY ID_Product DESC");

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Nav.css">
    <link rel="stylesheet" href="../CSS/petNeeds.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Pet Needs</title>
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
    <div id="mainBox">
      <div id="box1">
        <?php if($pet === 'cat') : ?>
          <div id="logoNeeds">
            <img src="../Resources/catNeeds.png" alt="">
          </div>
          <div id="titleNeeds">
            <h1>Cat Needs</h1>
          </div>
        <?php else : ?>
          <div id="logoNeeds">
            <img src="../Resources/dogNeeds.png" alt="">
          </div>
          <div id="titleNeeds">
            <h1>Dog Needs</h1>
          </div>
        <?php endif; ?>
      </div>
      <div id="box2">
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=food">Food</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=toys">Toys</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=collar">Collar</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=vitamin">Vitamin</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=cage">Cage</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=shampoo">Soap/Shampoo</a>
        </div>
        <div class="category">
          <a href="petNeeds.php?pet=<?=$pet;?>&category=litter">Litter</a>
        </div>
      </div>

      <div id="box3">
        <?php $i = 0; ?>
        <?php foreach($product as $row) : ?>
          <?php $i++; ?>
          <div class="boxItem">
              <img src="../Resources/<?= $row["ProductImage"];?>" alt="">
              <div class="boxItemTitle">
                <h1><?= $row["ProductName"];?></h1>
              </div>
              <div class="boxItemPrice">
                <h1>Rp<?= $row["ProductPrice"];?></h1>
              </div>
              <div class="quantityItem">
                <input type="submit" name="" value="-" id="minus<?=$i;?>">
                <input type="text" name="quantity" value="0" id="qty<?=$i;?>">
                <input type="submit" name="" value="+" id="add<?=$i;?>">

                <script>
                  $("#minus<?=$i;?>").click(function(){
                    var newQty = +($("#qty<?=$i;?>").val()) - 1;
                    if(newQty < 0)newQty = 0;
                    $("#qty<?=$i;?>").val(newQty);
                  });

                  $("#add<?=$i;?>").click(function(){
                    var newQty = +($("#qty<?=$i;?>").val()) + 1;
                    $("#qty<?=$i;?>").val(newQty);
                  });
                </script>
              </div>
              <input type="submit" name="buy" value="Buy">
          </div>
        <?php endforeach; ?>
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
