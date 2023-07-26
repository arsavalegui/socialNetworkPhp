<?php 
	
	session_start();

	include("connection.php");
	include("functions.php");
	include("links.php");

	$userData = checkLogin($connection);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home page</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>
						
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link active" aria-current="page" href="#">Show all images</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="myImages.php">My images</a>
		</li>
		<li>
			<a class="nav-link" href="logout.php">Logout</a>
		</li>
      	<li>
			<p class="nav-link">Hello <?php echo $userData['nombre']; ?> </p>
		</li>
	</ul>   	

	<div class="segment">
		<div class="container">
			<div class="row">
				<?php  
					include("showAllImages.php");
				?>
			</div>
		</div>
	</div>

</body>
</html>