<?php

session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

$d1 = false;
$d2 = false;
$d3 = false;
$d4 = false;

readCreds($hostname, $username, $password, $databasename);

$conn = new mysqli($hostname, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

if (isset($_GET['device'])) {
  $devices = $_GET['device'];

  if (strpos($devices, "ArduboyFX") !== false) {
    $d1 = true;
  }

  if (strpos($devices, "8BitCadeXL") !== false) {
    $d2 = true;
  }

  if (strpos($devices, "SSD1306") !== false) {
    $d3 = true;
  }

  if (strpos($devices, "ArduboyMini") !== false) {
    $d4 = true;
  }

  $hasOne = false;
  $platform = "(";

  if ($d1) {
    $platform = $platform . "1";
    $hasOne = true;
  }

  if ($d2) {
    if ($hasOne) {
      $platform = $platform . ",";
    }
    $platform = $platform . "2";
    $hasOne = true;
  }

  if ($d3) {
    if ($hasOne) {
      $platform = $platform . ",";
    }
    $platform = $platform . "3";
    $hasOne = true;
  }

  if ($d4) {
    if ($hasOne) {
      $platform = $platform . ",";
    }
    $platform = $platform . "4";
    $hasOne = true;
  }

  $platform = $platform . ")";

  $query = "select TI.ID,TI.Title,TI.Developer,TI.Version,TI.Website,TI.Source,TI.EEPROM_Start,TI.EEPROM_End,TI.EEPROM_Hash,TI.Description,CT.Description from Titles TI left join List_Details LD on TI.ID = LD.TitleID and LD.ListID = 1 left join Categories CT on LD.CategoryID = CT.ID and CT.ListID = 1 inner join List_Details LD2 on TI.ID = LD2.TitleID and LD2.ListID in " . $platform;
  // die(">>> " .  $query);

}
else {   
  $query = "select TI.ID,TI.Title,TI.Developer,TI.Version,TI.Website,TI.Source,TI.EEPROM_Start,TI.EEPROM_End,TI.EEPROM_Hash,TI.Description,CT.Description from Titles TI left join List_Details LD on TI.ID = LD.TitleID and ListID = 1 left join Categories CT on LD.CategoryID = CT.ID and CT.ListID = 1";
  // die(">>> no params " .  $query);
}


$result = $conn->query($query);

$data = "[";

$result_Counter = 0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $data = $data . '{ "ID": "' . $row["ID"]. '","title": ' .  json_encode($row["Title"]). ',"developer": ' .  json_encode($row["Developer"]). ',"version": ' .  json_encode($row["Version"]);
    if (trim($row["Description"]) == "") {
      $data = $data . ', "info" : "", ';
    }
    else {
      $data = $data . ', "info" : ' . json_encode($row["Description"]). ', ';
    }
    $data = $data . '"program": {';

   
    $builds = "";
    $hasOne = false;

    if ($d1 || $d4) {
      $builds = "select distinct B.ID, B.Image,B.Hex,B.Data,B.Save, 'Arduboy' as PlatformID from Builds B where B.ID = xxx and B.PlatformID in (1, 4) and coalesce(B.Data, '') = '' and coalesce(B.Save, '') = '' ";     
      $hasOne = true;
    }

    if ($d1) {
      if ($hasOne) {
        $builds = $builds . "union all ";
      }
      $builds = $builds . "select B.ID, B.Image,B.Hex,B.Data,B.Save, 'ArduboyFX' as PlatformID from Builds B where B.ID = xxx and B.PlatformID = 1 and (coalesce(B.Data, '') <> '' or coalesce(B.Save, '') <> '') " ;     
      $hasOne = true;
    }

    if ($d4) {
      if ($hasOne) {
        $builds = $builds . "union all ";
      }
      $builds = $builds . "select B.ID, B.Image,B.Hex,B.Data,B.Save, 'ArduboyMini' as PlatformID from Builds B where B.ID = xxx and B.PlatformID = 4 and (coalesce(B.Data, '') <> '' or coalesce(B.Save, '') <> '') " ;     
      $hasOne = true;
    }

    if ($d2) {
      if ($hasOne) {
        $builds = $builds . "union all ";
      }
      $builds = $builds . "select B.ID, B.Image,B.Hex,B.Data,B.Save, '8BitCade' as PlatformID from Builds B where B.PlatformID = 2 and B.ID = xxx " ;     
      $hasOne = true;
    }

    if ($d3) {
      if ($hasOne) {
        $builds = $builds . "union all ";
      }
      $builds = $builds . "select B.ID, B.Image,B.Hex,B.Data,B.Save, 'SSD1309' as PlatformID from Builds B where B.PlatformID = 3 and B.ID = xxx " ;     
      $hasOne = true;
    }

    if ($hasOne == false) {
      $builds = "select distinct B.ID, B.Image,B.Hex,B.Data,B.Save, 'Arduboy' as PlatformID from Builds B where B.ID = xxx and B.PlatformID in (1, 4) and coalesce(B.Data, '') = '' and coalesce(B.Save, '') = '' union all select B.ID, B.Image,B.Hex,B.Data,B.Save, 'ArduboyFX' as PlatformID from Builds B where B.ID = xxx and B.PlatformID = 1 and (coalesce(B.Data, '') <> '' or coalesce(B.Save, '') <> '') union all select B.ID, B.Image,B.Hex,B.Data,B.Save, 'ArduboyMini' as PlatformID from Builds B where B.ID = xxx and B.PlatformID = 4 and (coalesce(B.Data, '') <> '' or coalesce(B.Save, '') <> '') union all select B.ID, B.Image,B.Hex,B.Data,B.Save, '8BitCade' as PlatformID from Builds B where B.PlatformID = 2 and B.ID = xxx union all select B.ID, B.Image,B.Hex,B.Data,B.Save, 'SSD1309' as PlatformID from Builds B where B.PlatformID = 3 and B.ID = xxx";
    }

    $builds = str_replace("xxx", $row["ID"], $builds);
    // die(">>>  " .  $builds);

    $buildResults = $conn->query($builds);
    $buildResults_Counter = 0;

    while($buildRow = $buildResults->fetch_assoc()) {

      $data = $data. '"'. $buildRow["PlatformID"]. '" : {';

      $data = $data . '"image": ' . json_encode($buildRow["Image"]). ', "hex": ' .  json_encode($buildRow["Hex"]);
      
      if ($buildRow["Data"] != "") {
        $data = $data . ', "fxdata": ' . json_encode($buildRow["Data"]);
      }
      
      if ($buildRow["Save"] != "") {
        $data = $data . ', "fxsave": ' . json_encode($buildRow["Save"]);
      }

      $image = "";
      $image = file_get_contents($buildRow["Image"]);
      $imageData = base64_encode($image);
      $data = $data . ', "image64": ' . json_encode($imageData);

      if (++$buildResults_Counter == $buildResults->num_rows) {
        $data = $data . ' } ';
      } else {
        $data = $data . ' }, ';
      }

      // $builds = "select ID,PlatformID,Image,Hex from Builds where ID = ". $row["ID"];
      // $buildResults = $conn->query($builds);
      
    }
      
    $data = $data. "}";
// die($data);
    if (++$result_Counter == $result->num_rows) {
      $data = $data . ' } ';
    } else {
      $data = $data . ' }, ';
    }

  }
}

$data = $data . "]";
header("Content-type: application/application/json");
header("Pragma: no-cache");
header("Expires: 0");
print "$data";
?>