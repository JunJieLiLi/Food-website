<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

$now = date('Y-m-d H:i:s');
$user_id = $_SESSION['user_id'];

if(count($_POST)){
	$p = $_POST['q'];
	if ($p == "c") {
		//write comment content to corresponding txt file
		$comContent = $_POST['com_content'];
		$article_id = $_POST['article_id'];
		$prep_stmt = "INSERT INTO comments (article_id, user_id, comment_content, comment_date) VALUES (?, ?, ?, ?)";
		if ($insert_stmt = $mysqli->prepare($prep_stmt)){
			$insert_stmt->bind_param("iiss", $article_id, $_SESSION['user_id'], $comContent, $now );
			if (! $insert_stmt->execute()) {
				//echo "insert comment failed";
				header('Location: ../error.php?err=Post recipe failure: INSERT');
				exit();
			}else {
				//echo "insert comment successfully";
				$insert_stmt->close();}
		}
}		
}	

$response = find_comment_by_articleid($_SESSION['user_id'], $article_id, $mysqli);

echo $response;

?>