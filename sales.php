<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<table style="width:50%">
		<tr>
			<th name="product">Product Name</th>
			<th name="rate">Rate</th>
		</tr>
		
<?php
				include "../include/connect.php";

				$sql="select * from product";
				$result3=mysqli_query($con,$sql);
				if($result3)
				{
					
					while($row=mysqli_fetch_array($result3))
					{
						$product=$row['product'];
						$rate=$row['rate'];
						echo '<tr>
						<td><select name="p_id" id="p_id">
								<option value="" disabled selected>select Product</option>
								<option>'.$product.'</option></select></td>
						<td>'.$rate.'</td>
						</tr>';
					}		
				}
			?>

</body>
</html>
