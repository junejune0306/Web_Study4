<?php
	session_start();
	$s = $_SESSION['score'];//마지막 단어의 끝글자와 입력한 단어의 첫글자가 같다면, 또는 한글만 입력되었다면 통과
	if (mb_substr($_SESSION['words'][$s], -1, 1, 'UTF-8') == mb_substr($_POST['word'], 0, 1, 'UTF-8') && preg_match('/^[가-힣]{6,60}$/', $_POST['word'], $m)) {
		$_SESSION['words'][] = $_POST['word'];
		$_SESSION['score']++;
		$_SESSION['word'] = "";
	}
	else $_SESSION['word'] = $_POST['word'];
	header('Location: ./main.php');
?>
