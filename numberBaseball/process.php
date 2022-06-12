<?php
	session_start();
	$c = ++$_SESSION['count'];
	$s = 0; $b = 0;
	$p = array($_POST['1'], $_POST['2'], $_POST['3']);
	for ($i = 0; $i < 3; $i++) {
		$_SESSION['nd'][] = $p[$i]; //append POSTs to nd
		for ($j = 0; $j < 3; $j++) { //calculate SBO
			if ($_SESSION['answer'][$i] == $p[$j]) {
				if ($i == $j) $s++;
				else $b++;
			}
		}
	}
	for ($i = 0; $i < $s; $i++) //append SBO to ad
		$_SESSION['ad'][] = 's';
	for ($i = 0; $i < $b; $i++)
		$_SESSION['ad'][] = 'b';
	for ($i = 0; $i < 3 - $s - $b; $i++)
		$_SESSION['ad'][] = 'o';
	$_SESSION['s'] = $s;
	header('Location: ./main.php');
?>
