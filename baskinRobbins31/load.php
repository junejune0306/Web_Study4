<?php
	session_start();
	$_SESSION['count'] = $_SESSION['save'][0];
	$_SESSION['ans'] = $_SESSION['save'][1];
	$_SESSION['f'] = $_SESSION['save'][2];
	header('Location: ./main.php');
?>
