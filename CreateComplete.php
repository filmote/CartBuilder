<!DOCTYPE html>
<html>
<head>
    <title>Create Complete</title>
</head>
<body>

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
$sql = "update LastModified set LastModified = now()";
$conn->query($sql);

// Close the database connection
$conn->close();

?>

<h1>All Done!</h1>

</body>
</html>