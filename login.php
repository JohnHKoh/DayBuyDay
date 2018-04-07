<!DOCTYPE HTML>
<!--
    Helios by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
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

$result = '<div id="sent" style="display: none;"><label id="msg" style="width: 400px; color: red;">Please fill in all fields.</label><br /><br /></div>';

if ($_POST) {
    if (isset($_POST['submit'])) {
        $email = strtolower($_POST["email"]);
        $pass = $_POST["password"];
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        $filled = ($email != '' && $pass != '' );
        if (!$filled) {
            $result = '<div id="sent" style="display: block;"><label id="msg" style="width: 400px; color: red;">Please fill in all fields.</label><br /><br /></div>';
        }
        else {
            $sql = "SELECT * FROM users WHERE email='$email'";

            if ($conn->query($sql)->num_rows > 0) {
                $sql2 = "SELECT * FROM users WHERE email='$email'";
                $hash = $conn->query($sql2)->fetch_assoc()['pass'];
                $hash = substr( $hash, 0, 60 );
                $pass_hash = substr( $pass_hash, 0, 60 );
                if (password_verify($pass, $hash)) {
                    header('Location: '.'index.html');
                    exit();
                } else {
                    $result = '<div id="sent" style="display: block;"><label id="msg" style="width: 400px; color: red;">Incorrect password!</label><br /><br /></div>';
                }
            } else {
                $result = '<div id="sent" style="display: block;"><label id="msg" style="width: 400px; color: red;">No account associated with email.</label><br /><br /></div>';

            }
        }
    }
}
?>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/contact.css" />
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="assets/css/ie8.css" />
        <![endif]-->
        <!--<script src="login.js"></script>-->
    </head>
    <body class="left-sidebar">
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
                        <li><a href="login.php">Login</a></li>
			<li><a href="purchase.php">Purchase</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
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
                                <!--<div id="created" style="display: none;">-->
                                    <!--<label id="msg" style="width: 400px; color: green;">Account created!</label>-->
                                    <!--<br /><br />-->
                                <!--</div>-->
								<!--<script type="text/javascript">-->
									<!--checkCreated();-->
								<!--</script>-->
                                <?php
                                echo $result;
                                ?>
                                <form id="loginForm" action="" method="post" onSubmit="return validateForm()">
                                    <script type="text/javascript">
                                        function validateForm() {
                                            var fields = ["email", "password"]
                                            var empty = [];

                                            var i, l = fields.length;
                                            var fieldname;
                                            var filled = true;
                                            for (i = 0; i < l; i++) {
                                                fieldname = fields[i];
                                                var field = document.getElementById(fieldname);
                                                if (field.value === "") {
                                                    field.style.borderColor = 'red';
                                                    empty.push(fieldname);
                                                    filled = false;
                                                } else {
                                                    field.style.borderColor = 'initial';
                                                    empty.pop(fieldname);
                                                }
                                            }

                                            filled = (filled && checkEmail());

                                            if (filled) {
                                                document.getElementById('loginForm').action = "login.php";
                                            }
                                            else {
                                                document.getElementById('sent').style.display = 'block';
                                                document.getElementById('msg').style.color = 'red';
                                                document.getElementById('msg').innerHTML = "Please fill in all fields.";
                                            }
                                            return filled;
                                        }

                                        function checkEmail() {
                                            var email = document.getElementById("email");
                                            var err = document.getElementById("invEmail");
                                            var regex = RegExp('\\w+@\\w+\\.\\w{2,4}$');
                                            var valid = regex.test(email.value);

                                            if (!valid) {
                                                err.style.display = 'block';
                                                email.style.borderColor = 'red';
                                                return false;
                                            }
                                            else {
                                                err.style.display = 'none';
                                                email.style.borderColor = 'initial';
                                                return true;
                                            }
                                        }

                                    </script>
                                    <label>Email</label><input type="text" placeholder="user@example.com" id="email" name="email" onfocusout="checkEmail()"/>
                                    <br />
                                    <label>Password</label><input id="password" name="password" type="password"/>
                                    <br />
                                    <div class="checkbox">
                                        <label>Remember Me</label><input type="checkbox" style="margin-left: -100px">
                                    </div>
                                    <br /><br />
                                    <input name='submit' class="button" type="submit" value="Login"/>
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
