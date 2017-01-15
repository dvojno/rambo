<!DOCTYPE html>
<html>
<title>RASMC</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css"  href="css/style.css">


<body style="background-image:url(images/sailing-background.png); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; >

<!-- Navbar -->


<!-- Navbar on small screens -->


<!-- Page content -->
<div class="w3-display-container w3-text-white" style="max-width:2000px;">
  <!-- Big Background Image -->
  
  <div class="w3-row sailing-page"> 
  <!-- The Band Section -->
    <div class="s6 w3-container w3-black sailing-cont" id="">
      <h2 class="w3-wide w3-center">SAILING SCHOOL</h2>
      <p>At Boka Kotorska  bay, in beautifull town of Herceg Novi, at sailing club " Jugole Grakalić" we have courses for beginners thought by experienced sailors seeking olympic triangle regatta sailing knowledge, along with every level inbetween.</p>
      <p>Details and booking:  antonije.pusic@ramboamadeus.com ,   rambadeus@gmail.com</p>
      <p>Škola jedrenja, u Herceg Novom. Teorija, praktična obuka na mikrotoneru "Pomidora".
      Vip časovi, Rambo Amadeus za kormilom, odaje tajne pomorskih vještina. 
      Master class. Predavanja i savjetovanja iz oblasti muzike, muzičke i video produkcije, advertisinga, šou biznisa i biznisa  u toku jedriličarske obuke. 
      Pitanja i podpitanja na antonije.pusic@ramboamadeus.com </p>
    </div>
  </div>
</div>

<div class="w3-display-container w3-text-white" style="max-width:2000px;">
  <div class="w3-row sailing-school-images"> 
    <div class="w3-col l3 w3-margin-bottom">
        <img src="images/sailing1.jpg" alt="Lights" style="width:100%; cursor:zoom-in"
        onclick="openModal();currentDiv(1)" class="w3-hover-shadow">
    </div>
    <div class="w3-col l3 w3-margin-bottom">
        <img src="images/sailing2.jpg" alt="Lights" style="width:100%; cursor:zoom-in"
        onclick="openModal();currentDiv(2)" class="w3-hover-shadow">
    </div>
    <div class="w3-col l3 w3-margin-bottom">
        <img src="images/sailing3.jpg" alt="Lights" style="width:100%; cursor:zoom-in"
        onclick="openModal();currentDiv(3)" class="w3-hover-shadow">
    </div>
    <div class="w3-col l3 w3-margin-bottom">
        <img src="images/sailing4.jpg" alt="Lights" style="width:100%; cursor:zoom-in"
        onclick="openModal();currentDiv(4)" class="w3-hover-shadow">
    </div>
  </div>
</div>

<div id="myModal" class="w3-modal w3-black">
 <span class="w3-text-white w3-xxlarge w3-hover-text-grey w3-container w3-display-topright" onclick="closeModal()" style="cursor:pointer">&times;</span>
 <div class="w3-modal-content">

  <div class="w3-content" style="max-width:1200px">
   <img class="mySlides" src="images/sailing1.jpg" style="width:100%">
   <img class="mySlides" src="images/sailing2.jpg" style="width:100%">
   <img class="mySlides" src="images/sailing3.jpg" style="width:100%">
   <img class="mySlides" src="images/sailing4.jpg" style="width:100%">
   <div class="w3-row w3-black w3-center">
    <div class="w3-container w3-display-container">
     <span class="w3-display-left w3-btn-floating" onclick="plusDivs(-1)">&#10094;</span>
     <span class="w3-display-right w3-btn-floating" onclick="plusDivs(1)">&#10095;</span>
    </div>
    <div class="w3-col s3">
     <img class="demo w3-opacity w3-hover-opacity-off" src="images/sailing1.jpg" style="width:100%" onclick="currentDiv(1)" alt="">
    </div>
    <div class="w3-col s3">
     <img class="demo w3-opacity w3-hover-opacity-off" src="images/sailing2.jpg" style="width:100%" onclick="currentDiv(2)" alt="Trolltunga, Norway">
    </div>
    <div class="w3-col s3">
     <img class="demo w3-opacity w3-hover-opacity-off" src="images/sailing3.jpg" style="width:100%" onclick="currentDiv(3)" alt="Mountains and fjords">
    </div>
    <div class="w3-col s3">
     <img class="demo w3-opacity w3-hover-opacity-off" src="images/sailing4.jpg" style="width:100%" onclick="currentDiv(3)" alt="Mountains and fjords">
    </div>
   </div> <!-- End row -->
  </div> <!-- End w3-content -->
  
 </div> <!-- End modal content -->
</div> <!-- End modal -->

 <script>
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-opacity-off", "");

  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>


<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-center w3-opacity w3-light-grey w3-xlarge">
  <i class="fa fa-facebook-official w3-hover-text-indigo"></i>
  <i class="fa fa-instagram w3-hover-text-purple"></i>
  <i class="fa fa-snapchat w3-hover-text-yellow"></i>
  <i class="fa fa-pinterest-p w3-hover-text-red"></i>
  <i class="fa fa-twitter w3-hover-text-light-blue"></i>
  <i class="fa fa-linkedin w3-hover-text-indigo"></i>
  <p class="w3-medium">Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">brainit</a></p>
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


</script>

</body>
</html>
