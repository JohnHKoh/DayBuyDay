function validateForm() {
    var fields = ["first", "last", "email", "address", "city", "state", "zip", "pass", "confpass"]
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

    var x = document.getElementById("error");

    if (!filled || !checkEmail() || !checkZip() || !checkPass() || !checkAddress()) {
        if (x.style.display === 'none') {
            x.style.display = 'block';
            var url = location.href;               //Save down the URL without hash.
			location.href = "#form";               //Go to the target element.
			history.replaceState(null,null,url);   //Don't like hashes. Changing it back.
        }
        var message = "All fields must be filled and valid."
        document.getElementById('msg').innerHTML = message;
    } else {
        x.style.display = 'none';
		localStorage.setItem("created", "true");
		document.getElementById('firstId').value = document.getElementById('first').value;
		document.getElementById('lastId').value = document.getElementById('last').value;
		document.getElementById('emailId').value = document.getElementById('email').value;
		document.getElementById('addressId').value = document.getElementById('address').value;
		document.getElementById('cityId').value = document.getElementById('city').value;
		document.getElementById('stateId').value = document.getElementById('state').value;
		document.getElementById('zipId').value = document.getElementById('zip').value;
		document.getElementById('passId').value = document.getElementById('pass').value;
        document.getElementById('submitForm').action = "submit.php";
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

function checkAddress() {
    var address = document.getElementById("address");
    var err = document.getElementById("invAddress");
    var regex = RegExp('^\\d[a-zA-Z\\s\\d\\/]*\\d[\\.a-zA-Z\\s\\d\\/]*$');
    var valid = regex.test(address.value);

    if (!valid) {
        err.style.display = 'block';
        address.style.borderColor = 'red';
        return false;
    }
    else {
        err.style.display = 'none';
        address.style.borderColor = 'initial';
        return true;
    }
}

function checkZip() {
    var zip = document.getElementById("zip");
    var err = document.getElementById("invZip");

    if (zip.value.length !== 5) {
        err.style.display = 'block';
        zip.style.borderColor = 'red';
        return false;
    }
    else {
        err.style.display = 'none';
        zip.style.borderColor = 'initial';
        return true;
    }
}

function checkPass() {
    var pass = document.getElementById("pass");
    var conf = document.getElementById("confpass");
    var err = document.getElementById("invPass");

    if (pass.value !== conf.value) {
        err.style.display = 'block';
        pass.style.borderColor = 'red';
        conf.style.borderColor = 'red';
        return false;
    }
    else {
        err.style.display = 'none';
        pass.style.borderColor = 'initial';
        conf.style.borderColor = 'initial';
        return true;
    }
}

function alphaOnly(event) {
    var key = event.keyCode;
    return ( (key >= 65 && key <= 90) || key === 8 || key === 32 || key === 189 || key === 9);
}

function numsOnly(event) {
    var key = event.keyCode;
    return (key >= 48 && key <= 57) || key === 9;
}

function alphaNumeric(event) {
    var key = event.keyCode;
    return ( (key >= 48 && key <= 57) || (key >= 65 && key <= 90) || key === 8 || key === 32 || key === 189 || key === 9);
}

function checkCreated() {
    var check = localStorage.getItem("created");
    console.log(check);
    if (check === "true") {
        document.getElementById('created').style.display = "block";
        localStorage.setItem("created", "false");
    }
    else if (check === "dup") {
        document.getElementById('created').style.display = "block";
        document.getElementById('msg2').style.color = "red";
        document.getElementById('msg2').innerHTML = "Email already in use.";
        localStorage.setItem("created", "false");
    }
    else if (check === "emailErr") {
        document.getElementById('created').style.display = "block";
        document.getElementById('msg2').style.color = "red";
        document.getElementById('msg2').innerHTML = localStorage.getItem("emailErrMsg");
        localStorage.setItem("created", "false");
    }
    else {
        document.getElementById('created').style.display = "none";
        localStorage.setItem("created", "false");
    }
}