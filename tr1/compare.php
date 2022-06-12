<?php
	if ($_GET['psw'] == "wnsldj") {//주니어
		if ($_GET['id'] == "admin") {
			if ($_SERVER['REMOTE_ADDR'] == "192.168.2.254") {
				setcookie("login", "Hello CAT-CERT Admin", time() + 3600);
			}
			else {
				setcookie("login", "notAdmin", time() + 3600);
			}
		}
		else setcookie("login", "Hello CAT-CERT", time() + 3600);
	}
	else {
		setcookie("login", "wrong password!", time() + 3600);
	}
	header('Location: ./main.php');
?>
