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


$id = $_GET['id'];
$session = session_id();

$query = "SELECT count(*) from Likes where TitleID = " . $id . " and SessionID = '" . $session . "'";
$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));

while( $row = mysqli_fetch_row( $export ) ) {

    if ($row[0] > "0") {

		$query = "delete from Likes where TitleID = " . $id . " and SessionID = '" . $session . "'";
		$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));
		$query = "update Titles set likes = likes - 1 where id = " . $id;
		$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));
	}

}

// Get current status ..

$query = "SELECT ti.id, ti.likes, case when li.TitleID is null then 0 else 1 end as SessionFound FROM Titles ti left join Likes li on ti.id = li.TitleID and li.SessionID = '" . $session . "' where ti.id = " . $id;
$export = mysqli_query ( $connection_result, $query ) or die ( "Sql error : " . mysqli_error($connection_result));

while( $row = mysqli_fetch_row( $export ) ) {
	$line = $row[0].";".$row[1].";".$row[2];
}
echo $line;
?>