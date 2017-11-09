<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 05-Oct-17
 * Time: 05:01 PM
 */
session_start();
if(isset($_POST['submit'])) {
    $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
    $busnumber = ($_POST['busnumber']);
    $sql1 = "SELECT * FROM bus WHERE bus_number = '$busnumber'";
    $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
    if (mysqli_num_rows($result1) > 0) {
        echo  "This Bus is already exist.";
    }
    else {
        $busname = strip_tags($_POST['busname']);
        $busnumber = strip_tags($_POST['busnumber']);
        $totalseat = ($_POST['totalseat']);
        $bustype=strip_tags($_POST['bustype']);
        $querylogin = "INSERT INTO bus(name,bus_number,total_no_of_seats,type) VALUES('$busname','$busnumber','$totalseat','$bustype')";
        //$query = "INSERT INTO bus_operator(name,email,ph_number) VALUES('$username','$email','$phone')";
        //$result = mysqli_query($db, $query);
        $resultlogin=mysqli_query($db,$querylogin);

    }
}
?>
<html>
<head>
    <title> bus adding</title>
</head>
<body>


<form method="post" action="busupdate.php">
    <input type="text" name="busname" placeholder="Bus Name">
    <input type="text" name = "busnumber" placeholder="Bus Number">
    <input type="int" name="totalseat" placeholder="Number of seats">
    <input type="text" name="bustype" placeholder="Bus Type">
    <input type="submit" name="submit" value="Register">

</form>
</body>
</html>