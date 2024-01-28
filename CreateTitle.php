<!DOCTYPE html>
<html>
<head>
    <title>Create Title</title>
    <script>
    function validateForm() {
      var url1Input = document.getElementById('website');
      var url2Input = document.getElementById('source');
      var errorMessage = document.getElementById('errorMessage');

      if (url1Input.value === '' || validateUrl(url1Input.value)) {
      } else {
        // At least one URL is invalid
        alert('The wesite is not a valid URL.');
        return false;
      }
      if (url2Input.value === '' || validateUrl(url2Input.value)) {
      } else {
        // At least one URL is invalid
        alert('The source location is not a valid URL.');
        return false;
      }

      return true;
    }

    function validateUrl(url) {
      // Function to validate a single URL
      var urlRegex = /^(ftp|http|https):\/\/[^ "]+$/;
      return urlRegex.test(url);
    }
  </script>
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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $developer = $_POST["developer"];
    $version = $_POST["version"];
    $website = $_POST["website"];
    $source = $_POST["source"];
    $eStart = $_POST["eStart"];
    $eEnd = $_POST["eEnd"];
    $eHash = $_POST["eHash"];


    // SQL query to insert data into the table
    $sql = "INSERT INTO Titles (ID, Title, Developer, Version, Website, Source,EEPROM_Start, EEPROM_End, EEPROM_Hash, Description, Likes) VALUES ($id, '$title', '$developer', '$version', '$website', '$source', '$eStart', '$eEnd', '$eHash', '$description', 0)";

    if ($conn->query($sql) === TRUE) {

        
        // Redirect to another page with the ID as a parameter
        header("Location: CreateBuild.php?titleId=$id");
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}


$lookupQuery = "SELECT max(ID) + 1 as ID from Titles";
$result = $conn->query($lookupQuery);
$newID = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $newID = $row["ID"];
    }
}

// Close the database connection
//$conn->close();

?>

<h2>Create Title</h2>
<form method="post" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

<table border="0" style="border-spacing: 5px; vertical-align: top;">
    <tr><td>
    <label for="id">ID:</label>
    </td><td>
    <input type="text" name="id" required value="<?php echo $newID; ?>"><br>
    </td></tr>

    <tr><td>
    <label for="title">Title:</label>
    </td><td>
    <input type="text" name="title" required><br>
    </td></tr>

    <tr><td>
    <label for="description">Description:</label>
    </td><td>
    <textarea name="description" rows="4" cols="50"></textarea><br>
    </td></tr>

    <tr><td>
    <label for="developer">Developer:</label>
    </td><td>
    <input type="text" name="developer" required><br>
    </td></tr>

    <tr><td>
    <label for="version">Version:</label>
    </td><td>
    <input type="text" name="version" required><br>
    </td></tr>

    <tr><td>
    <label for="website">Website:</label>
    </td><td>
    <input type="text" name="website" id="website"><br>
    </td></tr>

    <tr><td>
    <label for="source">Source:</label>
    </td><td>
    <input type="text" name="source" id="source"><br>
    </td></tr>

    <tr><td>
    <label for="eStart">EEPROM Start (blank, number, na):</label>
    </td><td>
    <input type="text" name="eStart"><br>
    </td></tr>

    <tr><td>
    <label for="eEnd">EEPROM_End (blank, number, na):</label>
    </td><td>
    <input type="text" name="eEnd"><br>
    </td></tr>

    <tr><td>
    <label for="eHash">EEPROM_Hash (blank, 0, 1, na):</label>
    </td><td>
    <input type="text" name="eHash"><br>
    </td></tr>

    <tr><td>
    &nbsp;
    </td><td>
    &nbsp;
    </td></tr>

    <tr><td colspan="2">
    <input type="submit" value="Insert Record">
    </td></tr>
</table>


</form>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>