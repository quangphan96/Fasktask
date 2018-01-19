<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fastask_database";

$event_id = isset($_GET['eventid']) ? $_GET['eventid'] : '';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *
FROM tasks 
INNER JOIN doers ON tasks.task_doer_id = doers.doer_id
WHERE tasks.event_id = '$event_id' ";


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




