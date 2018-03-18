<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

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
    $state = $_POST["stateName"];
    $zip = $_POST["zipName"];
    $pass = $_POST["passName"];
    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (first, last, email, address, city, state, zip, pass) VALUES ('$first', '$last', '$email', '$address', '$city', '$state', $zip, '$pass_hash')";

    if ($conn->query($sql) === TRUE) {
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
        $mail->Subject = 'Your account for DayBuyDay was successfully created!';
        $mail->Body = '<html><body>Welcome to DayBuyDay, ' . $first . '! <br>Explore your new account today!</html></body>';
        $mail->AddAddress($email);

        if (!$mail->send()) {
            ?>
            <script type="text/javascript">
                function setLocal() {
                    localStorage.setItem("created", "emailErr");
                    var errMsg = "<?php echo $mail->ErrorInfo; ?>";
                    localStorage.setItem("emailErrMsg", errMsg);
                }

                setLocal();
            </script>
            <?php
        } else {
            if ($conn->errno === 1062) {
                ?>
                <script type="text/javascript">
                    function setLocal() {
                        localStorage.setItem("created", "dup");
                    }

                    setLocal();
                </script>
                <?php
            }
        }
    }
?>
    <script type="text/javascript">
        window.location = 'signup.html';
    </script>