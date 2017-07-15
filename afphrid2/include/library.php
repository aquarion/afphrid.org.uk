<?PHP
/*
		Afphrid 1.5


File:		library.php
Purpose:	Useful functions for afphrid
Dates:		C: 5/3/02		M: 5/4/02
Author:		Nicholas 'Aquarion' Avenell
Changes:

										*/
include("html.php"); // PHP functions to generate HTML.

function linkName($name){
        return "<a href=\"/viewme.php?id=".$name."\">".$name."</a>";
	}
	

function parseRSS($rss)
{

	$path = isset($url_parts["path"]) ? $url_parts["path"] : "/";

	$tag = "";
	$isItem = false;
	$isChannel = false;
	$i = 0;
	global $contents;

	$saxparser = xml_parser_create();
	if (!$saxparser) die("Could not create XML Parser.  You may not have the appropriate PHP extensions installed.  See <a href=\"http://www.php.net/xml\">http://www.php.net/xml</a> for more information.");
	xml_parser_set_option($saxparser, XML_OPTION_CASE_FOLDING, false);
	xml_set_element_handler($saxparser, 'sax_start', 'sax_end');
	xml_set_character_data_handler($saxparser, 'sax_data');

	function sax_start($parser, $name, $attribs)
	{
		global $tag, $isItem, $isChannel, $i;

		$tag = $name;

		switch ($name)
		{
			case "channel":
				$isChannel = true;
				$isItem = false;
				break;
			case "item":
				$i++;
				$isChannel = false;
				$isItem = true;
				break;
			default:
				break;
		}
	}

	function sax_end($parser, $name)
	{
	}

	function sax_data($parser, $data)
	{
		global $tag, $isItem, $isChannel, $contents, $i;
		if ($data != "\n")
		{
			if ($isChannel && !$isItem && strlen(trim($data)))
				(!isset($contents["channel"][$tag]) || !strlen($contents["channel"][$tag])) ?
					$contents["channel"][$tag] = addslashes($data) :
					$contents["channel"][$tag].= addslashes($data) ;
			elseif ($isItem && strlen(trim($data)))
				(!isset($contents[$i-1][$tag]) || !strlen($contents[$i-1][$tag])) ? 
					$contents[$i-1][$tag] = addslashes($data) :
					$contents[$i-1][$tag].= addslashes($data) ;
		}
	}

	$fp = @fopen($rss, "r");
	if ($fp)
	{
		while ($data = fread($fp, 4096))
		{
			$parsedOkay = xml_parse($saxparser, $data, feof($fp));

			if (!$parsedOkay && xml_get_error_code($saxparser) != XML_ERROR_NONE)
			{
				$error ="XML Error in File: ".xml_error_string(xml_get_error_code($saxparser))." at line ".xml_get_current_line_number($saxparser);
				$contents[0] = array(
						'title' => $error,
						'link' => "http://feeds.archive.org/validator/check?url=".urlencode($rss)
						);
			}
		}
	} else {

	}

	xml_parser_free($saxparser);
	fclose($fp);

	return $contents;
}


