<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/searchRecipe.js"></script>
<script type="text/javascript" src="js/showPartRecipe.js"></script>
<title>Foodie</title>

</head>

<body onload="showPartRecipe(1)">

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.php" class="logo">FOODIE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
  <li style="float:right"class='active'><a href='posting.php'>POST</a></li>
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


<?php
$sql = "SELECT article_id, title FROM recipe ORDER BY article_id DESC";
$result = $mysqli->query($sql);?>

<div class="content-wrap">

<div class="content-allrecipes">



<div id="content-partRecipes" class="list-post-wrap"> 
</div>
<ul class="w3-navbar w3-grey">
<?php
if ($result->num_rows > 0) {
	$row_cnt = $result->num_rows;
	$page_number = ceil($row_cnt/10);
	//echo "<br>articles= ".$row_cnt;
	//echo "<br>pages= ".$page_number;
	for($i=1;$i<=$page_number;$i++){
		echo "<li><a href='#' onclick='showPartRecipe(".$i.")'>Page ".$i."</a></li>";
}}?>
</ul></div>


<div class="content-search">
<p>Search </p>
<form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
</div>


</div>

		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>FOO<span>DIE</span></h3>

				<p class="footer-links">
					<a href="index.php">HOME</a>
					<a href="all_post.php">ALL POST</a>
					<a href="#">DAILY</a>
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
