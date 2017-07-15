<?PHP
/*
		Afphrid 1.5


File:		faq.php
Purpose:	FAQ
Dates:		C: 5/3/02		M: 2002-06-09
Author:		Nicholas 'Aquarion' Avenell
Changes:

										*/
include("include/library.php"); // Useful Functions

build_header("Help - Quick Guide");

dbconnect();

include("include/help.html")
?>
<h1>Quick Guide</h1>
How To Use AFPHRID, the 
Alt Fan Pratchett Heroic Relational/Impossible Database.

<dl>

<dt>One: On the getting of accounts.</dt>

	<dd>In order to use AFPRHID, you will need an account.<br>
	Go to the afphrid page, and select "New User"<br>
	Fill in the form of forminess, and Get Thyself An Account.<br>

<dt>Two: On The Logging In Of Accounts.</dt>

	<dd>From the Front Page, click "User Page"<br>
	When the nice box appears asking for your Username and 	
	Password, Give it to the nice box.</dd>

<dt>Three: On The Creation Of Relationships</dt>

	<dd>From the User Page, scroll to "New Relationship"<br>
	Fill in this form with Information<br>
	Click "Add Relationship"</dd>

<dt>Four: On The Admitting To Relationships</dt>

	<dd>In order for a relationship to be active, both
	sides must admit to it. The person you attempt to relate
	to will - if he/she asked for it - get an email requiring
	they confirm the relationship. To do this, you go to the
	user page as described above, and in your Relationships 
	section you have the option of "Accept | Deny" beside a 
	person, and relationship, name. Click one.<br>

	Congratulations, that's how to use it.</dd>
</dl>

<?PHP
build_footer("Front Page");
?>