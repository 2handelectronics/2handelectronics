<style>
<?php include 'css/register.css'; ?>
</style>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

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
      echo "<script>alert('มีสมาชิกนี้อยู่ในระบบเเล้วกรุณาสมัครใหม่');window.location='register.php';</script>";
    } else {

      $query = "INSERT INTO user1(id, username, password, mem_name, mem_add, mem_email, mem_tel, status)
      VALUES (NULL, '$username', '$password', '$mem_name', '$mem_add', '$mem_email', '$mem_tel', 'member')";
      $result = mysqli_query($con , $query);

      if($result) {
        $_SESSION ['success'] = "ลงทะเบียนสำเร็จ";
        echo "<script>alert('ลงทะเบียนสำเร็จ');window.location='login.php';</script>";
      }else{
        $_SESSION ['error'] = "ลงทะเบียนไม่สำเร็จ";
        echo "<script>alert('ลงทะเบียนไม่สำเร็จ');window.location='register.php';</script>";
      }
    }
  }
?>


      <form action="" class="login-form" method="POST">

<div class="login-box">
  <h2>สมัครสมาชิกใหม่</h2>
  <form>
    <div class="user-box">
      <input type="text" class="form-control" id="username" name="username" required >
      <label>ชื่อผู้ใช้</label>
    </div>
    <div class="user-box">
      <input type="password" class="form-control" id="password" name="password" required >
      <label>รหัสผ่าน</label>
    </div>
    <div class="user-box">
      <input type="text" class="form-control" id="mem_name" name="mem_name" required>
      <label>ชื่อ-นามสกุล</label>
    </div>
    <div class="user-box">
      <input type="text" class="form-control" id="mem_add" name="mem_add" required>
      <label>ที่อยู่</label>
    </div>
    <div class="user-box">
      <input type="text" class="form-control" id="mem_email" name="mem_email" required>
      <label>อีเมล</label>
    </div>
    <div class="user-box">
      <input type="text" class="form-control" id="mem_tel" name="mem_tel" required>
      <label>หมายเลขโทรศัพท์</label>
    </div>
        <input type="submit" class="logbtn" name="submit" value="ยืนยันสมัคร">
                <div class="bottom-text">
          มีบัญชีแล้ว ใช่หรือไม่? <a href="login.php">เข้าสู่ระบบ</a>
        </div>
        
  </form>
</div>

