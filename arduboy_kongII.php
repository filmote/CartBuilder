<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=10;  $small=true; include("include/arduboy_nav.php"); ?>


<img src="images/arduboy/kongII/arduboy_kongII_00.png" width="480" />
<br/>
<br/>
<h1>Kong II</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Kong-II" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Kong-II/tree/master/distributable/KongII.V1.0.hex" target="_new">Hex File</a><br>
</p>
<p>
A remake of the classic <b>Game and Watch</b> game <b>Donkey Kong II</b>.
</p><p>
Kong has been locked up but, thank God, Kong Jnr can save him!
</p>
<p>
The high score for the two modes (easy and hard) are stored in EEPROM. To clear the high scores, press <b>Left</b> and <b>Right</b> for a few seconds on the score screen. You can also access the high scores from the title screen by pressing up. 
</p>
<img src="images/arduboy/kongII/arduboy_kongII_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/kongII/arduboy_kongII_02.png" width="230" />
<br/>
<img src="images/arduboy/kongII/arduboy_kongII_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/kongII/arduboy_kongII_04.png" width="230" />
<br/>
<img src="images/arduboy/kongII/arduboy_kongII_05.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/KongII.V1.0.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
