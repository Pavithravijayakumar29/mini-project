<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<style>
table, th, td 
{
  border:1px solid black;
}
</style>
<body>
	<center>
	<form method="post"> 
	<h2 style="text-align:center;">SALES VIEW</h2>
	&emsp;&emsp;&ensp;Sales No&emsp;<input type="text" name="sales_no" value="">&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
	Date&emsp;<input type="date" name="entry_date"><br><br>
	Customer Name&emsp;<input type="text" name="cus_name">&emsp;&emsp;&emsp;&emsp;
	Customer Phone&emsp;<input type="text" name="cus_phone"><br><br>
	<form method="post"> 
		<table id="tbl" style="width:60%">
		<tr>
			<th name="sale_id">S.NO</th>
			<th name="sales_no">Sales No</th>
			<th name="product">Product Name</th>
			<th name="rate">Rate</th>
			<th name="qty">Quantity</th>
			<th name="amount">Amount</th>
			<th name="action">Action</th>
		</tr>
				<?php
					include "../include/connect.php";
					$sql="select * from product";
					$result=mysqli_query($con,$sql);
					if($result)
					{
							echo '<tr>
							<td><center>#</center></td>
							<td><center>Bill No</center></td>
							<td><center><select name="p_id" id="p_id" >
								<option value=""  selected>select Product</option>';
							while($row=mysqli_fetch_array($result))
							{
								$p_id=$row['p_id'];
								$product=$row['product'];
								$rate=$row['rate'];
								echo '<option value='.$p_id.'>'.$product.'</option>';
							}
							echo '</center></select></td>
							<td><center><input type="text" name="rate"  class="ratein" id="rate" size="1"></center></td>
							<td><center><input type="text" name="qty" class="qtyin" id="qty" size="1">'.$qty.'<center></td>
							<td><center><input type="text" name="amount" class="amountin" id="amount" size="1">'.$amount.'</center></td>
							<td><center><button type="submit" name="add" value="add">Add</button></center></td>
							</tr>';
						
					}
				?>
			
	
	<script>
		$(document).ready(function(){
			$("#p_id").change(function(){
				 pro_id = $('#p_id').val();

				//alert(pro_id);
				//$("input").change(function(){

				$.ajax({
					url:"joinrate.php",
					method:"POST",
					data:{x:pro_id},
					dataType:"TEXT",
					success:function(data){
						//alert(data);
						$("#rate").val(data);
					}
				})
			})
		})
               
       $('.qtyin, .ratein').on('input', function() {
           var row = $(this).closest("tr");
               var qty = parseInt(row.find('.qtyin').val());
               var rate = parseFloat(row.find('.ratein').val());
                row.find('.amountin').val((qty * rate ? qty * rate : 0).toFixed(2));
           });

     </script>
              
</form>
<?php
	include "../include/connect.php";
	if(empty($_POST['rate'] && $_POST['qty'] && $_POST['amount']))
	{
		echo '<h3 style="color:Tomato;">Invalid Input</h3><br>';
	}
	elseif(isset($_POST['add'])=='submit')
	{
		//$c_id=$_POST['c_id'];
		$p_id=$_POST['p_id'];
		$sales_no=$_POST['sales_no'];
		//$product=$_POST['product'];
		$rate=$_POST['rate'];
		$qty=$_POST['qty'];
		$amount=$_POST['amount'];
		$sql="insert into salessub (sales_no,p_id,rate,qty,amount) values ('$sales_no',$p_id,'$rate','$qty','$amount')";
		$result1=mysqli_query($con,$sql);
		if($result1)
		{
			echo '<script type="text/javascript">
			alert("Added Success");
			</script>';
		}
		else
		{
			echo "Added Failed";
		}
	}
?>
<?php
				$sql="select * from salessub where sales_no = '$sales_no'";
				$result2=mysqli_query($con,$sql);
				if($result2)
				{
					$sno=1;
					while($row=mysqli_fetch_array($result2))
					{
						$sales_no=$_POST['sales_no'];
						$p_id=$row['p_id'];
						$join=mysqli_fetch_array(mysqli_query($con,"select product from product where p_id=$p_id"));
						$product=$join['product'];
						$rate=$row['rate'];
						$qty=$row['qty'];
						$amount=$row['amount'];
						echo '<tr>
						<td>'.$sno.'</td>
						<td>'.$sales_no.'</td>
						<td>'.$product.'</td>
						<td>'.$rate.'</td>
						<td>'.$qty.'</td>
						<td>'.$amount.'</td>
						</tr>';
						$sno++;	
					}		
				}
	?>

</table>
<br><br><button type="submit" name="submit" value="submit">Submit</button>
</form>
	<?php
	include "../include/connect.php";
	if(empty($_POST['sales_no'] && $_POST['entry_date'] && $_POST['cus_name'] && $_POST['cus_phone']))
	{
		echo '<h3 style="color:Tomato;">Invalid Input</h3><br>';
	}
	elseif(isset($_POST['submit'])=='submit')
	{
		$sales_no=$_POST['sales_no'];
		$entry_date=$_POST['entry_date'];
		$cus_name=$_POST['cus_name'];
		$cus_phone=$_POST['cus_phone'];
		$sql="insert into salesentry (sales_no,entry_date,cus_name,cus_phone) values ('$sales_no','$entry_date','$cus_name','$cus_phone')";
		$result3=mysqli_query($con,$sql);
		if($result3)
		{
			echo '<script type="text/javascript">
			alert("Added Success");
			</script>';
		}
		else
		{
			echo "Added Failed";
		}
	}
	?>

</center>
</body>
</html>