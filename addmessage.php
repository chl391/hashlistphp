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

if( isset($_POST['username']) && isset($_POST['receiver']) && isset($_POST['message']) ) {
	$sql = "INSERT INTO message (id, message, sender, receiver)
			VALUES (NULL,'" . $_POST['message'] . "','" . $_POST['username']  . "','" . $_POST['receiver'] . "')";

	if ($conn->query($sql) === TRUE) {
    	echo "Username: " . $_POST['username'] . "</br>";
    	echo "Receiver: " . $_POST['receiver'] . "</br>";
    	echo "Message: " . $_POST['message'] . "</br>";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}