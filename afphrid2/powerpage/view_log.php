<?PHP
// Variables:

if (isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
} else {
	$id = false;
}

if (isset($_REQUEST['where'])){
	$where = $_REQUEST['where'];
} else {
	$where = false;
}

if (isset($_REQUEST['equals'])){
	$equals = $_REQUEST['equals'];
} else {
	$equals = false;
}

$PHP_SELF = $_SERVER['PHP_SELF'];

$requeststring = "";


if (empty($step)){
        $step = 40; // Default limits for how many records displayed at once.
}
if (empty($from)){
        $from = 0; // Start at zero if no better offer
};
$to = $from + $step;



include("../include/library.php");
dbconnect();
$user = login("Aquarion");
build_header("View Log");
echo "<H1>Transaction Log</H1>";


#Transaction Display
if ($id){
        echo "<H2>Details for transaction $id</H2>";
        $query = "select *, date_format(timestamp,'%Y-%m-%d/%T') AS nicedate from translog where id = '$id'";
} else {
        echo "<H2>Details for latest transaction</H2>";
        $query = "select *, date_format(timestamp,'%Y-%m-%d/%T') AS nicedate from translog order by id desc limit 1";	
}
$result = safequery($query);
$trans = mysql_fetch_array($result);
echo "<table>\n";
echo "<tr><th>Date:</th><td style=\"text-align: left\">" . $trans['nicedate'] . "</td></tr>\n";
echo "<tr><th>User:</th><td style=\"text-align: left\">" . $trans['user'] . "</td></tr>\n";
echo "<tr><th>Action:</th><td style=\"text-align: left\">" . $trans['log_simple'] . "</td></tr>\n";
echo "<tr><th>Details:</th><td style=\"text-align: left\">" . $trans['log_detailed'] . "</td></tr>\n";
echo "</table>\n";

#End Transaction Display

$query = "select *, date_format(timestamp,'%Y-%m-%d/%T') AS nicedate from translog";
if ($where && $equals) {
        $query .=" where ". $where ." = '". $equals ."'";
        $requeststring.="&amp;where=$where&amp;equals=$equals";
}
$query .=" order by timestamp desc";

$result = safequery($query . " limit $from, $to");
echo "<table>";
echo "<tr><th>Trans. ID</th><th>Date &amp; Time</th><th>Login</th><th>Transaction</th><th></th></tr>";
while($row = mysql_fetch_array($result)){
        echo "<tr><td>";
        echo $row['id']
                . "</td><td>"
                . $row['nicedate']
                . "</td><td><a href=\"$PHP_SELF?where=user&amp;equals="
                . $row['user']
                . "\">"
                . $row['user']
                . "</a></td><td>"
                . $row['log_simple']
                . "</td><td class=\"extra\">&nbsp;";
        if (!empty($row['log_detailed'])){
                echo "[<A HREF=\"?id=".$row['id']."&amp;step=$step"
                        ."&amp;from=$from$requeststring\">View Details</A>]";
        }
        echo "</td></tr>";
}

echo "</table>";

echo "[<A HREF=\"$PHP_SELF\">Reset filters</A>]&nbsp;";

/*
        Building next and previous buttons
 */
$records = mysql_num_rows(safequery($query));
$prevfrom = $from - $step;
$prevto = $from;

if ($from > 0) { // If there are results behind us...
        echo "[<A HREF=\"$PHP_SELF?from=$prevfrom&amp;to=$prevto$requeststring&step=$step\">Back $step</A>]&nbsp;";
}

$nextfrom = $to;
$nextto = $to + $step;
if ($nextfrom < $records){ // There may be records ahead...
        if ($nextto > $records) {
                $set = $records - $to;
        } else {
                $set = $step;
        }
        echo "[<A HREF=\"$PHP_SELF?from=$nextfrom&amp;to=$nextto$requeststring&step=$step\">Next $set</A>]";
}
echo "<br>\n" // Options for setting the Step limit
        ."Blocks of <A HREF=\"$PHP_SELF?step=20$requeststring\">20</A> "
        ."<A HREF=\"$PHP_SELF?step=50$requeststring\">50</A> "
        ."<A HREF=\"$PHP_SELF?step=100$requeststring\">100</A> "
        ."<A HREF=\"$PHP_SELF?step=200$requeststring\">200</A> "
        ."<A HREF=\"$PHP_SELF?step=500$requeststring\">500</A> "
        ."<A HREF=\"$PHP_SELF?step=1000$requeststring\">1000</A> ";
        #."<A HREF=\"$PHP_SELF?step=10000$requeststring\">10000</A> " // *ahem* 10000 is a little far.

build_footer("View Log");
?>