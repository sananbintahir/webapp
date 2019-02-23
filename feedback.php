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

// setting into variables 
$n= $_POST['name1'];
$e= $_POST['email1'];
$s= $_POST['subject'];
$m= $_POST['message'];

// entering values for the feed back
$sql = " INSERT INTO feedback (Name, Email, Subject, Message)
     VALUES ('{$n}','{$e}', '{$s}', '{$m}')";
$enter = $conn->query($sql);
if ($enter === TRUE) {
    //echo "Entered Sucessfully";
    //echo "The new row entered " $conn -> insert_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: main_page.php");

$conn->close();

?>