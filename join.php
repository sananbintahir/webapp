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
if(($result)->num_rows !== 0){
    exit("You are the organiser of this event. <a href='./main_page.php'>return</a>");
}
$result->free();

//checking if event is full
$sql = "SELECT * FROM events_happening WHERE Event_ID = '{$eventID}' AND Current_players < Max_players";
$result = $conn->query($sql);
if(($result)->num_rows === 0){
    exit("Event is already full please try next time. <a href='./main_page.php'>return</a>");
}
$result->free();

//checking if user has already joined this event
$sql = "SELECT * FROM players_in_event WHERE User_ID = '{$array['User_ID']}' AND Event_ID = $eventID";
$result = $conn->query($sql);
if(($result)->num_rows !== 0){
    exit("You have already joined this event. <a href='./main_page.php'>return</a>");
}
$result->free();

//updating current players
$sql = "UPDATE events_happening SET Current_players = Current_players + 1 WHERE Event_ID = '{$eventID}'AND Current_players < Max_players;";
$result = $conn->query($sql);

//Entering into players table
$sql = " SELECT * FROM players WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
if ($result === TRUE) {
        echo "Entered Sucessfully";
        
} else {
       // echo "Error: " . $sql . "<br>" . $conn->error;
}
if(($result)->num_rows == 0){
    $sql1 = " INSERT INTO players (User_ID, User_Name, Age, Picture, Phone_Number, Email, Address)
     VALUES ('{$array['User_ID']}','{$array['User_Name']}', '{$array['Age']}', '{$array['Picture']}' , '{$array['Phone_Number']}' , '{$array['Email']}' , '{$array['Address']}')";
    $enter = $conn->query($sql1);
    if ($enter === TRUE) {
            //echo "Entered Sucessfully";
            //echo "The new row entered " $conn -> insert_id;
    } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}
$result->free();
//adding to players_in_event
$sql = "INSERT INTO `players_in_event`(`User_ID`, `Event_ID`) VALUES ('{$array['User_ID']}', '$eventID')";
$result = $conn->query($sql);

header("Location: main_page.php");

$conn->close();

?>