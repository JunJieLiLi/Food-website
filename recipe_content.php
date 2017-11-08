<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

$article_id = filter_input(INPUT_GET, 'article_id', $filter = FILTER_SANITIZE_STRING);
 
if (! $article_id) {
    header("Location: ./error.php?err=Can not find the page");
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<script type="text/javascript" src="file:///C|/Users/ShawnC/Desktop/USBWebserver v8.6/root/js/slider.js">
</script>
<script type="text/javascript" src="js/CountUpTimer.js">
</script>
<script type="text/javascript" src="js/addComment.js">
</script>
<script type="text/javascript" src="js/confirmDelete.js">
</script>
<title>Foodie</title>
<style>

#countup p {
display: inline-block;
padding: 5px;
background: #FFA500;
margin: auto;
visibility: hidden;
}
#stopTimer {
visibility: hidden;
}
#submitTime{
visibility: hidden;

</style>
</head>

<body>

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.php" class="logo">FOODIE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
  <li style="float:right"><a href='posting.php'>POST</a></li>
  <li style="float:right">
  <?php
  if (login_check($mysqli) == true){
	  echo "<a href='my_page.php'>".$_SESSION['username']."</a></li>";
	  echo "<li style='float:right'><a href='includes/logout.php'>LOG OUT</a>";
  }else{
	  echo "<li style='float:right'><a href='login.php'>LOG IN</a></li>".
  "<li style='float:right' class='active'><a href='register.php'>SIGN UP</a></li>";
  }
  ?></li>
</ul>
</div>
</nav>
</div>


<div class="content-wrap">
<?php	

if ($stmt = $mysqli->prepare("SELECT * FROM recipe WHERE article_id=?")) {
    $stmt->bind_param("i", $article_id);

    // Execute the prepared query. 
    $stmt->execute();
    /* bind variables to prepared statement */
	$stmt->bind_result($article_id, $title, $user_id, $recipe_content, $img_directory, $create_date, $ingredients);		
	/* fetch values */
	if ($stmt->fetch() ) {
		$stmt->close();
		if ($stmt2 = $mysqli->prepare("SELECT username FROM UserInfomation WHERE userid=?")) {
		$stmt2->bind_param("i", $user_id);

		// Execute the prepared query. 
		$stmt2->execute();
		/* bind variables to prepared statement */
		$stmt2->bind_result($username);
		}
		if ( $stmt2->fetch()){
			$stmt2->close();
		echo "<div class='title-wrap'>";
		echo "<h2 id='title' >".$title."</h2>";
		echo "<p id='username-date'>created by: <a href='user_page.php?user_id=".$user_id."'>".$username."</a> at: ".$create_date."</p>";
		echo "</div>";		
		echo "<div class='image-wrap'>";
		echo "<img src='".$img_directory."' width='500' height='300' id='image-content' align='middle'></div>";
		echo "<div id='recipes-wrap'><p>".$ingredients."</p>";
		echo "<p>".$recipe_content."</p></div>";

		echo "<div class='addcommentarea'><form id='commentform' method='post'>
		<input type='hidden' id='inv_article_id' value='$article_id'/><br>
	<textarea name='comContent' class='w3-input w3-border w3-iput' id='com_content' rows='3' cols='50' placeholder='Add a comment here...' border></textarea>
	</br><input type='submit' value='Comment' class='w3-btn w3-grey' ";
		if (isset($_SESSION['user_id'])){
			$requser_id = $_SESSION['user_id'];
		}else{
			$requser_id = 0;
			echo "disabled";
		}
		echo "/></form></div>";
		
		$comments = find_comment_by_articleid($requser_id, $article_id, $mysqli);
		echo "<div id='commentarea' class='list-post-wrap'><h3>Comment</h3>".$comments."</div>";
	
	//$stmt2->close();
}}}
else {
        // Could not create a prepared statement
    echo "<p>Error. Can not find the recipe.</p>";
	echo "<a href='index.php'>Return to main page.</a>";
    exit();
    }
?>
    <div id="countup">
	<h3>Cooking Timer</h3>
	<button onclick="startCountUp();" class="w3-btn w3-grey">I started cooking</button><br>
  <p class="timeRefSeconds">It's been</p>
  <p id="days" class="timeRefDays"></p>
  <p class="timeRefDays"></p>
  <p id="hours" class="timeRefHours"></p>
  <p class="timeRefHours"></p>
  <p id="minutes" class="timeRefMinutes"></p>
  <p class="timeRefMinutes"></p>
  <p id="seconds" class="timeRefSeconds"></p>
  <p class="timeRefSeconds">second</p>
  <br><button onclick="stopCountUp();" id="stopTimer" class="w3-btn w3-grey">I finished !</button>
  <button onclick="submitTime();" id="submitTime" class="w3-btn w3-grey" >Tell us your cooking time</button>
  <p id="article_id"><?php echo $article_id;?></p>
  
	</div>
    
    
</div>

		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>FOO<span>DIE</span></h3>

				<p class="footer-links">
					<a href="index.php">HOME</a>
					<a href="all_post.php">ALL POST</a>
					<a href="daily.php">DAILY</a>
					<a href="contact.html">CONTACT</a>
				</p>

				<p class="footer-company-name">Foode &copy; 2016</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>Memorial University of Newfoundland</span>Computer Science Department</p>
				</div>

				<div>
					<i class="fa fa-info"></i>
					<p>CS3715-WEB APPLICATION</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">contact@foode.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About US</span>
                    
					 Winter 2016 Web Application Project <br>
                     <span> Develop by</span>
                     Baihui Zhang<br>
                     			Junjie Li<br>
                                Meishang Chen<br>
                     
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
</body>
</html>
