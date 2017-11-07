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
<h3>Welcome customer <?php echo $username; ?>. </h3>
<?php
$db = mysqli_connect("localhost", "root", '', "db");

$sqlcust = "SELECT book_id,username,dateb FROM booking where username = '$username'";
$querycust=mysqli_query($db,$sqlcust);
if ($querycust){
    $row = mysqli_fetch_row($querycust);
    $book_id = $row[0];
    $customid = $row[1];
    $date = $row[2];

echo $book_id;?>
<?php echo $customid;?>
<?php echo $date;


}
?>
<form action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>

</body>
</html>


<?php


?>