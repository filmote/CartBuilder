<!DOCTYPE html>
<html>
<head>
    <title>Create Builds</title>
    <script>
        function validateForm() {
            var pngFile = document.getElementById("png_file").value;
            var hexFile = document.getElementById("hex_file").value;
            var bin1File = document.getElementById("bin1_file").value;
            var bin2File = document.getElementById("bin2_file").value;

            // Check PNG file
            if (!pngFile.endsWith(".png")) {
                alert("Only PNG files are allowed for PNG file.");
                return false;
            }

            // Check HEX file
            if (!hexFile.endsWith(".hex")) {
                alert("Only HEX files are allowed for HEX file.");
                return false;
            }

            // Check BIN1 file (if provided)
            if (bin1File !== "" && !bin1File.endsWith(".bin")) {
                alert("Only BIN files are allowed for BIN1 file.");
                return false;
            }

            // Check BIN2 file (if provided)
            if (bin2File !== "" && !bin2File.endsWith(".bin")) {
                alert("Only BIN files are allowed for BIN2 file.");
                return false;
            }

            return true;
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
$platform = "";
$directory = "";

if (isset($_GET['titleId'])) {
    $title = $_GET["titleId"];
}

if (isset($_GET['platformId'])) {
    $platform = $_GET["platformId"];
}

if (isset($_GET['directory'])) {
    $platform = $_GET["directory"];
}


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["titleDropDown"];
    $platform = $_POST["platformDropDown"];
    $directory = $_POST["directoryDropDown"];

    // File upload handling for PNG
    $pngFile = $_FILES["png_file"];
    $pngFileName = $pngFile["name"];
    $pngTempName = $pngFile["tmp_name"];
    $pngFileType = strtolower(pathinfo($pngFileName, PATHINFO_EXTENSION));
    
    $path_info = pathinfo($pngFileName);
    echo $path_info['extension'];

    if ($pngFileType != "png") {
        echo "Only PNG files are allowed." . $pngFile . "|" . $pngFileType . "|" . $pngFileName . "|" . $_FILES;
    } else {

        $pngFileName = $directory . "/" . $pngFileName;
        move_uploaded_file($pngTempName, $pngFileName);


        // File upload handling for HEX
        $hexFile = $_FILES["hex_file"];
        $hexFileName = $hexFile["name"];
        $hexTempName = $hexFile["tmp_name"];
        $hexFileType = strtolower(pathinfo($hexFileName, PATHINFO_EXTENSION));

        if ($hexFileType != "hex") {
            echo "Only HEX files are allowed.";
        } else {

            $hexFileName = $directory . "/" . $hexFileName;
            move_uploaded_file($hexTempName, $hexFileName);

            // File upload handling for BIN1
            $bin1File = $_FILES["bin1_file"];
            $bin1FileName = $bin1File["name"];
            $bin1TempName = $bin1File["tmp_name"];
            $bin1FileType = strtolower(pathinfo($bin1FileName, PATHINFO_EXTENSION));

            if (!empty($bin1FileName)) {
                $bin1FileType = $directory . "/" . $bin1FileName;
                if ($bin1FileType != "bin") {
                    echo "Only BIN files are allowed for BIN1.";
                } else {
                    move_uploaded_file($bin1TempName, $bin1FileName);
                }
            }

            // File upload handling for BIN2
            $bin2File = $_FILES["bin2_file"];
            $bin2FileName = $bin2File["name"];
            $bin2TempName = $bin2File["tmp_name"];
            $bin2FileType = strtolower(pathinfo($bin2FileName, PATHINFO_EXTENSION));

            if (!empty($bin2FileName)) {
                $bin2FileType = $directory . "/" . $bin2FileType;
                if ($bin2FileType != "bin") {
                    echo "Only BIN files are allowed for BIN2.";
                } else {
                    move_uploaded_file($bin2TempName, $bin2FileName);
                }
            }
        }


        // SQL query to insert data into the table
        $sql = "INSERT INTO Builds (id, platformId, image, hex, data, save) VALUES ($title, $platform, '$pngFileName', '$hexFileName', '$bin1FileName', '$bin2FileName')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to another page with the ID as a parameter
            if(isset($_POST['submitOnly'])) {
                echo "asdas";
                header("Location: CreateListDetail.php?titleId=$title&platformID=$platform&directory=$directory");
                exit();
            }

            echo "Record inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
}

// Close the database connection
//$conn->close();

?>

<h2>Create Build</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" onsubmit="return validateForm()">

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
    <label for="dropdown">Platform:</label>
    </td><td>
    <select name="platformDropDown" required>
        <?php
        // Fetch values from the second table for the dropdown
        $lookupQuery = "SELECT ID, Platform FROM Platforms order by ID";
        $result = $conn->query($lookupQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $selected = $platform == $row['ID'] ? 'selected' : '';
                echo "<option value='" . $row["ID"] . "' $selected>" . $row["Platform"] . "</option>";
            }
        }
        ?>
    </select><br>
    </td></tr>

    <tr><td>
    <label for="dropdown">Directory:</label>
    </td><td>
    <select name="directoryDropDown" required>
    <option value='Action' <?php echo ($directory == 'Action' ?'selected' : ''); ?> >Action</option>
    <option value='Application' <?php echo ($directory == 'Application' ?'selected' : ''); ?> >Application</option>
    <option value='Multi' <?php echo ($directory == 'Multi' ?'selected' : ''); ?> >Multi</option>
    <option value='Platformers' <?php echo ($directory == 'Platformers' ?'selected' : ''); ?> >Platformers</option>
    <option value='Puzzle' <?php echo ($directory == 'Puzzle' ?'selected' : ''); ?> >Puzzle</option>
    <option value='RPG' <?php echo ($directory == 'RPG' ?'selected' : ''); ?> >RPG</option>
    <option value='Racing' <?php echo ($directory == 'Racing' ?'selected' : ''); ?> >Racing</option>
    <option value='SSD1306' <?php echo ($directory == 'SSD1306' ?'selected' : ''); ?> >SSD1306</option>
    <option value='Shooter' <?php echo ($directory == 'Shooter' ?'selected' : ''); ?> >Shooter</option>
    <option value='Sports' <?php echo ($directory == 'Sports' ?'selected' : ''); ?> >Sports</option>
    </select><br>
    </td></tr>

    <tr><td>
    <label for="png_file">Upload PNG File (Mandatory):</label>
    </td><td>
    <input type="file" name="png_file" accept=".png" required><br>
    </td></tr>

    <tr><td>
    <label for="hex_file">Upload HEX File (Mandatory):</label>
    </td><td>
    <input type="file" name="hex_file" accept=".hex" required><br>
    </td></tr>

    <tr><td>
    <label for="bin1_file">Upload data BIN File (Optional):</label>
    </td><td>
    <input type="file" name="bin1_file" accept=".bin"><br>
    </td></tr>

    <tr><td>
    <label for="bin2_file">Upload save BIN File (Optional):</label>
    </td><td>
    <input type="file" name="bin2_file" accept=".bin"><br>
    </td></tr>

    <tr><td>
    &nbsp;
    </td><td>
    &nbsp;
    </td></tr>

    <tr><td>
    <input type="submit" value="Insert Record + Add Another">
    </td><td>
    <input type="submit" id="submitOnly" name ="submitOnly" value="Insert Record">    
    </td></tr>

    <tr><td>
    <a href="<?php echo "CreateListDetail.php?titleId=$title&platformID=$platform&directory=$directory";?>">Skip to List Details</a>
    </td><td></td></tr>

</table>

</form>

<?php
// Close the database connection
$conn->close();
?>

</body>
</html>