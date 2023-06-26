function logincheck() 
{
	var email = document.getElementById('email');
	var emailreq = document.getElementById('emailreq');
	var password = document.getElementById('password');
	var passwordreq = document.getElementById('passwordreq');
	var campusid = document.getElementById('campusid');
	var campusreq = document.getElementById('campusreq');
	if (email.value=="" && password.value =="" && campusid.value=="") 
	{
		emailreq.innerHTML="*This field is required";
		passwordreq.innerHTML="*This field is required";
		campusreq.innerHTML="*This field is required";
		return false;	
	}
	else if (email.value=="" || password.value =="" || campusid.value=="")
	{
		if (email.value=="") 
		{
			emailreq.innerHTML="*This field is required";
		}
		else
		{
			emailreq.innerHTML="";
		}
		if (password.value =="") 
		{
			passwordreq.innerHTML="*This field is required";
		}
		else
		{
			passwordreq.innerHTML="";
		}
		if (campusid.value=="") 
		{
			campusreq.innerHTML="*This field is required";
		}
		else
		{
			campusreq.innerHTML="";
		}
		return false;
	}
	else
	{
		return true;	
	}

}