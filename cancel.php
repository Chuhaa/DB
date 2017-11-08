<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 08-Nov-17
 * Time: 11:42 AM
 */
session_start();
$booking_id=$_SESSION['booking_id'];
echo $booking_id;
echo "Are you sure to cancel ticket?";
 ?>
<form method="post" action="">
    <input type='submit' name="yes" value="yes">

</form>
<?php
if(isset($_POST['yes'])) {
    $db = mysqli_connect("localhost", "root", '', "bus_booking");
    $sqldel="delete from booking where booking_id=$booking_id";
    $querydel=mysqli_query($db,$sqldel);
    if($querydel) {
        echo "Ticket Cancelled";
    }?>
    <form method="post" action="customer.php">
                            <input type="submit" name="customer" value="customer">

                        </form>
<?php


}
?>