function build_header($title){
echo "<!doctype html public \"-//W3C//DTD HTML 4.0 Transitional//EN\">\n"
	 ."<html>\n"
	 ."<head>\n"
	 ."<title> [AFPHRID2] $title</title>\n"
	 ."<meta name=\"Generator\" content=\"Afphrid 2\">\n"
	 ."<meta http-equiv=\"content-type\""
	 ."content=\"text/html; charset=iso-8859-1\">\n"
	 ."<meta name=\"Author\" content=\"Nicholas 'Aquarion' Avenell\">\n"
	 ."<meta name=\"Keywords\" content=\"\">\n"
	 ."<meta name=\"Description\" content=\"\">\n"
	 ."<style type=\"text/css\">\n"
	 ."\t@import \"afphrid.css\";\n"
	 ."</style>\n"
	 ."</head>\n"

	 ."<body>\n"
	 ."<div id=\"header\">\n"
	 ."<img src=\"images/logo.gif\" width=\"298\" height=\"157\" border=0 alt=\"Afphrid2\">\n"
	 ."</div>\n"
	 ."<div class=\"menubar\">\n"
	 ."<table width=\"100%\" cellspacing=0 cellpadding=0 border=0>\n"
	 ."<tr>\n"
	 ."\t<td>". date("D j F Y, g:ia (T)") ."</td>\n"
	 ."\t<td align=\"right\">"
		." [ <a class=\"barlink\" href=\"user.php\">User Page</a>"
		." | <a class=\"barlink\" href=\"view.php\">View Stuff</a>"
		." | <a class=\"barlink\" href=\"index.php\">Front Page</a>"
		." | <a class=\"barlink\" href=\"http://www.aquarionics.com\">Aquarionics</a>"
		." ]</td>\n"
	 ."</tr>\n"
	 ."</table>\n"

	 ."</div>";

}

function build_footer($page_id){
	$filemod = filemtime($_SERVER['SCRIPT_FILENAME']); 
	$filemodtime = date("D j F Y, g:ia (T)", $filemod); 
	
	echo "<div class=\"menubar\">";
	echo "Updated " . $filemodtime
		#." by <A class=\"barlink\" HREF=\"mailto:afphrid@aquarionics.com\">"
		#."afphrid@aquarionics.com</A> "
		." | <a class=\"barlink\" href=\"bugreport.php?page=$page_id\">Bug Report</a>"
		." | <a class=\"barlink\" href=\"help.php\">Help</a>"
		." | <a class=\"barlink\" href=\"powerpage/view_log.php\">Transaction log</a> ]";
	echo "</div>";

	#echo "<pre>";
	#print_r($GLOBALS); 
	#echo "</pre>";
	echo "</body>\n</html>";

}


function dbconnect(){

	mysql_connect("localhost","aquarion","DBPASSWORD") 
			or die ("<h1>Problem connecting to MySQL</h1>");
	mysql_select_db("afphrid") or fuckup($PHP_AUTH_USER, $PHP_SELF, "MySQL", "All your database are belong to someone else.", mysql_error());
}


function safequery($query){
        $result = mysql_query($query)
        or sqlerror($query, mysql_error());
        return $result;
}

function logthis($user, $category, $log_simple, $log_detailed){
        $timestamp=date("YmdHis");
        $log_detailed = addslashes($log_detailed);
        $query = "insert into translog ";
        $query .="(user, category, log_simple, log_detailed, timestamp)";
        $query .=" values ";
        $query .="('$user', '$category', '$log_simple', '$log_detailed', '$timestamp')";
        mysql_query($query) or die($query . "<br>" .  mysql_error());
        }

function sqlerror($query,$error){
        panic("<B>Error</B><br>\nSomething strange and magical has happened, Aquarion has been notified.");
        logthis("mysql", "error", "mysql error", "<pre>$query</pre> <B>resulted in:</B><br> $error");
}

function panic($message) {
        echo "<div style=\"background-color: #CCFFCC\">\n";
        echo "<H2>PANIC!</H2>";
        echo "  $message\n";
        echo "</div></td>\n";
}


function cleanstring($string){
	$string = strip_tags($string);
	$string = addslashes($string);
	return $string;
}

function authenticate($realm)
{
	HEADER("WWW-Authenticate: Basic realm=\"$realm\"");
	HEADER("HTTP/1.0 401 Unauthorized");
	build_header("Invalid Password");
	echo "<h1>Invalid Password</h1>\n";
	echo "<p>Um, That doesn't seem to be 100% accurate. Please try again, or get an <a href=\"newuser.php\">account</a></p>\n";
	build_footer("Authentication");
	die();
}

