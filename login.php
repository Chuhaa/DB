<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 02-Oct-17
 * Time: 06:40 PM
 */


session_start();
if(isset($_POST['submit'])) {
    require('config.php');
    $email = ($_POST['email']);
    $_SESSION['email'] = $email;
    $password = strip_tags($_POST['password']);
    $sql = "SELECT * FROM login where email = '$email'";

    $db = mysqli_connect("localhost", "root", '', "bus_booking");

    $query = mysqli_query($db, $sql);

    if($query)
    {
        $row = mysqli_fetch_row($query);
        $emailDB=$row[0];
        $passwordDB = $row[1];
        $role=$row[2];

        if ($email == $emailDB && $password == $passwordDB) {
            $_SESSION['email'] = $email;
            if($role=="bus") {
                header('Location: busoperator.php');
            }
            elseif ($role="customer"){
                header('Location: customer.php');

            }
        }}


    else {
        echo "<b><i>Incorrect credentials</i><b>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>PHP-SQL Login</title>
</head>
<body>
<h1>Login</h1>
        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Enter email">
            <input type="password" name="password" placeholder="Enter password here">
            <input type="submit" name="submit" value="Login">
        </form>

<a href="signup.php" >Register</a>

</body>
</html>