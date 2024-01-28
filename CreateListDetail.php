<!DOCTYPE html>
<html>
<head>
    <title>Create List Entries</title>
    <script>
        function updateSecondDropdown() {

            var dropdown1 = document.getElementById("listDropDown");
            var selectedValue = dropdown1.options[dropdown1.selectedIndex].value;
            var secondDropdown = document.getElementById("categoryDropDown");
            var selectedValue2 = secondDropdown.options[secondDropdown.selectedIndex].value;
            var selectedText2 = secondDropdown.options[secondDropdown.selectedIndex].text;

            // Clear existing options
            while (secondDropdown.options.length > 0) {
                secondDropdown.remove(0);
            }

            // Fetch new options from the server based on the selected value
            if (selectedValue !== "") {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                 
                    if (this.readyState == 4 && this.status == 200) {
                        // Parse the JSON response
                        var options = JSON.parse(this.responseText);

                        // Add new options to the second dropdown
                        for (var i = 0; i < options.length; i++) {
                            var option = document.createElement("option");
                            option.text = options[i].text;
                            option.value = options[i].value;

                            secondDropdown.add(option);
                        }


                        for (var i = 0; i < secondDropdown.options.length; i++) {
                            if (secondDropdown.options[i].text === selectedText2) {
                                secondDropdown.selectedIndex = i;
                                break;
                            }
                        }
                    }
                };

                // Send an AJAX request to the server

                xhttp.open("GET", "CreateListDetail_Helper.php?listId=" + selectedValue, true);
                xhttp.send();
            }
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

$title = "";

if (isset($_GET['titleId'])) {
    $title = $_GET["titleId"];
}



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve form data
    $title = $_POST["titleDropDown"];
    $list = $_POST["listDropDown"];
    $category = $_POST["categoryDropDown"];
    $seq = $_POST["seq"];



    // SQL query to insert data into the table
    $sql = "INSERT INTO List_Details (ListId, seq, TitleID, CategoryID, AltImage) VALUES ($list, $seq, $title, $category, '')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to another page with the ID as a parameter
        if(isset($_POST['submitOnly'])) {
            header("Location: CreateComplete.php");
            exit();
        }

        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
//$conn->close();

?>

<h2>Create List Entry</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">

<table border="0" style="border-spacing: 5px; vertical-align: top;">
    <tr><td>
    <label for="dropdown">Title:</label>
    </td><td>
    <select name="titleDropDown" required>
        <?php
        // Fetch values from the second table for the dropdown
        $lookupQuery = "SELECT ID, Title FROM Titles order by Title";
        $result = $conn->query($lookupQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $selected = ($title == $row['ID'] ? 'selected' : '');
                echo "<option value='" . $row["ID"] . "' $selected>" . $row["Title"] ."</option>";
            }
        }

        ?>
    </select><br>
    </td></tr>

    <tr><td>
    <label for="dropdown">List:</label>
    </td><td>
    <select id="listDropDown" name="listDropDown" onchange="updateSecondDropdown()" required>
        <?php
        // Fetch values from the second table for the dropdown
        $lookupQuery = "SELECT ID, ListName FROM Lists order by ID";
        $result = $conn->query($lookupQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["ID"] . "'>" . $row["ListName"] . "</option>";
            }
        }
        ?>
    </select><br>
    </td></tr>

    <tr><td>
    <label for="dropdown">Category:</label>
    </td><td>
    <select id="categoryDropDown" name="categoryDropDown" required>
    <?php
        // Fetch values from the second table for the dropdown
        $lookupQuery = "SELECT ID, Description FROM Categories WHERE ListID = 1 and ID > 0";
        $result = $conn->query($lookupQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["ID"] . "'>" . $row["Description"] . "</option>";
            }
        }
        ?>        
    </select><br>
    </td></tr>

    <tr><td>
    <label for="seq">Sequence:</label>
    </td><td>
    <input type="text" name="seq" required value="100"><br>
    </td></tr>
    
    <tr><td>
    &nbsp;
    </td><td>
    &nbsp;
    </td></tr>

    <tr><td>
    <input type="submit" value="Insert Record + Add Another">
    </td><td>
    <input type="submit" id="submitOnly" name="submitOnly" value="Insert Record">    
    </td></tr>

    </table>
</form>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>