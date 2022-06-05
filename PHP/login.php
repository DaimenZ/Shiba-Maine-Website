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

  if(isset($_POST["login"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM customer WHERE EmailCustomer = '$email'");

    if(mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);

      if(password_verify($password, $row["password"])){
        $_SESSION["masuk"] = true;

        setcookie('key', $row['ID_Customer']);
        setcookie('key2', hash('sha256', $row['EmailCustomer']));

        header("Location: MainPage.php");
        exit;
      }
    }
    $error = true;
  }

  if(isset($error)){
    echo "<script>
      alert('Email / Password Salah!');
    </script>";
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    </style>
    <title>Login</title>
  </head>
  <body>
    <div id="main">
      <div id="box1">
        <div id="textWelcome">
          <h1>Welcome to Shiba Maine!</h1>
          <div id="lineWelcome"></div>
          <p>Ketahui lebih banyak cara menyayangi dan juga merawat binatang. Jangan sampai hewan peliharaan kalian merasa tidak nyaman dengan kalian. Segera daftarkan diri anda di website kami. Kami siap menjadi penolong disaat kalian belum memahami cara merawat binatang kesayangan kamu.</p>

        </div>
        <div id="decor"></div>

      </div>

      <form class="" method="post">
        <div id="box2">
          <div id="logo"><img src="../Resources/ShibaMaine.png" alt=""></div>
          <h1>Sign In</h1>
          <div id="lineSignIn"></div>

          <div class="formInput" id="userInput">
            <input type="text" name="email" placeholder="Email" required>
          </div>

          <div class="formInput" id="passInput">
            <input type="password" name="password" placeholder="Password" required>
          </div>

          <div id="regis">Don't have an account? <a href="signUp.php">Sign Up</a></div>

          <div id="button">
            <input type="submit" name="login" value="Sign In">
          </div>

        </div>

      </form>

    </div>
  </body>
</html>
