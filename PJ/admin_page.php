<?php
    session_start();
    if(!$_SESSION['userid']){
      header("location: login.php");
    }else{
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>สมาชิก</title>

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
  <body>
    <h1>ยินดีต้อนรับผู้ดูแลระบบ</h1>
    <h3><?php echo$_SESSION['user']; ?></h3>

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
<td>
  <td width="70%"></td>
</tr>
</table>

  </body>
</html>
<?php } ?>