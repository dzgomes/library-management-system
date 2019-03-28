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

	<h1>Checked Out Books</h1> 

<?php
	include('includes/db.php');




			$stmt = $DBH->prepare("SELECT * FROM student_checkout");
			$stmt->execute();
			// get the rows and put it in a variable
			$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo "<table>";
				echo "<tr><th>Student Name</th><th>Book Title</th><th>Author</th><th>ISBN</th><th>Due Date</th></tr>";
			foreach($rows as $row){ echo "<tr>";
				echo "<td>";
				echo $row['student_fname'];
				echo " ";
				echo $row['student_lname'];
				echo "</td>";
				echo "<td>";echo $row['book_title'];
				echo "</td>";
				echo "<td>";
				echo $row['book_author']; echo "</td>";
				echo "<td>";
				echo $row['isbn'];
				echo "</td>";
				echo "<td>";
				echo $row['due_date'];
				echo "</tr>";
				}
				echo "</table>";

		
			

				

	?>

<!DOCTYPE html>
<html> 
<head>
<body>
	<link rel="stylesheet" href="style.css">
	<br>
  	<br>
  	<br>
  	<input type="button" name="back" value="Back" class= 'button' onclick="window.location.href='student.php'" />
    <?php 

    include 'includes/footer.php'; 
    
    ?>
	<a href="logout.php">logout</a>



</body>
</html>