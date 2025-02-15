<style>
<?php include 'css/bgcolor.css'; ?>
</style>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <?php

  session_start(); 

  if (!isset($_SESSION['userid'])) { 
      $_SESSION['msg'] = "You have to log in first"; 
      header('location: login.php'); 
  } 

  if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['userid']); 
    header("location: login.php"); 
} 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>2 HAND ELECTRONICS</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/bgcolor.css">
  </head>
  <body>
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="user_page.php">2 HAND ELECTRONICS</a>
          </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="contact.php">ติดต่อเรา</a></li>
            <li><a href="how_to.php">วิธีการสั่งซื้อ</a></li>
            <li><a href="user_page.php">สินค้าทั้งหมด</a></li>
            </ul>
        </li>
        </ul>
      </ul>
       <?php include("connection.php") ?>
        <?php  
            $sql="SELECT*FROM user1 order by id DESC";
            $result=$con ->query($sql);
            ($rs=$result ->fetch_object());
            
          ?>
      <form class="navbar-form navbar-left" action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="ค้นหาสินค้า....." name="textsearch">
        </div>
        <button type="submit" class="btn btn-default" name="cmdsearch" value="ค้นหาสินค้า">ค้นหา</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      
          <li><a href="#">รหัสลูกค้า :<?php echo$_SESSION['userid'];?></a></li>
          <li class="active"><a href="show_user.php?id=<?=$rs->id ; ?>"><?php echo$_SESSION['user'];?><span class="sr-only">(current)</span></a></li>  
          <li><a href="order_product.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">ออกจากระบบ</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <div id="carousel-id" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item">
          <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="image/promote007.png" width="100%" height="100%" >
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <div class="item">
          <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="image/promote02.jpg" width="100%" height="100%" >
          <div class="container">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <div class="item active">
          <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="image/promote03.png" width="100%" height="100%" >
          <div class="container">           
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
      <h1><font color="Black">วิธีการ</font><font color="FF6600">สั่งซื้อ</font></h1>
        <center><img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="image/how.jpg" width ="60%">
          <center><img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="image/paay.png" width ="60%">
  </body>
</html>
