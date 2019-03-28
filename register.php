<?php
//
session_start();
// This is a very small sample register page. The user will fill out their information
// on the form. When they click the submit button, the data will be inserted into the database.
$usernameErr = "";
$username = "";
$studentidErr = "";
$studentid = "";
$first_nameErr = "";
$first_name = "";
$last_name = "";
$last_nameErr = "";
$passwordErr = "";
$password = "";




if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $studentid = $_POST['studentid'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
   
  
  if (empty($username) || strlen($username) < 3 ) 
      $usernameErr = "Username is required, at least 3 chars";

  if (empty($first_name)) {
      $first_nameErr = "First name required";
  }
  
  if (empty($last_name)) {
      $last_nameErr = "Last name required";
  }                    
         
  if (empty($studentid) || strlen($studentid) != 7 ) {
      $studentidErr = 'Sorry you did not enter a correct Student ID! ';
  }   

  if (empty($password) || strlen($password) < 6 || strlen($password) > 10) { 
      $passwordErr = 'password is too short!';
  }    

  if (empty($usernameErr) and empty ($studentidErr) and empty($passwordErr)){     
    
    try {
        $host = '127.0.0.1';
        $dbname = 'wdtest';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
    
        # MySQL with PDO_MYSQL
    
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
   

    $sql = "INSERT INTO users (username, password, studentid, first_name, last_name) VALUES (?, ?, ?, ?, ?);";
    $sth = $DBH->prepare($sql);
    
    $sth->bindParam(1, $username);
    $sth->bindParam(2, $password);
    $sth->bindParam(3, $studentid);
    $sth->bindParam(4, $first_name);
    $sth->bindParam(5, $last_name);
    
    $sth->execute();
    $_SESSION["username"] = $username;
    $_SESSION["studentid"] = $studentid;
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    header('Location:  student.php');
    exit();
    
    echo 'You are now registered!';
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
<h2> Registration Form</h2>
<form class='form-style' action="register.php" method="post">
Username <input type="text" name="username" value="<?php echo $username; ?>"/>
        <span class = "error"><?php echo $usernameErr;?></span>
First Name <input type="text" name="first_name" value="<?php echo $first_name; ?>"/>
        <span class = "error"><?php echo $first_nameErr;?></span> 
Last Name <input type="text" name="last_name" value="<?php echo $last_name; ?>"/>
        <span class = "error"><?php echo $last_nameErr;?></span>                
Student ID <input type="text" name="studentid" value="<?php echo $studentid; ?>">
      <span class = "error"><?php echo $studentidErr;?></span>
Password <input type="password" name="password" value="<?php echo $password ?>">
      <span class = "error"><?php echo $passwordErr;?></span>
      <input type="submit" class='button' name='submit' value= 'Register'/>
</form>
</body>
</html>