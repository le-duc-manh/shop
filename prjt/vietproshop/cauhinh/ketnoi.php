<?php 
$dbHost='localhost';
$dbUser='root';
$dbPass='';
$dbName='vietproshop';
$conn=mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(isset($conn)){
	$setLang= mysqli_query($conn, "SET NAMES 'utf8' ");
}
else{
	die("kết nối thất bại".mysqli_connect_error());
} ?>
