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
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
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


    <form id="frmcart" name="frmcart" method="POST" action="saveorder.php">
      <table width="600" border="0" align="center" class="square">
        <tr>
          <td width="1558" colspan="4" bgcolor="#FFDDBB"><strong>สั่งซื้อสินค้า</strong></td>
        </tr>
        <tr>
          <td bgcolor="#F9D5E3">สินค้า</td>          
          <td align="center" bgcolor="#F9D5E3">ราคา</td>
          <td align="center" bgcolor="#F9D5E3">จำนวน</td>
          <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
        </tr>

    <?php 
      $total=0;
      foreach($_SESSION['cart'] as $pro_id=>$qty)
      {
        $sql = "SELECT * FROM product WHERE pro_id=$pro_id";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $sum = $row['pro_price']*$qty;
        $total += $sum;

        echo "<tr>";
        echo "<td>" . $row["pro_name"] . "</td>";
        echo "<td align='right'>" .number_format($row['pro_price'],2) . "</td>";
        echo "<td align='right'>$qty</td>";
        echo "<td align='right'>" .number_format($sum,2) . "</td>";
        echo "</tr>";
      }

        echo "<tr>";
        echo "<td align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
        echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
        echo "</tr>";
    ?>

  </table>

  <p>
    <table border="0" cellspacing="0" align="center">
      <tr>
        <td colspan="2" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">ชื่อ</td>
        <td><input name="name" type="text" id="name" required/></td>
      </tr>

      <tr>
         <td width="22%" bgcolor="#EEEEEE">ที่อยู่</td>
         <td width="78%">
        <textarea name="address" cols="35" rows="5" id="address" required></textarea>
        </td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">อีเมล</td>
        <td><input name="email" type="email" id="email" required/></td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
        <td><input name="phone" type="text" id="phone" required/></td>
      </tr>

      <tr>
        <td colspan="2" align="center" bgcolor="#CCCCCC">
          <input name="Submit2" class='product-button' type="submit" value="สั่งซื้อ" onclick="javascript:window.print()"/></td>
      </tr>
    </table>
  </from>

  </body>
      
</html>