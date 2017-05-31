 function checkForm(form){
	if(form.first.value == ""){
		alert("First Name Cannot Be Blank");
		form.first.focus();
		return false;
	}
	if(form.last.value == ""){
		alert("Last Name Cannot Be Blank");
		form.last.focus();
		return false;
	}
	re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;;
	if(form.email.value == ""){
		alert("Email Cannot Be Blank");
		form.email.focus();
		return false;
	}
	if(!re.test(form.email.value)){
		alert("Email must be valid format");
		form.email.focus();
		return false;
	}
	if(form.username.value == ""){
		alert("Username Cannot Be Blank");
		form.username.focus();
		return false;
	}
	if(form.password.value == ""){
		alert("Must Provide Password");
		form.password.focus();
		return false;
	}
	if(form.check.value == ""){
		alert("Must Verify Password");
		form.check.focus();
		return false;
	}
	re = /[A-Z]/;
	if(!re.test(form.password.value)){
		alert("Password must contain at least one uppercase letter");
		form.password.focus();
		return false;
	}
	re = /[0-9]/;
	if(!re.test(form.password.value)){
		alert("Password must contain at least one number");
		form.password.focus();
		return false;
	}
	if(form.password.value != form.check.value){
		alert("Your passwords didn't match");
		form.password.focus();
		return false;
	}
	re = /^\d+$/;
	if(!re.test(form.age.value)){
		alert("Age must be a number with three or less digits");
		form.age.focus();
		return false;
	}
	else{
		return true;
	}
}
