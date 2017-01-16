<h1>RAMBO AMADEUS</h1>
<p>edit news:</p>
<html>
<head>
<!-- <title>JavaScript file upload</title> -->
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="../css/style_news.css" rel="stylesheet" type="text/css" /> -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	
</head>

<style>
button {
	cursor: pointer;
}

.unselectable {
    -khtml-user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

label {
  display: inline-block;
  width: 140px;
  text-align: right;
}​
textarea{
	background-color: white;
   color:black;
   height: 320px;
 }

 input {
 	//width: 100%;
 }
 #mainCont img {
 	height: 128px;
 	display: block;
 	margin-left: 20px;
 }
</style>

<body>

<?php

$edit = 'false';
$main_description_on_page = 'Unos nove vesti:';
$submit_text = 'DODAJ VEST';

if(isset($_GET['id'])){

	$id = $_GET['id'];
	$edit = 'true';
	$submit_text = 'PRIHVATI PROMENE';
	$main_description_on_page = 'Promena postojece vesti:';
	include('../connection.php');
	
	$sql = mysqli_query($connection, "SELECT * FROM news WHERE id='$id' ");
	while($news = mysqli_fetch_array($sql)){
		$id = $news['id'];
		$title = $news['title'];
		$description = $news['description'];
		$date_event = $news['date_event'];
		$content = $news['content'];
		$image = $news['image'];
		$l = $news['lang'];
		$lang = trim($l);
		//echo 'language: '. $lang;
	}

 $trimmedContent = preg_replace( "/\r|\n/", "", $content);
}


?>

<div id="thumbnailImageCont"></div>
<form action="add-news.php" id="finalForm" method="post">
<input type='hidden' name='finalPost' id='final' value='0'/>
<input type='hidden' name='image' id='image' value='<?php echo $image; ?>'/>
<input type='hidden' name='edit' id='edit' value='<?php echo $edit; ?>'/>
<input type='hidden' name='id' id='id' value='<?php echo $id; ?>'/>
 <label>Language: </label><select name="lang" value='<?php echo $lang; ?>'>
  <option value="rs" <?php if($lang == 'rs') echo 'selected'; ?> >rs</option>
  <option value="en" <?php if($lang == 'en') echo 'selected'; ?> >en</option>
</select> 
<label>Title: </label><input type="text" id="title" name="title" size="64" maxlength="64" style="margin-bottom: 5px;" value='<?php echo $title; ?>'><br>
<!-- <label>Description: </label> OVO ISPOD JE DISPLAY NONE TEMP-->
<input type="text" id="description" name="description" size="256" maxlength="256" style="margin-bottom: 5px; display: none;" value='<?php echo $description; ?>'><br>
<label>Date: </label><input type="text" id="datepicker" name="date_event" style="margin-bottom: 5px;" value='<?php echo $date_event; ?>'><br>
</form>
<!-- <input type="submit"> -->


<button onClick='addNewParagraph()'>Dodaj text</button>
<!-- <button onClick='addNewTitle()'>Dodaj naslov</button> -->
<button onClick='addNewSubTitle()'>Dodaj podnaslov</button>
<button onClick='addNewQuote()'>Dodaj navod</button>
<button onClick='addNewImage()'>Dodaj sliku</button>
<button onClick='addThumbnailImage()' style="color: red">Dodaj thumbnail</button>
<button onClick='submitPost()' style="float: right;"><?php echo $submit_text; ?></button>


<br><br><hr style="border-top: 1px solid gray;">
<div style="display: block; width: 100%;">
	<div style='display: inline-block; width: 39%; float: left; background: #efefef; height: 100%; color: gray;'>
		INPUT: <br>
		<div id='input' style="text-align: left;">
			
		</div>
	</div>

	<div id='mainCont' class="news" style='display: inline-block; width: 60%; float: left;'>



	</div>

</div>

<script>

var editId = 0;
var elements = [];

function parseNews(s){
	//var string = '<div><p></p></div><h1></h1>';
	var str = '<h1>A</h1>|<h2>B</h2>|<p>Foobar</p>|<h3>C</h3>'
	var a = s.split("|"); // ["<h1>A</h1>", "<h2>B</h2>", "<h3>C</h3>"]
	return a;
}

