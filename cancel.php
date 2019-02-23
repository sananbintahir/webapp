<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
if (isset($_SESSION['User_Name']) && isset($_SESSION['Password'])) {
    $name = $_SESSION['User_Name'];
}else{
    exit("Please Log in First. <a href='./projct.php'>Log In </a>");
    
}

//getting user ID for current user
$sql = " SELECT User_ID FROM users WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
$rs = $result->fetch_array();
$userid = $rs['User_ID'];
$result->free();

//taking user info from user table
$sql = " SELECT * FROM users WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
$array = ($result)->fetch_array();
($result)->free();

//getting event id
$eventID = $_POST['e-id'];

//checking if user is the event organiser
$sql = "SELECT * FROM events_happening WHERE Event_ID = '{$eventID}' AND User_ID = '{$array['User_ID']}'";
$result = $conn->query($sql);
if(($result)->num_rows === 0){
    exit("You are not the organiser of this event. <a href='./main_page.php'>return</a>");
}
$result->free();

//removing from players_in_event
$sql = "DELETE FROM `players_in_event` WHERE Event_ID = $eventID";
$result = $conn->query($sql);

//removing from events_happening
$sql = "DELETE FROM events_happening WHERE User_ID = '{$array['User_ID']}' AND Event_ID = $eventID";
$result = $conn->query($sql);

header("Location: main_page.php");

$conn->close();

?>