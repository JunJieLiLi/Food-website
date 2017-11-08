<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

/* while (list($key,$value) = each($_SESSION)) {
echo "$key: $value<br>";}
user_id: 1
username: test_user
login_string: ... */

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


<script type="text/javascript" src="file:///C|/Users/ShawnC/Desktop/USBWebserver v8.6/root/js/slider.js">
</script>
<title>Foodie</title>
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
<h2>Foods can be fun</h2>
<div id="content-partRecipes" class="list-post-wrap"> 

<?php	

$sql = "SELECT article_id, title, user_id, creat_date, ingredients FROM recipe WHERE user_id=8 ORDER BY article_id DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<ul>";
	
    while($row = $result->fetch_assoc()) {	
		
		$username = find_username_by_userid($row['user_id'], $mysqli);
        echo "<li><a href='recipe_content.php?article_id="
		.$row['article_id']."'><h4>".$row['title']."</h4>"
		." by ".$username."  at ".$row['creat_date']."</a></li><br>";	
    }
	echo "</ul>";
} else {
    echo "<p>Sorry, there is no recommendation today.</p>";
}
	
?>    
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
