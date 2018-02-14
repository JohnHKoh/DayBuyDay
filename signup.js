function validateForm()
{
  var fields = ["first","last","email","address","city","state","zip","pass","confpass"]
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
        var x = document.getElementById("error");
	    if (x.style.display === 'none') {
			x.style.display = 'block';
		}
      filled = false;
    }
  }
  if (!filled) {
	  var message = "All fields must be filled."
	  document.getElementById('msg').innerHTML = message;
  }
  return filled;
}