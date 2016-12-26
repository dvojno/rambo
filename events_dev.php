<?php

//include('db_functions.php');

//testDB();

include('connection.php');


$events = array();
function getAllEvents(){
	global $connection;
	global $events;
	//$result = mysqli_query($connection," SELECT a.show_id, a.show_artist_id, a.show_date, a.show_notes, b.venue_id, b.venue_name, b.venue_city, b.venue_country, c.artist_name, c.artist_id FROM wpra_gigpress_shows a, wpra_gigpress_venues b, wpra_gigpress_artists c WHERE a.show_venue_id = b.venue_id AND a.show_artist_id = c.artist_id ORDER BY a.show_date DESC ");
	$result = mysqli_query($connection," SELECT * FROM events WHERE status=1 ORDER BY date DESC ");
	while($row = mysqli_fetch_array($result)){
		
		$events[] = $row;
		//echo $row['show_id'] . ' ' . $row['venue_name'] . ' ' . $row['show_date'] . ' ' . $row['artist_name'] .'<br>';
	}
}
getAllEvents();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>ALL EVENTS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>EVENTS</h2>
  <p>The list of all RASMC events</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Dvorana</th>
        <th>Datum</th>
        <th>City</th>
        <th>Artist</th>
        <th>ArtistID</th>
        <th>Country</th>
        <th>notes</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	foreach ($events as $r) {

    		//$city = $connection->real_escape_string($city);

   //  		$date = $r['show_date'];
   //  		$city = mysqli_real_escape_string($connection, $r['venue_city']);
   //  		$country = $r['venue_country'];
   //  		$venue = mysqli_real_escape_string($connection, $r['venue_name']);
   //  		$description = mysqli_real_escape_string($connection, $r['show_notes']);
   //  		$artist_id = $r['artist_id'];

   //  		$res = mysqli_query($connection,"INSERT INTO koncerti (date, city, country, venue, description, artist_id) 
   //  											VALUES ('$date','$city','$country','$venue','$description','$artist_id')");
   //  		if (!$res) {
   //  			//die("insert failed: " . mysqli_error());
   //  			echo '<br>error insertion' . mysqli_error($connection);
			// }
    		// echo '<tr>';
      //   	echo '<td>'.$r['venue_name'].'</td>';
      //   	echo '<td>'.$r['show_date'].'</td>';
      //   	echo '<td>'.$r['venue_city'].'</td>';
      //   	echo '<td>'.$r['artist_name'].'</td>';
      //   	echo '<td>'.$r['artist_id'].'</td>';
      //   	echo '<td>'.$r['venue_country'].'</td>';
      //   	echo '<td>'.$r['show_notes'].'</td>';
      // 		echo '</tr>';
    		echo '<tr>';
        	echo '<td>'.$r['venue'].'</td>';
        	echo '<td>'.$r['date'].'</td>';
        	echo '<td>'.$r['city'].'</td>';
        	echo '<td>'.$r['url'].'</td>';
        	echo '<td>'.$r['artist_id'].'</td>';
        	echo '<td>'.$r['country'].'</td>';
        	echo '<td>'.$r['description'].'</td>';
      		echo '</tr>';
    	}
      ?>
     



    </tbody>
  </table>
</div>

</body>
</html>






















