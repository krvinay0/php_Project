$('#f_namecheck').hide();
$('#l_namecheck').hide();
$('#emailcheck').hide();
$('#phonecheck').hide();
$('#passwordcheck').hide();
$('#Cpasswordcheck').hide();

var fname_err=true;
var lname_err=true;
var email_err=true;
var phone_err=true;
var password_err=true;
var Cpassword_err=true;

$('#first_name').keyup(function(){
	fnamecheck();
});

function fnamecheck()
{
	var fname_val=$('#first_name').val();
	if(fname_val==""||fname_val.length>15)
	{
		$('#f_namecheck').show();
		$('#f_namecheck').html("**Firstname should not be empty or more than 15 letters");
		$('#f_namecheck').focus();
		$('#f_namecheck').css("color","white");
		fname_err=false;
		return false;
	}
	else
	{
		$('#f_namecheck').hide();
	}

	var fval_reg = /^[a-zA-Z ]+$/;

	if(fval_reg.test(fname_val) && fname_val!=="")
	{
		$('#f_namecheck').hide();
	}
	else
	{		
		$('#f_namecheck').show();
		$('#f_namecheck').html("**Numbers & spl. char not allowed");
		$('#f_namecheck').focus();
		$('#f_namecheck').css("color","red");
		fname_err=false;
		return false;
	}
}

$('#last_name').keyup(function(){
	lnamecheck();
});

function lnamecheck()
{
	var lname_val=$('#last_name').val();
	if(lname_val==""||lname_val.length>15)
	{
		$('#l_namecheck').show();
		$('#l_namecheck').html("**Lastname should not be empty or more than 15 letters");
		$('#l_namecheck').focus();
		$('#l_namecheck').css("color","red");
		lname_err=false;
		return false;
	}
	else
	{
		$('#l_namecheck').hide();
	}

	var lval_reg = /^[a-zA-Z ]+$/;

	if(lval_reg.test(lname_val) && lname_val!=="")
	{
		$('#l_namecheck').hide();
	}
	else
	{		
		$('#l_namecheck').show();
		$('#l_namecheck').html("**Numbers & spl. char not allowed");
		$('#l_namecheck').focus();
		$('#l_namecheck').css("color","red");
		lname_err=false;
		return false;
	}


}

$('#email').keyup(function(){
	email_check();
});

function email_check()
{
	var email_val=$('#email').val();
	if(email_val==""||email_val.length>30)
	{
		$('#emailcheck').show();
		$('#emailcheck').html("**Email should not be empty or more than 30 letters");
		$('#emailcheck').focus();
		$('#emailcheck').css("color","red");
		email_err=false;
		return false;
	}
	else
	{
		$('#emailcheck').hide();
	}

	var email_reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	if(email_reg.test(email_val) && email_val!=="")
	{
		$('#emailcheck').hide();
	}
	else
	{		
		$('#emailcheck').show();
		$('#emailcheck').html("**Enter correct email");
		$('#emailcheck').focus();
		$('#emailcheck').css("color","red");
		email_err=false;
		return false;
	}


}

$('#phone').keyup(function(){
	phone_check();
});

function phone_check()
{
	var phone_val=$('#phone').val();
	if(phone_val==""||phone_val.length!=10)
	{
		$('#phonecheck').show();
		$('#phonecheck').html("**Phone no. should not be empty & should be equal to 10");
		$('#phonecheck').focus();
		$('#phonecheck').css("color","red");
		phone_err=false;
		return false;
	}
	else
	{
		$('#phonecheck').hide();
	}

	var phone_reg = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

	if(phone_reg.test(phone_val) && phone_val!=="")
	{
		$('#sphonecheck').hide();
	}
	else
	{		
		$('#phonecheck').show();
		$('#phonecheck').html("**Phone no. should only contain numbers");
		$('#phonecheck').focus();
		$('#phonecheck').css("color","red");
		email_err=false;
		return false;
	}


}

$('#password').keyup(function(){
	password_check();
});

function password_check()
{
	var password_val=$('#password').val();
	if(password_val==""||password_val.length<6 || password_val.length>10)
	{
		$('#passwordcheck').show();
		$('#passwordcheck').html("**Password should be between 6 to 10 characters");
		$('#passwordcheck').focus();
		$('#passwordcheck').css("color","red");
		password_err=false;
		return false;
	}
	else
	{
		$('#passwordcheck').hide();
	}
}

$('#password').keyup(function(){
	password_check();
});


$('#Cpassword').keyup(function(){
	Cpassword_check();
});

function Cpassword_check()
{
	var Cpassword_val=$('#Cpassword').val();
	if(Cpassword_val=="")
	{
		$('#Cpasswordcheck').show();
		$('#Cpasswordcheck').html("**This field is required");
		$('#Cpasswordcheck').focus();
		$('#Cpasswordcheck').css("color","red");
		Cpassword_err=false;
		return false;
	}
	else
	{
		$('#Cpasswordcheck').hide();
	}
	var password_val=$('#password').val();
	if (Cpassword_val!=password_val) {
		$('#Cpasswordcheck').show();
		$('#Cpasswordcheck').html("**It should match the password entered above");
		$('#Cpasswordcheck').focus();
		$('#Cpasswordcheck').css("color","red");
		Cpassword_err=false;
		return false;
	}
	else
	{
		$('#Cpasswordcheck').hide();
	}
}

function checkform(){
	fname_err=fnamecheck();
	lname_err=lnamecheck();
	email_err=email_check();
	phone_err=phone_check();
	password_err=password_check();
	Cpassword_err=Cpassword_check();

	if (fname_err==false || lname_err==false || email_err==false || phone_err==false || password_err==false || Cpassword_err==false) 
	{
		alert("Please fill the form correctly");
		return false;
	}
}