<?php 
	
	session_start();
	if (isset($_SESSION['username']))
	{
	
	}else {
		header("Location: login.php");
		exit();
	}	
	echo "</br>".$_SESSION['username'];

?>	
<!DOCTYPE html>
<html>
<body>
<a href="logout.php">logout</a>
</body>
</hitml>


