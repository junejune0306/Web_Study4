<?php
	session_start();
	$_SESSION['count'] += $_SESSION['ans'] + $_POST['input'];
	if ($_SESSION['count'] > 30) { //if player lose
		$_SESSION['f'] = 2;
		$_SESSION['ans'] = 0;
	}
	else { //if player not lose
		if ($_SESSION['count'] % 4 == 2) { //claculate cpu answer
			$_SESSION['ans'] = $_SESSION['count'] % 3 + 1;
		}
		else {
			$_SESSION['ans'] = 4 - ($_SESSION['count'] + 2) % 4;
		}
		if ($_SESSION['count'] + $_SESSION['ans'] > 30) { //if player win
			$_SESSION['f'] = 1;
		}
	}
	header('Location: ./main.php');
?>
