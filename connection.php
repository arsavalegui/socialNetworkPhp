<?php
	
	$dbhost = "localhost";
	$dbuser = "id18936904_root";
	$dbpass = "MLwKL3coj?E~1CTR";
	$dbname = "id18936904_usuarios";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if(!$connection){
		die("Connection failed");
	}

?>