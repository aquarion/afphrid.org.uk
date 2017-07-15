<?PHP
//////////////////////////////////////////////////////////
// Title:		Notes Page
// Project:		AFPhrid (Alt.fan.pratchett heroic relational & impossible database)
// Description:	
//
// Authour:		Nicholas Avenell
// Date:		

include("include/library.php"); // Useful Functions

build_header("Report a bug");

if (isset($_POST['submit'])){

	$message =  "Person: ".$_POST['username']."\n\n";
	$message .= "Page:   ".$_POST['page']."\n\n";
	$message .= "Problem:\n".$_POST['bug']."\n\n";

	/*mail("aquarion@localhost", "[AFPHRID Bug]", $message,
		"From: webmaster@afphrid.org.uk\r\n"
	   ."Reply-To: aquarion@aquarionics.com\r\n"
	   ."X-Mailer: PHP/" . phpversion());*/

	html_heading("Bug Reported", "1", "");

	echo "<pre>$message</pre>";

	echo "The above has been emailed to Aquarion";

} else {
	html_heading("Bug Report", "1", "");

	echo "Bug reports now not accepted. If it doesn't work after ten years, it's probably not going to ";
//
//	html_form_start("bugreport", $_SERVER['PHP_SELF']);
//
//	#html_textbox($name, $label, $maxlength, $default);
//
//	if (isset($_SERVER['PHP_AUTH_USER'])){
//		html_textbox("username", "Name", 255, $_SERVER['PHP_AUTH_USER']);
//	} else {
//		html_textbox("username", "Name & Email", 255, "");
//	}
//	echo "<br>\n";
//	if (isset($_GET['page'])){
//		html_textbox("page", "Bug Location", 255, $_GET['page']);
//	} else {
//		html_textbox("page", "Bug Location", 255, "");
//	}
//	echo "<br>\n";
//
//	html_textarea("bug", "Problem", 20, 70, "");
//	echo "<br>\n";
//
//	$buttons = array(
//		#array (Label, Name, Button type)
//		array ('Submit', 'submit', 'submit'),
//		array ('Reset Form', 'reset', 'reset')
//	);
//
//	html_buttons($buttons);
//
//	html_form_close();
}

build_footer("Report a bug") ?>
