<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

//read all image file from the folder
$dir = "images/upload/";
$dh  = opendir($dir);
while (false !== ($imgfilename = readdir($dh))) {
    $imgfiles[] = $imgfilename;
}
$values = $_GET["values"];


$sql = "SELECT article_id FROM recipe WHERE img_directory='images/upload/".$imgfiles[$values]."'";
$result = $mysqli->query($sql);

if ( $result->num_rows > 0) {
	$row = $result->fetch_assoc();
        echo "recipe_content.php?article_id=".$row['article_id'];
} else {
    echo "#";
}
echo "<br>";
echo  $imgfiles[$values];
?>