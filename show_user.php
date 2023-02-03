<?php

  session_start(); 

  if (!isset($_SESSION['userid'])) { 
      $_SESSION['msg'] = "You have to log in first"; 
      header('location: login.php'); 
  } 

  if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['userid']); 
    header("location: login.php"); 
} 

?>

<style>
<?php include 'css/user_css.css'; ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="profile-card">
    <div class="card-header">
<?php include("connection.php") ?>
<?php $sql="SELECT*FROM user1 WHERE id ='".$_SESSION['userid']."'";
      $result=$con ->query($sql);
      $rs=$result ->fetch_object();
      ?>      
       
      <div class="name">ชื่อผู้ใช้:  <?=$rs->username; ?></div>
      <div class="desc">รหัสผ่าน: <?=$rs->password; ?></div> 
      <div class="desc">ชื่อ-นามสกุล: <?=$rs->mem_name; ?></div>
      <div class="desc">ที่อยู่: <?=$rs->mem_add; ?></div>
      <div class="desc">อีเมล: <?=$rs->mem_email; ?></div>
      <div class="desc">เบอร์โทรศัพท์: <?=$rs->mem_tel; ?></div>
      
    </div>
    <div class="card-footer">
      <a href="user_page.php" class="contact-btn">หน้าแรก</a>
      <a href=user_edit.php?id=<?=$rs->id; ?> class="contact-btn">แก้ไข โปรไฟล์</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>