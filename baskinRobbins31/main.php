<?php
	session_start();
	if (!isset($_SESSION['start'])) { //default setting
		$_SESSION['start'] = 0;
		$_SESSION['count'] = 0;
		$_SESSION['ans'] = 0; //cpu answer
		$_SESSION['f'] = 0; //flag
		if (!isset($_SESSION['save'])) $_SESSION['save'] = array(0, 0, 0, 0); //count, ans, f, time
	}
	$count = $_SESSION['count'];
	$ans = $_SESSION['ans'];
	$f = $_SESSION['f'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Baskin Robbins 31</title>
		<link rel="stylesheet" href="./main.css">
	<head>
	<body>
		<form method="post" action="./reset.php">
			<input id="resetbtn" class="btn" type="submit" value="Reset">
		</form>
		<form method="post" action="./save.php">
			<input id="savebtn" class="btn" type="submit" value="Save">
		</form>
<?php if (time() - $_SESSION['save'][3] <= 600) { ?>
		<form method="post" action="./load.php">
			<input id="loadbtn" class="btn" type="submit" value="<?php echo 'Load: '.($_SESSION['save'][0] + $_SESSION['save'][1]); ?>">
		</form>
<?php } ?>
		<center><div id="board">
		<img id="logo" src="./BR31_logo.png">
		<form method="post" action="./process.php">
		<?php //output
			echo 'count: '.$count.'<br>'; //current count value
			echo '<span>cpu</span>: '; //cpu answer
			if ($count) { //if game is in progress
				for ($i = 0; $i < $ans; $i++) {
					if ($i) echo ', ';
					echo ($count + $i + 1);
				}
				echo '<br>';
				echo '<br>count: '.($count += $ans).'<br>'; //fixed count value
			}
			else { //if game started now
				echo 'Your turn.<br>';
			}

			if (!$f) { //if game didn't end
				echo '<button class="nbtn" name="input" value="1">'.($count + 1).'</button>';
				if ($count < 30) echo '<button class="nbtn" name="input" value="2">'.($count + 2).'</button>';
				if ($count < 29) echo '<button class="nbtn" name="input" value="3">'.($count + 3).'</button>';
			}
			else if ($f == 1) { //if win
				echo 'You Win!';
			}
			else { //if lose
				echo 'You Lose!';
			}
		?>
		</form>
		</div></center>
	</body>
</html>
