<?php

  session_start();

  if (!$_SESSION['userid']) {
    header("Location : login.php");
  }
  else
  {

?>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">


<!doctype html>
<html lang="en">
  <head>
  <body style="background-color:#B0C4DE">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Manage Product</title>

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
    <link rel="stylesheet" href="css/color.css">
    <h1>ผู้ดูแลระบบและจัดการสินค้า</h1>
    <h3>
      <?php 
      echo $_SESSION['user']; 
      ?>
    </h3>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    <table width="100%">
      <tr>
        <td width="30%" valign="top" >
       <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="active"><a href="#">จัดการผู้ดูแลระบบ</a></li>
    <li role="presentation"><a href="detail_member.php">จัดการสมาชิก</a></li>
    <li role="presentation"><a href="detail_deli.php">สิ่งที่ต้องจัดส่ง</a></li>
    <li role="presentation"><a href="detail_product.php">จัดการสินค้า</a></li>
    <li role="presentation"><a href="index.php">ออกจากระบบ</a></li>


</ul> 
<td>

  <td width="70%">
<?php
    require_once "connection.php";
    if(isset($_POST['submit'])){
      $pro_name=$_POST['pro_name'];
      $type_name=$_POST['type_name'];
      $pro_pic=$_POST['uploadfile'];
      $pro_detail=$_POST['pro_detail'];
      $pro_qty=$_POST['pro_qty'];
      $pro_price=$_POST['pro_price'];
      $query="INSERT INTO  `product` (`pro_id`, `pro_name`, `type_name`, `pro_detail`, `pro_qty`, `pro_price`, `pro_pic`) VALUES (NULL, '$pro_name', '$type_name', '$pro_detail', '$pro_qty', '$pro_price', '$pro_pic')";
      $result=mysqli_query($con , $query);
      if($result){
        $_SESSION['success']="เพิ่มข้อมูลสำเร็จ";
        header("location: detail_product.php");
      }else{
        $_SESSION['error']="เพิ่มข้อมูลไม่สำเร็จ";
        header("location: add_product.php");
      }
 }
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12"></div>
        <div class="col-md-8 col-sm-8 col-xs-12">

  <form action="" method="POST">
  <div class="form-group">
    <label for="pro_name">ชื่อสินค้า</label>
    <input type="text" class="form-control" id="pro_name" name="pro_name">
  </div>

  <div class="form-group">
    <label for="type_name">ประเภทสินค้า</label>
    <input type="text" class="form-control" id="type_name" name="type_name">
  </div>

  <div class="form-group">
    <label for="uploadfile">รูปสินค้า</label>
    <input type="file" id="uploadfile" name="uploadfile">

  <div class="form-group">
    <label for="pro_detail">รายละเอียดสินค้า</label>
    <input type="text" class="form-control" id="pro_detail" name="pro_detail">
    </div>
  

    <div class="form-group">
    <label for="pro_qty">จำนวนสินค้า</label>
    <input type="int" class="form-control" id="pro_qty" name="pro_qty">
  </div>

  <div class="form-group">
    <label for="pro_price">ราคาสินค้า</label>
    <input type="int" class="form-control" id="pro_price" name="pro_price">
  </div>
    
  <button type="submit" class="btn btn-default" name="submit">ยืนยันการเพิ่มสินค้า</button>
</form>
</div> 
</div>
</div>







</tr>
</table>


  </body>
  </html>
<?php   } ?>