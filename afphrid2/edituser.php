<?PHP

include("include/library.php");
dbconnect();
$user = login("Any");
include("include/userfuncs.php");

$user = mysql_fetch_array(safequery("select * from person where name = '".$_SERVER['PHP_AUTH_USER']."'"));

$PHP_SELF = $_SERVER['PHP_SELF'];

build_header("Editing {$user['name']}'s details");

function newrow(){
	echo "<br>\n";
}

function showform($defaults){

	html_form_start("newuser", $_SERVER['PHP_SELF']);

	// html_textbox($name, $label, $maxlength, $default)

	html_hidden("id", $defaults[0]);

	html_textbox("name", "Name:", 255, $defaults[1]);
	newrow();
	html_textbox("email", "Email Address:", 255, $defaults[2]);
	newrow();
	html_textbox("homepage", "Home Page:", 255, $defaults[3]);
	newrow();
	html_password("password", "Enter desired password:");
	newrow();
	html_password("confirm_pw", "Re-enter Password to confirm");
	newrow();

	// chkbox($name, $label, $checked)
	echo "e-mail me when...";
	newrow();
	html_chkbox("mor", "...I have new relationships", $defaults[4]);
	newrow();
	html_chkbox("moc", "...people join my clique", $defaults[5]);
	newrow();
	html_chkbox("mom", "...people send me messages", $defaults[6]);
	newrow();
	html_chkbox("moca", "...I'm accepted into cliques", $defaults[7]);
	newrow();
	html_chkbox("mou", "...AFPhrid is upgraded", $defaults[8]);
	newrow();
	$buttons = array(
		#array (Label, Name, Button type)
		array ('Modify User', 'submit', 'submit'),
		array ('Reset Form', 'reset', 'reset')
		);

	html_buttons($buttons);

	html_form_close();
}

if (isset($_REQUEST['submit'])){

	$validate = "";

	echo "<ul>";
	
	if ($_REQUEST['name'] != $user['name']){
		$validate .= validate_name($_REQUEST['name']);
	} else {
		echo "<li>Skipping Username Validation (Unchanged)";
	}

	if ($_REQUEST['email'] != $user['email']){
		$validate .= validate_email($_REQUEST['email']);
	} else {
		echo "<li>Skipping Email Validation (Unchanged)";
	}

	$validate .= validate_homepage($_REQUEST['homepage']);
	$validate .= validate_password($_REQUEST['password'], $_REQUEST['confirm_pw'], "modify");

	echo $validate;

	echo "</ul>";
	$valid_submits = array("id", "name", "password", "email", "homepage", 
				"mor", "moc", "mom", "moca", "mou");
	
	foreach($valid_submits as $submit){
		if (isset($_POST["$submit"])){
			$$submit = $_POST["$submit"];
		} else {
			$$submit = false;
		}
	}

	if ($validate == ""){

		html_heading("Yay, Passed",2,"");
		

		echo "<p>Okay, Updating Info......</p>";

		$av_prefs = array('mor', 'moc', 'mom', 'moca', 'mou');
		$myprefs = "-";

		foreach ($av_prefs as $thispref){
			if ($$thispref){
				$myprefs .= $thispref ."-";
			}
		}
		$name = addslashes($name);
		$email = addslashes($email);
		if ($homepage == "http://"){$homepage = "";}
		$homepage = addslashes($homepage);
		$password = addslashes($password);


		$query  = "update person set ";
		$query .= "name = '$name', ";
		$query .= "email = '$email', ";
		$query .= "homepage = '$homepage', ";
		if($password != ""){$query .= "password = password('$password'), ";}
		$query .= "prefs = '$myprefs' ";

		$query .= "where id = '$id'";

		safequery($query);
		logthis($name, "modify", $name . " changed their information", $query);
		
		echo "<p>Congrats, it seems to have worked....</p>";

	
	} else {
		html_heading("Failed. Bad.",2,"");
		
		$defaults = array($id, $name, $email, $homepage, $mor, $moc, $mom, $moca, $mou);
		showform($defaults);
	}


}else{

	html_heading("Oh, Hi ".$user['name'],1,"");

	$form = array(
		$user['id'],
		$user['name'],
		$user['email'],
		$user['homepage']	
		);


	$prefs = array("mor", "moc", "mom", "moca", "mou");

	foreach ($prefs as $thispref){
		if (strstr($user['prefs'], "-".$thispref."-")){
			$form[] = true;
		} else {
			$form[] = false;
		}
	}
	showform($form);
};



build_footer("Edit User");
?>