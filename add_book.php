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


<?php





	$book_titleErr = "";
	$book_title = "";
	$authorErr = "";
	$author = "";
	$isbn = "";
	$isbnErr = "";

	if($_POST){
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
   
  
	  if (empty($book_title))
	      $book_titleErr = "Insert a valid title";
	  

	  if (empty($author) || strlen($author) < 5) {
	      $authorErr = "Author name too short";
	  }                    
	         
	  if (empty($isbn) || strlen($isbn) != 9 ) {
	      $isbnErr = 'ISBN not valid';
	  
	  } 
	


	  if (empty($book_titleErr) and empty($authorErr) and empty($isbnErr)){

	  	try {
        $host = '127.0.0.1';
        $dbname = 'wdtest';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
    
        # MySQL with PDO_MYSQL
    
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
   

	    $sql = "INSERT INTO librarybooks (title, author, isbn) VALUES (?, ?, ?);";
	    $sth = $DBH->prepare($sql);
	    
	    $sth->bindParam(1, $book_title);
	    $sth->bindParam(2, $author);
	    $sth->bindParam(3, $isbn);

	    
	    $sth->execute();
	    echo "</br>";
	    echo "</br>";
	    echo 'Book Addeed!';
	    
	    exit();
	    header('Location: add_book.php');
     
    	
     } catch(PDOException $e) {echo 'Error' . $e;} 

  } 
}
 



?>

<!DOCTYPE>
<html>
<head>
  <link rel="stylesheet" href="style.css">
    <style>
  .error {display: block;color: #FF0000; }
  </style>
</head>
<body>
<h2> Add a book</h2>
<form class='form-style' action="add_book.php" method="post">
Book Title<input type="text" name="book_title" value="<?php echo $book_title; ?>"/>
        <span class = "error"><?php echo $book_titleErr;?></span> 
Author <input type="text" name="author" value="<?php echo $author; ?>"/>
		<span class = "error"><?php echo $authorErr;?></span>            
ISBN <input type="text" name="isbn" value="<?php echo $isbn; ?>">
		<span class = "error"><?php echo $isbnErr;?></span>
      <input type="submit" class='button' name='submit' value= 'Add new book'/>
</form>
</body>
</html>