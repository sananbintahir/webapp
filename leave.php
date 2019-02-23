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

//taking user info from user table
$sql = " SELECT * FROM users WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
$array = ($result)->fetch_array();
($result)->free();

//getting user ID for current user
$sql = " SELECT User_ID FROM users WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
$rs = $result->fetch_array();
$userid = $rs['User_ID'];
$result->free();

//getting event id
$eventID = $_POST['e-id'];

//checking if user has joined this event
$sql = "SELECT * FROM players_in_event WHERE User_ID = '{$array['User_ID']}' AND Event_ID = $eventID";
$result = $conn->query($sql);
if(($result)->num_rows === 0){
    exit("You have not joined this event. <a href='./main_page.php'>return</a>");
}
$result->free();

//updating current players
$sql = "UPDATE events_happening SET Current_players = Current_players - 1 WHERE Event_ID = '{$eventID}'AND Current_players < Max_players;";
$result = $conn->query($sql);

//removing from players_in_event
$sql = "DELETE FROM `players_in_event` WHERE User_ID = '{$array['User_ID']}' AND Event_ID = $eventID";
$result = $conn->query($sql);

header("Location: main_page.php");

$conn->close();

?>