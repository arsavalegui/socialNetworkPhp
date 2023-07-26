<?php
	
	function checkLogin($connection){

		if(isset($_SESSION['user_id'])){

			$id = $_SESSION['user_id'];
			$query = "SELECT * FROM datos WHERE user_id = '$id' limit 1";

			$result = mysqli_query($connection, $query);

			if($result && mysqli_num_rows($result) > 0){

				$userData = mysqli_fetch_assoc($result);
				return $userData;
			}

		}
		else{
            ?>
                <meta http-equiv="refresh" content="0;url=login.php">
            <?php
            
			die;
		}
	}

	function randomNum($length){

		$rnum = "";
		
		if($length < 5){
			$length = 5;
		}

		$len = rand(4, $length);

		for($i=0; $i<$len; $i++){

			$rnum .= rand(0,9);
		}

		return $rnum;
	}