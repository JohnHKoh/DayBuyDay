function checkCreated() {
    var check = localStorage.getItem("created");
    if (check === "true") {
        document.getElementById('created').style.display = "block";
    }
}