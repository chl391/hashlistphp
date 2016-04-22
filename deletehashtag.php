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

if( isset($_POST['username']) && isset($_POST['hashtag']) )
{
	$sql = "DELETE from hashtag WHERE username='" . $_POST['username'] . "' AND hashtag='" . $_POST['hashtag'] . "'";
	if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } 
    else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>