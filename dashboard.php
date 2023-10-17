<?php 
session_start();

if (isset($_SESSION['username'])) 
{
 ?>
<html>
<body>
	<p> &ensp;<b><i>MUTHU STORE</i></b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
		<a href="../category/category.php">Category</a>&ensp;|&ensp;
		<a href="../subcategory/subcategory.php">Subcategory</a>&ensp;|&ensp;
		<a href="../product/product.php">Product</a>&ensp;|&ensp;
		<b>Sales</b>&ensp;--&ensp;
		<a href="../salesentry/salesentry.php">Sales Entry</a>&ensp;|&ensp;
		<a href="../salesentry/list.php">Sales List</a>
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo "User:-".$_SESSION['username'];?>&ensp;|&ensp;<a href="logout.php">Logout</a></p>
	<h2 style="text-align:center;">DASHBOARD</h2>
	<?php echo "<h3> Welcome " . $_SESSION['username'] . "! </h3>"; ?>
	<ul>
		<li><a href="../category/category.php">Category</a></li><br>
		<li><a href="../subcategory/subcategory.php">Subcategory</a></li><br>
		<li><a href="../product/product.php">Product</a></li><br>
		<li><b>Sales</b></li><br>
		<ul>
		<li><a href="../salesentry/salesentry.php">Sales Entry</a></li><br>
		<li><a href="../salesentry/list.php">Sales List</a></li>
		</ul>
	</ul>
	
</body>

</html>

<?php
}
?>