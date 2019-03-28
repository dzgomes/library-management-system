<?php
	session_start();
	if (isset($_SESSION['username']))
	{
	}else {
		header("Location: login.php");
		exit();
	}	
	include('includes/adm_header.php'); 
	echo "</br>".$_SESSION['username'];
	echo "</br>".$_SESSION['type'];
// create the connection
	include('includes/db.php');

	if ($_SESSION['type'] == 0) {
  	header('Location:  student.php');
  }


// select the correct table
	$stmt = $DBH->prepare("SELECT * FROM librarybooks");
	$stmt->execute();
?>


<!DOCTYPE html>
<html>
<body>

<h2>Admin Area</h2>
   

   Welcome to the library



</body>
</hitml>