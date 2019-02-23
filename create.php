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

$eventname = $_POST['eventName'];
$sportname = $_POST['sportName'];
$min = $_POST['minPlayers'];
$max = $_POST['maxPlayers'];
$start = $_POST['startTime'];
$end = $_POST['endTime'];

$sql = " INSERT INTO `events_happening` (`User_ID`, `Event_Name`, `Max_players`, `Min_players`,
    `Sport_Name`, `Start_time`, `End_time`) VALUES ('$userid', '$eventname', '$max', '$min', '$sportname', 
    '$start', '$end')";
if ($conn->query($sql) === TRUE) {
    header("location: main_page.php");
    echo "Event Created Sucessfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// entering into organizer table 
$sql = " SELECT * FROM organizers WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Entered Sucessfully";
        
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
}
if(($result)->num_rows == 0){
    $sql1 = " INSERT INTO organizers (User_ID, User_Name, Age, Picture, Phone_Number, Email, Address)
        VALUES ('{$array['User_ID']}','{$array['User_Name']}', '{$array['Age']}', '{$array['Picture']}' , '{$array['Phone_Number']}' , '{$array['Email']}' , '{$array['Address']}')";
    $enter = $conn->query($sql1);
    if ($enter === TRUE) {
            //echo "The new row entered " $conn -> insert_id;
    } else {
            echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}

/*$data = $_POST['q']

$sql = " UPDATE events_happening SET Current_players = Current_players + 1 WHERE Event_ID = '{$data}' ";
if ($conn->query($sql) === TRUE) {
    header("location: main_page.php");
        alert("Event Created Sucessfully");
        //echo "The new row entered " $conn -> insert_id;
} else {
    alert("Error: " . $sql . "<br>" . $conn->error);
}*/

$conn->close();

?>