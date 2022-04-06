<?php
	$conn = mysqli_connect("localhost", "root", "root", "Group1");

	// Check connection
	if($conn === false){
            
        die("Connection failed: " . mysqli_connect_error());
	}

?>