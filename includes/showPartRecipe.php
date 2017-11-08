<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();
$q=$_GET["q"];
?>

<!DOCTYPE html>
<head>

</head>

<body> 
<?php

$offset = ($q-1)*10;
$sql = "SELECT article_id, title, user_id, creat_date, ingredients FROM recipe ORDER BY article_id DESC LIMIT 10 OFFSET ".$offset;
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<ul>";
	
    while($row = $result->fetch_assoc()) {	
		if ($row['user_id']!=8){
		$username = find_username_by_userid($row['user_id'], $mysqli);
        echo "<li><a href='recipe_content.php?article_id="
		.$row['article_id']."'><h4>".$row['title']."</h4>"
		." by ".$username."  at ".$row['creat_date']."</a></li><br>";	
    }}
	echo "</ul>";
} else {
    echo "<p>0 results</p>";
}

		
?>
</body>
</html>
