<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="init.css" />
		<link rel="shortcut icon" type="image/png" href="icons/icon16.png" />
	</head>
	<body>
		<?php if(file_exists("_credentials.php")){ //The file is considered "initialized" if and only if the "_credentials.php" file exists.?>
		<div id="info">
			Application initialized. <br />
			Click <a href="../index.php">here</a> to use the application,<br />
			Or delete "_credentials.php" file and <a href="init.php" >refresh page</a> to re-initialize.
		</div>
		<?php }else{ ?>
		<form id="info" action="init_write.php" method="post"></td><td>
		<h3>PHP Deploy</h3>
		<h4>Enter your Database Credentials below:</h4>
			<table>
			<tr><td>Host:</td><td><input name="db_host" type="text" placeholder="Database Host"></input></td></tr>
			<tr><td>Database:</td><td><input name="db_name" type="text" placeholder="Database Name"></input></td></tr>
			<tr><td>Username:</td><td><input name="db_user" type="text" placeholder="Database User Name"></input></td></tr>
			<tr><td>Database Password:</td><td><input name="db_pw" type="password" placeholder="Database Password"></input></td></tr>
			<tr><td>Overwrite Existing Data:</td><td><input name="db_overwrite" type="checkbox" checked></input></td></tr>
			<tr><td><input type="submit" value="Submit Credentials"></input></td></tr>
			</table>
		</form>
		<?php } ?>
	</body>
</html>