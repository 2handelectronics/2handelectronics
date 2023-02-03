<?php
  session_start();
    include("connection.php"); 
  if(!$_SESSION["userid"]){
    header("location: login.php");
  }else{
    $sql = "SELECT * FROM user1 WHERE id = '".$_SESSION['userid']."'";
    $result=$con ->query($sql);
    $r=$result ->fetch_object();
?>
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
<form id="frmcart" name="frmcart" method="POST" method="POST" action="saveorder.php">

<body>
  <div id="w">
    <header id="title">
      <h1>ตะกร้าสินค้า</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">ราคา</th>
            <th class="second">จำนวน</th>
            <th class="third">รวม(บาท)</th>
            <th class="fourth">ยกเลิก</th>
          </tr>
        </thead>
        <tbody>
         <tr class="productitm">
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
          </tr>
      <tr>
        <td colspan="4" bgcolor="#CCCCCC">รายละเอียดในการติดต่อ</td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">ชื่อ</td>
        <td bgcolor="#EEEEEE"><input name="name" type="text" id="name"  value="<?=$r->mem_name; ?>" required/></td>
                <td bgcolor="#EEEEEE"></td>
                        <td bgcolor="#EEEEEE"></td>
      </tr>
      <tr>
         <td bgcolor="#EEEEEE">ที่อยู่</td>
         <td bgcolor="#EEEEEE">
        <textarea name="address" cols="22" rows="5" id="address"  required><?=$r->mem_add; ?></textarea>
        </td>
                <td bgcolor="#EEEEEE"></td>
                        <td bgcolor="#EEEEEE"></td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">อีเมล</td>
        <td bgcolor="#EEEEEE"><input name="email" type="email" id="email" value="<?=$r->mem_email; ?>" required/></td>
                <td bgcolor="#EEEEEE"></td>
                        <td bgcolor="#EEEEEE"></td>
      </tr>

      <tr>
        <td bgcolor="#EEEEEE">เบอร์ติดต่อ</td>
        <td bgcolor="#EEEEEE"><input name="phone" type="text" id="phone" value="<?=$r->mem_tel; ?>" required/></td>

        <td bgcolor="#EEEEEE"></td>
        
        <td bgcolor="#EEEEEE"></td>
      </tr>

      <tr>
        <td colspan="4" align="center" bgcolor="#CCCCCC">
          <input class='product-button' name="Submit2" type="submit" value="พิมพ์ใบสั่งซื้อ" onclick ="JavaScript:window.print()">
          </td>
      </tr>

                  </tbody>
  </form>

  </body>
      
</html>
<?php  } ?>