<?php
$dbHost ="localhost";
$dbUser ="root";
$dbPass= "";
$dbName ="vietproshop";
$connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if(isset($connect)){
	$setLang=mysqli_query($connect,"SET NAMES 'utf8' ");
}
else{
	die("kết nối thất bại!".mysqli_connect_error());
}



?>
