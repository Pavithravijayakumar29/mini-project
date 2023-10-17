<?php
	include "config.php";
	if(isset($_GET['deletesno']))
	{
		$deletesno=$_GET['deletesno'];
		$sql="delete from category where (c_id=$deletesno)";
		$result=mysqli_query($config,$sql);
		if($result)
		{
			header("Location: category.php");
		}
		else
		{
			echo "Updated Failed";
		}
	}
?>