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
      filled = false;
    } else
    {
        field.style.borderColor = 'initial';
        empty.pop(fieldname);
    }
  }

  var x = document.getElementById("error");

  if (!filled) {
  	if (x.style.display === 'none') {
  	  x.style.display = 'block';
  	}
	var message = "All fields must be filled."
	document.getElementById('msg').innerHTML = message;
  }
  else {
    x.style.display = 'none';
  }
  return filled;
}