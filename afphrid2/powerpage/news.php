<?PHP
include("../include/library.php");
dbconnect();
$user = login("Aquarion");
build_header("News");
echo "<H1>View Stuff</H1>";


$me = $_SERVER['PHP_SELF'];

if(isset($_POST['post'])){

echo "<h2>Sending Messages...</h2>\n";

if ($_POST['post'] == "Post to all"){

	$q = "select id, name from person where LOCATE('mou', prefs) != 0;";
	$r = safequery($q);
	$msg = $_POST['message'];

	while ($row = mysql_fetch_array($r)){
		#sendmessage($to, $user, $subject, $message, $type)
		sendmessage($row['id'], 0, $_POST['subject'], $msg, "mou");
		echo "Sent message to ".$row['name']."<br>\n";
	}

} else {
	sendmessage(0, 1, $_POST['subject'], $_POST['message'], "mou");
}
} else{
	html_form_start("message", $_SERVER['PHP_SELF']);

	echo "To: Everyone";

	echo "<br>";
	html_lesshidden("from", "From", $user['id'], $user['name']);
	echo "<br>";
	html_textbox("subject", "Subject:", 255, "");
	echo "<br>";
	html_textarea("message", "Message", 10, 70, "");
	echo "<br>";
	$buttons = array(
		#array (Label, Name, Button type)
		array ('Post to all', 'post', 'submit'),
		array ('Site Only', 'post', 'submit'),
		array ('Cancel', 'cancel', 'submit')
		);

	html_buttons($buttons);
	html_form_close();

}




build_footer("News");
?>
