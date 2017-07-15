<?PHP
/*
 *	New Relationship 
 *
 *
 *
 *
 */

function confirm($id){
	global $user;
	$q = "select * from relationship, person as p1, person as p2 where "
		."relationship.id = $id and p1.id = person_one and p2.id = person_two";
	$r = safequery($q);
	$rel = mysql_fetch_array($r);

	if (mysql_num_rows($r) == 0){
		echo "<h2>No</h2>\n<p>This relationship does not exist";
	} elseif ($rel['person_two'] != $user['id']){
		echo "<h2>No</h2>\n<p>Confirming this relationship has nothing to do with you.";
		echo $rel['person_two'] ." != ". $user['id'];
	} else {
		$q = "update relationship set status = 2 where id = $id";
		safequery($q);
		echo "<p>Confirmed this relationship.";

		$subject = $user['name']." confirmed your relationship";
		$msg = $user['name']." confirmed your relationship, you are now "
			.$user['name']."'s ".$rel['rel_twoone']." and you are their "
			.$rel['rel_onetwo'].".\nHave a nice day :-)";

		sendmessage($rel['person_one'], 0, $subject, $msg, "mor");

		logthis($user['name'], "Relationship", $user['name'] . " Confirmed rel id ". $id, $q);
	}
	
}

function deny($id){
	global $user;
	$q = "select * from relationship, person as p1, person as p2 where "
		."relationship.id = $id and p1.id = person_one and p2.id = person_two";
	$r = safequery($q);
	$rel = mysql_fetch_array($r);

	if (mysql_num_rows($r) == 0){
		echo "<h2>No</h2>\n<p>This relationship does not exist";
	} elseif ($rel['person_two'] != $user['id']){
		echo "<h2>No</h2>\n<p>Denying this relationship has nothing to do with you.";
		echo $rel['person_two'] ." != ". $user['id'];
	} else {
		$q = "update relationship set status = 0 where id = $id";
		safequery($q);
		echo "<p>Denied this relationship.";
		$subject = $user['name']." denied your relationship";
		$msg = $user['name']." denied your relationship, as "
		.$rel['rel_twoone']." and ".$rel['rel_onetwo']
		.".\nSorry :-|";

		sendmessage($rel['person_one'], 0, $subject, $msg, "mor");
		logthis($user['name'], "Relationship", $user['name'] . " Denied rel id ". $id, $q);
	}
	
}

function validate_exists($var, $label){
	$message = "";
	$var = rtrim($var);
	if (empty($var)){
		$message .= "\t<li>$label is required</li>";
	}
	return $message;
	
}

function validate_user($id){
	$message = "";
	if (empty($id)){
		$message .= "\t<li>No User ID? Something strange and magical has happened</li>";
	}
	return $message;
	
}

function validate_relationship($two, $one){
	$message = "";
	if (empty($two)){
		$message .= "\t<li>No Second Party? Something strange and magical has happened</li>";
	} elseif ($two == $one){
		$message .= "\t<li>You can't relate to yourself, it makes you go blind.</li>";
	} elseif ($two == 0){
		$message .= "\t<li>Afphrid is a psudouser, you can't relate to it.</li>";
	} elseif ($two == 8){
		$message .= "\t<li>I'm sorry, but <a href=\"http://www.aquarionics.com/index.php?id=438\">no</a></li>";
	} else{
		$q = "select id from relationship where (person_one = $one and "
			."person_two = $two) or (person_two = $one and person_one = $two)";
		$r = mysql_num_rows(safequery($q));

		if ($r != 0){
			echo "\t<li>Er, not to cast judgement on your lifestyle, you "
				."understand, but you are already related to this person "
				."at least once. This isn't going to stop it going in the "
				."database, but just to make sure you're aware :-)</li>";
		}
	}
	return $message;
}

function showform($defaults){
html_form_start("newrelationship", $_SERVER['PHP_SELF']);

// Note: It would be a terribly good idea to validate user names
// before touching this function with a barge pole.


#$defaults = array(person_one, person_two, rel_onetwo, rel_twoone)

// Box 'o users
$users = array();
$result = safequery("select id, name from person order by name");
while ($row=mysql_fetch_array($result)){
	$users[$row['id']] = $row['name'];
}

// Hidden, Yet labeled. Thus LessHidden :-)
html_lesshidden("name", "First Party:", $defaults[0], $users[$defaults[0]]);

echo "<br>";

// As much as I hate specific solutions, 
// A bespoke function to display a drop-box of users.
echo "<LABEL for=\"person_two\"><div class=\"label\">Second Party:</div>";
	echo "&nbsp;<select name=\"person_two\">\n";
	foreach ($users as $id => $name){
		if ($id == $defaults[1]){
			$selected = " selected";
		} else {
			$selected = "";
		}
		echo "\t<option value=\"".$id."\"".$selected.">".$name."</option>\n";
	}
	echo "</select>\n";
echo "</LABEL><br>";

html_textbox("rel_onetwo", "Relationship of 1 to 2:", "225", $defaults[2]);
echo "<br>";

html_textbox("rel_twoone", "Relationship of 2 to 1:", "225", $defaults[3]);
echo "<br>";

$buttons = array(
	#array (Label, Name, Button type)
	array ('Resubmit', 'resubmit', 'submit'),
	array ('Reset Form', 'reset', 'reset')
);

html_buttons($buttons);

echo "<p>ie, ";
echo $users[$defaults[0]]." is ".$users[$defaults[1]]."'s ".$defaults[2]
	." and ".$users[$defaults[1]]." is ".$users[$defaults[0]]."'s "
	.$defaults[3]."</p>";


html_form_close();
} // End Showform



