<?PHP
/*
		Afphrid 1.5


File:		index.php
Purpose:	Front page & Portal
Dates:		C: 5/3/02		M: 2002-05-30
Author:		Nicholas 'Aquarion' Avenell
Changes:

										*/
include("include/library.php"); // Useful Functions

build_header("Front Page");

dbconnect();

?>
<div class="rightmenu">
<h2>Afphrid</h2>
<a href="newuser.php">Become a member</a><br>
<a href="user.php">Login</a><br>
<a href="notes.php">View Help</a><br>
<a href="stats.php">Statistics</a>
</div>

<h1>YOU DO NOT NEED A NEW ACCOUNT, YOUR OLD AFPHRID ACCOUNT IS STILL HERE!</h1>
<p>
If you can't remember your username, it'll be listed in the <a href="view.php">view section (which no longer requires login)</a>.
</p>
<h2>Forgot Password?</h2>

<?PHP
html_form_start("recoverpassword", "forgotpassword.php");
echo "<LABEL for=\"id\" class=\"label\">To:";
$result = safequery("select id, name from person order by name");
echo "<select name=\"id\" id=\"id\">\n";
echo "<option value=\"0\">--- Select username ---</option>\n";
while ($row=mysql_fetch_array($result)){
	echo "\t<option value=\"".$row['id']."\">".$row['name']."</option>\n";
}
echo "</select>\n";
echo "</LABEL>";

$buttons = array(
	#array (Label, Name, Button type)
	array ('Recover Pasword', 'recover', 'submit'),
	);

html_buttons($buttons);

html_form_close();

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

#$rssData = parseRSS("http://www.aquarionics.com/meta/category/afphrid.rss2");
$rssData = array();
array_shift($rssData);
$rss = array();
foreach ( $rssData as $item )
{
	echo "<div class=\"news_box\">";
	echo "<h2 class=\"news_headline\">".$item['title']."</h2>";
	echo "<p>".$item['content:encoded']."</p>";
	echo "<div class=\"news_footer\">".$item['dc:date']." - <a href=\"message.php?compose=1\">Aquarion</a></div>";
	echo "</div>";

	echo "<br>";

}

?>

<?PHP
build_footer("Front Page");
?>
