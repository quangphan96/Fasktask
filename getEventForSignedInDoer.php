<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fastask_database";

$doer_id = isset($_GET['doerid']) ? $_GET['doerid'] : '';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *
FROM tasks 
INNER JOIN events ON tasks.event_id = events.event_id
WHERE tasks.task_doer_id = $doer_id ";


$result = $conn->query($sql);

// Read each row and transform to an Array
$items = [];
if ($result->num_rows > 0) {    
    while($row = $result->fetch_assoc()) {        
        $items[] = $row;
    }
} else {
    echo "";
}

// Covert Array to JSON
$myJSON = json_encode($items);

$conn->close();


// Output JSON
echo $myJSON;
?>




