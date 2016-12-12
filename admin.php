<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "royalty";

// Create connection
		/* new mysqli*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

else {
	echo "Test Database Connected";
}


if(isset($_POST['submit']))
{
	echo "works";
	$query = mysqli_query("SELECT * FROM users where username = '$_POST[user]' AND password = '$_POST[password]'") or die(mysqli_error());
	$response = @mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>


<br><br>
<form action="" method="post">
<div id="addf">
<p>Username
<input type="text" name="user" size="30"/>
</p>
<p>Password
<input type="text" name="password" size="30"/>
</p>

<input type="submit" name="submit" value="Add"/>

</form>
</body>
</html>