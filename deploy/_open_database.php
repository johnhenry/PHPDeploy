<?php require_once("_credentials.php"); ?>
<?php
		$con = mysql_connect("$db_host","$db_user","$db_pw");
		if (!$con) die('Could not connect: ' . mysql_error());
		$db_selected = mysql_select_db("$db_name") or die( "Unable to select database");
		if (!$db_selected) die ("Can\'t use $db_name : " . mysql_error());
?>