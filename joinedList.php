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

$sqlget = " SELECT * FROM events_happening";
$data = $conn->query($sqlget);

$sql = "SELECT Event_ID FROM players_in_event WHERE User_ID = '{$userid}'";
$joined = $conn->query($sql);

while ($row = $joined->fetch_assoc()){
    $sql = "SELECT * FROM `events_happening` WHERE `Event_ID` = '{$row['Event_ID']}'";
    $joinedEvents = $conn->query($sql);

    $j = $joinedEvents->fetch_array();
    echo "<tr><td>";

    echo $j['Event_Name'];
    echo"</td><td>";
    echo $j['Event_ID'];
    echo"</td><td>";
    echo $j['Sport_Name'];
    echo"</td><td>";
    echo $j['Start_time'];
    echo"</td></tr>";
}

$conn->close();
?>