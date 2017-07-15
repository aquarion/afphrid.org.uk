<?PHP
include("include/library.php");
dbconnect();

$alt = strtr($_GET['id'], "_", " "); 

$q = "select * from person where name = \""
	.$_GET['id']."\" or name = \"".$alt."\"";

$r = safequery($q);
if (mysql_num_rows($r) == 0){
	build_header("Unknown User");
	echo "<h1>User Not Found</h1>";
	build_footer("User View");
	die();
} else {
	$user = mysql_fetch_array($r);
}
$PHP_SELF = $_SERVER['PHP_SELF'];

build_header($user['name']."'s relations");


echo "<h1>".$user['name']."'s AFPRelations</h1>";

echo "<i>Member since ".$user['registered']."</i>\n";


$query = "select *, relationship.id as rel_id, personOne.name as p1_name,"
	." personTwo.name as p2_name from relationship"
	." left join person as personOne on (personOne.id = relationship.person_one)"
	." left join person as personTwo on (personTwo.id = relationship.person_two)"
	." where (person_one = '".$user['id']."'"
	." or person_two = '".$user['id']."')"
	." and status = 2";
$result = safequery($query);

if (mysql_num_rows($result) != 0 ){

	echo "<h2>Relationships</h2>";

	echo "<ul>\n";

	while ($row=mysql_fetch_array($result)){
		echo "\t<li>";
		if ($row['p1_name'] == $user['name']){
			echo "<a href=\"viewme.php?id=".$row['p2_name']."\">".$row['p2_name']."'s</a> ".$row['rel_onetwo'];
		} else {
			echo "<a href=\"viewme.php?id=".$row['p1_name']."\">".$row['p1_name']."'s</a> ".$row['rel_twoone'];
		}
		#echo $row['p1_name']." is ".$row['p2_name']."'s ".$row['rel_onetwo']
		#	.", and ".$row['p2_name']." is ".$row['p1_name']."'s ".$row['rel_twoone'];

		echo "</li>\n";
	}
	echo "</ul>";
}


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
build_footer("User View");
?>
