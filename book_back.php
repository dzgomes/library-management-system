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

  echo "</br>";
  echo "</br>";

// create the connection
  include('includes/db.php');


  $checkout_id = $_SESSION['checkout_id'];


  if ($_SESSION['type'] == 0) {
  header('Location:  student.php');
  }



  include ('includes/week.php');


  




  $sql = "DELETE  FROM student_checkout WHERE checkout_id LIKE '%" . $checkout_id . "%'";
  $stmt = $DBH->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Book checked back";
    exit();


?>  

 <!DOCTYPE html>  
 <html>  
      <head>  





      </body>  
 </html>
