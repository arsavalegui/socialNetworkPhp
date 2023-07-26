<?php 
	
	session_start();

	include("connection.php");
	include("links.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>My images</title>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

	<!-- Navbar-->
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link" aria-current="page" href="index.php">Show all images</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="#">My images</a>
		</li>
		<li>
			<a class="nav-link" href="logout.php">Logout</a>
		</li>
		<?php 
      		$id = $_SESSION['user_id'];

      		$consulta = "SELECT * FROM datos WHERE user_id = '$id' limit 1";
			$resultado = mysqli_query($connection, $consulta);

			$userData = mysqli_fetch_assoc($resultado);

      	?>
      	<li>
      	    <a class="nav-link">Hello <?php echo $userData['nombre']; ?></a>
      	</li>
	</ul>   	

	<!-- Get images -->
	<div class="segment">
		<div class="container">
			<div class="row">
				<?php  
					include("getImage.php");
				?>	
			</div>
		</div>
	</div>

	<!-- Save images -->
	<div class="image">
		<div class="container">
			<h2>Upload new card image.</h2>
			<div class="row">
				<?php  
					if(isset($_REQUEST['save'])){

						$id = $_SESSION['user_id'];
						$query = "SELECT * FROM datos WHERE user_id = '$id' limit 1";

						$result = mysqli_query($connection, $query);

						if(!(($_FILES['image']['name']) == FALSE)){

							$type = $_FILES['image']['type'];
							$name = $_FILES['image']['name'];
							$size = $_FILES['image']['size'];
							$textImage = $_POST['text'];

							$uploadedFile = fopen($_FILES['image']['tmp_name'], 'r');
							$image = fread($uploadedFile, $size);

							$imageCorrect = mysqli_escape_string($connection, $image);

							$dataTime = date("Y-m-d H:i:s");
							$id_image = randomNum(15);
							$get_user_id = $userData['idUser'];

							$query = "INSERT INTO images(image, imageName, imageType, created, id_image, idUser, texto) VALUES('$imageCorrect', '$name', '$type', '$dataTime',   '$id_image', '$get_user_id', '$textImage')";
					        $result = mysqli_query($connection, $query);

					        if($result){
					            echo "<script>Swal.fire('File uploaded correctly');</script>";
					             ?>
									<meta http-equiv="refresh" content="2;url=myImages.php">
					            <?php
					        }else{
					            echo "<script>Swal.fire('File uploaded failed, please try again.');</script>";
					        } 

						}
						else{
							echo "<script>Swal.fire('Please select a file.')</script>";
						}
					}
				?>
				<form method="post" enctype="multipart/form-data" class="formImage">
			        <input type="file" name="image"/> <br>
			        <input type="text" name="text" placeholder="Description for your image"> <br> 
			        <button class="btn btn-primary" type="submit" name="save" value="Upload">Upload</button>
				</form>
			</div>
		</div>
	</div>	



	<!-- Modal -->
	<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel">Image of <?php echo $userData['nombre'] ?></h5>
		      	</div>
		      	<div class="modal-header">
		      		<p>Here you can chance your card information.</p>
		      	</div>
		      	<?php  
		      		if(isset($_REQUEST['saveTextCard'])){
		      			
		      			$textCard = $_POST['textCard'];

		      			if(!empty($textCard)){
		      				
		      				$query1 = "SELECT * FROM images";
		      				$result1 = mysqli_query($connection, $query1);
		      				
		      				$imgData = mysqli_fetch_assoc($result1);

		      				//$a = $imgData['id_image'];

		      				echo "<script>Swal.fire('')</script>";


							$query = "UPDATE images SET texto = '$textCard' WHERE id_image = '$id'";
		      			}
		      			else{
							echo "<script>Swal.fire('The text area its empty.')</script>";
		      			}
		      		}
		      	?>
		      	<form method="post">
			    	<div class="modal-body">
			    		<label>
			    			<input type="text" name="textCard">
			    		</label>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary" name="saveTextCard">Save changes</button>
			      	</div>
		      	</form>
	    	</div>
		</div>
	</div>

	

</body>
</html>