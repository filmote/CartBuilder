<?php
    
    $blankimage = str_repeat(chr(0xFF), 1024);
    $blankprogram = str_repeat(chr(0xFF), 29 * 1024);

    function align($size, $al) {
        return ceil($size / $al) * $al;
    }


    function LoadHexFileData($filename)
    {
        global $blankprogram;
        if (!is_file($filename)) return false;
        if ($file = fopen($filename, "r"))
        {
        $bytes = $blankprogram;
        $flash_end = 0;
        while(!feof($file))
        {
            $rcd = fgets($file);
            if ($rcd !== false && $rcd[0] == ":")
            {
            $rcd = @pack("H*",substr($rcd,1));
            $rcd_len  = ord($rcd[0]);
            $rcd_typ  = ord($rcd[3]);
            $rcd_addr = ord($rcd[1]) * 256 + ord($rcd[2]);
            $checksum = ord($rcd[4 + $rcd_len]);
            if (($rcd_typ == 0) && ($rcd_len > 0))
            {
                $flash_addr = $rcd_addr;
                for ($i = 0; $i < 4 + $rcd_len; $i++)
                {
                $checksum += ord($rcd[$i]);
                if ($i >= 4)
                {
                    $bytes[$flash_addr] = $rcd[$i];
                    $flash_addr ++;
                }
                }
                if ($flash_addr > $flash_end) $flash_end = $flash_addr;
                if ($checksum & 0xFF != 0) return false;
            }
            }
        }
        $flash_end = ($flash_end + 255) & 0xFF00;
        return substr($bytes, 0, $flash_end);
        }
        else return false;
    }

    function LoadDataFile($filename)
    {
        if (!is_file($filename)) return false;
        $bytes = file_get_contents($filename);
        if (is_string($bytes))
        {
        return $bytes . str_repeat(chr(0xFF), (256 - strlen($bytes) % 256) % 256);
        }
        return false;
    }

    function LoadSaveFile($filename)
    {
        if (!is_file($filename)) return false;
        $bytes = file_get_contents($filename);
        if (is_string($bytes))
        {
        return $bytes . str_repeat(chr(0xFF), (4096 - strlen($bytes) % 4096) % 4096);
        }
        return false;
    }

session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

readCreds($hostname, $username, $password, $databasename);

if (!$connection_result = mysqli_connect($hostname, $username, $password)) {
  	die('Error Connecting to MySQL Database: ' . mysqli_error($connection_result));
}

if (!$db_result = mysqli_select_db($connection_result, $databasename)) {
  	die('Error Selecting the MySQL Database: ' . mysqli_error($connection_result));
}

$id = $_GET["id"];
$query = "SELECT distinct ti.ID, ti.Title, bu.Hex, bu.Data, bu.Save, ti.size FROM Titles ti inner join Builds bu on ti.ID = bu.ID where bu.PlatformID in (1,4)";

if ($id != "All") { 
    $query = $query . " and ti.ID = ". $id;
}

$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));

?>

<html>

<?php
while( $row = mysqli_fetch_row( $export ) )
  {
        $id = $row[0];
        $title = $row[1];
        $binPath = $row[2];
        $dataPath = $row[3];
        $savePath = $row[4];

        $program = LoadHexFileData($binPath);
        $programsize = strlen($program);
        $datafile = LoadDataFile($dataPath);
        $datasize = strlen($datafile);
        $savefile = LoadSaveFile($savePath);
        $savesize = strlen($savefile);

        echo $title;

        $size = 256 + 1024;
        $size = align($size, 256) + $programsize;
        $size = align($size, 256) + $datasize;
        $size = align($size, 4096) + $savesize;
        $size = align($size, 256) + 256;

        echo " = ";
        echo $size;
        echo "<br/>";

        // Update the filesize in the DB
		$query = "update Titles set size = " .$size . " where id = " . $id;
		$update = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));

  }

?>
<html>