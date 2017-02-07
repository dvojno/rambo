<?php


$servername = "localhost";
$username = "dev_rasmc";
$password = "rambo1234";
$dbname = "vojno_dev_rasmc";



$connection = mysqli_connect($servername, $username, $password, $dbname);
$connection->set_charset("utf8");
//mysqli_set_charset($connection,"UTF8");

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
	$news = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM news ORDER BY date DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		$row['content'] = str_replace("|","",$row['content']);
		$news[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
  return $news;
}

// INTERVIEWS
function db_getInterviews($limit = '1000000'){
	global $connection;
	$interviews = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM interviews ORDER BY date DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		//$row['content'] = str_replace("|","",$row['content']);
		$interviews[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
  return $interviews;
}


// LYRICS
function db_getLyrics($limit = '1000000'){
	global $connection;
	$lyrics = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT a.id, a.title, a.album_id, a.lang, a.author, a.title, a.title_lang, a.content, b.name FROM lyrics a, albums b WHERE a.album_id = b.id ORDER BY id DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		$lyrics[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}

	$formatedLyrics = array();
	foreach ($lyrics as $value) {
		$i = $value['title'];
		if(!isset($formatedLyrics[$i])){
			$formatedLyrics[$i] = array();
			$formatedLyrics[$i]['languages'] = array();
			$formatedLyrics[$i]['languages'][] = $value['lang'];
			$formatedLyrics[$i]['ids'] = array();
			$formatedLyrics[$i]['ids'][] = $value['id'];
		}else{
			$formatedLyrics[$i]['languages'][] = $value['lang'];
			$formatedLyrics[$i]['ids'][] = $value['id'];
		}
		$formatedLyrics[$i]['album'] = $value['name'];
		$formatedLyrics[$i]['content'] = $value['content'];
		$formatedLyrics[$i]['author'] = $value['author'];
		if($value['lang'] == 'YU'){
			$formatedLyrics[$i]['id'] = $value['id'];
		}
	}
  //return $lyrics;
  return $formatedLyrics;
}

function db_getLyricsSingle($id){
	global $connection;
	$lyrics = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT a.id, a.title, a.album_id, a.lang, a.author, a.title, a.title_lang, a.content, b.name FROM lyrics a, albums b WHERE a.album_id = b.id AND a.id = '$id' ");
	while($row = mysqli_fetch_array($result)){
		
		$lyrics[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}

	$formatedLyrics = array();
	foreach ($lyrics as $value) {
		$i = $value['title'];
		if(!isset($formatedLyrics[$i])){
			$formatedLyrics[$i] = array();
			$formatedLyrics[$i]['languages'] = array();
			$formatedLyrics[$i]['languages'][] = $value['lang'];
			$formatedLyrics[$i]['ids'] = array();
			$formatedLyrics[$i]['ids'][] = $value['id'];
		}else{
			$formatedLyrics[$i]['languages'][] = $value['lang'];
			$formatedLyrics[$i]['ids'][] = $value['id'];
		}

		//if(!isset($formatedLyrics[$i]))

		$formatedLyrics[$i]['album'] = $value['name'];
		$formatedLyrics[$i]['content'] = $value['content'];
		$formatedLyrics[$i]['author'] = $value['author'];
		if($value['lang'] == 'YU'){
			$formatedLyrics[$i]['id'] = $value['id'];
		}
	}
  //return $lyrics;
  return $formatedLyrics;
}


// ALBUMS
function db_getAlbums($limit = '1000000'){
	global $connection;
	$albums = array();
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM albums WHERE 1 ORDER BY year DESC LIMIT $limit ");
	while($row = mysqli_fetch_array($result)){
		
		$albums[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
  return $albums;
}



?>