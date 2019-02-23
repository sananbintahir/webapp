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

$name1 = $_POST['form-log_in_name'];
    $password1 = $_POST['form-log_in_password'];

    $sql = " SELECT * FROM users WHERE User_Name = '{$name1}' ";
    $result = $conn->query($sql);
    if ($result === TRUE) {
            echo "Entered Sucessfully";
            //echo "The new row entered " $conn -> insert_id;
    } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if(($result)->num_rows === 0){
            exit("Account does not exist. <a href='./projct.php'>return</a>");
    }
    $password1 = md5($password1);
    $array = ($result)->fetch_array();
    ($result)->free();
    if ($password1 == $array['Password']) {
        session_start();
        $_SESSION['User_Name'] = $array['User_Name'];
        $_SESSION['Password'] = $array['Password'];
        header('Location:main_page.php');
    }else{
        //echo '<script> alert("I am an alert box!"); </script>';
        exit("wrong password. <a href='./projct.php'>return</a>");
    }

$conn->close();
?>