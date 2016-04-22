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

if( isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
{
	$sql = "INSERT INTO user (username, email, password)
		VALUES ('" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['password']  . "')";

	if ($conn->query($sql) === TRUE) {
    	echo "Username: " . $_POST['username'] . "</br>";
    	echo "Email: " . $_POST['email'] . "</br>";
    	echo "Password: " . $_POST['password'] . "</br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
echo "Connected successfully";
?>