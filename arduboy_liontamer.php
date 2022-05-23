<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=8;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/liontamer/arduboy_liontamer_00.png" width="480" />
<br/>
<br/>
<h1>Lion Tamer</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Lion" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Lion/tree/master/distributable/Lion.hex" target="_new">Hex File</a><br>
</p>
<p>
Inspired by yet another Game and Watch, PPOT presents Lion Tamer.
</p>
<p>
Someone has left the lion's cage doors open!  Keep them from escaping by blocking their path with your trusty chair.  Play alone, with a second lion tamer or, for the ultimate challenge, play both sides at once!
</p>
<p>
<b>Sound</b> can be toggled on and off from the title screen using the `Up` and `Down` buttons.
<b>Scores</b> can be reset by pressing and holding the `Left` and `Right` buttons for a few seconds.


</p>
<img src="images/arduboy/liontamer/arduboy_liontamer_01.png" width="260" />
<br/>
<img src="images/arduboy/liontamer/arduboy_liontamer_02.png" width="260" />
<br/>
<img src="images/arduboy/liontamer/arduboy_liontamer_03.png" width="260" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=https://raw.githubusercontent.com/Press-Play-On-Tape/Lion/master/distributable/Lion.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
