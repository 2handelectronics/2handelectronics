<?php

  session_start();

  require_once "connection.php";

  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $mem_name = $_POST['mem_name'];
    $mem_add = $_POST['mem_add'];
    $mem_email = $_POST['mem_email'];
    $mem_tel = $_POST['mem_tel'];

    $user_check = "SELECT * FROM user1 WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($con, $user_check);
    $user = mysqli_fetch_assoc($result);
    if ($user['username'] === $username) {
      echo "มีสมาชิกนี้อยู่ในระบบเเล้วกรุณาสมัครใหม่";
    } else {
      $query = "INSERT INTO user1(username, password, mem_name, mem_add, mem_email, mem_tel, status)
      VALUES ('$username', '$password', '$mem_name', '$mem_add', '$mem_email', '$mem_tel', 'member')";
      $result = mysqli_query($con , $query);

      if($result) {
        $_SESSION ['success'] = "ลงทะเบียนสำเร็จ";
        header("Location: login.php");
      }else{
        $_SESSION ['error'] = "ทะเบียนไม่สำเร็จ";
        header("Location: register.php");
      }
    }
  }
?>








<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css
" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  </head>
  <body>
            <nav class="navbar navbar-inverse">
              </nav>

    <h1 align="center">สมัครสมาชิก</h1>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js
" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js
" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-md-offset-4">
      
          <form class="form-horizontal" action="" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="mem_name">Name</label>
            <input type="text" class="form-control" id="mem_name" placeholder="ชื่อ-นามสกุล" name="mem_name" required>
          </div>
          <div class="form-group">
            <label for="mem_add">Address</label>
            <input type="text" class="form-control" id="mem_add" placeholder="ที่อยู่" name="mem_add" required>
          </div>
          <div class="form-group">
            <label for="mem_email">Email</label>
            <input type="email" class="form-control" id="mem_email" placeholder="อีเมล์" name="mem_email" required>
          </div>
          <div class="form-group">
            <label for="mem_tel">Tel</label>
            <input type="text" class="form-control" id="mem_tel" placeholder="เบอร์โทรศัพท์" name="mem_tel" required>
          </div>

          <h3 align="center">
          <button type="submit" class="btn btn-default" name="submit">ยืนยันเพื่อสมัคร</button>
        </form>
      </h3>

  <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
  </div>
  </body>
</html>