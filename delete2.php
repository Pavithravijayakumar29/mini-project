<?php
	include "config.php";
	if(isset($_GET['deletesno']))
	{
		$deletesno=$_GET['deletesno'];
		$sql="delete from product where (p_id=$deletesno)";
		$result=mysqli_query($config,$sql);
		if($result)
		{
			header("Location: product.php");
		}
		else
		{
			echo "Updated Failed";
		}
	}
?>