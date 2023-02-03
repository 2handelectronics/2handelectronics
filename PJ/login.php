<?php
    
    session_start();
  
    if(isset($_POST['username'])) {
      
      include('connection.php');

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = "SELECT * FROM user1 WHERE username = '$username' AND password ='$password'";

      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION ['userid'] = $row['id'];
        $_SESSION ['user'] = $row['mem_name'];
        $_SESSION ['status'] = $row['status'];

        if ($_SESSION ['status'] == 'admin') {
          header("Location: admin_page.php");
        }
        if ($_SESSION ['status'] == 'member') {
          header("Location: user_page.php");
        } else {
          echo "Username หรือ Password ไม่ถูกต้อง";
        }
      }

      else {
        echo "<script>alert('กรุณาสมัครสมาชิก');window.location='login.php';</script>";
      }
    }

?>
<html>
  <head>
    <title>Login</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  </head>
  <body>
  <div class="login-box">
  <h2>Login</h2>
  <form action="" class="login-form" method="POST">
    <div class="user-box">
      <input type="text" class="form-control" id="username" name="username" required="username ">
      <label>ชื่อผู้ใช้</label>
    </div>
    <div class="user-box">
      <input type="password" class="form-control" id="password" name="password" required="password " >
      <label>รหัสผ่าน</label>
    </div>
        <input type="submit" class="logbtn" name="submit" value="เข้าสู่ระบบ">
                <div class="bottom-text">
          ยังไม่มีบัญชีผู้ใช้ ใช่หรือไม่? <a href="register.php">สมัครใหม่</a>
        </div>
        
  </form>
</div>
  </body>
</html>



