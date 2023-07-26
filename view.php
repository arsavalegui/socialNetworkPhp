<?php 
	
	session_start();

	include("connection.php");
	//include("functions.php");

	//$userData = checkLogin($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Website</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<div class="segment">
							
		<h1>View image</h1>	

		<?php 
			include("getImage.php");
			echo "Hello, ".$userData['nombre'];

		?>

		<a href="index.php">Regresar</a>

	</div>						
</body>
</html>