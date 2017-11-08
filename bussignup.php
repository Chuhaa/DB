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
    $email = ($_POST['email']);
    $sql1 = "SELECT * FROM login WHERE email = '$email'";
    $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
    if (mysqli_num_rows($result1) > 0) {
        echo  "This Email is already used.";
    }
    else {
        $username = strip_tags($_POST['name']);
        $password = strip_tags($_POST['password']);
        $phone = ($_POST['phone']);
        $querylogin = "INSERT INTO login(email,password,role,status) VALUES('$email','$password','bus','active')";
        $query = "INSERT INTO bus_operator(name,email,ph_number) VALUES('$username','$email','$phone')";
        $result = mysqli_query($db, $query);
        $resultlogin=mysqli_query($db,$querylogin);
        if ($result and $resultlogin) {
            echo "Succesfully registered";
            header('Location: login.php');
        } else {
            echo "Failed to register";
        }
    }
}
?>
<html>
<head>
    <title> bus signup</title>
</head>
<body>


<form method="post" action="bussignup.php">
    <input type="text" name="email" placeholder="Enter mail here">
    <input type="text" name = "name" placeholder="Enter busname">
    <input type="password" name="password" placeholder="Enter password here">
    <input type="int" name=phone" placeholder="Enter bus ph no">

    <input type="submit" name="submit" value="Register">

</form>
</body>
</html>