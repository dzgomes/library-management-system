<?php
  session_start();
  if (isset($_SESSION['username']))
  {
  }else {
    header("Location: login.php");
    exit();
  } 
  include('includes/studentheader.php'); 
  echo "</br>".$_SESSION['username'];
  echo "</br>";
  echo "</br>";

// create the connection
  include('includes/db.php');

  $today_date = $_POST['today_date'];
  $studentid = $_SESSION['studentid'];
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];
  $title = $_SESSION['title'];
  $author = $_SESSION['author'];
  $isbn = $_SESSION['isbn'];



  include ('includes/week.php');


  




  $sql = "SELECT * FROM student_checkout WHERE isbn LIKE '%" . $isbn . "%'";
  $stmt = $DBH->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($isbn != $rows['isbn']) {
      $sql = "INSERT INTO student_checkout (student_fname, student_lname, book_title, book_author, isbn, student_id, due_date) VALUES (?, ?, ?, ?, ?, ?, ?);";
      $sth = $DBH->prepare($sql);

      $sth->bindParam(1, $first_name);
      $sth->bindParam(2, $last_name);
      $sth->bindParam(3, $title);
      $sth->bindParam(4, $author);
      $sth->bindParam(5, $isbn);
      $sth->bindParam(6, $studentid);
      $sth->bindParam(7, $weekstr);


      $sth->execute();
      header('Location:  student.php');

    } else {
      echo "Book is not available";

    }
    exit();


?>  

 <!DOCTYPE html>  
 <html>  
      <head>  





      </body>  
 </html>
