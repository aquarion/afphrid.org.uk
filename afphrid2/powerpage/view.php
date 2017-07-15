<?PHP
include("../include/library.php");
dbconnect();
$user = login("Aquarion");
build_header("View Stuff");
echo "<H1>View Stuff</H1>";

if (!isset($_GET['view'])){

$me = $_SERVER['PHP_SELF'];

echo "<h1>View What?</h1>";
echo "People: "
	."[ <a href=\"$me?view=people&amp;type=new\">New</a> "
	."| <a href=\"$me?view=people&amp;type=all\">All</a> "
	."]<br>";

echo "Relationships: "
	."[ <a href=\"$me?view=rels&amp;type=unconfirmed\">Unconfirmed</a> "
	."| <a href=\"$me?view=rels&amp;type=dead\">Dead</a> "
	."| <a href=\"$me?view=rels&amp;type=confirmed\">Confirmed</a> "
	."| <a href=\"$me?view=rels&amp;type=all\">All</a> "
	."]<br>";
echo "Cliques: [ Summary | Members | Processing ]<br>";
echo "Log: [ <a href=\"view_log.php\">Transactions</a> ]";

} else {



switch ($_GET['view']){

case "people":

	switch ($_GET['type']){

	case "new":

		$q = "select id, name, email, homepage, "
			."date_format(registered,'%W, %M %D %Y %k:%i') AS nicedate, prefs "
			."from person order by registered desc limit 30";
		
		break; // End New

	default:

		$q = "select id, name, email, homepage, "
			."date_format(registered,'%W, %M %D %Y %k:%i') AS nicedate, prefs "
			."from person order by id asc";
		
		break; // End New
	}
	
	$r = safequery($q);

	echo "<table>\n";

	echo "<tr><th>ID</th><th>Name</th><th>E-Mail</th><th>Web</th><th>Joined</th></tr>\n";

	while ($row = mysql_fetch_array($r)){
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td><a href=\"view_log.php?where=user&equals="
			.$row['name']."\">".$row['name']."</a></td>";

		echo "<td><a href=\"mailto:".$row['email']."\">".$row['email']."</a></td>";
		echo "<td><a href=\"".$row['homepage']."\">".$row['homepage']."</a></td>";
		echo "<td>".$row['nicedate']."</td>";
		echo "</tr>\n";
	}

	echo "</table>\n";

	break; // End People

	case "rels":

	switch ($_GET['type']){
/*-----------+----------+------+-----+---------+----------------+
| Field      | Type     | Null | Key | Default | Extra          |
+------------+----------+------+-----+---------+----------------+
| id         | int(11)  |      | PRI | NULL    | auto_increment |
| person_one | int(11)  |      |     | 0       |                |
| person_two | int(11)  |      |     | 0       |                |
| rel_onetwo | tinytext |      |     |         |                |
| rel_twoone | tinytext |      |     |         |                |
| status     | int(11)  | YES  |     | NULL    |                |
+------------+----------+------+-----+---------+---------------*/

	case "confirmed":

		$q = "select relationship.id, p1.name as one, p2.name as two, rel_onetwo, "
			."rel_twoone from relationship, person as p1, person as p2 "
			."where (p1.id = relationship.person_one) and "
			."(p2.id = relationship.person_two) "
			."and status = 2;";
		
		break; // End New

	case "unconfirmed":

		$q = "select status, relationship.id, p1.name as one, p2.name as two,"
			." rel_onetwo, rel_twoone from relationship, person as p1,"
			." person as p2 where (p1.id = relationship.person_one) and "
			."(p2.id = relationship.person_two) "
			."and status = 1;";
		
		break; // End New

	case "dead":

		$q = "select status, relationship.id, p1.name as one, p2.name as two,"
			." rel_onetwo, rel_twoone from relationship, person as p1,"
			." person as p2 where (p1.id = relationship.person_one) and "
			."(p2.id = relationship.person_two) "
			."and status = 0;";
		
		break; // End New

	default:

		$q = "select status, relationship.id, p1.name as one, p2.name as two,"
			." rel_onetwo, rel_twoone from relationship, person as p1,"
			." person as p2 where (p1.id = relationship.person_one) and "
			."(p2.id = relationship.person_two) ";
			#."and status = 0;";
		
		break; // End New
	}	

	#die($q);
	$r = safequery($q);
	echo "<h2>Relationships where status is ".$_GET['type']."</h2>";
	echo "<table>\n";

	echo "<tr><th>ID</th><th>One</th><th>One->Two</th><th>Two</th>"
		."<th>Two-One</th><th>One</th><th>Status</th></tr>\n";

	while ($row = mysql_fetch_array($r)){
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['one']."</td>";
		echo "<td>".$row['rel_onetwo']."</td>";
		echo "<td>".$row['two']."</td>";
		echo "<td>".$row['rel_twoone']."</td>";
		echo "<td>".$row['one']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "</tr>\n";
	}

	echo "</table>\n";


	break; // End Relationships

}// end switch ($_GET['view'])


} // end (!isset($_GET['view'])



build_footer("View");
?>