// Authenticate User for this domain
function login($who) {

	// Has the user logged in?

	if (empty($_SERVER['PHP_AUTH_USER']))
	{
		authenticate("Afphrid");  // No? Log them in.
	}
	else // Yup.
	{
		if ($who == "Any"){
			$query  = "select * from person where ";
			$query .= "password = password('{$_SERVER['PHP_AUTH_PW']}') ";
			$query .= "and '{$_SERVER['PHP_AUTH_USER']}' IN (name)";
		} else {
			$query  = "select * from person where ";
			$query .= "password = password('{$_SERVER['PHP_AUTH_PW']}') ";
			$query .= "and '$who' IN (name)";			
		}

		$result = safequery($query);
		if (mysql_num_rows($result)==0) // Do the username & Password match?
		{
			authenticate("Afphrid User") ; // Nope? Panic!
		}

		return mysql_fetch_array($result);
	}
}

function sendmessage($to, $user, $subject, $message, $type){
// Types:
//	mom		message		(internal person-person message)
//	mor		relation	(relationship requested/confirmed/denied/deleted)
//	moc		cliques		(clique requests)
//	moca	cliqueacc	(clique accepts/denials)
//	mou		upgrade		(Afphrid Upgrade / Announcement)
//	mob		bugreport	(Mail on Bugreport)


if ($to == 0 && $type != "mou"){
	$to = mysql_fetch_array(safequery("select * from person where id = 1"));
} else {
	$to = mysql_fetch_array(safequery("select * from person where id = $to"));
}
$types = array(
	"mom" => "someone sends you a message",
	"mor" => "someone relates to you",
	"moc" => "something happens in your clique",
	"moca" => "you are accepted into a clique",
	"mou" => "afprhid is upgraded",
	"mob" => "someone files a bug"
);

// Status
//	0	Unread
//	1	Read
//	2	Filed

#insert into message (msgto, msgfrom, subject, content, datesent, status)
#values (1, 41, "This is a test", "This is really a test", NOW(), 0);

if (strstr($to['prefs'], "-".$type."-")){
	$content = "Heya, This is Aquarion's Afphrid2 system. Someone has sent "
		."a message I thought you should be aware of (okay, it's because you"
		." asked to be notified when ".$types[$type].". Here is the message:\n"
		."\n"
		.stripslashes($message)."\n\n"
		."You can deal with this now by going to <http://www.afphrid.org.uk>/"
		."where you can also request to stop getting these messages :-) \n"
		."\n\tYours in total sincerity,\n\n\t\tAfphrid"
		."\n\t\tPP. Aquarion De'Blue\n\n-- \nAre you afphrid of the database?\n"
		."http://www.afphrid.org.uk";

	$content = wordwrap($content);

	mail($to['email'], "[AFPHRID] ".$subject, $content,
		"From: site@afphrid.org.uk\r\nX-Mailer: Afphrid/v2");

	#echo "<pre>$content\n\nSent</pre>";

	logthis($to['name'], "Message", "Sent a message & email about \"".$subject."\"", $content);
} elseif ($type = "email"){
	$content = "Heya, This is Aquarion's Afphrid2 system sending you an email.\n"
		.stripslashes($message)."\n\n"
		."Message Ends.\n\n\tYours in total sincerity,\n\n\t\tAfphrid"
		."\n\t\tPP. Aquarion De'Blue\n\n-- \nAre you afphrid of the database?\n"
		."http://www.afphrid.org.uk/";

	$content = wordwrap(strip_tags($content));

	mail($to['email'], "[AFPHRID] ".$subject, $content,
		"From: afphrid@aquarionics.com\r\nX-Mailer: Afphrid/v2");

	#echo "<pre>$content\n\nSent</pre>";

	logthis($to['name'], "Message", "Sent a message & email about \"".$subject."\"", $content);
} else {
	logthis($to['name'], "Message", "Sent a message about \"".$subject."\"", $message);
}

$q = "insert into message "
	."(msgto, msgfrom, subject, content, datesent, status, type)"
	." values "
	."(".$to['id'].", ".$user.", \"".$subject
		."\", \"".strip_tags(wordwrap($message))."\", NOW(), 0, \"".$type."\")";

safequery($q);

}

?>
