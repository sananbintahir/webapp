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

echo $name;

$conn->close();
?>