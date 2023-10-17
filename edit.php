<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>Edit</title>



	<link rel="stylesheet" type="text/css" href="">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">

	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			outline: 0;
			box-sizing: border-box;
			font-family: 'poppins'.sans-serif;
		}
		
		body{
			display: flex;
			height: 100vh;
			justify-content: center;
			align-items: center;
			background: linear-gradient(135deg,#71b7e6,#9b59b6);
			font-size: 20px;
			font-family: 'Libre Baskerville', serif;
			padding: 10px;

		}
		.all{
			max-width: 1000px;
			width: 100vh;
			background-color: #85FFBD;
			background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
			padding: 50px 70px;
			border-radius: 10px;

		}
		
		.box{
			
			display: flex;

		}
		.t1{
			text-align: left;
			
			
		}
		.t2{
			
			flex-basis: 60%;
			padding: 40px 60px;
		}
		.t3{
			flex-basis: 40%;
			padding: 40px;
		}
		.btn{
		
			font-weight: 500;

		}

		

	</style>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>
	
	<div class="all">
		<div class="title" align="center"><h2>Edit-Page...</h2></div><br>
		
  <form autocomplete="off" action="" method="post">

  	<?php
    error_reporting(0);

    $id = $_GET["id"];
    $rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM sales where id = $id"));
    ?>
    <input type="hidden" id="up_id" value="<?php echo $_GET["id"];?>">
    
<?php include 'script.php';?>

  	<div class="ud">

<div class="t1">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>Invoice</label>
	<input type="text" id="invoice" value="<?php echo $rows['invoice'];?>">
</div>
	
	<div class="box">
<div class="t2">
	<label>CustomerName :</label>
	<input type="text" id="cname" value="<?php echo $rows['cname'];?>">
	<br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>PhoneNo:</label>
	<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"id="phone" value="<?php echo $rows['phone'];?>" maxlength="10">
</div>

<div class="t3">
	<label>Date :</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" id="date" value="<?php echo "" . date("Y/m/d");?>">
	<br><br>
	<label>Address :</label>
	<textarea id="area"><?php echo $rows['area'];?></textarea>  
	<input type="hidden" id="total" value="<?php echo $rows['total'];?>">          
</div>
</div><br><br><br>
<div class="btn">
<center><button type="button" onclick="submitdata('upp')">Update </button></center>
</form>
<br>
</div></div>
<a href="list.php">GoTo list Page</a>
</body>
</html>
