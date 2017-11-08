<?php
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();
?>

<!DOCTYPE html>
<head>

</head>

<body> 
<?php
if (login_check($mysqli) == false){
	echo "Please <a href='login.php'>log in </a> to use timer.";
	exit();
}

$user_id = $_SESSION['user_id'];
$article_id = $_GET['id'];
$time = $_GET["q"];


$prep_stmt = "INSERT INTO CookingTime (article_id, user_id, time) VALUES (?, ?, ?)";
if ($insert_stmt = $mysqli->prepare($prep_stmt)){
	$insert_stmt->bind_param("iii", $article_id, $_SESSION['user_id'], $time );
	if (! $insert_stmt->execute()) {
		//echo "user_id: ".$user_id."article_id: ".$article_id."time: ".$time;
        echo "ERROR: Post CookingTime failure: INSERT";
        exit();
            }
		}else {
			echo "ERROR: Post CookingTime failure: PREPARE";
		}
	$insert_stmt->close();


$prep_stmt2 = "SELECT avg(time) FROM CookingTime WHERE article_id=?";
if ($select_stmt = $mysqli->prepare($prep_stmt2)){
	$select_stmt->bind_param("i", $article_id);
	$select_stmt->execute();
	$select_stmt->bind_result($avgtime);
	if ( $select_stmt->fetch()){
        if($avgtime == 0){
			
		}else{
			$response = "Average Cooking Time: ";
			$days=floor($avgtime/(60*60*24));
			$hours=floor(($avgtime%(60*60*24))/(60*60));
			$mins=floor((($avgtime%(60*60*24))%(60*60))/60);
			$secs=floor((($avgtime%(60*60*24))%(60*60))%60);
			if($days != 0){
				$response .= $days." days";
				}
			if($hours != 0){
				$response .= $hours." hours";
				}
			if($mins != 0){
				$response .= $mins." mins";
				}
			if($secs != 0){
				$response .= $secs." secs";
				}
		}
    }else{
		$response = "Error: No data";;
        }
		}
	

echo $response;
$select_stmt->close();	
exit();
?>
</body>
</html>