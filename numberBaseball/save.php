<?php
	session_start();
	$_SESSION['save'][0] = $_SESSION['nd'];
	$_SESSION['save'][1] = $_SESSION['ad'];
	$_SESSION['save'][2] = $_SESSION['count'];
	$_SESSION['save'][3] = $_SESSION['s'];
	$_SESSION['save'][4] = $_SESSION['answer'];
	$_SESSION['save'][5] = time();
	header('Location: ./main.php');
?>
