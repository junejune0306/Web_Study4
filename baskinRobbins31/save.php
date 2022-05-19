<?php
	session_start();
	$_SESSION['count'] -= $_POST['ans'];
	$_SESSION['save'][0] = $_SESSION['count'];
	$_SESSION['save'][1] = time();
	header('Location: ./main.php');
?>
