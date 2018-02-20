<!DOCTYPE HTML>
<!--
    Helios by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="assets/css/ie8.css" />
        <![endif]-->
        <script src="login.js"></script>
    </head>
    <body class="left-sidebar" onload="checkCreated()">
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "daybuyday";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$first = $_POST["firstName"];
$last = $_POST["lastName"];
$email = $_POST["emailName"];
$address = $_POST["addressName"];
$city = $_POST["cityName"];
$zip = $_POST["zipName"];
$pass = $_POST["passName"];

$sql = "INSERT INTO users (first, last, email, address, city, zip, pass) VALUES ('$first', '$last', '$email', '$address', '$city', $zip, '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
        <div id="page-wrapper">
            <!-- Header -->
            <div id="header">
                <!-- Inner -->
                <div class="inner">
                    <header>
                        <h1><a href="index.html" id="logo">Login</a></h1>
                    </header>
                </div>
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="signup.html">Signup</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Main -->
            <div class="wrapper style1">
                <div class="container">
                    <div class="row 200%">
                        <div class="4u 12u(mobile)" id="sidebar">
                            <hr class="first" />
                            <section>
                                <header>
                                    <h3><a href="#">Not a member yet?</a></h3>
                                </header>
                                <p>
                                    Click to signup below!
                                </p>
                                <footer>
                                    <a href="signup.html" class="button">Sign Up</a>
                                </footer>
                            </section>
                        </div>
                        <div class="8u 12u(mobile) important(mobile)" id="content">
							<article id="main">
								<header>
									<h2><a href="#">Log into your account</a></h2>
									<p>
										Customize your user experience.
									</p>
								</header>
                                <div id="created" style="display: none;">
                                    <label id="msg" style="width: 400px; color: green;">Account created!</label>
                                    <br /><br />
                                </div>
								<label>Email</label><input type="text" placeholder="user@example.com" />
								<br />
								<label>Password</label><input type="password"/>
								<br />
								  <div class="checkbox">
                                      <label>Remember Me</label><input type="checkbox" style="margin-left: -100px">
								  </div>
								<br /><br />
								<a href="#" class="button">Login</a>
							</article>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
				<div id="footer">
					<div class="container">
						<div class="row">
							<div class="12u">
								<!-- Contact -->
									<section class="contact">
										<header>
											<h3>Looking for more information?</h3>
										</header>
										<p>Follow us on the web.</p>
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
											<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
										</ul>
									</section>

								<!-- Copyright -->
									<div class="copyright">
										<ul class="menu">
											<li>&copy; Day-Buy-Day. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>

							</div>

						</div>
					</div>
				</div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.onvisible.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>
    </body>
</html>