//console.log(parseNews('<button onClick="insertLink()">DODAJ LINK</button>|<div id="linkCont" style="background: gray;"></div>'));

function submitPost(){
//create content from array
	content = '';
	for(var i = 0; i < contentArr.length; i++){
		content += contentArr[i] + '|';
	}
	document.getElementById("final").value = content;
	console.log(content);
	document.getElementById("finalForm").submit();
}

// title h1
// subtitle h2
// image title h3
// date h4

// image description h6
// paragraph p
// lik a



var mainCont = document.getElementById('mainCont');
var contentArr = [];
var contentTypeArr = [];
var content = '';
//contentArr[0] = '<p>Petko car!</p>';
//contentArr[1] = '<p>Vojno car!</p>';





var inputDiv = document.getElementById('input');

function insertLink2(){

    var e = document.getElementById('paragraphContent');
    getText(e);

}

function getText(elem) {
    if(elem.tagName === "TEXTAREA" ||
       (elem.tagName === "INPUT" && elem.type === "text")) {
        //return elem.value.substring(elem.selectionStart,
                                    //elem.selectionEnd);
		var selectedText =  elem.value.substring(elem.selectionStart, elem.selectionEnd);
			var text = elem.value;
			var textStart = text.slice(0, elem.selectionStart);
			var textEnd = text.slice(elem.selectionEnd);
		var anchor = prompt("Anchor:", "http://");
    
    	if (anchor != null) {
        	//
    	
			
	    	elem.value = textStart  + ' <a href="'+anchor+'" target="_blank" >' + selectedText + '</a>' + textEnd;
    	}

    }
    return null;
}

  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
  } );

  //$( ".selector" ).datepicker({dateFormat: "yy-mm-dd"});



function insertLink(){
	var lc = document.getElementById('linkCont');
	var c = '<br>Tekst linka:<br><input type="text" id="linkText"> \
			<br>Adresa (full path):<br><input type="text" id="linkAnchor"> \
			<br><br><button onClick="placeLink()">PLACE LINK</button>';
	lc.innerHTML = c;
}

function placeLink(){
	document.getElementById('paragraphContent').value += '<a href="' + document.getElementById('linkAnchor').value + '" target="_blank"> \
	' + document.getElementById('linkText').value + '</a>';
}

function createHtmlEditorButtons(){
	var a = '<button onmousedown="insertLink2()" class="unselectable">&#x1f517;</button>';
	var b = '<button onmousedown="insertBold()" class="unselectable">&#x1d401;</button>';
	return a + b;
}

var area2;
function addNewParagraph(){
	
	//var b = '<br><button onmousedown="insertLink2()" class="unselectable">&#x1f517;</button><br><br><div id="linkCont" style="background: gray;"></div>';
	var c = '<br>Tekst:<br><textarea rows="20" cols="60" id="paragraphContent" contenteditable="true" style="resize: none; width: 96%; padding-left: 100px;"></textarea><br><br><button onClick="submitParagraph()" style="float: right; margin-right: 2%;">SUBMIT</button>';
	inputDiv.innerHTML = c;
	//area2 = new nicEditor({fullPanel : true}).panelInstance('paragraphContent');
	area2 = new nicEditor({buttonList : ['bold','italic','underline','strikeThrough','link','unlink','html','left'], maxHeight : 320}).panelInstance('paragraphContent');
	//new nicEditor({buttonList : ['bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('paragraphContent');
}

function addNewTitle(){
	var c = '<br>Tekst naslova:<br><input type="text" id="paragraphContent"><br><br><input type="text" id="paragraphDate"><button onClick="submitTitle()">SUBMIT</button>';
	inputDiv.innerHTML = c;
}

function addNewSubTitle(){
	var c = '<br>Tekst podnaslova:<br><input type="text" style="width: 100%;" id="paragraphContent"><br><br><button onClick="submitSubTitle()" style="float: right;">SUBMIT</button>';
	inputDiv.innerHTML = c;
}

function addNewQuote(){
	var c = '<br>Tekst navoda:<br><input type="text" style="width: 100%;" id="paragraphContent"><br><br><button onClick="submitQuote()" style="float: right;">SUBMIT</button>';
	inputDiv.innerHTML = c;
}

