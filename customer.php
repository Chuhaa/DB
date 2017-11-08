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
        $_SESSION['id']=$id;
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
?>
<form action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>
<form action="bookedTicket.php">
        <input type="submit" name="BookedTicket" value="BookedTicket">

    </form>




</body>
</html>
