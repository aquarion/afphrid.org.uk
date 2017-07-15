<?PHP
//////////////////////////////////////////////////////////
// Title:		Afphrid
// Project:		
// Description:	
//
// Authour:		Nicholas Avenell
// Date:		

include("include/library.php");
dbconnect();
build_header("Statistics");
echo "<h1>Statistics</h1>";
echo "<i>Anyone using the Afphrid Stats page as a score sheet will find themselves irrevocable members of the group \"Fuckwits\"</i>";

function make_top10($query, $title) {
	$result = mysql_query($query);
	print "<h2>$title</h2>\n<ol>\n";
	while ($row = mysql_fetch_array($result)) {
		$row['name'] = linkName($row['name']);
		print "\t<li>{$row['name']} ({$row['the_count']})</li>";
	}
	print "</ol>";
}

#Top 10 for Number of Relationships
$query = "select name, count(*) as the_count ";
$query .="from person, relationship where ";
$query .="(person.id = relationship.person_one or person.id = relationship.person_two)";
$query .="and status = '2' group by name order by the_count desc limit 10";
make_top10($query,"Top 10 for Number of Relationships");
/*
#Top 10 Clubs
$query = "select clique as name, id, count(*) as the_count ";
$query .="from cliquelink group by clique order by the_count desc limit 10";
make_top10($query,"Top 10 Clubs");


#Top 10 Joiners of Clubs
$query = "select name, id, count(*) as the_count from cliquelink group by ";
$query .="name order by the_count desc limit 10";
make_top10($query,"Top 10 Joiners of Clubs");
*/

build_footer("Statistics");
?>
