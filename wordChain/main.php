<?php
	session_start();
	if(!isset($_SESSION['start'])) { //default setting
		$_SESSION['start'] = 1;
		$_SESSION['words'] = array('시작');
		$_SESSION['score'] = 0;
		if(!isset($_SESSION['save'])) $_SESSION['save'] = array(array(), 0, 0); //words, score, time
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>끝말잇기</title>
		<link rel="stylesheet" href="./main.css">
	<head>
	<body>
                <form method="post" action="./reset.php">
                        <input id="resetbtn" class="btn" type="submit" value="Restart">
                </form>
		<form method="post" action="./save.php">
			<input id="savebtn" class="btn" type="submit" value="save">
		</form>
<?php if (time() - $_SESSION['save'][2] <= 600) { ?>
		<form method="post" action="./load.php">
			<input id="loadbtn" class="btn" type="submit" value="<?php echo 'load: '.($_SESSION['save'][1] + 1).' '.$_SESSION['save'][0][$_SESSION['save'][1]]; ?>">
		</form>
<?php } ?>
		<center><br><br>
		<h1>끝말잇기</h1>
		<div id='div'>
			<table><?php //tr을 생성하고 $_SESSION['words']의 단어들을 마지막 인덱스부터 자례대로 집어넣는다
				for ($i = $_SESSION['score']; $i >= 0; $i--) {
					echo "<tr><td>".($i + 1)."</td><td>".$_SESSION['words'][$i]."</td></tr>";
				}
			?></table>
		</div>
		<br><br>
		<div><?php echo mb_substr($_SESSION['words'][$_SESSION['score']], 0, -1, 'UTF-8')."<span>".mb_substr($_SESSION['words'][$_SESSION['score']], -1, 1, 'UTF-8')."</span>"; //last word?> -> 
		<form id="input" method="post" action="./process.php">
			<input type="text" id="word" name="word" maxlength="20" autocomplete="off" autofocus <?php echo 'value="'.$_SESSION['word'].'"'; //if wrong, keep input?>>
		</form><br><br>
		</div>
	</center></body>
</html>