include("include/library.php");
dbconnect();
$user = login("Any");
include("include/userfuncs.php");
build_header("New Relationship");

echo "<H1>New Relationship</H1>";

if (isset($_GET['action'])){
	#echo "Action detected";
	switch ($_GET['action']){
	
	case "confirm":
	if (isset($_GET['id'])){
		#echo "Confirm detected";
		confirm($_GET['id']);
	} else {
		echo "<h2>Confirm</h2>";
		echo "<p>No ID Specified. Sod off</p>";
	}
	break;
	// break

	case "deny":
	if (isset($_GET['id'])){
		#echo "Confirm detected";
		deny($_GET['id']);
	} else {
		echo "<h2>Deny</h2>";
		echo "<p>No ID Specified. Sod off</p>";
	}
	break;
	// break

	}
} else {

$defaults = array($user['id'], $_POST['person_two'], $_POST['rel_onetwo'], $_POST['rel_twoone']);

echo "<ul>\n";

$validate =  validate_user($user['id']);
$validate .= validate_relationship($_POST['person_two'], $user['id']);
$validate .= validate_exists($_POST['rel_onetwo'], "Relationship part one");
$validate .= validate_exists($_POST['rel_twoone'], "Relationship part two");

echo $validate."</ul>\n\n";

if ($validate == ""){
	if (isset($_POST['confirm'])){
		$q = "insert into relationship "
			."(person_one, person_two, rel_onetwo, rel_twoone, status) values "
			."(".$defaults[0].", ".$defaults[1].", \"".$defaults[2]."\", \"".$defaults[3]."\", 1)";

		$subject = $user['name']." has requested a relationship";
		$msg = $user['name']." has requested a relationship where they are"
			." your ".$defaults[3]. " and you are their ".$defaults[2]
			.". Please go to your user page and confirm or deny this.";

		sendmessage($defaults[1], 0, $subject, $msg, "mor");

		logthis($user['name'], "Relationship", $user['name'] . " related to id ". $defaults[1], $q);
		
		safequery($q);

		html_heading("Confirmed", "2", "");

		echo "<p>Congratulations, that appears to have gone off without a hitch.</p>";

		html_heading("What happens now?", "3", "");

		echo "<p>The relationship is in the Database as \"Unconfirmed\", which "
			."basically means that I'm waiting for the other side to admit to it."
			//."<br>If they asked me too, I will have sent an email to them "
			//."asking to come to the site and confirm it. Most people have opted" // Commented out until the messaging system is in.
			//." for this."
			." When they do, they can just click \"Confirm\" on their"
			." user page, and it'll start being included in the main views. ";
		
	} else {
		echo "<p>No serious problems found, which is cool. You can now confirm "
			."the relationship (click Confirm) or you have one last chance to "
			."fix any spelling errors or anything in the box far below.</p>";

		html_heading("Confirm:", "3", "");
		html_form_start("newrelationship", $_SERVER['PHP_SELF']);
		$users = array();
		$result = safequery("select id, name from person where id = "
			.$defaults[1]." or id = ".$defaults[0]." order by name");

		while ($row=mysql_fetch_array($result)){
			$users[$row['id']] = $row['name'];
		}
		echo $users[$defaults[0]]." is ".$users[$defaults[1]]."'s ".$defaults[2]
			." and ".$users[$defaults[1]]." is ".$users[$defaults[0]]."'s "
			.$defaults[3]."</p>";
		
		html_hidden("person_two", $defaults[1]);
		html_hidden("rel_onetwo", $defaults[2]);
		html_hidden("rel_twoone", $defaults[3]);

		$buttons = array(
		#array (Label, Name, Button type)
		array ('Confirm', 'confirm', 'submit')
		);

		html_buttons($buttons);

		html_form_close();

		html_heading("Correct:", "3", "");
		showform($defaults);
	}
} else {
	html_heading("Please correct:", "3", "");
	showform($defaults);
}

}
build_footer("New Relationship");