<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if( isset($_POST['username']) )
{
	$sql = "INSERT INTO users (name)
		VALUES ('" . $_POST['username'] . "')";

	if ($conn->query($sql) === TRUE) {
    	echo "Username: " . $_POST['username'] . "</br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

echo "Connected successfully";
?>