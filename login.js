function checkCreated() {
    var check = localStorage.getItem("created");
	console.log(check);
    if (check === "true") {
        document.getElementById('created').style.display = "block";
		localStorage.setItem("created", "false");
<<<<<<< HEAD
=======
    }
	if (check === "failed") {
		document.getElementById('created').value = "Account creation failed. Database error.";
		document.getElementById('created').style.color = "red";
        document.getElementById('created').style.display = "block";
		localStorage.setItem("created", "false");
>>>>>>> b67107c1da27834e5ad9ca7f8595a17befc5cf0e
    }
	else if (check === "dup") {
		document.getElementById('created').style.display = "block";
		document.getElementById('msg').style.color = "red";
		document.getElementById('msg').innerHTML = "Email already in use.";
		localStorage.setItem("created", "false");
    }
	else {
		document.getElementById('created').style.display = "none";
		localStorage.setItem("created", "false");
	}
}