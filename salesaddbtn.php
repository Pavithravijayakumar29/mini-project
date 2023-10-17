<?php
    include "../include/connect.php";
    
        $sales_no = mysqli_real_escape_string($con, $_POST['sales_no']);
        $p_id = mysqli_real_escape_string($con, $_POST['p_id']);
        $rate = mysqli_real_escape_string($con, $_POST['rate']);
        $qty = mysqli_real_escape_string($con, $_POST['qty']);
        $amount = mysqli_real_escape_string($con, $_POST['amount']);

        //$c_id=$_POST['c_id'];
       /* $p_id=$_POST['p_id'];
        $sales_no=$_POST['sales_no'];
        //$product=$_POST['product'];
        $rate=$_POST['rate'];
        $qty=$_POST['qty'];
        $amount=$_POST['amount']; */
        $sql="insert into salessub (sales_no,p_id,rate,qty,amount) values ('" . $sales_no . "'," . $p_id . ",'" . $rate . "','" . $qty . "','" . $amount . "')";
        $result1=mysqli_query($con,$sql);
        if($result1)
        {
            echo 'Added Success';
        }
        else
        {
            echo "Added Failed";
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
