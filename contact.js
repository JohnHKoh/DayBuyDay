function displayText() {
    var status = localStorage.getItem('sent');
    console.log(status);
    if (status === 'null') {
        document.getElementById('sent').style.display = 'none';
    }
    if (status === 'false') {
        document.getElementById('sent').style.display = 'block';
        document.getElementById('msg').style.color = 'red';
        document.getElementById('msg').innerHTML = 'Email failed to send. Please try again later.';
    }
    if (status === 'true') {
        document.getElementById('sent').style.display = 'block';
        document.getElementById('msg').style.color = 'green';
        document.getElementById('msg').innerHTML = 'Message sent!';
    }
}

