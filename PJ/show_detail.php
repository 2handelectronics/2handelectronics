<style>
<?php include 'css/show_d.css'; ?>
</style>
<html lang="en">

<head>
  <title>2 HAND ELECTRONICS</title>
<link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  <link rel="stylesheet" href="css/show_d.css">
  <link rel="stylesheet" href="css/btn1.css">
</head>
<?php 
  require_once "connection.php";
  $pro_id = intval($_GET['pro_id']);
  $sql = "SELECT * FROM product WHERE pro_id = $pro_id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  if (!$row) {
      echo "Product not found";
      exit();
  }
  ?>
  <body>
    <div class="wrapper">
      <div class="product-img">
        <img src="image/<?=$row['pro_pic']; ?>" height="420px" width="420px">
      </div>
      
      <div class="product-info">
        <div class="product-text">
          <h1><?= htmlspecialchars($row['pro_name']); ?></h1>
          <h2>by 2 HAND ELECTRONICS</h2>
          <p>รายละเอียด <?= htmlspecialchars($row['pro_detail']); ?></p>
        </div>
        <div class="product-price-btn">
          <p><span>฿ <?= number_format($row['pro_price'], 2); ?></span></p>
            
        </div>
      
        
            <a href="index.php" class="btn">หน้าแรก<span>&#8594;</span></a>
      </div>
      

    </div>
  </body>

</html>