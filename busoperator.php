<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 04-Oct-17
 * Time: 01:22 AM
 */

session_start();
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    //$operator_id=$_SESSION["operator_id"];
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $sql1 = "SELECT * FROM bus_operator WHERE email = '$email'";
    $query=mysqli_query($db,$sql1);
    if ($query){
        $row = mysqli_fetch_row($query);
        $username=$row[1];
        $operator_id=$row[0];
    }
}
else {
    header('Location: index.php');
    die();
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Welcome User</title>
</head>
<body>
<h3>Welcome bus operator <?php echo $username; ?>. </h3>
<form action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>

<form action="" method="post">
    <input type="submit" name="submit" value="Booking Detail">
</form>

</body>
</html>
<?php

if(isset($_POST['submit'])){

$sql="select * from booking where operator_id=$operator_id";
$query1=mysqli_query($db,$sql);

if($query1){
?>
<table border="2"  style= "background-color: #f2fbff; color: #285e8e; margin: 0 auto;" >
    <thead>
    <tr>
        <th>  Book Id  </th>
        <th>  Date   </th>
        <th>  Time  </th>
        <th>  Arrive Place  </th>
        <th>  Depature Place  </th>
        <th>  Seat No  </th>
        <th>  Payment Status  </th>



    </tr>
    </thead
    <table>
        <style>
            table{
                font-size: large;
            }
        </style>

        <?php

        while($row = mysqli_fetch_row($query1)){

            ?><tr><?php
            $i=0;
            while($i<11){
                ?><td><?php echo $row[$i]; ?></td><?php
                $i++;
            }?>

            </tr>
            <?php

        }
        }

        }
        ?>
    </table>

