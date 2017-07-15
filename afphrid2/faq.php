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

build_header("Help - FAQ");

dbconnect();

include("include/help.html")
?>
<h1>Questions I've Never Been Asked:</h1>
<ul>
	<li>AFP
	<li>AFP Relations
	<li>Why?
	<li>Afphrid
	<li>Afphrid2
	<li>Afphrid3
</ul>

<h2>AFP</h2>
<p>Alt.fan.pratchett is a newsgroup based around the life and works of Terry Pratchett. It's also quite a bit more than that, in that it's a community of likeminded - and occasionally non-likeminded - people who talk to each other, be it by online chat, the newsgroup itself, or Real Life. It has a number of conventions, including cats and chocolate, and you can find out much more at <a href="http://www.lspace.org/fandom/afp/">the lspace AFP page</a>.</p>

<h2>AFP Relations</h2>
<p>One of these conventions is that of Relationships. Once upon a time, someone saw a post that made them go "Oooooooh, nice", and followed up with "Will you marry me?". This developed into the current state of play, where we have afphiancee's, afpsisters, wives, husbands (often these two are related, but not always) librarians and mice. Clearly, there needed to be a central repository where all this goes, that people can look at it.</p>

<p>Someone should do something.</p>

<h2>Why?</h2>
<p>Sitting in a database lecture sometime in 2001, I needed an example. I was being taught the therory behind databases, how they worked, and I needed an example to work though in my head to see if I understood it. And since they were relational database, I thought of relations, and of AFP. Then I drew out a form of relationships, normalised it, and did some specifications for how it would work.</p>

<p>Academic exercise, you understand. Like "How to kill the Hogfather"</p>

<p>Then, one week in September, I got bored, found my old notes, and coded it. Afphrid, the Alt.fan.pratchet heroic, relational (& impossible) database v1 was <a href="http://groups.google.com/groups?selm=aa22pd%2465tuv%241%40ID-138064.news.dfncis.de">born</a>.</p>

<h2>Afphrid</h2>
<p>In the beginning was AFPhrid, the Alt.Fan.Pratchett Heroic Impossible 
Relational Database. And it was designed by a person fresh out of Uni, and by 
golly did it show. And it ran for six months, and various hacks were put in
place to make it work properly, most of which involving escaping strings.</p>

<p>When the new version of PHP was released, fixing a number of security holes,
the old version of Afphrid didn't work with it, and rather than make a bodge-job
of repairing the complex system, its designer and coder, Aquarion, decided to
<a href="http://groups.google.com/groups?selm=gn9pbuodff9g7o5dl3jq3en1m1sv9qqfo5%404ax.com">rewrite it</a> under the traditional banners of Truth, Love, and Not Using User Input
For Primary Keys.</p>

<h2>Afphrid 2</h2>
<p>Almost two months later, it was still unfinished, and Aquarion made a decision,
this had to *be* working soon, otherwise it would be too hopelessly out of date.
So he took some of the more radical database changes (that he hadn't already 
implemented) and placed them into a fictional "<a href="development.php">Back Burner</a>" state until the main
system was finished, Put most of the less basic features (like cliques) into a
"Stage Two" state, and got to work on getting the main system back up and running
. It still isn't - quite, but it's closer. The future is bright, the future is
an attractive green gradient.</p>

<p>
I've still got a lot to do, putting cliques back for starters. You can check on the progress, and see some info on what has *actually* changed at the <a href="development.php">Development Page</a>.
</p>

<h2>Afphrid 3</h2>
<blockquote cite="http://groups.google.com/groups?q=Afphrid&start=20&hl=en&lr=&ie=UTF8&oe=UTF8&selm=slrn9vkepc.o9u.usenet%40sacrifice.bedlam.bogus&rnum=23">"AFPrelationships are easy to document, providing you don't 
 even *attempt* to rationalise them"<br> - Afphrid notes, June 2001
</cite>

<p>Afphrid will be rewritten in Perl, and the database sceme will be changed to be able to *understand* relationships. Soon.</p>
<?PHP
build_footer("FAQ");
?>