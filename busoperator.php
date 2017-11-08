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

<?php
//$con = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
//$con=new mysqli($servername,$username,$password,$dbname);

if(isset($_POST['submit'])){
    $con = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");

    $search_value=$_POST["submit"];
    $sql="select * from booking where operator_id=$operator_id";
    $query1=mysqli_query($con,$sql);
    //$row = mysqli_fetch_row($query1);
    //echo $row[0];


    while($row = mysqli_fetch_row($query1)){
        while(i<11){
            echo $row[i];
        }


    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome user</title>
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

