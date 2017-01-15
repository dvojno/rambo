<!DOCTYPE html>
<html>
<title>RASMC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">


<body>

<!-- Navbar -->


<!-- Navbar on small screens -->


<!-- Page content -->
<div class="w3-content" style="max-width:2000px;">

  <!-- Big Background Image -->
  <div class="w3-display-container w3-center" style="">
    <img src="images/rambo-amadeus.jpg" style="width:100%; height: 50%; margin-bottom: -6px;">
    <div class="w3-display-left w3-container w3-text-white w3-padding-32 w3-hide-small">
      <!-- <h1>RAMBO AMADEUS</h1> -->
      <img src="images/header-image.png" alt="world kilo tzar" style="width:100%">   
      <h1>OFFICIAL WEB SITE</h1>

    </div>
  
  </div>
</div>

<div class="w3-row news">
  <!-- The Band Section -->
  <div class="s6 w3-half w3-container news-cont" id="news">
    <h2 class="w3-wide w3-center">VESTI</h2>
    <p class="w3-opacity"><i>Koncert u Domu Sindikata, 29. decembra</i></p>
    <p class="w3-justify">Rambo Amadeus & Five Winnetous 29. Decembra uveče oko 20 h, koncert u velikoj sali Doma Sindikata. U Istom prostoru smo svirali  prije nešto više od godinu dana i vrijeme je da se svira opet. U medjuvremenu smo uradili neke nove komade, i uvježbali neke malo starije koje nismo svirali, pa se nadamo dobroj atmosferi, baš kao i prošli put. Možete najaviti svoj dolazak  i pozvati prijatelje na FB event strani .

    Gitara Chukamoto Sundjer Bob Didley Double Ementaler Maserati Kuplung  sa ponosom će biti prezentirana auditorijumu.

    U foajeu, prije samog koncerta biće u prodaji CD “Vrh Dna” i “Six pack”  kao i nova serija majci i ostalih brendiranih suvenira, koje ćemo nakon koncerta potpisivati

    Karte možete nabaviti i online.</p>
    <img src="images/dom-sindikata-gif.gif" class="w3-round w3-margin-bottom" alt="" style="width:100%">
    <div class="w3-row w3-padding-32">
      <div class="w3 w3-center">
        <a href="news.php"><p>sve vesti...</p></a>
        <img src="images/dom-sindikata-gig.gif" class="w3-round w3-margin-bottom" alt="" style="width:60%">
      </div>
      
    </div>
  </div>



  <!-- The Tour Section -->
  

  <div class="s6 w3-half w3-container w3-black"  id="concerts" style="">
    <div class="w3-container w3-content w3-padding-64">
      <h2 class="w3-wide w3-center">EVENTS</h2>
    <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">

      <?php require('db.class.php'); 
            
      $events = db_getAllEvents(3); ?>

      <?php
      foreach ($events as $r) {

  
        
      $date = $r['date']; ?>

      
        <div class="w3-third w3-margin-bottom">


          <img src="images/fap.jpg" alt="Zagreb" style="width:100%" class="w3-hover-opacity">
          <div class="w3-container w3-white">

      

            <p><b><?php echo $r['venue']; ?></b></p>
            <p class="w3-opacity"><?php echo date('l d.m.Y.', strtotime($date)); ?></p>
            <p class="w3-opacity"><?php echo $r['city']; ?></p>
            <p><?php echo $r['description']; ?></p>
            <button class="w3-btn w3-margin-bottom" onclick="document.getElementById('ticketModal').style.display='block'">tickets</button>
          </div>
        </div>
        
       <?php } ?>
      
      

        </div>
        <div class="w3 w3-center">
        <a href="events.php"><p>svi eventi...</p></a>
      </div>
      </div>
    </div>
  </div>
  
