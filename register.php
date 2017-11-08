<?php
/**
 * Copyright (C) 2013 peredur.net
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script>

<script type="text/JasvaScript" src="js/slider.js">
</script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
<title>Foodee</title>
</head>

<body>

<nav>
<div class="main-menu">
  <ul>
    <li><a  href="index.html" class="logo">FOODEE</a></li>
  <li><a href="all_post.php">All POST</a></li>
  <li><a href="daily.php">DAILY </a></li>
 <li style='float:right'><a href='login.php'>LOG IN</a></li>
</ul>
</div>
</nav>
</div>
<div class="content-wrap">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <div class="instruction">
        <h1>Register with us</h1>

        <ul>
            <li>Usernames may contain only digits, upper and lower case letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one upper case letter (A..Z)</li>
                    <li>At least one lower case letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul></div>
  <div class="register-form">
          <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
        
<div class="w3-container w3-grey">
  <h2>Enter your info</h2>
</div>
<form class="w3-container" method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

<p>      
<label class="w3-label w3-text-black"><b>Username</b></label>
<input class="w3-input w3-border w3-input" type='text' name='username' id='username'></p>

<p>      
<label class="w3-label w3-text-black"><b>Email</b></label>
<input class="w3-input w3-border w3-input" type="text" name="email" id="email" ></p>
<p>      
<label class="w3-label w3-text-black"><b>Password</b></label>
<input class="w3-input w3-border w3-input" type="password" name="password"id="password"></p>

<p>      
<label class="w3-label w3-text-black"><b>Confirm password:</b></label>
<input class="w3-input w3-border w3-input" type="password" name="confirmpwd" id="confirmpwd"></p>

<p>
<button class="w3-btn w3-grey" onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);">Register</button></p>

</form>
 <p>Already have an account? Return to <a href="login.php">login page</a>.</p>
</div>
        
</div>
</div>



		<footer class="footer-distributed">

			<div class="footer-left">

				<h3>FOO<span>DEE</span></h3>

				<p class="footer-links">
					<a href="#">HOME</a>
					<a href="#">ALL POST</a>
					<a href="#">DAILY</a>
					<a href="#">ABOUT</a>
					<a href="#">CONTACT</a>
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
