<?php
	session_start();
	$_SESSION['words'] = $_SESSION['save'][0];
	$_SESSION['score'] = $_SESSION['save'][1];
	header('Location: ./main.php');
?>
