<?php
if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
		$sourcePath = $_FILES['userImage']['tmp_name'];
		$temp = explode(".", $_FILES["userImage"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		$targetPath = "../images/uploads/news/".$newfilename;
		$imageName = $newfilename;

		// $temp = explode(".", $_FILES["file"]["name"]);
		// $newfilename = round(microtime(true)) . '.' . end($temp);
		// if(move_uploaded_file($_FILES["file"]["tmp_name"], "../images/uploads/news/" . $newfilename)){

		if(move_uploaded_file($sourcePath,$targetPath)) {
			//echo 'suc';
			?>
			<?php echo $imageName; ?> 
			<?php
		}
	}
}
?>

