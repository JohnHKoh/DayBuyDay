<!DOCTYPE HTML>
<!--
    Helios by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
    -->
<html>
    <?php
	$url = "https://blockchain.info/ticker";
	$price = json_decode(file_get_contents($url), true);
	$price2 = $price['USD'];
	$recent = $price2['last'];
	$recent = round($recent,2);

	$btc1499 = 14.99/$recent;
	$btc1499 = round($btc1499,4);
	$btc4999 = 49.99/$recent;
	$btc4999 = round($btc4999,4);


?>

    <head>
        <title>Checkout</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/purchase.css" />
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="assets/css/ie8.css" />
        <![endif]-->
		<script src="purchase.js"></script>
    </head>

    <body class="left-sidebar">
        <div id="page-wrapper">
            <!-- Header -->
            <div id="header">
                <!-- Inner -->
                <div class="inner">
                    <header>
                        <h1><a href="index.html" id="logo">Checkout</a></h1>
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
                            <section>
                                <header>
                                    <h3><a href="#">Offered packages</a></h3>
                                </header>
                                <p>
                                    Buy a day or a week
                                </p>
                                <div class="row 50%">
                                    <div class="4u">
                                        <a class="image fit"><img src="images/cal.jpg" alt="" /></a>
                                        <a class="image fit"><img src="images/cal.jpg" alt="" /></a>

                                    </div>
                                    <div class="8u">
                                        <h4>Premium Day</h4>
                                        <p>
                                            A single day can last a lifetime
                                        </p>
                                        <h4>Dedicate an entire week</h4>
                                        <p>
                                            Much, much more for a steep discount
                                        </p>
                                    </div>
                                </div>
                           <!--      <footer>
                                    <a href="#" class="button">See More</a>
                                </footer> -->
                            </section>
                        </div>
                        <div class="8u 12u(mobile) important(mobile)" id="content">
							<article id="main"><A NAME="form"></A>
								<header>
								<!-- 	<h2><a href="#">Checkout</a></h2> -->
									<p>
										Select an Option
									</p>
                                    <label style="width: 700px; padding-bottom: 20px; color: green"><?php echo "Currently 1 BTC is equivalent to $recent USD"; ?></label>
                                    <form>
                                      <input type="radio" name="amount" value="day" checked onchange="changeButton('day')"> One Day (<?php echo $btc1499; ?> BTC)<br>
                                      <input type="radio" name="amount" value="week" onchange="changeButton('week')"> One Week (<?php echo $btc4999; ?> BTC)<br>
                                    </form>
                                    <form action="https://test.bitpay.com/checkout" method="post" >
                                        <input type="hidden" name="action" value="checkout" />
                                        <input type="hidden" name="posData" value="" />
                                        <input id="payButton" type="hidden" name="data" value="7/f26+/YTFW63Wx80y4/F8nTTZaNCE4vdA1j1xBsJ9Cxsm+talKFmKdTilYvzTL6OxNNk0pUGVTkTX2WnhA3MvGKV+LEhJgz4VxKCniBHXfUW1L422KHaWiy0ikgdk7icX8MOiVvW3x5auJhMIRtfBsX0fkXAQjGWahZi+Igr41ZQl72tIbpx/YEf/kiSvaIPyForGerkB1/waCRRy2fD/Ruxv87PD36ZOkjehvhpmzLSTmUcYInjU/ML/JllqVF" />
                                        <input type="image" src="https://test.bitpay.com/img/button-large.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
                                    </form>
								</header>		
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
        <script src="assets/js/main.js"></script>
    </body>
</html>
