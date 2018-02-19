<html>
<head>
<title>Add User</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $data_missing = array();
    if(empty($_POST['first_name'])){
        // Adds name to array
        $data_missing[] = 'First Name';
    } else {
        // Trim white space from the name and store the name
        $f_name = trim($_POST['first_name']);
    }
    if(empty($_POST['last_name'])){
        // Adds name to array
        $data_missing[] = 'Last Name';
    } else{
        // Trim white space from the name and store the name
        $l_name = trim($_POST['last_name']);
    }
    if(empty($_POST['email'])){
        // Adds name to array
        $data_missing[] = 'Email';
    } else {
        // Trim white space from the name and store the name
        $email = trim($_POST['email']);
    }
    if(empty($_POST['address'])){
        // Adds name to array
        $data_missing[] = 'Address';
    } else {
        // Trim white space from the name and store the name
        $street = trim($_POST['address']);
    }
    if(empty($_POST['city'])){
        // Adds name to array
        $data_missing[] = 'City';
    } else {
        // Trim white space from the name and store the name
        $city = trim($_POST['city']);
    }
    if(empty($_POST['state'])){
        // Adds name to array
        $data_missing[] = 'State';
    } else {
        // Trim white space from the name and store the name
        $state = trim($_POST['state']);
    }
    if(empty($_POST['zip'])){
        // Adds name to array
        $data_missing[] = 'Zip Code';
    } else {
        // Trim white space from the name and store the name
        $zip = trim($_POST['zip']);
    }
    if(empty($_POST['passhash'])){
        // Adds name to array
        $data_missing[] = 'Password';
    } else {
        // Trim white space from the name and store the name
        $phone = trim($_POST['passhash']);
    }
/*
    if(empty($_POST['birth_date'])){

        // Adds name to array
        $data_missing[] = 'Birth Date';

    } else {

        // Trim white space from the name and store the name
        $b_date = trim($_POST['birth_date']);

    }
*/
    if(empty($data_missing)){      
        require_once('../mysqli_connect.php');
        $query = "INSERT INTO days (first_name, last_name, email,
        address, city, state, zip, passhash) VALUES (?, ?, ?,
        ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);
        /*
        i Integers
        d Doubles
        b Blobs
        s Everything Else
        */
        mysqli_stmt_bind_param($stmt, "ssssssisssd", $f_name,
                               $l_name, $email, $address, $city,
                               $state, $zip, $passhash);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        if($affected_rows == 1){
            echo 'Student Entered';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occurred<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }
    } else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }
}
?>
<form action="http://localhost:8080/WebsiteInHere/peehpee/useradded.php" method="post">  
    <b>Add a New User</b>
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
<!--<p>Birth Date (YYYY-MM-DD):
<input type="text" name="birth_date" size="30" value="" />
</p>-->
<p>
    <input type="submit" name="submit" value="Send" />
</p>
    
</form>
</body>
</html>