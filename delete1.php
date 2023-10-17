<?php
 	include "config.php";
	if(isset($_GET['deletesno']))
	{
	
		$deletesno=$_GET['deletesno'];
		$sql="delete from subcategory where (s_id=$deletesno)";
		$result=mysqli_query($config,$sql);
		if($result)
		{
			header("Location: subcategory.php");
		}
		else
		{
			echo "Added Failed";
		}
	}
?>