var image = '';
function addNewImage(){

	
	var c = '<div class="bgColor"> \
<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data"> \
<div id="targetLayer">No Image</div> \
<div id="uploadFormLayer"> \
<label>Odaberi sliku:</label><br/> \
<input name="userImage" type="file" class="inputFile" /> \
<input type="submit" value="Submit" class="btnSubmit" /> \
</form> \
</div> \
</div> \
<br>NASLOV SLIKE: \
<br><textarea rows="4" cols="50" id="imageTitle"></textarea> \
<br>OPIS SLIKE: \
<br><input type="text" style="width: 100%;" id="imageDescription"> \
<br>ALT TEKST: \
<br><input type="text" style="width: 100%;" id="imageAlt"> \
<br><button onclick="submitImage()">DODAJ SLIKU</button>';
    inputDiv.innerHTML = c;

    $(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				$("#targetLayer").html('<img src="http://petrolsofting.com/images/uploads/news/' + data + '" width="100px" height="100px" />');
				image = data;
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
		return false;
	}));

});

    

}

function addThumbnailImage(){

	
	var c = '<div class="bgColor"> \
<form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data"> \
<div id="targetLayer">No Image</div> \
<div id="uploadFormLayer"> \
<label>Odaberi sliku:</label><br/> \
<input name="userImage" type="file" class="inputFile" /> \
<input type="submit" value="Submit" class="btnSubmit" /> \
</form>';
    inputDiv.innerHTML = c;

    $(document).ready(function (e) {
	$("#uploadForm").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
				$("#targetLayer").html('<img src="http://petrolsofting.com/images/uploads/news/' + data + '" width="100px" height="100px" />');
				$("#thumbnailImageCont").html('<img src="http://petrolsofting.com/images/uploads/news/' + data + '" width="100px" height="100px" />');
				image = data;
				submitThumbnailImage();
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
		return false;
	}));

});

    

}


function addEditId(){
	editId ++;
	return editId;
}

