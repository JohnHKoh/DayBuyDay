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

    if (!filled || !checkEmail() || !checkZip() || !checkPass()) {
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
		document.getElementById('firstId').value = document.getElementById('first').value;
		document.getElementById('lastId').value = document.getElementById('last').value;
		document.getElementById('emailId').value = document.getElementById('email').value;
		document.getElementById('adressId').value = document.getElementById('adress').value;
		document.getElementById('cityId').value = document.getElementById('state').value;
		document.getElementById('stateId').value = document.getElementById('city').value;
		document.getElementById('zipId').value = document.getElementById('zip').value;
		document.getElementById('passId').value = document.getElementById('pass').value;
        document.getElementById('submitForm').action = "submit.php";
        localStorage.setItem("created", "true");
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