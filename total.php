<tr>
		<td></td>
		<td></td>
		<td><center><b>Total</b></center></td>
		<td></td>
		<?php
		include "../include/connect.php";
		$sales_no = mysqli_real_escape_string($con, $_POST['sales_no']);
		$sql="SELECT sales_no, SUM(qty) , SUM(amount) FROM salessub where sales_no = '" . $sales_no . "'";			
		$result=mysqli_query($con,$sql);
		if($result)
		{
			while($row=mysqli_fetch_array($result))
			{
				$total_qty=$row['SUM(qty)'];
				$total_amount=$row['SUM(amount)'];
				echo '<td>'.$total_qty.'</td>
						<td>'.$total_amount.'</td>';
			}
		}
	?>
	</tr>