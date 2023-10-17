<!DOCTYPE html>
<html>
<style>
table, th, td 
{
  border:1px solid black;
}
</style>
<body>
	<center>
	<?php include "../main/header.php";?>

	<h2>SALES LIST</h2>
<table style="width:50%">
			<tr>
				<th name="sno">S.NO</th>
				<th name="bill_no">Bill No</th>
				<th name="cus_name">Customer Name</th>
				<th name="total_amount">Total Amount</th>
				<th name="action" >Action</th>
			</tr>
			<?php
				include "../include/connect.php";
				$sql="select * from salesentry";
				$result=mysqli_query($con,$sql);
				if($result)
				{
					$sno=1;
					while($row=mysqli_fetch_array($result))
					{
						//$p_id=$row['p_id'];
						$sales_no=$row['sales_no'];
						$cus_name=$row['cus_name'];
						$join=mysqli_fetch_array(mysqli_query($con,"SELECT sales_no, SUM(amount) FROM salessub where sales_no = '$sales_no'"));
						//SELECT sales_no, SUM(amount) FROM salessub GROUP BY sales_no ;
						//SELECT team_id,SUM(salary) FROM workers GROUP BY team_id ;
						//$join2=mysqli_fetch_array(mysqli_query($con,"select subcategory from subcategory where s_id=$s_id"));
						$total_amount=$join['SUM(amount)'];
						//$subcategory=$join2['subcategory'];
						//$product=$row['product'];
						//$rate=$row['rate'];
						echo '<tr>
						<td>'.$sno.'</td>
						<td>'.$sales_no.'</td>
						<td>'.$cus_name.'</td>
						<td>'.$total_amount.'</td>
						<td><button type="submit" name="print"> <a href="print.php?printid='.$sales_no.'">Print</a> </button> </td>
						</tr>';
						$sno++;
					}		
				}
			?>
		</table>
		</center>
</body>
</html>