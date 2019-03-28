<?php 
	include('studentheader.php'); 

?>


<?php 
		
	session_start();
	if (isset($_SESSION['username']))
	{
	}else {
		exit();
	}	

	echo "</br>".$_SESSION['username'];

	?>
	<h2>Books</h2>



 <?php
// create the connection
	include('includes/db.php');
// select the correct table
	$stmt = $DBH->prepare("SELECT * FROM librarybooks");
	$stmt->execute();
// get the rows and put it in a variable
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo "<table>";
	echo "<tr><th>Id</th><th>Title</th><th>Author</th><th>ISBN</th><th>Checkout A Book</th></tr>";
		foreach($rows as $row){ echo "<tr>";
			echo "<td>";
			echo $row['book_id'];
			echo "</td>";
			echo "<td>";
			echo $row['title']; echo "</td>";
			echo "<td>";
			echo $row['author']; echo "</td>";
			echo "<td>";
			echo $row['isbn'];
			echo "</td>";
			echo "<td>";
			echo "<a href=checkoutbook.php?id=".$row['book_id'].">Check Out</a>"; echo "</td>";
			echo "</tr>";
			}
			echo "</table>";
	
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<link rel="stylesheet" href="style.css">

    <?php 

    include 'includes/footer.php'; 

    ?>
	<a href="logout.php">logout</a>
	
	<style>

	</style>
</body>
</hitml>