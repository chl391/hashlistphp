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

if( isset($_POST['username']) && isset($_POST['hashtag']))
{
	$sql = "SELECT id from hashtag 
		WHERE username='" . $_POST['username'] . "'
		AND hashtag='" . $_POST['hashtag'] . "'";
	$result = $conn->query($sql);

	if ($result->num_rows == 0){
		$sql = "INSERT INTO hashtag (id, username, hashtag)
			VALUES (NULL,'" . $_POST['username'] . "','" . $_POST['hashtag']  . "')";

		if ($conn->query($sql) === TRUE) {
	    	echo "Username: " . $_POST['username'] . "</br>";
	    	echo "Hashtag: " . $_POST['hashtag'] . "</br>";
		} else {
	    	echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo "Error: Duplicate hashtag";
	}
}
echo "Connected successfully";
?>