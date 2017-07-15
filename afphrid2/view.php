<?PHP
include("include/library.php");
dbconnect();
#$user = login("Any");

$PHP_SELF = $_SERVER['PHP_SELF'];

build_header("View Data");

echo "<h2>By Person</h2>";
$people = mysql_query("select id, name, homepage from person order by name");

$boxen = 0;
$boxenmatch = 2; // Columns per Table
echo "<table border=1 align=center>";
echo "<tr>";

while ($row = mysql_fetch_array($people)) {
	$name = ucwords($row['name']);
	echo "<td valign=\"top\" align=\"center\"><h1>";
	echo linkName($name);
	echo "</h1>";
	
	if (!empty($row['homepage'])) {
		echo "<p>[ <a href=\"{$row['homepage']}\">Website</a> ]</p>";
	}

	$query = "select *, relationship.id as rel_id, personOne.name as p1_name,"
		." personTwo.name as p2_name from relationship"
		." left join person as personOne on (personOne.id = relationship.person_one)"
		." left join person as personTwo on (personTwo.id = relationship.person_two)"
		." where (person_one = '".$row['id']."'"
		." or person_two = '".$row['id']."') and status = 2";
	$relate = safequery($query);

	while ($relrow = mysql_fetch_array($relate)) {
		if ($relrow['person_one'] == $row['id']) {
			echo linkName($relrow['p2_name'])."'s {$relrow['rel_onetwo']}<br>";
		} else {
			echo linkName($relrow['p1_name'])."'s {$relrow['rel_twoone']}<br>";
		}
			
	}
	echo "</td>";
	if ($boxen == $boxenmatch) {
		echo "</tr><tr>";
		$boxen = -1;
	}
	$boxen++;
}


while ($boxen <= $boxenmatch) {
	echo "<td>&nbsp;</td>";
	$boxen++;
}
echo "</tr>";
echo "</table> <!-- Ended table --><br>";

build_footer("View");
	?>
