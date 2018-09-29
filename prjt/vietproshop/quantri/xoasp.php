<?php 
	session_start();
	if($_SESSION['email']=='vietpro.edu.vn@gmail.com' && $_SESSION['mk']=='vietpro.edu.vn'){
	$id_sp=$_GET['id_sp'];
	include_once './ketnoi.php';
	$sql="DELETE  FROM  sanpham  WHERE id_sp ='$id_sp' ";
	$query=mysqli_query($connect,$sql);

	header("location:quantri.php?page_layout=danhsachsp");
}
else{
	header("location: index.php");
}	
 ?>
