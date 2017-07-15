<?PHP
// Afphrid Messages System
// Aquarion, 2002-05-31

include("include/library.php");
dbconnect();
$user = login("Any");


$PHP_SELF = $_SERVER['PHP_SELF'];

build_header($user['name']."'s messages page");

if (isset($_GET['view'])){

	$q = "select *, message.id as ident from message, person where"
		." message.id = ".$_GET['view']." and person.id = msgto"
		." and msgto = ".$user['id'];

	$r = safequery($q);

	if (mysql_num_rows($r) == 0){
		echo "Message Not Found, or invalid.";
	} else {
		
		$message = mysql_fetch_array($r);

		if ($message['status'] == 0){
			safequery("update message set status = 1 where id = ".$_GET['view']);
		}

		html_heading("Viewing Message", 1,"");
		html_form_start("message", $_SERVER['PHP_SELF']."?folder=".$_GET['folder']);
		html_hidden("id", $message['ident']);


		echo "<LABEL for=\"to\">To:"
			."<span id=\"to\">".$user['name']."</span></LABEL><br>";

		html_lesshidden("to", "From", $message['msgfrom'], $message['name']);
		#echo "<LABEL for=\"from\"><div class=\"label\">From:</div>"
		#	."<span id=\"from\">".$message['name']."</span></LABEL><br>";

		echo "<br>";

		html_lesshidden("subject", "Subject", "Re: ".$message['subject'], $message['subject']);
		#echo "<LABEL for=\"subject\"><div class=\"label\">Subject:</div>"
		#	."<span id=\"subject\">".$message['subject']."</span></LABEL><br>";
		echo "<br>";
		echo "<LABEL for=\"content\">Content:"
			."<code id=\"content\">"
			. nl2br($message['content'])	
			."</code></LABEL><br>";

		html_hidden("message", $message['content']);

		$buttons = array(
			#array (Label, Name, Button type)
			array ('Mark Unread', 'unread', 'submit'),
			array ('Delete Message', 'delete', 'submit'),
			array ('File Message', 'file', 'submit'),
			array ('Reply', 'reply', 'submit')
			);

		html_buttons($buttons);
		html_form_close();
	}

} elseif (isset($_GET['compose'])){
	html_form_start("message", $_SERVER['PHP_SELF']);

	echo "<LABEL for=\"to\">To:";

	$result = safequery("select id, name from person where id != ".$user['id']." order by name");
	echo "<select name=\"to\">\n";
	while ($row=mysql_fetch_array($result)){
		if ($_GET['compose'] == $row['id']){
			$checked = " checked";
		} else {
			$checked = "";
		}
		echo "\t<option value=\"".$row['id']."\"".$checked
			.">".$row['name']."</option>\n";

	}
	echo "</select>\n";

	echo "</LABEL>";
	echo "<br>";
	html_lesshidden("from", "From", $user['id'], $user['name']);
	echo "<br>";
	html_textbox("subject", "Subject:", 255, "");
	echo "<br>";
	html_textarea("message", "Message", 10, 70, "");
	echo "<br>";
	$buttons = array(
		#array (Label, Name, Button type)
		array ('Post', 'post', 'submit'),
		array ('Cancel', 'cancel', 'submit')
		);

	html_buttons($buttons);
	html_form_close();

} elseif (isset($_POST['reply'])){
	html_form_start("message", $_SERVER['PHP_SELF']);

	echo "<LABEL for=\"to\"><div class=\"label\">To:</div>";

	$result = safequery("select id, name from person order by name");
	echo "<select name=\"to\">\n";
	while ($row=mysql_fetch_array($result)){
		if ($row['id'] == $_POST['to']){
			$checked = " selected";
		} else {
			$checked = "";
		}
		echo "\t<option value=\"".$row['id']."\""
			.$checked.">".$row['name']."</option>\n";
	}
	echo "</select>\n";

	echo "</LABEL>";
	echo "<br>";
	html_lesshidden("from", "from", $user['id'], $user['name']);
	echo "<br>";
	html_textbox("subject", "Subject:", 255, $_POST['subject']);
	echo "<br>";

	$reply = "----I got this message:----\n"
			.stripslashes($_POST['message'])
			."\n--------------------------\n";

	html_textarea("message", "Message", 10, 70, $reply);
	echo "<br>";
	$buttons = array(
		#array (Label, Name, Button type)
		array ('Post', 'post', 'submit'),
		array ('Cancel', 'cancel', 'submit')
		);

	html_buttons($buttons);
	html_form_close();

} elseif (isset($_POST['post'])){

$msg = strip_tags($_POST['message']);
sendmessage($_POST['to'], $user['id'], $_POST['subject'], $msg, "mom");

} elseif (isset($_POST['delete'])){

	safequery("delete from message where msgto = "
		.$user['id']." and id = ".$_POST['id']);

} elseif (isset($_POST['file'])){

	safequery("update message set status = 2 where msgto = "
		.$user['id']." and id = ".$_POST['id']);

} elseif (isset($_POST['unread'])){

	safequery("update message set status = 0 where msgto = "
		.$user['id']." and id = ".$_POST['id']);

} 



if (isset($_GET['folder'])){
	$folder = $_GET['folder'];
} else {
	$folder = false;
}

if ($folder == "filed") {
	$box = "Filed";
	$stat = 2;		
} elseif ($folder == "read") {
	$box = "Read Messages";
	$stat = 1;
} else {
	$folder = "inbox";
	$box = "Inbox";
	$stat = 0;
}

/*---------+------------------+------+-----+---------+----------------+
| Field    | Type             | Null | Key | Default | Extra          |
+----------+------------------+------+-----+---------+----------------+
| id       | int(10) unsigned |      | PRI | NULL    | auto_increment |
| msgto    | int(11)          | YES  |     | NULL    |                |
| msgfrom  | int(11)          | YES  |     | NULL    |                |
| subject  | tinytext         | YES  |     | NULL    |                |
| content  | mediumtext       | YES  |     | NULL    |                |
| datesent | timestamp(12)    | YES  |     | NULL    |                |
| status   | int(11)          | YES  |     | NULL    |                |
| type     | tinytext         | YES  |     | NULL    |                |
+----------+------------------+------+-----+---------+---------------*/

html_heading($box, 1,"");
echo "[ <a href=\"message.php?compose=mail\">Compose New Message</a> ]<br>";
echo "View [ <a href=\"message.php?folder=inbox\">Inbox</a> "
	."| <a href=\"message.php?folder=read\">Read Messages</a> "
	."| <a href=\"message.php?folder=filed\">Filed</a> "
	."]<br>";

$q = "select message.id as ident, name, msgfrom, subject, date_format(datesent,'%W, %M %D %Y %k:%i') AS nicedate from message, person where status = $stat and msgto = ".$user['id']." and person.id = msgfrom" ;
$r = safequery($q);

echo "<table width=\"80%\">\n";

echo "<tr><th>&nbsp;</th><th>From</th><th>Subject</th><th>Date</th></tr>\n";

while($row = mysql_fetch_array($r)){
	echo "<tr>";
	echo "<td><img src=\"images/letter.png\" width=\"32\""
		."height=\"24\" border=0 alt=\"A Message\"></td>";

	echo "<td>".$row['name']."</td>";
	echo "<td><a href=\"message.php?view=".$row['ident']
		."&amp;folder=$folder\">".$row['subject']."</a></td>";
	echo "<td>".$row['nicedate']."</td>";
	
	echo "</tr>\n";
}

echo "</table>\n";

build_footer("Messages");
?>
