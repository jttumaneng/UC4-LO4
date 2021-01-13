<?php

// connect to the database
	$conn = mysqli_connect('localhost', 'jian', 'test1234', 'student_roster');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
    }
    
    ?>