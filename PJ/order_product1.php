<?php 
    session_start();
    error_reporting(0);
    $pro_id = $_REQUEST['pro_id'];
    $act=$_REQUEST['act'];
    if($act=='add'&&!empty($pro_id)){
      if(isset($_SESSION['cart']['pro_id'])){
        $_SESSION['cart'][$pro_id]++;
      }else{
        $_SESSION['cart'][$pro_id]=1;
      }
    }
    if($act=='remove'&&!empty($pro_id)){
      unset($_SESSION['cart'][$pro_id]);
    }
    if($act=='update'){
      $amount_array=$_POST['amount'];
      foreach($amount_array as $pro_id =>$amount){
        $_SESSION['cart'][$pro_id]=$amount;
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
    <title>Bootstrap 101 Template</title>

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
    <h1>ตระกร้าสินค้า</h1>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <form id="frmcart" name="frmcart" method="POST" action="?act=update">
      <table width="600px" border="0" align="center">
        <tr>
          <td colspan="5" bgcolor="#CCCCCC"><b>ตะกร้าสินค้า</span></td>
        </tr>
        <tr>
          <td bgcolor="#EAEAEA">สินค้า</td>          
          <td align="center" bgcolor="#EAEAEA">ราคา</td>
          <td align="center" bgcolor="#EAEAEA">จำนวน</td>
          <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
          <td align="center" bgcolor="#EAEAEA">ยกเลิก</td>
        </tr>
        <?php 
          $total=0;
          if(!empty($_SESSION['cart'])){
            include("connection.php");
            foreach($_SESSION['cart'] as $pro_id =>$qty){
              $sql="SELECT * FROM product WHERE pro_id=$pro_id";
              $query=mysqli_query($con , $sql);
              $row=mysqli_fetch_array($query);
              $sum=$row['pro_price']*$qty;
              $total+=$sum;
              echo "<tr>";
              echo "<td>".$row['pro_name']."</td>";
              echo "<td>".number_format($row["pro_price"],2)."</td>";
              echo "<td width='57' align='right'>";
              echo "<input type='text' name='amount[$pro_id]' value='$qty' size='2'/></td>";
              echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
              echo "<td width='46' align='center'><a href='order_product.php?pro_id=$pro_id&act=remove'>ลบ</a></td>";
              echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
            echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
            echo "<td align='left' bgcolor='#CEE7FF'></td>";
            echo "</tr>"; 
          }
        ?>
        <tr>
          <td><a href="user_page.php">กลับหน้ารายการสินค้า</td>
            <td colspan="4" align="right">
              <input type="submit" name="button" id="button" value="ปรับปรุง" onclick="window.location='order_product.php';" />
              <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" />
            </td>
        </tr>
      </table>
    </form>
  </body>
</html>