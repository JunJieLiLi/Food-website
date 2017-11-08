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
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">


<script type="text/JasvaScript" src="js/slider.js">
</script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
<title>Foodie</title>
</head>

<body>

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.php" class="logo">FOODIE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
  <li style="float:right"><a href="posting.php">POST</a></li>
  <li style="float:right"><a href="login.php">LOG IN</a></li>
  <li style="float:right" class="active"><a href="register.php">SIGN UP</a></li>
</ul>
</div>
</nav>
</div>


<div class="content-wrap">
		<div class="login-form-wrap">
		<div class="error-login">	<?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> </div>
        
        <div class="w3-container w3-grey">
  <h2>Foodie Account</h2>
</div>
<form class="w3-container" action="includes/process_login.php" method="post" name="login_form"> 

<p>      
<label class="w3-label w3-text-grey"><b>Email</b></label>
<input class="w3-input w3-border w3-input" type="text" name="email" /></p>

<p>      
<label class="w3-label w3-text-grey"><b>Password</b></label>
<input class="w3-input w3-border w3-iput"  type="password" name="password" id="password"/></p>

<p>
<button class="w3-btn w3-grey" type="button" onclick="formhash(this.form, this.form.password);">Login</button></p>
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>
</form>
      
</div>
       
 

    
</div>
</div>



		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>FOO<span>DIE</span></h3>

				<p class="footer-links">
					<a href="idex.php">HOME</a>
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
