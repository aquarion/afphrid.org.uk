<?PHP
include("include/library.php");
dbconnect();
$user = login("Any");


$PHP_SELF = $_SERVER['PHP_SELF'];

build_header($user['name']."'s front page");

echo "<div class=\"rightmenu\">"
	."<h2>User</h2>";

$q = "select id from message where status = 0 and msgto = ". $user['id'];
$msg = mysql_num_rows(safequery($q));
echo "<a href=\"message.php\">Messages</a><br>$msg unread";

echo "</div>";

echo "<h1>Oh, Hi ".$user['name']."</h1>";

echo"<p>Welcome to the wonderful world of Afphrid, mark II. You can't do a hell of a lot right now, but what you can do is working well...</p>";
echo "<p>Your name appears to be " . $user['name']
	.". Your email is registered as ". $user['email'];
if ($user['homepage'] != ""){
	echo ", and your home page is at <a href=\""
		.$user['homepage']."\">".$user['homepage']."</a>.";
}else{
	echo ", but you didn't register a home page.";
}


echo "</p>\n<p>You can link to your very own profile at this address:</p>
<p><a href=\"http://www.afphrid.org.uk/viewme.php?id=".$user['name']."\">http://www.afphrid.org.uk/viewme.php?id=".$user['name']."</a></p>";

echo "<p>All this, and more (Like your password, and your email "
	."delivery settings), can be changed in the splended and very"
	." worthwhile <a href=\"edituser.php\">Afphrid User Management Area</a></p>";



$query = "select *, relationship.id as rel_id, personOne.name as p1_name,"
	." personTwo.name as p2_name from relationship"
	." left join person as personOne on (personOne.id = relationship.person_one)"
	." left join person as personTwo on (personTwo.id = relationship.person_two)"
	." where (person_one = '".$user['id']."'"
	." or person_two = '".$user['id']."')"
	." and status > 0";
$result = safequery($query);


if (mysql_num_rows($result) != 0 ){

	echo "<h2>View Relationships</h2>";

	echo "<ul>";

	while ($row=mysql_fetch_array($result)){
		echo "<li>";
		echo linkName($row['p1_name'])." is ".linkName($row['p2_name'])."'s ".$row['rel_onetwo']
			.", and ".linkName($row['p2_name'])." is ".linkName($row['p1_name'])."'s ".$row['rel_twoone'];

		if ($row['status'] == 1 && $row['person_two'] == $user['id']){
			echo " [ <a href=\"relate.php?"
				."action=confirm&amp;id=".$row['rel_id']
				."\">Confirm</a> "
				."| <a href=\"relate.php?"
				."action=deny&amp;id=".$row['rel_id']
				."\">Deny</a> "
				."]";
		} else {
			echo "[ <a href=\"relate.php?action=delete"
				."&amp;id=".$row['rel_id']
				."\">Delete</a> ]";
		}

		echo "</li>";
	}
	echo "</ul>";
	echo "<hr>";
}

echo "<h2>New Relationships</h2>";

echo "<form method=post action=\"relate.php\">";

// Box 'o users
$users = array();
$result = safequery("select id, name from person where id != ".$user['id']." order by name");
while ($row=mysql_fetch_array($result)){
	$users[$row['id']] = $row['name'];
}

echo $user['name']. " is ";

echo "<select name=\"person_two\">\n";
foreach ($users as $id => $name){
	echo "\t<option value=\"".$id."\">".$name."</option>\n";
}
echo "</select>\n";

echo "'s ";

echo "<input type=\"text\" name=\"rel_onetwo\">";

echo " and they are ".$user['name']."'s <input type=\"text\" name=\"rel_twoone\">";
echo "&nbsp;&nbsp;<input type=\"submit\" class=\"button\" value=\"Submit\">";
echo "<br>(<i>For example, Aquarion is LoneCat's Boyfriend, and LoneCat is Aquarion's Girlfriend)</i>";
echo "</form>";

echo "<hr>";

/*echo "<h2>Groups</h2>";
echo "<p>";
$q = "select * from clique, cliquelink where "
	."clique.id = cliquelink.clique and cliquelink.user = ".$user['id'];
$r = safequery($q);
echo "<ul>\n";
while ($row = mysql_fetch_array($r)){
	echo "\t<li>".$row['position']." of ".$row['name']."</li>\n";
}
echo "</ul>\n";
echo "</p>";

html_form_start("member);
*/
build_footer("User Page");
?>
