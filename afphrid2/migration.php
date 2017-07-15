<?PHP
header("content-type: text/plain");
/*
mysql> describe cliquelink;
+----------+----------+------+-----+---------+----------------+
| Field    | Type     | Null | Key | Default | Extra          |
+----------+----------+------+-----+---------+----------------+
| id       | int(11)  |      | PRI | NULL    | auto_increment |
| name     | tinytext |      |     |         |                |
| clique   | tinytext |      |     |         |                |
| position | tinytext |      |     |         |                |
+----------+----------+------+-----+---------+----------------+
4 rows in set (0.00 sec)

mysql> describe clique;
+-------------+--------------+------+-----+---------+----------------+
| Field       | Type         | Null | Key | Default | Extra          |
+-------------+--------------+------+-----+---------+----------------+
| id          | int(11)      |      | PRI | NULL    | auto_increment |
| name        | varchar(255) |      |     |         |                |
| owner       | tinytext     | YES  |     | NULL    |                |
| status      | int(11)      |      |     | 0       |                |
| description | tinytext     |      |     |         |                |
+-------------+--------------+------+-----+---------+----------------+
5 rows in set (0.04 sec)

*/

?>
drop table cliquelink;

CREATE TABLE cliquelink (
  id int(11) NOT NULL auto_increment,
  user int NOT NULL,
  clique int NOT NULL,
  position tinytext NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;

<?PHP
include("include/library.php");
dbconnect();

$q = "select person.id as cl_person, clique.id as cl_clique,"
	." person.name as username, clique.name as cliquename, position"
	." from cliquelink, person, clique"
	." where (person.name = cliquelink.name)"
	." and (clique.name = cliquelink.clique) order by person.id";

$r = safequery($q);

while ($row = mysql_fetch_array($r)){
	#echo "# ".$row['username']." is ".$row['position']." of ".$row['cliquename']."\n";
	echo "insert into cliquelink (user, clique, position) values ("
		.$row['cl_person'].", ".$row['cl_clique'].", \"".addslashes($row['position'])."\");\n";
}
?>