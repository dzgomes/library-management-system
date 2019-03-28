<?php 
		
	session_start();

	// create short variable names
    
	if (isset($_SESSION['username']))
	{
	}else {
		header("Location: login.php");
		exit();

	}

	include('includes/studentheader.php'); 
	echo "</br>".$_SESSION['username'];


  ?>


<!DOCTYPE html>
<html> 
<head>
    <link rel="stylesheet" href="style.css">
	<h1>Student Library Results</h1> 
<body>
  	<?php 
  	$searchterm=trim($_POST['searchterm']);
  	// $_POST['today_date'] = $today_date;


  	try {
        $host = '127.0.0.1';
        $dbname = 'wdtest';
        $user = 'root';
        $pass = '';
		$port=3306;
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $DBH->prepare("SELECT * FROM librarybooks WHERE title LIKE '%" . $searchterm . "%'");
		$q->execute();
		 
		$row = $q->fetch(PDO::FETCH_ASSOC);


		
		$message = '';
		if (!empty($row)){ //is the array empty
			$title = $row['title'];
			echo $title . " | ";
			$author = $row['author'];
			echo $author . " | ";
			$isbn = $row['isbn'];
			echo $isbn . " | ";
			$_SESSION["title"] = $title;
    		$_SESSION["author"] = $author;
    		$_SESSION["isbn"] = $isbn;
		} else {
		    $message= 'No books found';
		    echo $message;
		    exit();
		}
		} catch(PDOException $e) {
			echo $e->getMessage();
	}


  ?>
  	</br>
  	</br>
  	<form name="Date"  action="checkoutbook.php" method= "post">
  		<input type="date" name="today_date" value="<?php echo date('Y-m-d'); ?>" />
  		<input type="submit" class='button' name='submit' value= 'Check Out'/>

  	
  	</br>
  	</br>	
  	  <input type="button" name="back" value="Back" class= 'button' onclick="window.location.href='search.php'" />
  	
  		





</body>
</html>