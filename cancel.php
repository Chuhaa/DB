<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 08-Nov-17
 * Time: 11:42 AM
 */echo "Are you sure to cancel ticket?";
session_start();
 ?>
<form method="post" action="cancel.php">
    <input type="submit" name="yes" value="yes">

</form>
<?php
if(isset($_POST['yes'])) {
    $booking_id=$_SESSION['booking_id'];

    $db = mysqli_connect("localhost", "root", '', "bus_booking");
    $sqldel="delete from booking where booking_id=$booking_id";
    $querydel=mysqli_query($db,$sqldel);
    if($querydel){
        echo" Canceled";
    }
    ?>
    <form method="post" action="customer.php">
    <input type="submit" name="customer" value="customer">

</form>

<?php
}
?>