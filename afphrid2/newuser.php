<?PHP
/*
		Afphrid 1.5


File:		newuser.php
Purpose:	Add new user to the database
Dates:		C: 5/4/02		M: 5/6/02
Author:		Nicholas 'Aquarion' Avenell
Changes:

									*/
include("include/library.php");
include("include/userfuncs.php");
build_header("Add New User");
dbconnect();

/*

mysql> describe person;
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| name       | varchar(255) |      |     |         |                |
| email      | tinytext     | YES  |     | NULL    |                |
| homepage   | tinytext     | YES  |     | NULL    |                |
| password   | tinytext     | YES  |     | NULL    |                |
| registered | date         | YES  |     | NULL    |                |
| prefs      | tinytext     | YES  |     | NULL    |                |
| id         | int(11)      |      | PRI | NULL    | auto_increment |
+------------+--------------+------+-----+---------+----------------+

*/

function showform($defaults){

	html_form_start("newuser", $_SERVER['PHP_SELF']);

	echo "<h1>Become a member of Afphrid</h1>\n";

	// html_textbox($name, $label, $maxlength, $default)

	echo "<p>If you already have an account here, and are creating a new "
		."one because you've lost the details of the old one, don't, "
		."It buggers up the stats, data quality, and views something "
		."cronic. Instead, email afphrid@aquarionics.com (If that bounces, "
		."there will be a better address on <a href=\"http://www.aquarionics"
		.".com\">Aquarionics</a> for me, or whatever email address I last po"
		."sted to AFP from) and I will reset password or email addy for you"
		.". Thanks. -- Aquarion, Admin";

	echo "<p>";
	html_textbox("name", "Name:", 255, $defaults[0]);
	echo "<br>This will be your login name, and the name people select"
		." to relate to you";

	echo "</p>\n\n<p>";

	html_textbox("email", "Email Address:", 255, $defaults[1]);
	echo "<br>Never displayed on screen, this is where messages and replacement"
		." passwords are sent";

	echo "</p>\n\n<p>";

	html_textbox("homepage", "Web Link:", 255, $defaults[2]);
	echo "<br>Home Page, <a href=\"http://www.lspace.org/fandom"
		."/afp/a-files/\" target=\"outside\">A-Files</a> or "
		."<a href=\"http://sanity.klijmij.net/irc/\" target=\"outside\">"
		."IRC Gallery</a> entry (both links open in new window)";

	echo "</p>\n\n<p>";

	html_password("password", "Enter desired password:");
	newrow();
	html_password("confirm_pw", "Re-enter Password to confirm");
	echo "<br>Your password, which will be encrypted. Passwords are not "
		."recoverable, but new ones can be generated and emailed to you.";
	
	echo "</p>\n\n<p>";

	// chkbox($name, $label, $checked)
	echo "e-mail me when...";
	newrow();
	html_chkbox("mor", "...I have new relationships", $defaults[3]);
	newrow();
	html_chkbox("moc", "...people join my clique", $defaults[4]);
	newrow();
	html_chkbox("mom", "...people send me messages", $defaults[5]);
	newrow();
	html_chkbox("moca", "...I'm accepted into cliques", $defaults[6]);
	newrow();
	html_chkbox("mou", "...AFPhrid is upgraded", $defaults[7]);
	newrow();

	echo "(either way, Afphrid's messaging system will send you a message, this"
		." just chooses which messages are emailed to you also)";

	echo "</p>";
	$buttons = array(
		#array (Label, Name, Button type)
		array ('Add User', 'submit', 'submit'),
		array ('Reset Form', 'reset', 'reset')
		);

	html_buttons($buttons);


	html_form_close();
}

if (isset($_REQUEST['submit'])){

	$validate = "";

	echo "<ul>";
	
	$validate .= validate_name($_REQUEST['name']);
	$validate .= validate_email($_REQUEST['email']);
	$validate .= validate_homepage($_REQUEST['homepage']);
	$validate .= validate_password($_REQUEST['password'], $_REQUEST['confirm_pw'], "new");

	echo $validate;

	echo "</ul>";
	$valid_submits = array("name", "password", "email", "homepage", 
				"mor", "moc", "mom", "moca", "mou");
	
	foreach($valid_submits as $submit){
		if (isset($_POST["$submit"])){
			$$submit = $_POST["$submit"];
		} else {
			$$submit = false;
		}
	}

	if ($validate == ""){

		echo "<H2>Woo Hoo! Passed!</H2>";
		echo "<p>Well, that all seems to be in order, it's time to"
			." put you in the database then. A little warning first,"
			." This is a database of AFPRelations, not real ones."
			." Although I am not going to activly seek out and destroy"
			." all real relationships on the database, I'd really "
			." prefer it if they wern't put in here. There are reasons,"
			." and if you ask, I shall tell you them. But not here.</p>\n";

		echo "<p>Right, lets see about getting you in here then...</p>";

		$av_prefs = array('mor', 'moc', 'mom', 'moca', 'mou');
		$myprefs = "-";

		foreach ($av_prefs as $thispref){
			if ($$thispref){
				$myprefs .= $thispref ."-";
				#echo "$thispref on<br>";
			}
		}

		#echo "Prefs: ". $myprefs ."<br>";

		$registered = date("Y-m-d");

		$name = cleanstring($name);
		$email = cleanstring($email);
		if ($homepage == "http://"){$homepage = "";}
		$homepage = cleanstring($homepage);
		$password = cleanstring($password);



		$query  = "insert into person ";
		$query .= "(name, email, homepage, password, registered, prefs)";
		$query .= " values ";
		$query .= "('$name', '$email', '$homepage', password('$password'), '$registered', '$myprefs')";

		safequery($query);
		#panic("Not doing that, It's only a beta!<br>".$query);
		logthis($name, "newuser", $name . " joined the database", $query);

		echo "<p>Done. You are now a member of Afphrid, Go forth and "
			."<a href=\"user.php\">log in</a>";

	
	} else {
		echo "<H2>Failed. Bad.</H2>";
		
		$defaults = array($name, $email, $homepage, $mor, $moc, $mom, $moca, $mou);
		showform($defaults);
	}


}else{

	$defaults = array("", "user@domain", "http://", false, false, false, false, false);
	showform($defaults);

}

function newrow(){
	echo "<br>\n";
}


build_footer("New User");
?>
