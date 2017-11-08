<?php 
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

$comment_id = filter_input(INPUT_GET, 'id', $filter = FILTER_SANITIZE_STRING);
$article_id = filter_input(INPUT_GET, 'a_id', $filter = FILTER_SANITIZE_STRING);
 
if (! $comment_id) {
    header("Location: ./error.php?err=Can not find the comment");
}
//echo $_POST['article_id'];
//echo "<br>";
//echo $article_id;
if ($stmt = $mysqli->prepare("DELETE FROM comments WHERE comment_id=?")) {
		$stmt->bind_param("i", $comment_id); 
		if ($stmt->execute()){
			header ("Location: ./recipe_content.php?article_id=".$article_id);
		}else{
			header("Location: ./error.php?err=Can not delete");
		}
	}else {
		//return $mysqli->error;
        // Could not create a prepared statement
		header("Location: ./error.php?err=Database error. Can not delete comment");
		exit();
	}
$stmt->close;
exit();
?>
