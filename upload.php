<?php 
	
	/*include("connection.php");
	include("functions.php");

	if(isset($_REQUEST['save'])){

		$id = $_SESSION['user_id'];
		$query = "SELECT * FROM datos WHERE user_id = '$id' limit 1";

		$result = mysqli_query($connection, $query);

		if(!(($_FILES['image']['name']) == FALSE)){

			$type = $_FILES['image']['type'];
			$name = $_FILES['image']['name'];
			$size = $_FILES['image']['size'];

			$uploadedFile = fopen($_FILES['image']['tmp_name'], 'r');
			$image = fread($uploadedFile, $size);

			$imageCorrect = mysqli_escape_string($connection, $image);

			$dataTime = date("Y-m-d H:i:s");
			$id_image = randomNum(15);
			$get_user_id = $userData['idUser'];

			$query = "INSERT INTO images(image, imageName, imageType, created, id_image, idUser) VALUES('$imageCorrect', '$name', '$type', '$dataTime',   '$id_image', '$get_user_id')";
	        $result = mysqli_query($connection, $query);

	        if($result){

	            echo "<script>alert('File uploaded correctly.')</script>";
	           	header("Location: myImages.php.php");
	        }else{

	            echo "<script>alert('File upload failed, please try again.')</script>";
	        } 

		}
		else{
			echo "<script>alert('Please select a file.')</script>";
		}
	}*/
