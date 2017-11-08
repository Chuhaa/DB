<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:49 PM
 */

	session_start();
	if(isset($_POST['submit'])){
        $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
        $email = ($_POST['email']);
        $sql1 = "SELECT * FROM login WHERE email = '$email'";
        $result1 = mysqli_query($db, $sql1) or die(mysqli_error());
        $username = strip_tags($_POST['name']);
        if (mysqli_num_rows($result1) > 0) {
         echo  "This Email is already used.";
        }
        else {
            $phone = ($_POST['phone']);

            $password = strip_tags($_POST['password']);
            $db = mysqli_connect("localhost", "root", '', "bus_booking") or die ("Failed to connect");
            $query = "INSERT INTO customer(name,email,ph_number) VALUES('$username','$email','$phone')";
            $querylogin = "INSERT INTO login(email,password,role) VALUES('$email','$password','customer')";

            $result = mysqli_query($db, $query);
            $resultlogin = mysqli_query($db, $querylogin);

            if ($resultlogin and $result) {
                echo "Succesfully registered";
                header('Location: login.php');
            } else {
                echo "Failed to register";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
<h1>Register</h1>
<?php
echo "BECOME BUS OPERATOR"
?>

<form method="post" action="bussignup.php">
    <input type="submit" name="bus" value="bus">

</form>
<?php

echo "SIGNUP AS CUSTOMER";
?>

    <form method="post" action="signup.php">
            <input type="text" name = "name" placeholder="Enter username">
            <input type="password" name="password" placeholder="Enter password here">
            <input type="text" name="email" placeholder="Enter mail here">
            <input type="int" name=phone" placeholder="Enter ph no">

        <input type="submit" name="submit" value="Register">
            </form>

<?php
if (isset($_POST['bus'])){
    ?>
<a href = "bussignup.php" >Login</a>



           <?php }
           ?>


</body>
</html>