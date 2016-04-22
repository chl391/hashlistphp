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

if( isset($_POST['username']) )
{
	$sql = "SELECT hashtag from hashtag 
		WHERE username='" . $_POST['username'] . "'";
	$result = $conn->query($sql);
	$hashtags = [];
    while ($row = $result->fetch_assoc()){
    	$hashtags[] = $row["hashtag"];
    }
    $users = [];
    $count = 0;
    foreach ($hashtags as $hashtag) {
    	$sql = "SELECT username from hashtag
    		WHERE hashtag='" . $hashtag . "'";
    	$result = $conn->query($sql);
    	while ($row = $result->fetch_assoc()){
    		if ($row["username"] != $_POST["username"] && in_array($row["username"], $users) == false) {
    			if ($count != 0){
    				echo "|";
    			}
	    		$users[] = $row["username"];
	    		echo $row["username"];
	    		$count++;
	    	}
	    }
    }
}
?>