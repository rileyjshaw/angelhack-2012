<?php
session_start();
print_r($_SESSION);
include "include/config.php";
//if(!$site_active) exit(0);
include "include/functions_user.php";

if(isset($_POST['username']) && !isset($_SESSION['username'])) login_user();
if(isset($_REQUEST['act']) && $_REQUEST['act'] == 'logout') {
    unset($_SESSION['username']);
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Ultra' rel='stylesheet' type='text/css'>
	<meta charset="UTF-8">
	<title>5m Explorer!</title>
	<link rel="stylesheet" href="stylesheets/style.css">
</head>
<body>
	<img src="img/bg.jpg" alt="Background" class="bg">

	<div class="texwrap1">
		<div id="header">
			<div id="headerc">
				<img src="img/logo.png" alt="5 Minute Explorer">
				<div id="login">
                                        <?php
                                        if(!isset($_SESSION['username'])) 
                                         echo "   <a href=\"#login\">Log in <small>&#9660;</small></a>
                                            <div id=\"loginbox\">
                                            <form action='' method='post'>
                                                    <input type=\"text\" class=\"rounded\" placeholder=\"username\" name=\"username\">
                                                    <input type=\"password\" class=\"rounded\" placeholder=\"password\" name=\"password\">
                                                    <center><input type=\"submit\" name=\"do_login\" value=\"Go\"></input></center></form>
                                            </div>";
                                        else echo "<a href='?act=logout'>Welcome back ".htmlentities($_SESSION['username'])." [Logout]</a>";;
                                        ?>
				</div>
			</div>
		</div>

		<div id="main">
			<div id="leftmain">
				<div id="instructions">
					<h1>Plan your entire trip <span class="subline">in under 5 minutes</span></h1>
					<ol>
						<li>Select your destination and budget <small>Where are you going and when?</small></li>
						<li>Choose your activities <small>What do you want to do?</small></li>
						<li>Edit your itinerary <small>Get it now!</small></li>
					</ol>
				</div>
			</div>
			<div id="rightmain">
				<div id="rightc">
					<div id="right1">
						<h2>Where are you going?</h2>
							<input type="text" class="rounded" placeholder="city or destination" name="place">

							<h2>How long are you staying?</h2>
							<div class="center">
								<div class="outercenter">
									<div class="innercenter">
										<input type="number" min='1' class="numbox" value="3" name="days"><p class='bridgeline'> days <span class="optional">starting on <input type="image" src='img/cal.png' name='calendar' id='cal'></span></p>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<h2>What is your budget?</h2>
							<div id="budget"><p>$</p><p>$$</p><p>$$$</p></div>
						</div>
						<button class='next' id='next' onmouseover="getData()">What's the plan?</button>
					</div>
				</div>
			</div>

		<div id="footer">
			<div id="footerc">
				<ul class="footlinks">
					<li><a href="#">Home</a></li>
					<li class="sep">|</li>
					<li><a href="#">Who are we</a></li>
					<li class="sep">|</li>
					<li><a href="#">Press</a></li>
					<li class="sep">|</li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
				<span id='rights'>All rights reserved</span>
			</div>
		</div>
	</div>

	<div id="right2">
		<h2>How are you feeling?</h2>
		<ul class="circleicons">
			<li>
				<img src="img/c40.png" alt="outdoor">
				<div class="infobubble">
					<h3>Outdoor</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="indoor">
				<div class="infobubble">
					<h3>Indoor</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="adventure">
				<div class="infobubble">
					<h3>Adventure</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="historic">
				<div class="infobubble">
					<h3>Historic</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="food">
				<div class="infobubble">
					<h3>Food</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="party">
				<div class="infobubble">
					<h3>Party</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="family">
				<div class="infobubble">
					<h3>Family</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="music">
				<div class="infobubble">
					<h3>Music</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="art & museams">
				<div class="infobubble">
					<h3>Art & Museams</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="oddities">
				<div class="infobubble">
					<h3>Oddities</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="performances">
				<div class="infobubble">
					<h3>Performances</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="landmarks">
				<div class="infobubble">
					<h3>Landmarks</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="tours">
				<div class="infobubble">
					<h3>Tours</h3>
				</div>
			</li>
			<li>
				<img src="img/c40.png" alt="wandering">
				<div class="infobubble">
					<h3>Wandering</h3>
				</div>
			</li>
		</ul>
	</div>
	<div id="right3">
		<p>Some stuff</p>
	</div>
	<div id="left3">
		<div id="itinerary">
			<h4>Thursday, November 8</h4>
			<ol id="am" start="8">
				<li class='hour'><small>am</small></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour resetcounter'><small>pm</small></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
				<li class='hour'></li>
			</ol>
		</div>
	</div>

	<script type="text/javascript" src='script.js'></script>
        <script type="text/javascript" src='ajax.js'></script>
</body>
</html>
