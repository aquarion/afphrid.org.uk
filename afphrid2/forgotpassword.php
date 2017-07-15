<?PHP
//////////////////////////////////////////////////////////
// Title:		Mailpassword
// Project:		
// Description:	
//
// Authour:		Nicholas Avenell
// Date:		
//	04/10/01:
//		+ Changelog
//		+ error management system implimented

function generatepassword() {
/*  
 * Pronounceable password generator 
 * version 1.0beta 
 * Inspired by a question made by: georgcantor_at_geocities.com 
 * in the PHPBuilder discussion forum 
 * (c) Jesus M. Castagnetto, 1999 
 * Modified by Aquarion
 * GPL'd code, see www.fsf.org for more info 
 */  

$words =  "words";     /* the file w/ the words */  
$cut_off = 5;     /* minimum number of letters in each word */  
$min_pass = 2;     /* minimum number of words in password */  
$max_pass = 2;     /* maximum number of words in password */  

/* read the external file into an array */  
$fp = fopen($words, "r"); 

if (!fp) { 
    fuckup($PHP_AUTH_USER, $PHP_SELF, "Word Generator", "Could not open word generator file", "Couldn't open $words");
    exit; 
} else { 
    /* assuming words of up to 127 characters */  
    while(!feof($fp)) { 
        $tword = trim(fgets($fp,128)); 
      
        /* check for minimum length and for exclusion of numbers */  
        if ((strlen($tword) >= $cut_off) && !ereg( "[0-9]",$tword)) { 
            $word[] = strtolower($tword); 
        } 
    } 
    fclose($fp); 
} 

/* generate the password */  

$size_word = count($word); 
srand((double)microtime()*1000000); 
$n_words = rand($min_pass,$max_pass); 

/* use the Mersenne Twister for a better random */  
#mt_srand((double)microtime()*1000000);  
#$n_words = mt_rand($min_pass,$max_pass);  

$seperators = array ("!","*","|","_","+","-","^","%","#","$","£") ;
$seperator = array_rand($seperators);


for ($i=0; $i < $n_words; $i++) { 
    $pass .= $word[rand(0,($size_word - 1))] .  $seperators[$seperator]; 
} 

/* print the password */  
return substr($pass,0,-1);


}

include("include/library.php");
dbconnect();
#$user = login("Any");

$PHP_SELF = $_SERVER['PHP_SELF'];

build_header("Reset Password");

if (!isset($_POST['id'])){
	die("No ID Specified");
};

$r = safequery("select * from person where id = ".$_POST['id']);
if (mysql_num_rows($r) == 0){
	die("That ID Doesn't exist");
};
$user = mysql_fetch_array($r);

echo "<h1>Forgotten Password for ".$user['name']."</h1>";

$newpassword = generatepassword();
safequery("update person set password = password('$newpassword') where id = '{$user['id']}'");

$message = "Hello {$user['name']}, This is Aquarion's Afphrid system, emailing\n"
	."you to tell of your New! Improved! password.\n"
	."Okay, Due to the way the system works, I can't actually find out what \n"
	."your password is, so I've set it to something new.\n"
	."The new password is:\n\n\t$newpassword\n\n I recomend "
	."you go to the site <http://www.afphrid.org.uk>\n and change "
	."it.";

sendmessage($user['id'], 0, "Recovered Password", $message, "email");

  
echo "<h1>New Password sent to {$user['email']}</h1>";
echo "<p>If this is unhelpful, talk to <a href=\"mailto:nicholas@aquarionics.com\">nicholas@aquarionics.com</a>";



build_footer("Lost Password");
?>