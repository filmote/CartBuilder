<?php

session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

readCreds($hostname, $username, $password, $databasename);

$conn = new mysqli($hostname, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 


$query = "select LastModified from LastModified";
$result = $conn->query($query);

if ($result->num_rows > 0) {

  // output data of each row
  while($row = $result->fetch_assoc()) {
    $mysqlDateTimeStr = $row['LastModified'];

    // Create a DateTime object from the MySQL DATETIME string
    $mysqlDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $mysqlDateTimeStr, new DateTimeZone('UTC'));

    // Format the DateTime object in ISO 8601 UTC format
    $iso8601UTC = $mysqlDateTime->format('Y-m-d\TH:i:s\Z');

    echo $iso8601UTC;

  }

}

$conn->close();
?>