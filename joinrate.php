<?php
//error_reporting(0);

include "config.php";	
//$c_id = $_POST["c_id"];
//echo $c_id;
$sql="SELECT * FROM product where p_id='".$_POST["x"]."'";
$result1=mysqli_query($config,$sql);

if($result1)
	{
		while($row=mysqli_fetch_array($result1))
		{
			$p_id=$row['p_id'];
			$rate=$row['rate'];
			echo $rate;
		}
	}

?>
