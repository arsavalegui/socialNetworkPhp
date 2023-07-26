<?php 

	session_start();

	include("connection.php");
	include("functions.php");
	include("links.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		//something was posted
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if(!empty($username) && !empty($password) && !is_numeric($username)){

			//read from database
			$query = "SELECT * FROM datos WHERE nombre = '$username'";
			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){

				$userData = mysqli_fetch_assoc($result);

				if(($userData['pass'] === $password) && ($userData['nombre'] === $username)){

					$_SESSION['user_id'] = $userData['user_id'];
					?>
                        <meta http-equiv="refresh" content="0;url=index.php">
                    <?php
				}
				else{

					echo "<script>alert('Incorrect username or password.')</script>";
				}
			}
			else{

				echo "<script>alert('Incorrect username or password.')</script>";
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
	<title>Login</title>
	<link rel="stylesheet" href="style1.css">
</head>
<body>

	<form method="post">
		<div class="segment">
			<h1>Login</h1>
		</div>
		<label>
			<input type="text" name="username" placeholder="Username">
		</label>
		<label>
			<input type="password" name="password" placeholder="Password">
		</label>
		<div class="segment">
			<button type="submit" class="blue"> Ok </button>
		</div>
		<button type="button" class="red">
			<a href="signup.php">Signup</a>
		</button>
	</form>

</body>
</html>