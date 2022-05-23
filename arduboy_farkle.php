<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=15;  $small=true; include("include/arduboy_nav.php"); ?>			



<img src="images/arduboy/farkle/arduboy_farkle_00.png" width="480" />
<br/>
<br/>
<h1>Farkle!</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Farkle" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Farkle/Farkle.hex" target="_new">Hex File</a><br>
</p>
<p>
Farkle is a game of tactics and luck.
</p>
<p>
Players take a turn in order. On your turn, roll all six dice to reveal the initial meld. Set aside any 'point dice' (1s, 5s or sets - these are detailed later on) that appear.  You have started accumulating a score for this round.  At this point, you have the option to continue to roll the remaining dice to collect more points, or stop and keep any points accumulated.
</p>
<p>
After each roll, you can remove more 'point dice' and decide to roll again or take the points.  If you use or six dice to score points - known as Hot Dice - you can roll all six dice again.
</p>
<p>
A Farkle occurs when the dice are rolled and no 'point dice' appear. This ends your turn and you lose any accumulated points and are penalised 500 points! One last rule ... before you can take points and complete your roll, you must accumulate at least 300 points.
</p>
<p>
Play continues for 10 rounds and the person with the highest score at the end wins!
</p>
<br />
<img src="images/arduboy/farkle/arduboy_farkle_01.png" width="230" />&nbsp;&nbsp;<img src="images/arduboy/farkle/arduboy_farkle_02.png" width="230" />
<br/>
<img src="images/arduboy/farkle/arduboy_farkle_03.png" width="230" />&nbsp;&nbsp;<img src="images/arduboy/farkle/arduboy_farkle_04.png" width="230" />
<br />
<img src="images/arduboy/farkle/arduboy_farkle_05.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Farkle.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
