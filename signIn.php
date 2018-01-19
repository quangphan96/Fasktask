<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Fastask_database";


$demail = isset($_GET['doer_email']) ? $_GET['doer_email'] : '';
$dpw = isset($_GET['doer_pw']) ? $_GET['doer_pw'] : '';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT doer_id, doer_fname, doer_lname FROM doers
WHERE doer_email = '$demail' AND doer_pw = '$dpw'";
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




