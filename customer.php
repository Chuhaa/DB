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
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $sql1 = "SELECT * FROM customer WHERE email = '$email'";
    $query=mysqli_query($db,$sql1);
    if ($query){
        $row = mysqli_fetch_row($query);
        $id=$row[0];
        $username=$row[1];
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
    <title>Welcome user</title>
</head>
<body>
<h3>Welcome customer <?php echo $username; ?>. </h3>
<?php
$db = mysqli_connect("localhost", "root", '', "bus_booking");

$sqlcust = "SELECT * FROM booking where customer_id = '$id'";
$querycust=mysqli_query($db,$sqlcust);
if ($querycust){
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

        </tr>
        </thead>
        <tbody>
        <style>
            table{
                font-size: large;
            }
        </style>

        <?php

        while($row=  mysqli_fetch_array($querycust))
        {
            ?>

            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td><button type="button" > Cancel </button> </td>
            </tr>


            <?php
        }
        ?>
    </table>
<?php
}?>

<form action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>
