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

if($_POST['form-password'] !== $_POST['form-re-password']){
    exit("Passwords don't match. <a href='./projct.php'>return</a>");
}
/*
$email = test_input($_POST['form-email']);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  exit("Invalid Emial format. <a href='./projct.php'>return</a>");
}*/
/*$pattern = "$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$";
if (!preg_match($pattern, $_POST['form-password'])) {
    exit("Invalid Password format. <a href='./projct.php'>return</a>");
}*/
$name = $_POST['form-first-name'];
$password = $_POST['form-password'];
$password = md5($password);
$sql = " SELECT * FROM users WHERE User_Name = '{$name}' ";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Entered Sucessfully";
    
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}
if(($result)->num_rows !==0){
    exit("Please enter another User Name. <a href='./projct.php'>return</a>");
}
($result)->free();

$sql = "INSERT INTO users (User_Name, Age, Picture, Phone_Number, Email, Address,Password)
VALUES ('{$_POST['form-first-name']}', '{$_POST['form-age']}', '{$_POST['form-picture']}' , '{$_POST['form-phone']}' , '{$_POST['form-email']}' , '{$_POST['form-address']}', '$password')";
$result = $conn->query($sql);
if ($result === TRUE) {
    echo "Entered Sucessfully";
    //echo "The new row entered " $conn -> insert_id;
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: projct.php");

$conn->close();
?>