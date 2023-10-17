<?php
	$con=mysqli_connect("localhost","root","","pavithra");

	if($con->connect_error){
        die('connect failed :'.$con->connect_error);
      }

      error_reporting(0);
?>