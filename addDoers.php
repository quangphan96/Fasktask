<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "fastask_database";


$first_name = isset($_GET['doer_fname']) ? $_GET['doer_fname'] : '';
$last_name = isset($_GET['doer_lname']) ? $_GET['doer_lname'] : '';
$email = isset($_GET['doer_email']) ? $_GET['doer_email'] : '';
$doer_password = isset($_GET['doer_pw']) ? $_GET['doer_pw'] : '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO doers (doer_id, doer_fname, doer_lname, doer_email, doer_pw) VALUES (NULL,'$first_name','$last_name','$email', '$doer_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>




