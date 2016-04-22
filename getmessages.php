<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "hashlist";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$_POST['username'] = 'Cam';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if( isset($_POST['username']) )
{
	$sql = "SELECT message,sender from message 
		WHERE receiver='" . $_POST['username'] . "'";
	$result = $conn->query($sql);
	$messages = [];
    $senders = [];
    $count = 0;
    while ($row = $result->fetch_assoc()){
        if ($count !== 0) {
            echo "||";
        }
    	$messages[] = $row["message"];
        echo $row["message"] . "|";
        $senders[] = $row["sender"];
        echo $row["sender"];
        $count++;
    }
}
?>