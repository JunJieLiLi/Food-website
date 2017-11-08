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

<script type="text/javascript" src="js/slider.js">
</script>

<script type="text/javascript" src="js/posting.js">
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
	  echo "<a href='my_page.php'class='active'>".$_SESSION['username']."</a></li>";
	  echo "<li style='float:right'><a href='includes/logout.php'>LOG OUT</a>";
  }else{
	  header('Location: ./login.php');
	  echo "<li style='float:right'><a href='login.php'>LOG IN</a></li>".
  "<li style='float:right' class='active'><a href='register.php'>SIGN UP</a></li>";
  }
  ?></li> 
</ul>
</div>
</nav>
</div>


<div class="content-wrap">
<div class="post-wrap">
<h1>Upload your recipe </h1>
<form action="upload.php" method="post" name="upload_post" enctype="multipart/form-data">
<strong>Title</strong>:
<input type="text" name="title" width="600px" height="40px"/><br>

<div style='display:inline-block;width:645px;height:30px;margin-top:1em;'>Ingredients </div>
<div style='display:inline-block;width:340px;height:30px;margin-top:1em;left:45%;position:absolute;'>Amount</div><br>
<input type='text' name="ingrd-t1" size="60"/>
<input type='text' name="ingrd-m1" size="30"/><br>
<input type='text' name="ingrd-t2" size="60"/>
<input type='text' name="ingrd-m2" size="30"/><br>
<input type='text' name="ingrd-t3" size="60"/>
<input type='text' name="ingrd-m3" size="30"/><br>
<div id="ingrd-area"></div>

<p>Step 1</p><textarea name="Step1" rows="5" cols="100"/></textarea><p>Step 2</p>
<textarea name="Step2" rows="5" cols="100"/></textarea><p>Step3</p>
<textarea name="Step3" rows="5" cols="100"/></textarea>
<div id="step-area"></div>


<span>Upload your images:</span><input type="file" name="fileToUpload" id="fileToUpload"><br>
<input type="submit" value="Post" name="submsit" id ="submit"class="w3-btn w3-grey" >
</form>
</div>
<div class="ing-button-panel-wrap">
<button class="w3-btn w3-grey" onClick="addIngrd()"> +</button>
<button class="w3-btn w3-grey" onClick="removeIngrd()"> - </button>
</div>
<div class="step-button-panel-wrap">
<button class="w3-btn w3-grey" onClick="addStep()"> + </button>
<button class="w3-btn w3-grey" onClick="removeStep()"> -</button>

</div>
</div>



		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>FOO<span>DIE</span></h3>

				<p class="footer-links">
					<a href="index.php">HOME</a>
					<a href="all_post.html">ALL POST</a>
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
