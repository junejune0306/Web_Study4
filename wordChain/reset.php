<?php
	session_start();
	$save = $_SESSION['save'];
	session_destroy();
	session_start();
	$_SESSION['save'] = $save;
	header('Location: ./main.php');
?>
