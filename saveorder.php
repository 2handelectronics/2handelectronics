<?php
  session_start();
    include("connection.php")

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Checkout</title>

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
    <h1>Checkout</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


    <?php
      $name = $_REQUEST["name"];
      $address = $_REQUEST["address"];
      $email = $_REQUEST["email"];
      $phone = $_REQUEST["phone"];
      $total_qty = $_REQUEST["total_qty"];
      $total1 = $_REQUEST["total1"];
      $dttm = Date("Y-m-d G:i:s");
foreach($_SESSION['cart'] as $pro_id=>$qty)
      {
        $sql = "SELECT * FROM product WHERE pro_id = $pro_id";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $sum = $row['pro_price']*$qty;
        $total2 += $sum;
        $qty2 += $qty;

       
      mysqli_query($con, "BEGIN");
      $sql1 = "INSERT INTO order_head VALUES(null, '$dttm', '$name', '$address', '$email', '$phone', '$qty2', '$total2')";
      $query1 = mysqli_query($con, $sql1);
      }
      $sql2 = "SELECT max(order_id) as order_id FROM order_head WHERE order_name='$name' and order_email='$email' and order_dttm='$dttm'";
      $query2 = mysqli_query($con, $sql2);
      $row = mysqli_fetch_array($query2);
      $order_id = $row["order_id"];
      foreach($_SESSION['cart'] as $pro_id=>$qty)
      {
        $sql3 = "SELECT * FROM product WHERE pro_id = $pro_id";
        $query3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_array($query3);
        $total = $row3['pro_price']*$qty;
        $sql4 = "INSERT INTO order_detail VALUES(null, '$order_id', '$pro_id', '$qty', '$total')";
        $query4 = mysqli_query($con, $sql4);
      }
      if($query1 && $query4) {
        mysqli_query($con, "COMMIT");
        $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
        foreach($_SESSION['cart'] as $pro_id)
        {
          unset($_SESSION['cart']);
        }
      }
      else{
        mysqli_query($con, "ROLLBACK");
        $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ครับ/ค่ะ";
      }
?>
<script type="text/javascript">
  alert("<?php echo $msg;?>");
  window.location = 'user_page.php';

</script>


  </body>
      
</html>