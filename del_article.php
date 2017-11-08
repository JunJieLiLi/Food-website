<?php 
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

$article_id = filter_input(INPUT_GET, 'id', $filter = FILTER_SANITIZE_STRING);
//echo $_POST['article_id'];
//echo "<br>";
echo $article_id;
if ($stmt = $mysqli->prepare("SELECT img_directory FROM recipe WHERE article_id=?")) {
    $stmt->bind_param("i", $article_id);
    // Execute the prepared query. 
    $stmt->execute();
    /* bind variables to prepared statement */
	$stmt->bind_result($img_directory);		
	/* fetch values */
	if ($stmt->fetch()&&file_exists($img_directory) ) {
		echo "deleting img...";
		unlink ($img_directory);
	}
	$stmt->close();
	if(del_article($article_id,$mysqli)){
		//echo "del successfully";
		header ("Location: ./my_page.php");
	}
	
}else{
	//echo "del failed";
	header ("Location: ./error.php?err=Database error: Delete");
	exit();
	}
exit ();

?>
