<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	if(mysqli_query($db_con,"DELETE FROM `department_info` WHERE `department_info_id` = '$id'")){
		header('Location: index.php?page=all-department&delete=success');
	}else{
		header('Location: index.php?page=all-department&delete=error');
	}
}else{
	header('Location: login.php');
 }