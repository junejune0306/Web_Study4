<?php
	session_start();
	$_SESSION['count'] = $_SESSION['save'][0];
	header('Location: ./main.php');
?>
