<?PHP
//////////////////////////////////////////////////////////
// Title:		Notes Page
// Project:		AFPhrid (Alt.fan.pratchett heroic relational & impossible database)
// Description:	
//
// Authour:		Nicholas Avenell
// Date:		

include("include/library.php"); // Useful Functions

build_header("What's New?");
?>
<h1>What's New?</h1>
<p>Everything. No single page of Afphrid hasn't been at least heavily, and in most cases totally, rewritten. Most of it works the same way it did before, only with less bugs :-)</p>

<h2>People</h2>
<p>
The preference system has been expanded to allow for a more detailed selection of what gets emailed to you, the person table is now restrucured to give you the ability to change your username. 
</p>

<h2>Relationships</h2>
<p>The interface for putting in and confirming new relations has been streamlined (Hey look, Buzzwords).</p>

<h2>The Database</h2>
<p>The entire sql backend has been restructured never to ever use Usernames as keys ever again. That's the bit that took the time.</p>

<h2>The Future</h2>
<h3>Stage One</h3>
<p style="text-decoration: line-through"><h3>Stage One</h3>
Addition, Modification, Display and Deletion of relationships.<br>
Addition, Modification, Display and Deletion of users.</p> Completed 2002-05-31

<p><h3>Stage Two</h3>
Cliques, Messages, Detailed views, stats.</p>

<p><h3>Stage Three</h3>
Modify Database to enable the understanding of relationships. Be afraid.</p>

<h2>Changelog</h2>
<pre>
2002-05-31:
	+ Launched the new version of Afphrid
	* Modified the "validate homepage" rule to actually work :)
	+ added "user@domain" check to validate_email
	+ added ability to deny relationship links.
	+ added admin view functions for people and relationships

2002-06-01:
	+ Messaging System. Small sentance, much incident.

2002-06-03
	* Fixed confirmation of relationships
	+ Password Recovery
	+ Message replying
	+ Fixed display of system messages. 

2002-06-03:
	+ Deletion of relationships
	+ Migration of Cliques to new format. Interface soon.

</pre>
<h2>Todo</h2>
<p>Key: Completed items are in <span class="completed">Gray</span> and have a 
completion date beside them in SQL (Year-Month-Day) format, and items that have 
to be completed before the first stage reopening are in <b>bold</b></p>

<UL>
	<LI>User Administration
		<UL>
			<LI class="completed">Add new users  2002-05-06</li>
			<LI class="completed"><b>Modify existing users</b>  2002-05-07</li>
			<LI class="completed">Delete existing users [ Form | Validation | SQL ]
			<li class="completed">Requesting of new password 2002-06-02
			<li>User Page [ <span class="completed">User Info 2002-05-07 | <b>Relationships 2002-05-31 </b></span> | Cliques | Messages ] 
		</UL>
	<LI>Clique Administration
		<ul>
			<li>Add new cliques [ Form | Validation | SQL ]
			<li>Modify Clique details [ Form | Validation | SQL ]
			<li>Remove cliques [ Form | Validation | SQL ]
			<li>Add people to cliques [ Form | Validation | SQL ]
			<li>Remove people from cliques [ Form | Validation | SQL ]
			<li>Modify positions within cliques [ Form | Validation | SQL ]
			<li>Clique moderation [ Form | Validation | SQL ]
		</ul>

	<li>Relationship Admin
		<ul>
			<li><b class="completed">Add new relationship 2002-05-31</b>
			<li><b class="completed">Confirm new relationship 2002-05-31 </b>
			<li class="completed">Unconfirm new relationship 2002-05-31
			<li class="completed">Delete confirmed relationship 2002-06-03
			<li>Modify relationship [ Form | Validation | SQL ]
			<li>Confirm modify relationship [ Form | Validation | SQL ]
		</ul>

	<li>Messaging
		<ul>
			<li class="completed">Generic Messaging Thingy 2002-06-01
			<li>Messaging to all clique owners (Admin) [ Form | Validation | SQL ]
			<li class="completed">Messaging to Everyone (Admin) 2002-06-09
			<li>Messaging to all within a clique [ Form | Validation | SQL ]
			<li class="completed">Emailing messages 2002-06-01
			<li class="completed">Message Levels 2002-05-28
			<li>Inviting people to cliques
			<li>Invite User
		</ul>

	<li>Backstage
		<ul>
			<li class="completed"><b>Front page</b> 2002-05-29
			<li class="completed">Stats 2002-06-09
			<li class="completed">Aquarion's Page of God Like Power  2002-06-03
			<li class="completed"><b>Bug Report tool</b> 2002-05-25
			<li class="completed">New Neatocool Design 2002-05-07
			<li class="completed">Transaction Logging 2002-05-06
			<li class="completed"><b>Data Migration</b> 2002-05-31</li>
			

		</ul>

	<li>View Database
		<ul>
			<li>Overview
			<li class="completed"><b>View per user</b> (1 page) 2002-05-31
			<li>View per user (page per user)
			<li>View by group
		</ul>

	<li>New Database Structure (Stage 3)
		<ul>
			<li>Design</li>
			<li>Generate Relationships</li>
			<li>Migrate Data</li>
			<li>Modify New Relationship Code</li>
		</ul>
</UL>

</p>
<?PHP

build_footer("What's New?") ?>