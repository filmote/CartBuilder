<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=4;  $small=true; include("include/pokitto_nav.php"); ?>

<img src="images/pokitto/darktrails/pokitto_darktrails_01.png" width="480" />
<br/>
<br/>
<h1>Dark Trails</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/ButtonsTrail_Pokitto" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/ButtonsTrail_Pokitto/releases/download/V1.1/DarkTrails.zip" target="_new">Hex File</a><br>
</p>
<img src="images/pokitto/darktrails/pokitto_darktrails_00.gif" width="212" />
<br />
<p>
Move between the floor tiles to turn on all of the torches. But be careful though as some floor tiles will fall when crossed preventing you from back-tracking! On some levels you will encounter shadow enemies who will either move with you in lockstep or actively try to block your movements.
</p><p>
This is a conversion of our Arduboy game with an enhanced theme and graphics which in turn was a remake of Wan Sou’s little Nokia game. We started talking about doing this conversion only a week and a half ago and told ourselves that it would be a ‘quick and dirty’ effort. Thanks to @Vampirics, the quick and dirty effort looks better than I could ever imagine!
</p>
<h2>Installation Instructions</h2>
<p>
This game consists of a POP file and supporting sound assets packaged in a .zip file. Please expand the contents into a directory on you computer - you will see a POP file and a sub-directory called music. Please ensure both the .POP file and folder are copied to the root directory of your SD card.
</p><p>
Depending on what other games are installed on your Pokitto, you may already have a sub-directory called /music on your machine. If prompted, simply merge the contents of the Dark Trails directory with the folder already on your machine. The names of the file are unique and should not clash!</p>
</p>

			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
