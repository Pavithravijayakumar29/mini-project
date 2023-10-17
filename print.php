<html>
<style>
table, th, td 
{
  border:1px solid black;
}
</style>
<body>
<center>
	<?php
	if(isset($_GET['printid']))
	{
		include "../include/connect.php";
		$printid=$_GET['printid'];
		$sql="select * from salesentry where sales_no = '$printid'";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			while($row=mysqli_fetch_array($result))
			{
				$sales_no=$row['sales_no'];
				$entry_date=$row['entry_date'];
				$cus_name=$row['cus_name'];
				$cus_phone=$row['cus_phone'];
				
				echo '<h2>INVOICE</h2>
					<p>Invoice No : '.$sales_no.'&emsp;&emsp;
					Invoice Date : '.$entry_date.'<br><br>
					Customer Name : '.$cus_name.'&emsp;&emsp;
					Customer Phone : '.$cus_phone.'<br><br>
					</p>';
			}
		}
	}
?>
<table style="width:60%">
	<tr>
		<th>S.No</th>
		<th>Product</th>
		<th>Rate</th>
		<th>Quantity</th>
		<th>Amount</th>
	</tr>
<?php
	include "../include/connect.php";
	$sql="select * from salessub where sales_no='$sales_no'";
	$result1=mysqli_query($con,$sql);
	if($result1)
	{
		$sno=1;
		while($row=mysqli_fetch_array($result1))
		{
			$p_id=$row['p_id'];
			$join=mysqli_fetch_array(mysqli_query($con,"select product from product where p_id=$p_id"));
			$product=$join['product'];
			$rate=$row['rate'];
			$qty=$row['qty'];
			$amount=$row['amount'];
		
			echo '<tr>
				<td>'.$sno.'</td>
				<td>'.$product.'</td>
				<td>'.$rate.'</td>
				<td>'.$qty.'</td>
				<td>'.$amount.'</td>
				</tr>';
				$sno++;
			}
		}
		else
		{
			echo "invalid";
		}
	?>
	<tr>
		<td></td>
		<td><center><b>Total</b></center></td>
		<td></td>
		<?php
				include "../include/connect.php";
				$sql="SELECT sales_no, SUM(qty) , SUM(amount) FROM salessub where sales_no = '$sales_no'";
				$result2=mysqli_query($con,$sql);
				if($result2)
				{
					while($row=mysqli_fetch_array($result2))
					{
						$total_qty=$row['SUM(qty)'];
						$total_amount=$row['SUM(amount)'];

						echo '<td>'.$total_qty.'</td>
								<td>'.$total_amount.'</td>';
					}
				}
			?>
	</tr>
	</table>
</center>
<?php
echo '<script>window.print()</script>';
?>
</body>
</html>