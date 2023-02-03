<?php
  session_start();
  require_once "connection.php";
  $rs=$con->query("SELECT*FROM user1 WHERE id=".$_GET['id']);
  $r=$rs->fetch_object();
  if(isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $mem_name=$_POST['mem_name'];
  $mem_add=$_POST['mem_add'];
  $mem_email=$_POST['mem_email'];
  $mem_tel=$_POST['mem_tel'];
    $query= "UPDATE user1 SET username='$username', password='$password', mem_name='$mem_name', mem_add='$mem_add', mem_email='$mem_email', mem_tel='$mem_tel' WHERE id=".$_POST['id'];
    $result=mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    
    if($result){
      $_SESSION['success']="แก้ไขสำเร็จ";
      header("location: show_user.php?id=$row[id]");
    }else{
      $_SESSION['error']="แก้ไขไม่สำเร็จ";
      header("location: user_edit.php");
    } 
  }
?>
<style>
<?php include 'css/edit_css.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    
   <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  </head>
  <body>

      <form action="" class="login-form" method="POST">
        <h1>แก้ไข โปรไฟล์</h1>

        <div class="txtb">
          <input type="text" class="form-control" id="username"  name="username" value="<?=$r->username; ?>">
        </div>

        <div class="txtb">
          <input type="text" class="form-control" id="password" name="password" value="<?=$r->password; ?>">
        </div>

         <div class="txtb">
          <input type="text" class="form-control" id="mem_name" name="mem_name" value="<?=$r->mem_name; ?>">
        </div>

         <div class="txtb">
          <input type="text" class="form-control" id="mem_add" name="mem_add" value="<?=$r->mem_add; ?>">
        </div>

         <div class="txtb">
          <input type="text" class="form-control" id="mem_email" name="mem_email" value="<?=$r->mem_email; ?>">
        </div>

         <div class="txtb">
          <input type="text" class="form-control" id="mem_tel" name="mem_tel" value="<?=$r->mem_tel; ?>">
        </div>
        <input type="hidden" name="id" value="<?=$r->id; ?>">
        <input type="submit" class="logbtn" name="submit" value="ยืนยันแก้ไข">

        <div class="bottom-text">
          <a href="user_page.php">หน้าแรก</a>
        </div>

      </form>