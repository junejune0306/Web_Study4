<?php
	if ($_COOKIE['login'] == 'notAdmin') echo "<script>alert('Your IP: ".$_SERVER['REMOTE_ADDR']." you are not admin');</script>";
	else echo $_COOKIE['login'];
?>
<html>
	<head>
		<title> web4 tr1 22김민재 </title>
	</head>
	<body>
		<form method="get" action="./compare.php">
		<table border="1px">
			<tr>
                                <td>CAT-LOGIN
                                </td>
			</tr>
                        <tr>
                                <td>
					<input type="text" name="id"/>
                                </td>
                        </tr>
                        <tr>
                                <td>
					<input type="password" name="psw"/>
                                </td>
                        </tr>
                        <tr>
                                <td>
					<input type="submit" value="입력"/>
                                </td>
                        </tr>
		</table>
		</form>
	</body>
</html>
