<?php 
	session_start();

	if (isset($_SESSION['username'])) 
	{
	?>
	<p> &ensp;<b><i>MUTHU STORE</i></b>&emsp;&emsp;&emsp;
		<a href="../main/dashboard.php">Dashboard</a>&ensp;|&ensp;
		<a href="../category/category.php">Category</a>&ensp;|&ensp;
		<a href="../subcategory/subcategory.php">Subcategory</a>&ensp;|&ensp;
		<a href="../product/product.php">Product</a>&ensp;|&ensp;
		<b>Sales</b>&ensp;--&ensp;
		<a href="../salesentry/salesentry.php">Sales Entry</a>&ensp;|&ensp;
		<a href="../salesentry/list.php">Sales List</a>
		&emsp;&emsp;&emsp;<?php echo "User:-".$_SESSION['username'];?>&ensp;|&ensp;<a href="logout.php">Logout</a></p>
<?php
}
?>