</div>
  <!-- Ticket Modal -->
  <div id="ticketModal" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-8">
      <header class="w3-container w3-teal w3-center w3-padding-32"> 
        <span onclick="document.getElementById('ticketModal').style.display='none'" 
       class="w3-closebtn w3-padding-xlarge w3-xxlarge w3-display-topright">×</span>
        <h2 class="w3-wide"><i class="fa fa-suitcase w3-margin-right"></i>Tickets</h2>
      </header>
      <div class="w3-container">
        <p><label><i class="fa fa-shopping-cart"></i> Tickets, $15 per person</label></p>
        <input class="w3-input w3-border" type="text" placeholder="How many?">
        <p><label><i class="fa fa-user"></i> Send To</label></p>
        <input class="w3-input w3-border" type="text" placeholder="Enter email">
        <button class="w3-btn-block w3-teal w3-padding-12 w3-section w3-right">PAY <i class="fa fa-check"></i></button>
        <button class="w3-btn w3-red w3-section" onclick="document.getElementById('ticketModal').style.display='none'">Close <i class="fa fa-remove"></i></button>
        <p class="w3-right">Need <a href="#" class="w3-text-blue">help?</a></p>
      </div>
    </div>
  </div>

  <!-- The Lyrics Section -->
  <div class="w3-row">
    <div class="s6 w3-half w3-container" id="lyrics" style="height: 600px;">
      <h2 class="w3-wide w3-center" style="margin-top: 5%;">LYRICS</h2>
    <div class="w3-content">  
      <!-- <h3 class="w3-wide w3-left">ALBUMI</h3> -->
      <ul class="w3-ul w3-center w3-hoverable" style=" padding-top: 30px;">
        <li>Vrh Dna</li>
        <li>Holesterol & Rock'n'roll</li>
        <li>Privatizova</li>
        <li>Zreo za penziju</li>
        <li>Muzika</li>
        <li>Urbano</li>
        <li>Moj skutere</li>
        <li>Bumbarov let</li>
        <li>Duge donje gaće</li>
        <li>Vrh Dna</li>
        <li>Holesterol & Rock'n'roll</li>
        <li>Privatizova</li>
      </ul>
      </div>
    </div>

    <div class="s6 w3-half w3-container" id="lyrics" style="height: 600px;">
      <h2 class="w3-wide w3-center" style="margin-top: 0; margin-bottom: 0; margin-top: 5%;">ALBUMS</h2>
    <div class="w3-content w3-center">  
      <!-- <h3 class="w3-wide w3-left">ALBUMI</h3> -->
       
        <img src="images/album-vrh-dna.jpg" alt="Vrh dna"  style="width: 60%; padding-top: 20px">
       
      </div>
    </div>
    
  </div>


  <div class="w3-row">
  <!-- The Band Section -->
  <div class=" s6 w3-half w3-container w3-khaki" style="height: 600px;" id="photo">
    <h2 class="w3-wide">FOTO</h2>
    <p class="w3-opacity"></p>
    <p class="w3-justify"></p>
    
    
  </div>

  <!-- The Sailing Section -->
  <div class="s6 w3-half w3-container" id="sailing" style="position: relative; height: 600px; padding: 0; background-color: black; opacity: 0.7;background: url(images/sailing.jpg) no-repeat; background-size: cover; background-position: center;">
      <a href="sailing-school.php" target="_blank"><h2 style="color: black; position: absolute; top: 5px; right: 5%;"> SAILING SCHOOL</h2></a>
      <a href="solar-retro-sailboat.php" target="_blank"><h2 style="color: white; position: absolute; bottom: 3%; left: 5%;"> SOLAR RETRO SAILBOAT</h2></a>
  </div>

  </div>
</div>

<div class="w3-row w3-black" >
    <div class="w3-content" id="about" style="height: 600px;">
    
      <h2 class="w3-wide w3-center" style="width: 90%; margin-top: 0; margin-bottom: 0; padding-top: 5%;">ABOUT</h2>
    </div>
    
    
  </div>

  <!-- The Contact Section --> 
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">KONTAKT</h2>
    <p class="w3-opacity w3-center"><i>Pošaljite poruku!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Beograd, Srbija<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: info@ramboamadeus.com<br>
      </div>
      <div class="w3-col m6">
        <form action="form.asp" target="_blank">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Ime" required name="Name">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" placeholder="Poruka" required name="Message">
          <button class="w3-btn w3-section w3-right" type="submit">SEND</button>
        </form>
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>



<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-text-indigo"><a href="https://www.facebook.com/ramboamadeus/?fref=ts"></a></i>
  <p class="w3-medium">Powered by <a href="http://www.brainit.rs" target="_blank">brainit</a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
