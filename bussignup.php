<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 05-Oct-17
 * Time: 05:01 PM
 */
session_start();
if(isset($_POST['submit'])) {
    $db = mysqli_connect("localhost", "root", '', "db") or die ("Failed to connect");
    $email = ($_POST['email']);
    $sql1 = "SELECT * FROM bus WHERE email = '$email'";
    $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
    if (mysqli_num_rows($result1) > 0) {
        $_SESSION['error']['email'] = "This Email is already used.";
    } else {
        $username = strip_tags($_POST['name']);
        $password = strip_tags($_POST['password']);
        $phone = ($_POST['phone']);
        $query = "INSERT INTO bus(name,password,email,phone_no) VALUES('$username', '$password','$email','$phone')";
        $result = mysqli_query($db, $query);
        if ($result) {
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