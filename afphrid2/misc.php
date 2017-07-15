<?PHP
include("include/library.inc");	 	  // Useful functions
include("include/diary.inc");		// Diary Stuff
dbconnect();
build_header("misc", "Index", ".");

?>

<div class="menu">
<h2>Misc Stuff</h2>

<a href="/chat/">Chat</a><br>

</div>

<div id="content">
<h1>Misc Stuff</h1>
<P>This is where everything else goes, all the stuff that's here but doesn't warrent it's own section.

<p>
<ul>
	<li><a href="misc/mods/">Mad Toonz</a> Music by Aquarion.
	<li><a href="misc/story/">Forever</a> Contiuous Multibranching Story
	<li><a href="/meets">Misc meet reports & stuff</a>
	<li><a href="/nsd">NSD</a> - Almost daily thing. will return.
	<li><a href="/quoth">Quoth</a> - VB-based Quote generator, unsupported
	<li><a href="/terra">Terra Incognita</a> - Scifi E-Zine, will also return
	<li><a href="/chat">Chat</a> - Java based IRC
	<li><a href="/fun">Fun</a> - Other, single, misc Stuff&trade;
</ul>

<h2>The Vault</h2>
The Vault is the home for all the websites I've done for other places that are now homeless, much of this was on Aquarionics back in 2000, but never made it to the new servers. Well, it's here now :-)

<dl>
	<dt><a href="/misc/vault/diary/">Diary</a>
	<dd>My diary for January to Febuary 2000. The archives for March -> April are lost right up until I started using Blogger, which is where the current Journal archives take up.
	
	<dt><a href="/misc/vault/joscars/">Joscars</a>
	<dd>For one night only, the residents of #eddings were showered with awards by <a href="http://www.extraverse.org">Joy Green</a>, and here is the official website once more :)

	<dt><a href="/misc/vault/top5/">Top 5</a>
	<dd>My original games review/preview section, Second generation. Of the games in here, one was canned totally (DK3) another took another two years to release (StS3D) and more were just constantly delayed.

	<dt><a href="/misc/vault/craig/">Craig's Page Of Colours</a>
	<dd>I haven't seen Craig for ages, but four years ago I helped him create this, and so it remains here until he complains :-)

	<dt><a href="/misc/vault/roses/">Roses</a>
	<dd>The results of a bored lunchtime in Mascalls. 

	<dt><a href="/misc/vault/greyscale/">Greyscale</a>
	<dd>My Black & White Fan-zine ran for seven issues over four months, with another two months beforehand as a normal website. The archives of this, once thought lost forever, are now here.
</dl>
<?PHP
echo "&copy; Nicholas 'Aquarion' Avenell 1999 to ". date("Y") . " inclusive. Do you realise you are person ";
include("include/counter.inc"); 
echo " to visit this page?</div>";
?>