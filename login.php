<?php 
	
	session_start();
	if ($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		

	try {
        $host = '127.0.0.1';
        $dbname = 'wdtest';
        $user = 'root';
        $pass = '';
		$port=3306;
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $user, $pass);
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$q = $DBH->prepare("SELECT * FROM users WHERE username = :username and password = :password LIMIT 1");
		$q->bindValue(':username', $username);
		$q->bindValue(':password', $password);
		$q->execute();
		
		$row = $q->fetch(PDO::FETCH_ASSOC);
		 
		//returns table row(s) as an associative array
		//of values column names to data values
		//Array ( [id] => 1 [username] => seaanc 
		//        [email] => 12345 [password] => 12345 [date] => 2017-10-05 14:06:07 )
		$message = '';


		if (!empty($row)){ //is the array empty
			$username = $row['username'];
			$password = $row['password'];
			$studentid = $row['studentid'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$type = $row['type'];
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			$_SESSION["studentid"] = $studentid;
			$_SESSION["first_name"] = $first_name;
			$_SESSION["last_name"] = $last_name;
			$_SESSION["type"] = $type;

			header('Location:  student.php');

		}

		if ($_SESSION['type'] == 1) {
			header('Location:  adm_index.php');
			exit();



		} else {
		    $message= 'Sorry your log in details are not correct';
		}
	} catch(PDOException $e) {echo $e->getMessage();}
}
?>	


<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="style.css">
    <style>
	.error {display: block;color: #FF0000; }
	</style>
</head>
<body>
<!-- <script src="welcome/welcome.js"> -->
</script>

	<h2>Login</h2><br></br>

<form class='form-style' action="login.php" method="post">

	Username <input type="text" name="username"/>  
	Password <input type="password" name="password"/>
	<input type="submit" name="submit" value="Login" class='button'/>
	<input type="button" name="register" value="Register" class= 'button' onclick="window.location.href='register.php'" />

<?php

	if(!empty($message)){  
	echo '<br>';
	echo $message;
}

?>

</form>
</body>
</hitml>