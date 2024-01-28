<?php

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

$listId = (int)$_GET['listId'];
$filename = (int)$_GET['filename'];

$query = "select CategoryID, Title, Image, Hex, Data, Save, Version, Developer, Description, Likes, Website, Source, EEPROM_Start, EEPROM_End, EEPROM_Hash from vAll where listId = ".$listId;
$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));

$data = "CategoryID;Title;Image;Hex;Data;Save;Version;Developer;Description;Likes;Website;Source;EEPROM_Start;EEPROM_End;EEPROM_Hash\n";

while( $row = mysqli_fetch_row( $export ) )
  {
      $line = '';
      foreach( $row as $value )
      {
          if ( ( !isset( $value ) ) || ( $value == "" ) )
          {
              $value = ";";
          }
          else
          {
              $value = str_replace( '"' , '""' , $value );
              $value = $value .";";
          }
          $line .= $value;
      }
      $data .= trim( $line ) . "\n";
  }

$data = str_replace( "\r" , "" , $data );

if ( $data == "" )
{
    $data = "\n(0) Records Found!\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename);
header("Pragma: no-cache");
header("Expires: 0");
print "$data";
?>