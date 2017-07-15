<?PHP
/*
 *
 *
 *
 *
 *
 */
include("../include/library.php");
dbconnect();
$user = login("Aquarion");
build_header("View Log");
echo "<H1>Admin</H1>";


build_footer("View Log");