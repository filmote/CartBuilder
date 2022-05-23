<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=4;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/picross/arduboy_picross_00.png" width="480" />
<br/>
<br/>
<h1>PiCross</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/PiCross" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/PiCross/tree/master/distributable/Picross.hex" target="_new">Hex File</a><br>
</p>
<p>
Classic PiCross game with 300 puzzles ranging in size from 5x5 to 16x16.
</p>
<p>
Game play is stored in the EEPROM and allows you to turn the Arduboy off and back on again and resume where you left off. To quit a puzzle without completing it, press the <b>A</b> and <b>B</b> button simultaneously to reveal the ‘Leave Game’ dialogue - press <b>A</b> to quit or <b>B</b> to cancel.
</p>
<img src="images/arduboy/picross/arduboy_picross_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/picross/arduboy_picross_02.png" width="230" />
<br/>
<img src="images/arduboy/picross/arduboy_picross_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/picross/arduboy_picross_04.png" width="230" />
<br/>
<img src="images/arduboy/picross/arduboy_picross_05.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Picross.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
