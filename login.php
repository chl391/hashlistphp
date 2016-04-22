<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hashlist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if( isset($_POST['username']) && isset($_POST['password']))
{
	$sql = "SELECT username from user 
		WHERE username='" . $_POST['username'] . "'
		AND password='" . $_POST['password'] . "'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    echo "Credentials correct";
	} else {
	    echo "Error: Credentials incorrect";
	}
}
?>