<?PHP
//////////////////////////////////////////////////////////
// Title:		Notes Page
// Project:		AFPhrid (Alt.fan.pratchett heroic relational & impossible database)
// Description:	
//
// Authour:		Nicholas Avenell
// Date:		

include("include/library.php"); // Useful Functions

build_header("Notes on the system");

?>
<h1>Help and Notes</h1>
<h1>Relationships</h1>
<blockquote>
	<p>Every relationship consits of five bits of data. The two parties involved, the relationships between the parties (No, there is no singuler there. One person is another's AFPBrother, so the other person is an AFPSister. They have to be differant) and a Status. The Status is either 1, Unconfirmed or 2, Confirmed.</p>
	<h2>Confirmations</h2>
	<p>To be listed on the main page, and in the reports and all associated fun and games, you must be a <i>confirmed</i> relationship. This simply means that the side that didn't attempt to start the relationship has to click a little button on his or her User Page (Next to the relationship) that says "yes". Or "No". Depending. This stops people claiming relationships that don't exist.</p>
	
</blockquote>

<h1>Groups/Cliques</h1>
<blockquote>
	<p>Cliques (AKA Groups) are relationships with more than one person in them. Anybody can create them, and if they are marked "Open", then anybody can join them too. If they arn't set as Open, each new member must be moderated by the club's creator.</p>
	<h2>Moderation for Members</h2>
	<p>When you apply to join a group, a message and, preferance depending, an email will be sent to the moderator for that group.  You just have to wait until they decide to either let you in or not.</p>
	<h2>Moderation for Moderators</h2>
	<p>For every person who applys to be part of your clique you will get a  a message and, preferance depending, an email. The message will give you two links, one for confirming the membership, one for denying it with a prompt for a reason, which will be sent to the prospective member.</p>
	</blockquote>

<h1>User Information</h1>
<blockquote>
	<p>Email addresses are used to send out forgotten passwords. They are never displayed on screen as full valid email addresses (At the very least, they will be formatted as "user-at-domain-dot-tld"). We will not sell your addresses to spammers. I do not need to lose friends that badly.</p>
	<p>New passwords are generated by the system and sent to the address you registered with. </p>
	<p><i>Aquarion, Nor any person who is working on any part of the system at any time, cannot get at your password. Your password is MD5 encrypted. We *cannot* decrypt it, and would not even if we could. We work out authentication by encrypting your answer and comparing it with the database. We can't know what your password is. Kay?</i>
	</p>
</blockquote>

<h1>What we can get for you.</h1>
<blockquote>
	We can undelete the following:<br>
	<ul>
	<li>Relationships
	<li>Relationships
	</ul>
	That's it :-)<br>
	Messages deleted are lost forever, as are clique memberships and users (see next question). They are gone when you say so. if you delete a relationship by accident, send Aquarion a message and he will get back to you with more information.
</blockquote>

<h1>How do I leave the database?</h1>
<blockquote>
	You can't.<br>
	Well, we don't want you to. There *is* a way, which severs all relationships, leaves all cliques, deletes all data, and all in all removes all traces of your existance, but we don't want you to use it. The facility is only there because it *should* be. Why would you want to? It's for *fun*. Don't take it that seriously.<br>
	Note: This is *not* for merging two accounts together, if you want to that then shout at Aquarion.<br>
	But, because people might find it necessary, you can get rid of yourself by going to this page here: <a href="delete.php">Delete</a>.
</blockquote>
<? build_footer("Notes on the System") ?>