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
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $sql = "SELECT customer_id,name,password FROM customer where name = '$username'";
    $sqlbus = "SELECT id,name,password FROM bus where name = '$username'";


    $db = mysqli_connect("localhost", "root", '', "db");

    $querybus = mysqli_query($db, $sqlbus);
    $query = mysqli_query($db, $sql);


    if($querybus)
    {{
        $row = mysqli_fetch_row($querybus);
        $userId = $row[0];
        $dbUserNameB = $row[1];
        $dbPasswordB = $row[2];
    }

        if ($username == $dbUserNameB && $password == $dbPasswordB) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $userId;
            header('Location: busoperator.php');
        }}


if ($query) {{
            $row = mysqli_fetch_row($query);
            $userId = $row[0];
            $dbUserName = $row[1];
            $dbPassword = $row[2];
        }

            if ($username == $dbUserName && $password == $dbPassword) {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $userId;
                header('Location: home.php');

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
            <input type="text" name="username" placeholder="Enter username">
            <input type="password" name="password" placeholder="Enter password here">
            <input type="submit" name="submit" value="Login">
        </form>

<a href="signup.php" >Register</a>

</body>
</html>