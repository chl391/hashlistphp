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

if( isset($_POST['username']))
{
	$sql = "SELECT hashtag from hashtag 
		WHERE username='" . $_POST['username'] . "'";
	$result = $conn->query($sql);
	$count = 0;
    while ($row = $result->fetch_assoc()){
    	if ($count != 0) {
    		echo "|";
    	}
        echo $row["hashtag"];
        $count++;
    }
}
?>