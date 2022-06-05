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

  if(isset($_SESSION["masuk"])){
    header("Location: MainPage.php");
    exit;
  }

  if(isset($_POST["register"])){
    if(register($_POST) > 0){
      echo "<script>
        alert('Pendaftaran Berhasil!');
        document.location.href = 'login.php';
      </script>";
      exit;
    }else{
      echo mysqli_error($conn);
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/signUp.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');
    </style>
    <title>Sign Up!</title>
  </head>
  <body>
    <form action"" method="post">
    <div id="mainBox">
      <div id="box1">
        <div id="boxTitle">
          <h1>Join our family</h1>
          <div id="lineTitle"></div>
          <p>Your pet family is waiting for you!</p>
        </div>
        <div id="boxForm">
          <div class="miniBoxForm">
              <div class="inputBox">
                <label for="">First Name</label>
                <input type="text" name="fname" value="" required>
              </div>
              <div class="inputBox">
                <label for="">Last Name</label>
                <input type="text" name="lname" value="" required>
              </div>
            </div>
            <div class="miniBoxForm">
              <div class="inputBox">
                <label for="">Phone</label>
                <input type="text" name="phone" value="" required>
              </div>
              <div class="inputBox">
                <label for="">Email</label>
                <input type="email" name="email" value="" required>
              </div>
            </div>
            <div class="miniBoxForm">
              <div class="inputBox">
                <label for="">Password</label>
                <input type="password" name="password" value="" required>
                <div class="hidePass"></div>
              </div>
              <div class="inputBox">
                <label for="">Confirm Password</label>
                <input type="password" name="password2" value="" required>
                <div class="hidePass"></div>
              </div>
            </div>
            <div class="submitBox">
              <p>Already have an account? <a href="login.html">Sign In</a> </p>
            </div>
            <div class="submitBox">
              <input type="submit" name="register" value="Sign Up">
            </div>
        </div>
      </div>
      <div id="box2"></div>
    </div>
    </form>
  </body>
</html>
