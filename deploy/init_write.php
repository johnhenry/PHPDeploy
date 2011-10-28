<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="init.css" />
		<link rel="shortcut icon" type="image/png" href="icons/icon16.png" />
	</head>
	<body>
		<div id="info">
			<ul>
<?php
//These are the Database Credentials
$db_host = $_POST["db_host"];
$db_name = $_POST["db_name"];
$db_user = $_POST["db_user"];
$db_pw = $_POST["db_pw"];

$db_overwrite = isset($_POST["db_overwrite"]) ? true : false;

$con = mysql_connect($db_host,$db_user,$db_pw);//Open the connection to the database using credentials.
		if (!$con){
			die("Error: Could not connect to database: ".mysql_error());
		}else{
			$db_selected = mysql_select_db("$db_name");
		
			if (!$db_selected){
				die ("Error: Cannot use database \"$db_name\": ".mysql_error());
 			}else{
				//This section creates the tables to be used within the application's database.
				require("_init_tables.php");
				foreach($tables as $query){
?>
<li>
<?php
					$name_start = 13;
					
					$name_end = strpos($query,"(") - 2;
					$name = substr($query, $name_start, $name_end - $name_start) ;
					if($db_overwrite){
						mysql_query("DROP TABLE $name"); 
					}

					if(!mysql_query($query)){
						die ("Error: Could not create table: ".mysql_error());
					}else{
						echo "Table \"$name\" created.";
					}
				}
?>
</li>
<?php
				//This section creates the directories for the application.
				require("_init_directories.php");
				foreach($directories as $dir){
				$original_length = strlen($dir);
				$dir = "../$dir/";
				
?>
<li>
<?php
					if($db_overwrite){
						if(!is_dir($dir)){
							mkdir($dir,0777,true);
						}
						$mydir = opendir($dir);
						while(false !== ($file = readdir($mydir))) {
							if($file != "." && $file != "..") {
								chmod($dir.$file, 0777);
								if(is_dir($dir.$file)) {
									chdir('.');
									destroy($dir.$file.'/');
									rmdir($dir.$file) or DIE("couldn't delete $dir$file<br />");
								}
								else
									unlink($dir.$file) or DIE("couldn't delete $dir$file<br />");
							}
						}
						$dir = substr($dir,3,$original_length);
						echo "Directory \"$dir\" created.";
					}
?>
</li>
<?php
				}
				//This section creates the "credentials" file
				$fp = fopen("_credentials.php", "w"); 
				$credentials = "<"."?php \n";
				$credentials .= "$"."db_host = '$db_host';\n";
				$credentials .= "$"."db_name = '$db_name';\n";
				$credentials .= "$"."db_user = '$db_user';\n";
				$credentials .= "$"."db_pw = '$db_pw';\n";
					$sv_loc = pathinfo($_SERVER['PHP_SELF']);
					$sv_loc = $sv_loc['dirname'];
					$len = strlen($sv_loc) - 7;//Removes "deploy/" from end.
					$sv_loc = $sv_loc = substr($sv_loc,0,$len);
					if(substr($sv_loc,strlen($sv_loc)-1,1) != "/") $sv_loc .= "/";
				$credentials .= "$"."sv_loc = '$sv_loc';\n";
				$credentials .= " ?".">";
				fwrite($fp, $credentials); 
				fclose($fp);
			}
		}
		mysql_close($con);
?>
		</ul>
	Application initialized.<br />
	Click <a href="../index.php">here</a> to start.
	</div>
</body>
</html>