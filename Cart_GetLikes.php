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

$hex = $_GET['hex'];
$session = session_id();

$query = "SELECT ti.id, ti.likes, case when li.TitleID is null then 0 else 1 end as SessionFound FROM Titles ti inner join Builds bu on ti.id = bu.ID left join Likes li on ti.id = li.TitleID and li.SessionID = '" . $session . "' where bu.Hex = '" . $hex . "'";
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );

while( $row = mysql_fetch_row( $export ) )
{
    $line = $row[0].";".$row[1].";".$row[2];
}

echo $line;

?>