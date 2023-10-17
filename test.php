<?php
$conn = new mysqli("localhost","root","","employee_db");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

$query = "SELECT id FROM employee ORDER BY id DESC";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$lastid = $row['id'];

if(empty($lastid))
{
$number = "E-0000001";
}
else
{
$idd = str_replace("E-", "", $lastid);
$id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
$number = 'E-'.$id;
}
?>

<?php

    if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        $id = $_POST['id'];
        $ename = $_POST['ename'];
        $sal = $_POST['sal'];

        if(!$conn)
        {
            die("connection failed " . mysqli_connect_error());
        }
        else
        {
           $sql = "insert into employee(id,ename,salary)VALUES('".$id."','".$ename."','".$sal."') ";

            if(mysqli_query($conn,$sql))

            {
                echo "Record ADDEDDDDDDD";
                $query = "SELECT id FROM employee ORDER BY id DESC";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result);
                $lastid = $row['id'];

                if(empty($lastid))
                {
                $number = "E-0000001";
                }
                else
                {
                $idd = str_replace("E-", "", $lastid);
                $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
                $number = 'E-'.$id;
                }

            }
            else
            {

                echo "Record Faileddd";
            }


        }

    }

?>
