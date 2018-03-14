
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
		$state = $_POST["stateName"];
		$zip = $_POST["zipName"];
		$pass = $_POST["passName"];
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

		$sql = "INSERT INTO users (first, last, email, address, city, state, zip, pass) VALUES ('$first', '$last', '$email', '$address', '$city', '$state', $zip, '$pass_hash')";

		if ($conn->query($sql) === TRUE) {
			
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
			else {
				echo "Unable to create account. Error number: " . $conn->errno;
			}
		}

		$conn->close();
		?>
		<script type="text/javascript">
			window.location = 'signup.html';
		</script>
        