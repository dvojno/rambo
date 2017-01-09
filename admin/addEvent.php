<h1>RAMBOAMADEUS</h1>
<p>edit news:</p>
<html>
<head>
<!-- <title>JavaScript file upload</title> -->
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!-- <link href="styles.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="../css/style.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="../css/style_news.css" rel="stylesheet" type="text/css" /> -->

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

  
</head>
<body>

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

</body>


</html>