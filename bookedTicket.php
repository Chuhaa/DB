<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 08-Nov-17
 * Time: 04:19 PM
 */
session_start();
$id=$_SESSION['id'];
$db = mysqli_connect("localhost", "root", '', "bus_booking");
$sqlcust = "SELECT * FROM booking where customer_id = '$id'";
$querycust=mysqli_query($db,$sqlcust);
if ($querycust) {
    $datenow = date("y,m,d");
    ?>

    <table border="2" style="background-color: #f2fbff; color: #285e8e; margin: 0 auto;">
        <thead>
        <tr>
            <th> Book Id</th>
            <th> Date</th>
            <th> Time</th>
            <th> Arrive Place</th>
            <th> Depature Place</th>
            <th> Seat No</th>

        </tr>
        </thead
        <tbody>
        <style>
            table {
                font-size: large;
            }
        </style>

        <?php

        while ($row = mysqli_fetch_array($querycust)) {
            if ($datenow < $row[1]) {

                ?>

                <tr><?php
                    $i = 0;
                    while ($i < 8) {
                        ?>
                        <td><?php echo $row[$i]; ?></td><?php
                        $i++;
                    }
                    $_SESSION['booking_id'] = $row[0];
                    ?>


                    <td>
                        <form method="post" action="cancel.php">
                            <input type="submit" name="cancel" value="cancel">

                        </form>
                    </td>
                </tr>


                <?php
            }
        }
        ?>
    </table>
    <?php
}
?>