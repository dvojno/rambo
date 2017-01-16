<?php

$id = $_REQUEST["id"];

include('../connection.php');

$sql_get = mysqli_query($connection,"SELECT * FROM news WHERE id='$id'");
//$sql = mysqli_query($connection, "SELECT * FROM news ORDER BY date DESC");
//while($news = mysqli_fetch_array($sql)){
//$sql = mysqli_query($connection, "SELECT * FROM news ORDER BY date DESC");
//if (mysqli_query($connection, $sql_get)) {
while($news = mysqli_fetch_array($sql_get)){
	$currentStatus = $news['status'];
}
//}

if($currentStatus == '0'){
	$newStatus = '1';
}else{
	$newStatus = '0';
}



//echo $oldStatus;

$sql = "UPDATE  news
		SET status='$newStatus'
		WHERE id='$id'"; 
if (mysqli_query($connection, $sql)) {
    echo $newStatus;
} else {
    echo "Error";
}


?>