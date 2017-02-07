<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db.class.php');


$lyrics = db_getLyrics();

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
        <!-- <th>Prevod</th> -->
        <th>id</th>
        <!--<th>Album</th>
        <th>Tekst</th>
        <th>Autor</th> -->
      </tr>
    </thead>
    <tbody>
    	<?php
      	// foreach ($lyrics as $title => $r) {
       //    	echo '<h1>'.$title.'</h1>';
       //    	echo '<p>'.$r['ids'].'</p>';
      	// }

      echo '<pre>';
      print_r($lyrics);
      echo '</pre>';
      ?>

      
     



    </tbody>
  </table>
</div>

</body>
</html>
























