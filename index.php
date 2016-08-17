<?php

session_start();
if(!isset($_SESSION['userid'])) {
	include 'startnl.html'; 
}
 else{
//Abfrage der Nutzer ID vom Login
//$userid = $_SESSION['userid'];
 include 'start.htm'; 
//echo "Hallo User: ".$userid;
 }
?> 


