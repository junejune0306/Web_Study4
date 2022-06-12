<?php
	session_start();
	$_SESSION['save'][0] = $_SESSION['count'];
	$_SESSION['save'][1] = $_SESSION['ans'];
	$_SESSION['save'][2] = $_SESSION['f'];
	$_SESSION['save'][3] = time();
	header('Location: ./main.php');
?>
