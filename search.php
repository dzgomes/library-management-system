<?php 
  include('includes/studentheader.php'); 

?>

<!DOCTYPE html>

<html>

<head>

  <title>Student Library Search</title>

</head>



<body>

  <h1>Student Library Search</h1>


  <link rel="stylesheet" href="style.css">
  
  <form action="results.php" method="post">

  <p><strong>Enter Search Term:</strong><br />

  <input name="searchterm" type="text" size="40"></p>

  <p><input type="submit" name="submit" value="Search"></p>

  </form>

  <a href="logout.php">logout</a>

</body>

</html>