<?php

if(isset($_POST['finalPost'])){

	

	include('../connection.php');

	$id = $_POST['id'];
	$edit = $_POST['edit'];
	$title = $_POST['title'];
	$date_event = $_POST['date_event'];
	$description = $_POST['description'];
	$image = $_POST['image'];
	$content = $_POST['finalPost'];
	$lang = $_POST['lang'];

	if($edit == 'true'){

		// Edit existing news
		$sql = "UPDATE  news
		SET title='$title', date_event='$date_event', description='$description', lang='$lang', image='$image', content='$content'
		WHERE id='$id'"; 
		if (mysqli_query($connection, $sql)) {
		    echo "Vest je uspesno editovana.<br>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
	}else{

		// Add new news
		$sql = "INSERT INTO news(title, date_event, description, lang, image, content) VALUES('$title','$date_event','$description', '$lang', '$image','$content')";

		if (mysqli_query($connection, $sql)) {
		    echo "Vest je uspesno uneta u bazu.<br>";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
		}
	}

	echo '<br><a href="index.php"><button>ADMIN INDEX</button></a>';
	echo '<br><a href="editNews.php"><button>EDIT NEWS</button></a>';

	mysqli_close($connection);
}else{
	echo 'ERROR: Base variable not set!';
}

?>


