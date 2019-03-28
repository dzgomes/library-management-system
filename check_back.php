<?php 
	include('includes/adm_header.php'); 
    


?>




<?php 
		
	session_start();
	if (isset($_SESSION['username']))
	{
	}else {
		exit();
	}	

	echo "</br>".$_SESSION['username'];


	if ($_SESSION['type'] == 0) {
  	header('Location:  student.php');
    }

	?>
	<h2>Books</h2>



 <?php
// create the connection
	include('includes/db.php');
// select the correct table
	$stmt = $DBH->prepare("SELECT * FROM student_checkout");
	$stmt->execute();
// get the rows and put it in a variable
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);




	echo "<table>";
	echo "<tr><th>Check out Id</th><th>Student Id</th><th>Student Name</th><th>Book Title</th><th>Author</th><th>ISBN</th><th>Due Date</th><th>Check Back a Book</th></tr>";
		foreach($rows as $row){ echo "<tr>";
			echo "<td>";
			echo $row['checkout_id'];
			$checkout_id = $row['checkout_id'];
			$_SESSION["checkout_id"] = $checkout_id;
			echo "</td>";
			echo "<td>";
			echo $row['student_id'];
			echo "</td>";
			echo "<td>";
			echo $row['student_fname'];
			echo " ";
			echo $row['student_lname'];
			echo "</td>";
			echo "<td>";
			echo $row['book_title']; 
			echo "</td>";
			echo "<td>";
			echo $row['book_author']; 
			echo "</td>";
			echo "<td>";
			echo $row['isbn'];
			echo "</td>";
			echo "<td>";
			echo $row['due_date'];
			echo "</td>";
			echo "<td>";
			echo "<a href=book_back.php?id=".$row['checkout_id'].">Check Back</a>"; echo "</td>";
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