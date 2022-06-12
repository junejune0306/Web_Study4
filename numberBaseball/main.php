<?php
	session_start();
	if (!isset($_SESSION['start'])) { //default setting
		$_SESSION['start'] = 0;
		$_SESSION['nd'] = array(); //number data
		$_SESSION['ad'] = array(); //Strike Ball Out (SBO) data
		$_SESSION['count'] = 0;
		$_SESSION['s'] = 0;
		$arr = array(0,1,2,3,4,5,6,7,8,9);
		shuffle($arr);
		$_SESSION['answer'] = array($arr[0], $arr[1], $arr[2]); //answer
		if (!isset($_SESSION['save'])) $_SESSION['save'] = array(array(), array(), 0, 0, array(), 0); //nd, ad, count, s, answer, time
	}
	$c = $_SESSION['count'];
	$s = $_SESSION['s'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Number Baseball</title>
		<link rel="stylesheet" href="./main.css">
	</head>
	<body>
	<form method='post' action='./reset.php'>
		<input type='submit' id='resetbtn' class='btn' value='Reset'>
	</form>
	<form method='post' action='./save.php'>
		<input id='savebtn' class='btn' type='submit' value='save'>
	</form>
<?php if (time() - $_SESSION['save'][5] <= 600) { ?>
	<form method='post' action='./load.php'>
		<input id='loadbtn' class='btn' type='submit' value='load'>
	</form>
<?php } ?>
	<center>
<?php if ($s == 3 || $c == 10) { 
?>		<div id='alert'><?php
			echo ($s == 3) ? 'YOU WIN!' : 'GAME OVER';
		?><span><br><?php
			echo ($s == 3) ? 'attemps : '.$c : (($c == 10) ? 'answer : '.$_SESSION['answer'][0].$_SESSION['answer'][1].$_SESSION['answer'][2] : '');
		?></span></div><?php } ?>
		<div id='title'>Number Baseball</div>
		<div id='nums'><?php $np = 0; $ap = 0;
			for ($i = 0; $i < $c - 1; $i++) { //already done divs
				for ($j = 0; $j < 3; $j++)
					echo '<div class=\''.$_SESSION['ad'][$ap++].'\'>'.$_SESSION['nd'][$np++].'</div>';
				echo '<br>';
			}
			if ($c > 0) { //current input div
				echo '<span id=\'ans\'>';
				for ($i = 0; $i < 3; $i++)
					echo '<div>'.$_SESSION['nd'][$np++].'</div>';
				echo '<br></span>';
			}
			if ($s < 3 && $c < 10) echo '<span id=\'input\'><div></div><div></div><div></div><br></span>'; //to recieve div
			else if ($c < 10) echo '<div></div><div></div><div></div><br>';
			for ($i = 0; $i < 9 - $c; $i++) //blank divs
				echo '<div></div><div></div><div></div><br>';
		?></div>
	</center></body>
	<?php //recieve post only if game is not over
		if ($s < 3 && $c < 10) { ?>
		<form method='post' action='./process.php' id='sub'><input type='hidden' name='1'><input type='hidden' name='2'><input type='hidden' name='3'></form>
		<?php }
	?>
</html>
<script>
	function dec(div, tmp, c) { //flip, decreasing
		div.style = 'transform: scale(1, ' + tmp + ')';
		if (tmp > 0) setTimeout(dec, 5, div, tmp - 0.05, c);
		else {
			div.className = c;
			setTimeout(inc, 5, div, tmp + 0.05);
		}
	}
	function inc(div, tmp) { //flip, increasing
		div.style = 'transform: scale(1, ' + tmp + ')';
		if (tmp < 1) setTimeout(inc, 5, div, tmp + 0.05);
	}
<?php if ($c > 0) { ?> //set className current input
	var ans = document.getElementById('ans');
	<?php
	for ($i = 0; $i < 3; $i++)
		echo 'setTimeout(dec, 0, ans.childNodes['.$i.'], 1.0, \''.$_SESSION['ad'][$ap++].'\');';
	}
?>
<?php if ($s < 3 && $c < 10) { ?>
	var ptr = 0;
	var list = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]; //not typed number list
	window.addEventListener("keydown", e => { //detect keyboard input
		if (isFinite(e.key)) { //if number, write number
			if (ptr < 3 && list[e.key]) document.getElementById('input').childNodes[ptr++].innerHTML = e.key;
			list[e.key] = 0;
		}
		else if (e.key == 'Backspace' && ptr > 0) { //if backspace, remove current input
			list[parseInt(document.getElementById('input').childNodes[--ptr].innerHTML)] = 1;
			document.getElementById('input').childNodes[ptr].innerHTML = '';
		}
		else if (e.key == 'Enter' && ptr == 3) { //if enter, send POST
			for (var i = 0; i < 3; i++)
				document.getElementById('sub').childNodes[i].value = document.getElementById('input').childNodes[i].innerHTML;
			document.getElementById('sub').submit();
		}
		if (ptr == 0) list = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1]; //reset list if input is empty
	});
<?php } else { ?>
	function end(tmp) {
		document.getElementById('alert').style.color = 'rgba(255, 255, 255, ' + tmp + ')';
		document.getElementById('alert').childNodes[1].style.color = 'rgba(255, 255, 255, ' + tmp + ')';
		document.getElementById('alert').style.backgroundColor = 'rgba(155, 155, 155, ' + (tmp / 2) + ')';
		document.getElementById('alert').style.bottom = (320 + tmp * 50) + 'px';
		if (tmp < 1) setTimeout(end, 10, tmp + 0.03);
	}
	setTimeout(setTimeout, 500, end, 10, 0.01);
<?php } ?>
</script>
