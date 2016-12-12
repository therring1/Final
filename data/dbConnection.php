<?php
$servername = "therring5@codd.cs.gsu.edu";
$username = "therring5";
$password = "thering5";
$dbname = "therring5";

// Create connection
		/* new mysqli*/
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
else {
	echo "Test Database Connection";
}
*/
?>