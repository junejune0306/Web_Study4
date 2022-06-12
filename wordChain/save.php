<?php
	session_start();
	$_SESSION['save'][0] = $_SESSION['words'];
	$_SESSION['save'][1] = $_SESSION['score'];
	$_SESSION['save'][2] = time();
	header('Location: ./main.php');
?>
