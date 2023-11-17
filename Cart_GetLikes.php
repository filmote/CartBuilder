<?php

session_start();

require_once 'ReadCreds.php';

$hostname     = '';
$username     = '';
$password     = '';
$databasename = '';

readCreds($hostname, $username, $password, $databasename);

//$notdepreciated = intval(phpversion()[0]) <= 5;
//if ($notdepreciated)
//{
//  if (!$connection_result = mysql_connect($hostname, $username, $password)) {
//  	die('Error Connecting to MySQL Database: ' . mysql_error());
//  }
//  
//  if (!$db_result = mysql_select_db($databasename, $connection_result)) {
//  	die('Error Selecting the MySQL Database: ' . mysql_error());
//  }
//}
//else
//{
  if (!$connection_result = mysqli_connect($hostname, $username, $password)) {
  	die('Error Connecting to MySQL Database: ' . mysqli_error($connection_result));
  }
  
  if (!$db_result = mysqli_select_db($connection_result, $databasename)) {
  	die('Error Selecting the MySQL Database: ' . mysqli_error($connection_result));
  }
//}

$hex = $_GET['hex'];
$session = session_id();

$query = "SELECT ti.id, ti.likes, case when li.TitleID is null then 0 else 1 end as SessionFound FROM Titles ti inner join Builds bu on ti.id = bu.ID left join Likes li on ti.id = li.TitleID and li.SessionID = '" . $session . "' where bu.Hex = '" . $hex . "'";

//if ($notdepreciated)
//{
//  $export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
//  while( $row = mysql_fetch_row( $export ) )
//  {
//      $line = $row[0].";".$row[1].";".$row[2];
//  }
//}
//else
//{
  $export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));
  while( $row = mysqli_fetch_row( $export ) )
  {
      $line = $row[0].";".$row[1].";".$row[2];
  }
//}
echo $line;

?>