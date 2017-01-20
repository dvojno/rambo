<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db.class.php');


$lyrics = db_getLyrics(20);

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
        <th>Prevod</th>
        <th>Jezik</th>
        <th>Album</th>
        <th>Tekst</th>
        <th>Autor</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	foreach ($lyrics as $r) {

    		echo '<tr>';
        	echo '<td>'.$r['title'].'</td>';
        	echo '<td>'.$r['title_lang'].'</td>';
        	echo '<td>'.$r['lang'].'</td>';
        	echo '<td>'.$r['album_id'].'</td>';
        	echo '<td>'.$r['content'].'</td>';
        	echo '<td>'.$r['author'].'</td>';
      		echo '</tr>';
    	}
      ?>
     



    </tbody>
  </table>
</div>

</body>
</html>






















