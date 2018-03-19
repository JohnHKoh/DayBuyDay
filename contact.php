<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

$result = '';

if (!isset($_GET["sent"])) {
    $result = '';
}
else if($_GET["sent"] == true) {
    $result = '<div id="sent" style="display: block;"><label id="msg" style="width: 400px; color: green;">Message sent!</label><br /><br /></div>';
}
else {
    $result = '<div id="sent" style="display: block;"><label id="msg" style="width: 400px; color: red;">Message failed to send.</label><br /><br /></div>';
}

if ($_POST) {
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $txt = $_POST['txt'];
        $filled = ($email != '' && $first != '' && $last != '' && $txt != '' );

        $mail = new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; //587
        $mail->IsHTML(true);
        $mail->Username = "daybuyday.email@gmail.com"; // YOUR EMAIL HERE
        $mail->Password = "AlfredWeaver"; //PASSWORD HERE
        $mail->SetFrom("daybuyday.email@gmail.com"); // YOUR EMAIL HERE
        $mail->Subject = 'New message from '.$email;
        $mail->Body = '<html><body><b>Name: </b>'.$first.' '.$last.'<br><b>Email: </b>'.$email.'<br><b>Message: </b><br><p>'.$txt.'</p></html></body>';
        $mail->AddAddress('daybuyday.email@gmail.com');

        if (!$mail->send()) {
            header("Location: " . $_SERVER['REQUEST_URI'] . '?sent=false');
        }
        else {
            header("Location: " . $_SERVER['REQUEST_URI'] . '?sent=true');
        }
    }
        exit();
    }
?>
<head>
    <title>Contact Us</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/contact.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <script src="contact.js"></script>
</head>
<body class="right-sidebar">
<div id="page-wrapper">

    <!-- Header -->
    <div id="header">

        <!-- Inner -->
        <div class="inner">
            <header>
                <h1><a href="index.html" id="logo">Contact Us</a></h1>
            </header>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="signup.html">Signup</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>

    </div>

    <!-- Main -->
    <div class="wrapper style1">

        <div class="container">
            <div class="row 200%">
                <div class="8u 12u(mobile)" id="content">
                    <article id="main">
                        <header>
                            <h2><a href="#">Contact Us</a></h2>
                            <p>
                                Questions? Comments? Concerns?
                            </p>
                        </header>
                        <?php
                        echo $result;
                        ?>
                        <form id="contactForm" action="" method="post" onSubmit="return validateForm()">
                            <script type="text/javascript">
                                function validateForm() {
                                    var fields = ["first", "last", "email", "txt"]
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
                                        document.getElementById('contactForm').action = "contact.php";
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
                            <label>First Name</label><input id='first' name='first' type="text" placeholder="John" />
                            <br />
                            <label>Last Name</label><input id='last' name='last' type="text" placeholder="Doe" />
                            <br />
                            <label>Email</label><input id='email' name='email' type="text" placeholder="user@example.com" onfocusout="checkEmail()"/>
                            <div id="invEmail" style="display: none; padding-left: 230px; margin-top: -25px; color: red;">Not a valid email address.</div>
                            <br />
                            <label>Message</label><textarea id='txt' name='txt' name="Text1" cols="70" rows="5"></textarea>
                            <br /><br />
                            <input name='submit' class="button" type="submit" value="Submit"/>
                    </article>
                </div>
                <div class="4u 12u(mobile)" id="sidebar">
                    <hr class="first" />
                    <section>
                        <header>
                            <h3>Need help? Check our FAQ!</h3>
                        </header>
                        <script>
                            function myFunction(x) {
                                var x = document.getElementById(x);
                                if (x.style.display === 'none') {
                                    x.style.display = 'block';
                                } else {
                                    x.style.display = 'none';
                                }
                            }
                        </script>
                        <ul>
                            <a onclick="myFunction('1')">How long does it take to get a certificate?</a>
                            <div id="1" style="display: none;">Certificates will be emailed almost instantly after purchase.
                                Physical copy delivery times can vary from 5-7 business days.</div>
                        </ul>
                        <ul>
                            <a onclick="myFunction('2')">How much does a day cost?</a>
                            <div id="2" style="display: none;">1 Day costs a standard of $10USD. Be on the lookout on our site for bundled discounts!</div>
                        </ul>
                        <ul>
                            <a onclick="myFunction('3')">Can there be multiple owners for one day?</a>
                            <div id="3" style="display: none;">A day is unique. A recipient can be a couple or a group of people, but two separate parties cannot
                                purchase the same date.</div>
                        </ul>
                        <ul>
                            <a onclick="myFunction('4')">More</a>
                            <div id="4" style="display: none;">An additional FAQ page may be coming soon. For now, use the contact form for any further inquries.</div>
                        </ul>
                    </section>
                    <hr />
                    <section>
                        <header>
                            <h3>Still need help?</h3>
                        </header>
                        <p>
                            Use the form to contact us and we will get back to you in around two business days.
                    </section>
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
