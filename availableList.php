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

$sqlget = " SELECT * FROM events_happening";
$data = $conn->query($sqlget);

while ($row = $data->fetch_assoc()) {

    echo "<tr><td>";

    echo $row['Event_Name'];
    echo"</td><td>";
    echo $row['Event_ID'];
    echo"</td><td>";
    echo $row['Sport_Name'];
    echo"</td><td>";
    echo $row['Start_time'];
    echo"</td></tr>";
}

$conn->close();
?>