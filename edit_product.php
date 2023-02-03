<?php
 session_start();
 require_once "connection.php";
 $rs=$con->query("SELECT*FROM product WHERE pro_id=".$_GET['pro_id']);
 $r=$rs->fetch_object();
 if (isset($_POST['submit'])){
  $pro_name=$_POST['pro_name'];
  $type_name=$_POST['type_name'];
  $pro_pic=$_POST['pro_pic'];
  $pro_detail=$_POST['pro_detail'];
  $pro_qty=$_POST['pro_qty'];
  $pro_price=$_POST['pro_price'];
  
    $query="UPDATE product SET pro_name='$pro_name', type_name='$type_name', pro_pic='$pro_pic', pro_detail='$pro_detail', pro_qty='$pro_qty', pro_price='$pro_price' WHERE pro_id=".$_POST['pro_id'];
    $result=mysqli_query($con, $query);
    if($result){
      $_SESSION['success']='ลงทะเบียนไม่สำเร็จ';
      header("location: detail_product.php");
    }else{
      $_SESSION['error']='ลงทะเบียนไม่สำเร็จ';
      header("location: edit_pro.php");
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
  <body style="background-color:#B0C4DE">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>จำกัดข้อมูล</title>

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
    <h1><font size="100px" color="#000000">แก้ไขสินค้า</font></h1>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
    <form action="" method="POST">
  <div class="form-group">
    <label for="pro_name">ชื่อสินค้า</label>
    <input type="text" class="form-control" id="pro_name" name="pro_name" value="<?=$r->pro_name; ?>"> 
  </div>
  <div class="form-group">
    <label for="type_name">ประเภทสินค้า</label>
    <input type="text" class="form-control" id="type_name" name="type_name" value="<?=$r->type_name; ?>">
  </div>
  <div class="form-group">
    <label for="pro_pic">รูปภาพสินค้า</label>
    <input type="file" id="pro_pic" name="pro_pic" value="<?=$r->pro_pic; ?>">
  </div>
  <div class="form-group">
    <label for="pro_detail">รายละเอียดของสินค้า</label>
    <input type="text" class="form-control" id="pro_detail" name="pro_detail" value="<?=$r->pro_detail; ?>">
  </div>
  <div class="form-group">
    <label for="pro_qty">จำนวน</label>
    <input type="int" class="form-control" id="pro_qty" name="pro_qty" value="<?=$r->pro_qty; ?>">
  </div>
  <div class="form-group">
    <label for="pro_price">ราคา</label>
    <input type="int" class="form-control" id="pro_price" name="pro_price" value="<?=$r->pro_price; ?>">
    <input type="hidden" name="pro_id" value="<?=$r->pro_id; ?>">
  </div>
 

  
  <button type="submit" class="btn btn-default" name="submit">บันทึก</button>
</form>
</div>
      </div>
    </div> 
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>