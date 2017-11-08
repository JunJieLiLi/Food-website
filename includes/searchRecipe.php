<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

//get the q parameter from URL
$q=$_GET["q"];
?>

<!DOCTYPE html>
<html>
<head>

</head>

<body> 
<?php
if (strlen($q)>0) {
  $hint="";

//$q = mysql_real_escape_string($q);  
$sql = "SELECT article_id, title FROM recipe WHERE title LIKE '%".$q."%'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $hint .= "<a href='recipe_content.php?article_id=".$row['article_id']."'>".$row['title']."</a><br/>";
		}
} 
$mysqli->close();
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;

?>
</body>
</html>