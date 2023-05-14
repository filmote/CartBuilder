<?php

session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

readCreds($hostname, $username, $password, $databasename);

if (!$connection_result = mysql_connect($hostname, $username, $password)) {
	die('Error Connecting to MySQL Database: ' . mysql_error());
}

if (!$db_result = mysql_select_db($databasename, $connection_result)) {
	die('Error Selecting the MySQL Database: ' . mysql_error());
}

$listId = (int)$_GET['listId'];
$filename = (int)$_GET['filename'];
$query = "select CategoryID, Title, Image, Hex, Data, Save, Version, Developer, Description, Likes, Website, Source, EEPROM_Start, EEPROM_End, EEPROM_Hash from vAll where listId = ".$listId;
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );

$data = "CategoryID;Title;Image;Hex;Data;Save;Version;Developer;Description;Likes;Website;Source;EEPROM_Start;EEPROM_End;EEPROM_Hash\n";

while( $row = mysql_fetch_row( $export ) )
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
header("Content-Disposition: attachment; filename=".filename);
header("Pragma: no-cache");
header("Expires: 0");
print "$data";
?>