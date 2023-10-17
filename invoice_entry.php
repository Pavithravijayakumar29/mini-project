<?php
error_reporting(0);
include 'config.php';
//echo $_GET['id'].'uji';
?>
<?php include 'script.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<title>invoice</title>



	<link rel="stylesheet" type="text/css" href="">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
	
	<style type="text/css">
		*{
			
		
			font-family: 'poppins'.sans-serif;
		}
		
		body{
			display: flex;
			height: 100vh;
			justify-content: center;
			align-items: center;
			background: linear-gradient(139deg,#71b7e6,#9b59b6);
			font-size: 25px;
			font-family: 'Libre Baskerville', serif;
			padding: 30px;

		}
		.all{
			max-width: 1000px;
			width: 210vh;
			background-color: #fff;
			
			padding: 50px 90px;
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
		.fa-sharp{
			color: red;
		}
		.fc-sharp{
			color: blue;
		}
		.cl{
			background: #DAF7A6;
		}
		
		tfoot {color:red;}
/*tr:nth-child(even) {
  background-color: #D6EEEE;
}*/
		 
		

	</style>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>
<body>
	
	<div class="all">
		<div class="title" align="center"><h2>Invoice...</h2></div><br>
		
  <form autocomplete="off" action=" " method="post" id="form">


  	<div class="ud">

<div class="t1">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php
	
	$query="SELECT invoice from sales order by id desc";
	$sql=mysqli_query($conn,$query);
	$row = mysqli_fetch_array($sql);
   $count=mysqli_num_rows($sql);
   // echo $count;
    
    if($count == '0'){
        $num = "LOKIE -".date(Ym)."-"."0001";
    }else{
    	

     $inv=$row['invoice'];
     $exp=explode('-',$inv);
     $num=$exp[2];
$num="LOKIE -".date(Ym)."-".str_pad($num+1, 4, "0", STR_PAD_LEFT);


    
}
 
	 ?>
<!------------------------------ EDIT_LIST----------------------------->
<?php

 $dolar_id= $_GET["id"];
 echo  $dolar_id;

    $doc = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM sales where id = '$dolar_id'"));
    //echo "SELECT * FROM sales where id = '$id' or invoice='$dolar_invo'";
  $dolar_invo=$doc["invoice"];
  echo $dolar_invo;
 $dolar_cname=$doc["cname"];
 //echo $dolar_cname."hai" .'<br>';
 $dolar_date= $doc["date"];
 //echo $dolar_date;
 $dolar_phone= $doc["phone"];
  $dolar_area= $doc["area"];
    ?>
    <input type="hidden" id="up_id" value="<?php echo $_GET["id"];?>">

<!--------------------------------------------------------------------->

	<label>Invoice</label>
	<input type="" id="invoice" value="<?php if($_GET['id']!=''){ echo $dolar_invo;}else{ echo $num;} ?>" readonly>
	
	
</div>
	
	<div class="box">
<div class="t2">
	<label>CustomerName :</label>
	<input type="text" id="cname" value="<?php if($_GET['id']!=''){ echo $dolar_cname;}?>"><span class="error"> <?php echo $cname_error;?> </span> 

	<br><br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label>PhoneNo:</label>
	<input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"id="phone" value="<?php if($_GET['id']!=''){echo $dolar_phone;}?>" maxlength="10" ><span class="error"> <?php echo $phone_error;?> </span> 
</div>

<div class="t3">
	<label>Date :</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="date" id="date" value="<?php if($_GET['id']!=''){echo $dolar_date; }else{echo date("Y-m-d");}?>">
	<br><br>
	<label>Address :</label>
	<textarea id="area" value=""><?php if($_GET['id']!=''){echo $dolar_area;}?></textarea> <span class="error"> <?php echo $area_error;?> </span> 
	
</div>
</div><br><div class="btn">

</form> 
<br>
<!--<a href="list.php">Go Next Page</a>-->

</div></div>
</body>
</html>
<div>
	<?php //include "entry.php"; ?>
</div>
<!-----------------------------------------------------Sublist---------------------------------------------------->

<div id="ad">
	<?php 


	include "entry.php";

	 ?>
</div>
<center>
	<?php if($_GET['id']!=''){ ?>
<button type="button" onclick="submitdata('upp')">Update</button>
<?php }else{ ?>
<button type="button" onclick="submitdata('insert')" value="" class="button">Submit</button>
<?php } ?>
</center><p class="success"></p>