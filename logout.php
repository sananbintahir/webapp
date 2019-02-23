<?php
session_start();
if (isset($_SESSION['User_Name']) && isset($_SESSION['Password'])){
	$_SESSION = array();
	setcookie(session_name(),"",time()-1,"/");
	session_destroy();
	header('Location:./projct.php');
}else{
	exit("Please log in first. <a href='./projct.php'>return</a>");
}
?>