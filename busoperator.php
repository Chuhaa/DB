<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 04-Oct-17
 * Time: 01:22 AM
 */

session_start();
if (isset($_SESSION['id'])){
    $username = $_SESSION['username'];
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
<h3>Welcome bus operator <?php echo $username; ?>. </h3>
<form action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>

