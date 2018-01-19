<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fastask_database";


$event_id = isset($_GET['eventid']) ? $_GET['eventid'] : '';
$event_name = isset($_GET['eventname']) ? $_GET['eventname'] : '';
$event_date = isset($_GET['eventdate']) ? $_GET['eventdate'] : '';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO events (event_id, event_name, event_date, notetaker_id) VALUES ('$event_id','$event_name', '$event_date', NULL)";
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




