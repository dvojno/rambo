<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db.class.php');

$news = db_getNews();

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
        <th>Naslov</th>
        <th>Datum</th>
        <th>Vreme</th>
        <th>Sadrzaj</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	foreach ($news as $r) {

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
        	echo '<td>'.$r['title'].'</td>';
        	echo '<td>'.$r['date'].'</td>';
        	echo '<td>'.$r['time'].'</td>';
        	echo '<td>'.$r['content'].'</td>';
      		echo '</tr>';
    	}
      ?>
     



    </tbody>
  </table>
</div>

</body>
</html>