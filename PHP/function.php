<?php
  //Connect to SQLiteDatabase

  $conn = mysqli_connect("localhost", "root", "root", "shibamaine");

  function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }

    return $rows;
  }

  function register($data){
    global $conn;

    $fname = htmlspecialchars(stripslashes(mysqli_real_escape_string($conn, $data["fname"])));
    $lname = htmlspecialchars(stripslashes(mysqli_real_escape_string($conn, $data["lname"])));
    $phone = htmlspecialchars($data["phone"]);
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $photoprofile = "profile.png";

    $result = mysqli_query($conn, "SELECT EmailCustomer FROM customer where EmailCustomer = '$email'");

    if(mysqli_fetch_assoc($result)){
      echo "<script>
        alert('Email sudah terdaftar!')
      </script>";
      return false;
    }

    if($password !== $password2){
      echo "<script>
        alert('Konfirmasi password tidak sesuai!')
      </script>";
      return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO customer VALUES('0', '$fname', '$lname', '$phone', '$email', '$password', '$photoprofile')");

    return mysqli_affected_rows($conn);
  }
 ?>
