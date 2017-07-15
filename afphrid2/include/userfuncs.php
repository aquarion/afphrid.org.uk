<?PHP
/*
		Afphrid 1.5


File:		userfuncs.php
Purpose:	Useful functions for playing with users
Dates:		C: 5/6/02		M: 5/6/02
Author:		Nicholas 'Aquarion' Avenell
Changes:

										*/

function validate_name($name){
	$test = "";

	// Test Null Username

	if ($name == "")
	{
		$test .= "<li> Username field was blank, This is required.</li>\n";
	}

	//Test Existing Username

	$result = safequery("select * from person where name = '".addslashes($name)."'");
	if(mysql_num_rows($result)>0)
	{
		$test .= "<li>That username is already in use. Sorry.</li>";
	}


	return $test;
}


function validate_email($email){
	$test = "";
	if ($email == "" || $email == "user@domain")
	{
		$test .="<li>Email may not be null. (Email addresses ";
		$test .="are purely for admin, they will never be displayed)</li>";
	}

	$result = safequery("select name from person where email = '".addslashes($email)."'");
	if(mysql_num_rows($result)>0)
	{
		$row = mysql_fetch_array($result);
		$test .= "<li>A person (".$row['name'].") with that email address (".$email;
		$test .= ") is already registered. Sorry.</li>";
	}

	if ( !eregi("^[\.A-Za-z0-9\_-]+@[A-Za-z0-9\_-]+.[A-Za-z0-9\_-]+.*", $email))
	{
		$test .= "<li>$email does not look like an email address to me.</li>";
	}

	if ( eregi("^[\.A-Za-z0-9\_-]+@lspace.org", $email))
	{
		echo "<li>Oooh, An L-Space person. *honoured*</li>";
	}

	if ( eregi("^[\.A-Za-z0-9\_-]+@hotmail.com", $email))
	{
		echo "<li>You do realise that that email address contaminates the database with evil, don't you?</li>";
	}

	if ( eregi("^.*spam.*", $email))
	{
		echo "<li>Er, I hope that address is valid. You don't really need to spamtrap it, you know, it's only ever used for sending email, and never shown on screen. Still, you can always change it later... (This doesn't affect the validation, it's just a warning)</li>";
	}


	return $test;	
}


function validate_homepage($homepage){
	$test = "";

	if ($homepage=="http://" || $homepage=="")
	{
		// don't do anything
	}
	else
	{	
		if (!ereg("^http://.*", $homepage))
		{
			$test .= "<li>Home pages have to start 'http://', otherwise the links are broken.</li>";
		}
	}
	return $test;	
}


function validate_password($password, $second_password, $action){
	$test = "";
	if ($action == "modify"){
		if ($password == ""){
			echo "<li>Not changing Password</li>";
		} else {
			if ($second_password == ""){
				$test .= "<li>You didn't confirm your new password, Why?</li>";
			} else {
				if ($password != $second_password){
					$test .= "<li>Your passwords didn't match. Wanna try again?</li>";
				}
			}
		}		
	}else{
		if ($password == ""){
			$test .= "<li>Please choose a password</li>";
		} else {
			
			if ($second_password == ""){
				$test .= "<li>You didn't confirm your password, Why?</li>";
			} else {
				if ($password != $second_password){
					$test .= "<li>Your passwords didn't match. Wanna try again?</li>";
				}
			}
		}
	}
	return $test;	
}