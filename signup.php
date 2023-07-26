<?php 
	
	session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		//something was posted
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if(!empty($username) && !empty($email) && !empty($password) && !is_numeric($username)){

			//read from database
			$query = "SELECT * FROM datos WHERE email = '$email'";
			$result = mysqli_query($connection, $query);

			if(!($result && mysqli_num_rows($result) > 0)){

				//save to database
				$user_id = randomNum(15);	
				$dataTime = date("Y-m-d H:i:s");
				$query = "INSERT INTO datos(nombre, user_id, pass, userCreated, email) VALUES('$username', '$user_id', '$password', '$dataTime', '$email');";
				
				if(mysqli_query($connection, $query)){

					echo "<script>alert('User saved correctly, please login.')</script>";				
				}
				else{
					echo "<script>alert('There was an error with the query.')</script>";				
				}
			}
			else{

				echo "<script>alert('The email direction already exist.')</script>";				
			}
		}
		else{

			echo "<script>alert('Please enter some valid information.')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Signup</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>

	<form method="post">
		<div class="segment">
			<h1>Signup</h1>
		</div>
		<label>
			<input type="text" name="username" placeholder="Username">
		</label>
		<label>
			<input type="text" name="email" placeholder="Email">
		</label>
		<label>
			<input type="password" name="password" placeholder="Password">
		</label>
		<div class="segment">
			<button type="submit" class="blue"> Ok </button>
		</div>
		<button type="button" class="red">
			<a href="login.php">Login</a>
		</button>
	</form>

</body>
</html>