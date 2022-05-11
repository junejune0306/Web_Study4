<?php
	session_start();
	if (!isset($_SESSION['start'])) { //default setting
		$_SESSION['start'] = 0;
		$_SESSION['count'] = 0;
		$_SESSION['save'] = array(0, 0);
		$ans = 0;
		$f = 0;
	}
	else {
		if ($_POST['input']) {
			$_SESSION['start'] = 1;
		}
		$_SESSION['count'] += $_POST['input'];
		if ($_SESSION['count'] > 30) { //if lose
			$f = 2;
		}
		else { //if not lose
			if ($_SESSION['count'] % 4 == 2) { //claculate cpu answer
				$ans = $_SESSION['count'] % 3 + 1;
			}
			else {
				$ans = 4 - ($_SESSION['count'] + 2) % 4;
			}
			if ($_SESSION['count'] + $ans > 30) { //if win
				$f = 1;
			}
		}
	}
?>
<html>
	<head>
		<meta method="utf-8">
		<title>Baskin Robbins 31</title>
	<head>
	<body><center>
		<h1>Baskin Robbins 31</h1>
		<form method="post" action="">
		<?php //output
			echo 'Count: '.$_SESSION['count'].'<br>';//current count value
			echo 'cpu: '; //cpu answer
			if ($_SESSION['start']) { //if game is in progress
				for ($i = 0; $i < $ans; $i++) {
					if ($i) echo ', ';
					echo ($_SESSION['count'] + $i + 1);
				}
				echo '<br>';
				$_SESSION['count'] += $ans;
				echo '<br>Count: '.$_SESSION['count'].'<br>';//fixed count value
			}
			else { //if game started now
				echo 'Your turn.<br>';
			}

			if (!$f) { //if game didn't end
				echo ($_SESSION['count'] + 1).'<input type="radio" name="input" value="1"/>';
				if ($SESSION['count'] < 30) echo ($_SESSION['count'] + 2).'<input type="radio" name="input" value="2"/>';
				if ($SESSION['count'] < 29) echo ($_SESSION['count'] + 3).'<input type="radio" name="input" value="3"/>';
				echo '<br><input type="submit" value="입력">';
			}
			else if ($f == 1) { //if win
				echo 'You Win!';
			}
			else { //if lose
				echo 'You Lose!';
			}
		?>
		</form>
	</center></body>
</html>
