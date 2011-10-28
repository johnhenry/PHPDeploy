<?php
$tables = 
Array(
"Create TABLE SampleUsers
(
ID int(10) unsigned AUTO_INCREMENT ,PRIMARY KEY(ID),
First_Name varchar(40) ,
Last_Name varchar(40),
Email varchar(40) ,
Enc_Password varchar(40) ,
Enc_Salt varchar(40) ,
Date int(32) unsigned ,
Date_Acc int(32) unsigned ,
Is_Admin int(1) unsigned 
)"
,
"Create TABLE SampleItems
(
ID int(10) unsigned AUTO_INCREMENT ,PRIMARY KEY(ID),
User_ID varchar(40) ,
Name varchar(40),
Amount int(8) unsigned
)"

);
?>
