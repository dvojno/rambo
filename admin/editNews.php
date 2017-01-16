<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	<title> ADMIN | PETROLSOFT </title>
 	<meta name="viewport" content="width=device-width" />
</head>

<style>


html *
{
   font-size: 1em ;
   //color: #000 !important;
   font-family: Arial ;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    background-color: #333333;
    color: #FFFFFF;
}

.status {

}
.status:hover {
  cursor: pointer;
}

</style>

<table style="width:100%">
  <tr bgcolor="#666666">
    <th>id</th>
    <th>Title</th>    
    <th>desc</th>
    <th>lang</th>
    <th>date</th>
    <th>status</th>
    <th>Edit</th>
    <th>Preview</th>
  </tr>



<?php

echo 'EDIT NEWS:';
include('../connection.php');

// $sql = "SELECT * FROM news";
// if (mysqli_query($connection, $sql)) {
//  while($news = mysqli_fetch_array($sql)){
//    echo '<br>'. $news['title'];
//    echo "1";
//  }
// }

// Define status colors
$color_1 = '#00aa33';
$color_0 = 'gray';

$sql = mysqli_query($connection, "SELECT * FROM news ORDER BY date_event DESC");
while($news = mysqli_fetch_array($sql)){

  // Set status color
  if($news['status'] == '1'){
    $statusColor = $color_1;
  }else{
    $statusColor = $color_0;
  }


  echo '<tr>';
  echo '<td>'. $news['id'] . '</td>';
  echo '<td>'. $news['title'] . '</td>';
  echo '<td>'. $news['description'] . '</td>';
  echo '<td>'. $news['lang'] . '</td>';
  echo '<td>'. $news['date'] . '</td>';
  echo '<td class="status" style="background-color: ' . $statusColor . ';" id="'.$news['id'].'" onClick=changeStatus(this)>'. $news['status'] . '</td>';
  echo '<td><a href="addNews.php?id='.$news['id'].'"><button>Edit</button></a></td>';
  echo '<td><a href="../news-single.php?nid='.$news['id'].'" target="_blank"><button>View</button></a></td>';
  echo "</tr>";
}



?>

</table>


<script>

var color_1 = '<?php echo $color_1; ?>';
var color_0 = '<?php echo $color_0; ?>';
function changeStatus(obj) {
    var r = confirm("Change status? news id: " + obj.id);
    if (r == true) {
        var id = obj.id;
        //alert(id);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
                if(this.responseText == '1'){
                  document.getElementById(id).style.backgroundColor = color_1;
                }else{
                  document.getElementById(id).style.backgroundColor = color_0;
                }
            }
        };
        xmlhttp.open("GET", "news-change-status.php?id=" + id, true);
        xmlhttp.send();
  }
}
</script>
