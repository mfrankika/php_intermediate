<?php
//create session
session_start();
//if you have any users do
if (isset($_SESSION['id']) && empty($_SESSION['id']) == false) {
	
	echo "area restrita";
	 
}else{
	header("location:login.php");
}
	
?>