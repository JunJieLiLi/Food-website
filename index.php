<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">


<script type="text/javascript" src="js/slider.js">
</script>
<title>Foodie</title>
</head>

<body onload="sendrequest(0)">

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.php" class="logo">FOODIE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
  <li style="float:right"><a href="posting.php">POST</a></li>
  <li style="float:right">
  <?php
  if ($logged == 'in'){
	  echo "<a href='my_page.php'>".$_SESSION['username']."</a></li>";
	  echo "<li style='float:right'><a href='includes/logout.php'>LOG OUT</a></li>";
  }else{
	  echo "<li style='float:right'><a href='login.php'>LOG IN</a></li>".
  "<li style='float:right' class='active'><a href='register.php'>SIGN UP</a></li>";
  }
  ?>
  

</ul>
</div>
</nav>

<div class="content-wrap">

<div class="imageslider-wrap">
 	<button  id="previous" name= "previous" value="-1" onClick="sendrequest(this.value)"> <img src="images/icon/Back-icon.png"width="30" height="100"></button>
	<a id="slider-link" href="#"><img id="slider" src="#" width="600px" height="400px"></a>
    <button name= "next" id="next"  value="1"onClick="sendrequest(this.value)"> <img src="images/icon/Forward-icon.png" width="30" height="100"></button> 
    </button>
 </div>
 
 
 <div class="recent-post-wrap">
 
 	<h2> Recent Post</h2>
    <div id="recent-post" class="list-post-wrap">
    <?php
$sql = "SELECT article_id, title FROM recipe ORDER BY article_id DESC LIMIT 5";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<ul>";
    while($row = $result->fetch_assoc()) {	
        echo "<br><br><li><a href='recipe_content.php?article_id=".$row['article_id']."'>".$row['title']."</a></li><br>";	
    }
	echo "</ul>";
} else {
    echo "<p>0 results</p>";
}
?>
</div>
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
