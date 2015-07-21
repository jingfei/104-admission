<?php
session_start();
if(isset($_POST['pw']) && md5(md5(md5($_POST['pw'])))=="ce08f76330db1dbb42e610e6113fcc2d"){
	$_SESSION['user']='admin';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=show_reg.php>';
}
else
	echo "<script>alert('密碼錯誤');location.href='./';</script>";
