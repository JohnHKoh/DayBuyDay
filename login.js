function checkCreated() {
    var check = localStorage.getItem("created");
	console.log(check);
    if (check === "true") {
        document.getElementById('created').style.display = "block";
		localStorage.setItem("created", "false");
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