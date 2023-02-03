<?php
	error_reporting(0);
	$con= mysqli_connect("localhost","root","","it-pj");
	echo mysqli_connect_error();
	mysqli_set_charset($con,"utf8");
	if(!$con){
		echo "เชื่อมฐานข้อมูลไม่สำเร็จ"."".
		mysqli_connect_error();
	}else
	;
?>