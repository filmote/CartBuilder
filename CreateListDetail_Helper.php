<?php
session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

readCreds($hostname, $username, $password, $databasename);

// Create connection
$conn = new mysqli($hostname, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch options based on the parent key (received from the AJAX request)
if (isset($_GET['listId'])) {
    $parentID = $_GET['listId'];

    // Example query, replace with your actual query
    $secondDropdownQuery = "SELECT ID, Description FROM Categories WHERE ListID = $parentID and ID > 0";
    $result2 = $conn->query($secondDropdownQuery);

    $options = array();

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $options[] = array("text" => $row2["Description"], "value" => $row2["ID"]);
        }
    }

    // Return options in JSON format
    echo json_encode($options);
}

// Close the database connection
$conn->close();
?>