function parseQuotes(txt){
	var t = txt.replace(/'/g, "''");
	return t;
}
function submitParagraph(){
	//editId ++;
	//alert('submit: ' + document.getElementById('paragraphContent').value);
	//var c = document.getElementById('paragraphContent').value;
	var nicE = new nicEditors.findEditor('paragraphContent');
	var c = nicE.getContent();

	var f = '<p>' + parseQuotes(c) + '</p>';
	contentArr.push(f);
	contentTypeArr.push('p');
	//console.log(f)
	refreshEdit();
	inputDiv.innerHTML = '';
}

function submitTitle(){
	//alert('submit: ' + document.getElementById('paragraphContent').value);
	var c = document.getElementById('paragraphContent').value;
	var d = document.getElementById('paragraphDate').value;
	contentArr.push('<div class="title-cont"><h1>' + c + '</h1>' + '<h4>' + d + '</h4></div>');
	refreshEdit();
	inputDiv.innerHTML = '';
}
function submitSubTitle(){
	//alert('submit: ' + document.getElementById('paragraphContent').value);
	var c = document.getElementById('paragraphContent').value;
	contentArr.push('<h2>' + c + '</h2>');
	contentTypeArr.push('h2');
	refreshEdit();
	inputDiv.innerHTML = '';
}

function submitQuote(){
	//alert('submit: ' + document.getElementById('paragraphContent').value);
	var c = document.getElementById('paragraphContent').value;
	contentArr.push('<h3>' + c + '</h3>');
	contentTypeArr.push('h3');
	refreshEdit();
	inputDiv.innerHTML = '';
}

function submitImage(){
	//alert('submit: ' + document.getElementById('paragraphContent').value);
	//var c = document.getElementById('imageContent').innerHTML;
	var imageTitle = document.getElementById('imageTitle').value;
	var imageDescription = document.getElementById('imageDescription').value;
	var imageAlt = document.getElementById('imageAlt').value;

	var fullImage = '<img src="http://petrolsofting.com/images/uploads/news/' + image + '" alt="' + imageAlt + '" />';

	contentArr.push(fullImage);
	contentTypeArr.push('img');
	refreshEdit();
	inputDiv.innerHTML = '';
}

function submitThumbnailImage(){
	document.getElementById('image').value = image.trim();
	//clear input div
	inputDiv.innerHTML = '';
}

function swapElements(e){
	if(e.id > 0){ // disable swap if first element [0] to avoid error.
		var x = e.id;
		var y = x - 1;
		var b = contentArr[y];
		var bType = contentTypeArr[y];
		contentArr[y] = contentArr[x];
		contentArr[x] = b;
		// swap content type arr for edit
		contentTypeArr[y] = contentTypeArr[x];
		contentTypeArr[x] = bType;
		refreshEdit();
	}
}

function removeElement(e){
	//alert("id: "+e.id);
	contentArr.splice(e.id, 1);
	refreshEdit();
}

function editParagraph(id){
	var c = '<br>Tekst:<br><textarea rows="20" id="paragraphContent" contenteditable="true" style="resize: none; width: 96%; padding-left: 100px;"></textarea><br><br><button onClick="submitEditParagraph('+id+')" style="float: right; margin-right: 2%;">SUBMIT</button>';
	inputDiv.innerHTML = c;
	area2 = new nicEditor({buttonList : ['bold','italic','underline','strikeThrough','link','unlink','html','left']}).panelInstance('paragraphContent');
	nicEditors.findEditor( "paragraphContent" ).setContent( contentArr[id] );
}
function submitEditParagraph(id){
	var nicE = new nicEditors.findEditor('paragraphContent');
	var c = nicE.getContent();
	var f = c;
	contentArr[id] = f;
	//contentTypeArr.push('p');
	//console.log(f)
	refreshEdit();
	inputDiv.innerHTML = '';
}

function editSubtitle(id){
	var c = '<br>Tekst podnaslova:<br><input type="text" id="paragraphContent"><br><br><button onClick="submitEditSubtitle('+id+')" style="float: right;">SUBMIT</button>';
	inputDiv.innerHTML = c;
	var ce = $(contentArr[id]).text();
	document.getElementById('paragraphContent').value = ce;
}

function editQuote(id){
	var c = '<br>Tekst navoda:<br><input type="text" id="paragraphContent"><br><br><button onClick="submitEditQuote('+id+')" style="float: right;">SUBMIT</button>';
	inputDiv.innerHTML = c;
	var ce = $(contentArr[id]).text();
	document.getElementById('paragraphContent').value = ce;
}

function submitEditSubtitle(id){
	var f = document.getElementById('paragraphContent').value;
	contentArr[id] = '<h2>'+f+'</h2>';
	refreshEdit();
	inputDiv.innerHTML = '';

}

function submitEditQuote(id){
	var f = document.getElementById('paragraphContent').value;
	contentArr[id] = '<h3>'+f+'</h3>';
	refreshEdit();
	inputDiv.innerHTML = '';

}

function editElement(e){
	var type = e.getAttribute("editType");

	if(type == 'p'){
		//alert("paragraph");
		editParagraph(e.id);
		
	}
	if(type == 'h2'){
		editSubtitle(e.id);
	}

	if(type == 'h3'){
		editQuote(e.id);
	}
	//if(type == 'img'){
		//alert("image");
	//}
}
// REFRESH PREVIEW
function refreshEdit(){
	content = '';
	for(var i = 0; i < contentArr.length; i++){
		content += contentArr[i] + '<button id="' + i + '" onclick="removeElement(this)" style="float: right;">delete</button>' 
				+ '<button id="' + i + '" onclick="swapElements(this)" style="float: right;">move up</button>'
				+ '<button id="' + i + '" editType="'+contentTypeArr[i]+'" onclick="editElement(this)" style="float: right;">edit</button><hr>';
	}
	mainCont.innerHTML = content;
}


refreshEdit();

var edit = '<?php echo $edit; ?>';
var tagChecker = '';
if(edit == 'true'){
	var contentForEdit = '<?php print($trimmedContent) ?>';
	contentArr = contentForEdit.slice(0, -1).split('|');
	for(var i = 0; i < contentArr.length; i++){
		tagChecker = contentArr[i].substring(0, 3);
		console.log(tagChecker);
		if(tagChecker == '<p>'){
			contentTypeArr[i] = 'p';
		}
		if(tagChecker == '<h2'){
			contentTypeArr[i] = 'h2';
		}
		if(tagChecker == '<h3'){
			contentTypeArr[i] = 'h3';
		}
	}
	refreshEdit();
}

console.log('content: '+contentArr);

</script>

</body>
</html>