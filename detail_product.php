<?php
  session_start();
  if(!$_SESSION['userid']){
    header("Location: login.php");
  }else{
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Manageproduct</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-color:#B0C4DE">
    <h1>ผู้ดูแลระบบจัดการสินค้า</h1>
    <h3><?php echo$_SESSION['user'];

     ?></h3>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   
    <table width="100%">
      <tr>
        <td width="30%">
          <ul class="nav nav-pills nav-stacked">
          <li role="presentation" ><a href="detail_member.php" >จัดการสมาชิก</a>
            </li>
            <li role="presentation" ><a href="detail_deli.php" >สินค้าที่ต้องจัดส่ง</a>
            </li>
            <li role="presentation" ><a href="detail_product.php">จัดการสินค้า</a>
            </li>
            <li role="presentation" ><a href="logout.php">ออกจากระบบ</a>
            </li>
          </ul>
        </td>
  <td width="70%">
     <button type="submit" onclick=window.location="add_product.php" name="submit">เพิ่มสินค้า</button>
       </td>
          <table class="table">
           <tr>
              <td class="active">รหัสสินค้า</td>
              <td class="success">ชื่อสินค้า</td>
              <td class="warning">ประเภทสินค้า</td>
              <td class="danger">รูปภาพสินค้า</td>
              <td class="info">รายละเอียดสินค้า</td>
              <td class="danger">จำนวนสินค้า</td>
              <td class="info">ราคาสินค้า</td>
              <td class="info">จัดการข้อมูล</td>
          </tr>
          <?php Include("connection.php") ?>
          <?php $sql="SELECT*FROM product order by pro_id DESC";
          $result=$con->query($sql);
          while($rs=$result-> fetch_object())
          {
          ?>
          <tr>
              <td class="active"><?=$rs->pro_id; ?></td>
              <td class="success"><?=$rs->pro_name; ?></td>
              <td class="warning"><?=$rs->type_name; ?></td>
              <td class="danger"><img src="image\<?=$rs->pro_pic; ?>" width="100px"></td>
              <td class="info"><?=$rs->pro_detail; ?></td>
              <td class="danger"><?=$rs->pro_qty; ?></td>
              <td class="info"><?=$rs->pro_price; ?></td>
              <td class="info"><a href ="edit_product.php?pro_id=<?=$rs->pro_id ; ?>">แก้ไขข้อมูล</td>
          </tr>
          <?php  } ?>
          </table>

        </td>
      </tr>
    </table>
  </body>
</html>


<?php  } ?>