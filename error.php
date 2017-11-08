<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/slider.js"></script>
    </head>
    <body>

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.php" class="logo">FOODIE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
  <li style="float:right"><a href="posting.php">POST</a></li>
  <li style="float:right"><?php
  if (login_check($mysqli) == true){
	  echo "<a href='user_page.php'>".$_SESSION['username']."</a></li>";
	  echo "<li style='float:right'><a href='includes/logout.php'>LOG OUT</a>";
  }else{
	  echo "<li style='float:right'><a href='login.php'>LOG IN</a></li>".
  "<li style='float:right' class='active'><a href='register.php'>SIGN UP</a></li>";
  }
  ?></li>
</ul>
</div>
</nav>



<div class="content-wrap" style='text-align:center'>
        <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
		<p>Click here to <a href="index.php">main page</a></p>
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