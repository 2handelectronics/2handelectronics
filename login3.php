<?php
    
    session_start();
	
    if(isset($_POST['username'])) {
      
      include('connection.php');

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = "SELECT * FROM user1 WHERE username = '$username' AND password ='$password'";

      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_array($result);

        $_SESSION ['userid'] = $row['id'];
        $_SESSION ['user'] = $row['mem_name'];
        $_SESSION ['status'] = $row['status'];

        if ($_SESSION ['status'] == 'admin') {
          header("Location: admin_page.php");
        }
        if ($_SESSION ['status'] == 'member') {
          header("Location: user_page.php");
        } else {
          echo "Username หรือ Password ไม่ถูกต้อง";
        }
      }

      else {
        header("Location: index.html");
      }
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css
" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
    </nav>
    <h3 align="center"> Login </h3>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js
" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js
" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-md-offset-4">
        <form class="form-horizontal" action="" method="POST">
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="username" class="form-control" id="username" placeholder="username" name="username">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="password" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <h3 align="center">
                <button type="submit" class="btn btn-default" name="submit">Sign in</button></h3>
              </div>
            </div>
        </form>
  <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
  </div>
  </body>
</html>