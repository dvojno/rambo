<!DOCTYPE html>
<html lang="en">
<head>
  <title>add event</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script>
  $( function() {
    $.datepicker.regional['sr-SR'] = {
                 closeText: 'Zatvori',
                 prevText: '&#x3C;',
                 nextText: '&#x3E;',
                 currentText: 'Danas',
                 monthNames: ['Januar','Februar','Mart','April','Maj','Jun',
                  'Jul','Avgust','Septembar','Oktobar','Novembar','Decembar'],
                  monthNamesShort: ['Jan','Feb','Mar','Apr','Maj','Jun',
                  'Jul','Avg','Sep','Okt','Nov','Dec'],
                  dayNames: ['Nedelja','Ponedeljak','Utorak','Sreda','Četvrtak','Petak','Subota'],
                  dayNamesShort: ['Ned','Pon','Uto','Sre','Čet','Pet','Sub'],
                  dayNamesMin: ['Ne','Po','Ut','Sr','Če','Pe','Su'],
                  weekHeader: 'Sed',
                  dateFormat: 'dd/mm/yy',
                  firstDay: 1,
                  isRTL: false,
                  showMonthAfterYear: false,
                   yearSuffix: ''};
          $.datepicker.setDefaults($.datepicker.regional['sr-SR']);
    $( "#datepicker" ).datepicker({ dateFormat: 'dd. MM  yy.' });
  } );

  

  </script>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
</head>
<body>

<style>

</style>

<div class="container">
  <h2>Add new event</h2>
  <form method="POST">


  
    <div class="form-group">
      <label for="date">datum:</label>
        <div class="input-group date">
          <input type='text' class="form-control" id="datepicker" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>

    <div class="form-group">
      <label for="city">vreme:</label>
         <select class="form-control" id="time">
          
        <?php 
            echo '<option selected="selected">21:00</option>';
            for($hours=0; $hours<24; $hours++) 
            for($mins=0; $mins<60; $mins+=30) 
                echo '<option>'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                       .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>'; ?>
        
          </select>
    </div>

    <div class="form-group">
      <label for="city">lokacija/venue:</label>
      <input type="text" class="form-control" id="venue" placeholder="unesite lokaciju održavanja eventa">
    </div>

    <div class="form-group">
      <label for="city">grad/mesto:</label>
      <input type="text" class="form-control" id="city" placeholder="unesite grad održavanja eventa">
    </div>

    <div class="form-group">
      <label for="country">država:</label>
      <input type="text" class="form-control" id="country" placeholder="unesite državu">
    </div>

    <div class="form-group">
      <label for="artist_name">artist name:</label>
      <select class="form-control" id="sel1">
        <option>Rambo Amadeus & Five Winnetous Sextet</option>
        <option>Veče Glomazne Poezije</option>
        <option>Rambo Amadeus, Two Winnetous & One more </option>
        <option>Rambo Amadeus & Two Winnetous</option>
        <option>Rambo Amadeus</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="description">opis eventa:</label>
      <textarea class="form-control" rows="5" id="description"></textarea>
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

 
  

    


</body>
</html>
