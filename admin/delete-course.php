<?php 
session_start();
if (isset($_SESSION['user_login'])) {
	$id = base64_decode($_GET['id']);
	if(mysqli_query($db_con,"DELETE FROM `course_information` WHERE `course_id` = '$id'")){
		header('Location: index.php?page=all-course&delete=success');
	}else{
		header('Location: index.php?page=all-course&delete=error');
	}
}else{
	header('Location: login.php');
 }