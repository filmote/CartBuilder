<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=31;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/leword/arduboy_leword_00.jpg" width="480" />
<br/>
<br/>
<h1>LeWord</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/LeWord" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/LeWord/tree/master/distributable/leword.100.hex" target="_new">Hex File</a><br>
</p>
<p>
Play <strike>Wordle</strike> LeWord on the Arduboy in English or French (or is it Québécois?).
</p><p>
Press Play on Tape is proud to present its first FX only game. This game takes advantage of the additional FX memory to store two separate dictionaries each with thousands of words each.
<h2>Tips and Tricks</h2>
<br/>
<ul>
<li>from the main menu, press B to view the statistics of the chosen language.</li>
<li>from within the game, press B to delete a letter (or you can use the backspace key)</li>
<li>from within the game, press and hold B to cancel the current game. If you have had guesses, it will impact your statistics. If you have not guessed yet, it will not.</li>
<li>from the statistics page, press and hold B to clear the score for the current language. It will not affect the other language.</li>
</ul>
<p>
<br />
<img src="images/arduboy/leword/arduboy_leword_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/leword/arduboy_leword_02.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="projectABE/test.html" width="480" height="240">
</iframe>

			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
