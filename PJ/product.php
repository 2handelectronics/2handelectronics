<?php
ob_start();

require "connection.php";

$id =  $_REQUEST['userid'];

if (isset($_POST['submit'])) {
    $oname = $_POST['oname'];
    $oadd = $_POST['oadd'];
    $oemail = $_POST['oemail'];
    $ophone = $_POST['ophone'];

    $sql = "INSERT INTO orders (o_id, userid, oname, oadd, oemail, ophone)
VALUES (NULL, '$id', '$oname', '$oadd', '$oemail', '$ophone')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Succes');window.location='user_page.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

?>