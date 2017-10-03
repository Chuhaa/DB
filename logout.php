<?php
/**
 * Created by PhpStorm.
 * User: G2
 * Date: 04-Oct-17
 * Time: 01:47 AM
 */

	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout page</title>
</head>
<body>
<form action = "login.php">
    <input type="submit" name="redirect" value = "Go back to home">
</form>
</body>
</html>