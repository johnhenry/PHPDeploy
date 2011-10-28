<?php
	require("_credentials.php");
	session_start();
	if(!isset($dont_redirect)){
		if(!isset($_SESSION["user_id"]) ){
			$redirect = $sv_loc;
			$_SESSION["redirect"] = $redirect;
			header("Location: index.php");
		}
	}
	
	if(isset($_SESSION["user_id"])){
		$user_id = $_SESSION["user_id"];
	}
	if(isset($_SESSION["first_name"])){
		$user_name = $_SESSION["first_name"];
	}
	
	
?>