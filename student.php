<?php	
	
	include('includes/studentheader.php'); 

?>

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

	<?php 
// create the connection
	include('includes/db.php');
// select the correct table
	$stmt = $DBH->prepare("SELECT * FROM librarybooks");
	$stmt->execute();
?>


<!DOCTYPE html>
<html>
<body>

<h2>Student Area</h2>
   

   Welcome to the library



</body>
</hitml>