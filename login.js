function checkCreated() {
    var check = localStorage.getItem("created");
    if (check === "true") {
        document.getElementById('created').style.display = "block";
		localStorage.setItem("created", "false");
    }
	if (check === "failed") {
		document.getElementById('created').value = "Account creation failed. Database error.";
		document.getElementById('created').style.color = "red";
        document.getElementById('created').style.display = "block";
		localStorage.setItem("created", "false");
    }
}