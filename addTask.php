<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fastask_database";


$task_desc = isset($_GET['task_desc']) ? $_GET['task_desc'] : '';
$task_doer_id = isset($_GET['task_doer_id']) ? $_GET['task_doer_id'] : '';
$task_duedate = isset($_GET['task_duedate']) ? $_GET['task_duedate'] : '';
$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : '';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tasks (task_id, task_desc, task_doer_id, task_duedate, event_id) VALUES (NULL,'$task_desc','$task_doer_id','$task_duedate', '$event_id')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>




