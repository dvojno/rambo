<?php


$servername = "localhost";
$username = "dev_rasmc";
$password = "rambo1234";
$dbname = "vojno_dev_rasmc";



$connection = mysqli_connect($servername, $username, $password, $dbname);
$connection->set_charset("utf8");

// Check connection
if (!$connection) {

	echo("Connection failed: " . mysqli_connect_error());

}


// EVENTS

function db_getAllEvents($limit = '1000000'){
	global $connection;
	$events = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM events a, artists b WHERE status=1 AND a.artist_id = b.artist_id  ORDER BY date DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		$events[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
  return $events;
}

// NEWS
function db_getNews($limit = '1000000'){
	global $connection;
	$events = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM news ORDER BY date DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		$events[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
  return $events;
}



?>