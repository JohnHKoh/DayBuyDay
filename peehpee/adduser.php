<html>
<head>
<title>Add User</title>
</head>
<body>
<form action="http://localhost:8080/WebsiteInHere/peehpee/useradded.php" method="post">

<b>Add a New Student</b>

<p>First Name:
<input type="text" name="first_name" size="30" value="" />
</p>

<p>Last Name:
<input type="text" name="last_name" size="30" value="" />
</p>

<p>Email:
<input type="text" name="email" size="30" value="" />
</p>

<p>Address:
<input type="text" name="address" size="30" value="" />
</p>

<p>City:
<input type="text" name="city" size="30" value="" />
</p>

<p>State (2 Characters):
<input type="text" name="state" size="30" maxlength="2" value="" />
</p>

<p>Zip Code:
<input type="text" name="zip" size="30" maxlength="5" value="" />
</p>

<p>Password:
<input type="text" name="passhash" size="30" value="" />
</p>

<!--
<p>Date (YYYY-MM-DD):
<input type="text" name="birth_date" size="30" value="" />
</p>
-->

<p>
<input type="submit" name="submit" value="Send" />
</p>

</form>
</body>
</html>