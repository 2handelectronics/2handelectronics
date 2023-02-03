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
  	 	$quary="UPDATE user1 SET username='$username', password='$password', mem_name='$mem_name', mem_add='$mem_add', mem_email='$mem_email', mem_tel='$mem_tel' WHERE id=".$_POST['id'];
  	 	$result=mysqli_query($con, $quary);
  	 	if($result){
  	 		$_SESSION['success']='แก้ไขสำเร็จ';
  	 		header("location: detail_member.php");
  	 	}else{
  	 		$SESSION['error']='แก้ไขไม่สำเร็จ';
  	 		header("location: edit_member.php");

  	 	}
  	 }
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Register</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <center><h1>จัดการข้อมูล</h1></center>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
    
          <form action="" method="POST">
          <div class="form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$r->username;?>">
          </div>
          <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password"  name="password" value="<?=$r->password;?>">
          </div>
          <div class="form-group">
            <label for="mem_name">ชื่อ-นามสกุล</label>
            <input type="text" class="form-control" id="mem_name" name="mem_name" value="<?=$r->mem_name;?>">
          </div>
          <div class="form-group">
            <label for="mem_add">ที่อยู่</label>
            <input type="text" class="form-control" id="mem_add" name="mem_add" value="<?=$r->mem_add;?>">
          </div>
          <div class="form-group">
            <label for="mem_email">อีเมล</label>
            <input type="email" class="form-control" id="mem_email" name="mem_email" value="<?=$r->mem_email;?>">
          </div>
          <div class="form-group">
            <label for="mem_tel">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" id="mem_tel" name="mem_tel" value="<?=$r->mem_tel;?>">
            <input type="hidden" name="id" value="<?=$r->id; ?>">
          </div>
          <button type="submit" class="btn btn-default" name="submit">ยืนยันการแก้ไข</button>
        </form>

  <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
  </div>
  </body>
</html>