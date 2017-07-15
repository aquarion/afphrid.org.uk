<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> Afpmap submitted </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
</HEAD>

<BODY>
<?PHP

$mailto = "aquarion@aquarionics.com";

$message = print_r($_POST,true);

$headers = 'From: webmaster@' . $_SERVER['SERVER_NAME'] . "\r\n" .
   'Reply-To: webmaster@' . $_SERVER['SERVER_NAME'] . "\r\n" .
   'X-Mailer: PHP/' . phpversion();


mail($mailto, "AFPer Map", $message, $headers);

header("location: http://freespace.virgin.net/b.wakeling/DW/thanks.html");

?>
