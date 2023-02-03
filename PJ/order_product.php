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
<!DOCTYPE html>
<style>
<?php include 'css/test2.css'; ?>
</style>
<STYLE TYPE="TEXT/CSS"><!--
A:link {
text-decoration:none;
}
A:visited {
text-decoration:none;
}
</STYLE>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ตระกร้าสินค้า</title>
</head>
<body>
  <form id="frmcart" name="frmcart" method="POST" action="?act=update">
    <div id="w">
    <header id="title">
      <h1>ตะกร้าสินค้า</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">สินค้า</th>
            <th class="second">ราคา(บาท)</th>
            <th class="third">จำนวน</th>
            <th class="fourth">รวม(บาท)</th>
            <th class="fifth">ลบ</th>
          </tr>
        </thead>
        <tbody>
         <tr class="productitm">
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
              echo "<input type='number' name='amount[$pro_id]' value='$qty' size='2' min='0' max='99' class='qtyinput'/></td>";
              echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
              echo "<td width='46' align='center'><a href='order_product.php?pro_id=$pro_id&act=remove'><img src='https://i.imgur.com/h1ldGRr.png'></a></td>";
              echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
            echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
            echo "<td align='left' bgcolor='#CEE7FF'></td>";
            echo "</tr>"; 
          }
        ?>
          </tr>
          <tr class="checkoutrow">
            <td colspan="5" class="checkout"><button type="button" id="submitbtn" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';" /> สั่งซื้อสินค้า</button>
            <button type="submit" id="submitbtn" name="button" value="ปรับปรุง" onclick="window.location='order_product.php';" /> ปรับปรุง</button>
          <button type="submit" id="submitbtn" ><a href="user_page.php">หน้าแรก</button>
          </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</form>
</body>
</html>

 