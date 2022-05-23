<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=28;  $small=true; include("include/arduboy_nav.php"); ?>

loverushgolf

<img src="images/arduboy/golf/arduboy_golf_00.jpg" width="480" />
<br/>
<br/>
<h1>Golf Companion</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/GolfCompanion" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/GolfCompanion_v1.01" target="_new">Hex File</a><br>
</p>
<p>
With the summer weather in my part of the world i have been thinking about how could we use the Arduboy outside? What about using it to keep my Golf scores?
</p><p>
So here it is, the Golf Companion for the Arduboy.
</p><p>
Here are the features:
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Can keep the scores for up to 4 players</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can input your names like on a real scorecard.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can enter the PAR for each holes.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can turn OFF the arduboy to save battery life during your game and turn it back ON when needed and it will go right back where you left it off like if you never turned it OFF.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Best of all, no paper, no pen needed !!</td</tr>
</table>
    
    
<h2>FAQ</h2>

<p>
<b>Q</b> How do i enter the information in?<br/>
<b>A</b> UP and DOWN arrow to scroll through the letters/numbers. LEFT/RIGHT to move 1 space. A to confirm<br/><br/>

<b>Q</b> How can i change the PAR for each holes?<br/>
<b>A</b> Before starting your actual game of Golf, you must enter the PAR for each hole by moving the selector with the arrows and press A to switch to edit mode, then scroll the the needed value and confirm by pressing A again.<br/><br/>

<b>Q</b> How can i change the SCORE for each player?<br/>
<b>A</b> Same way you did for the PAR.<br/><br/>

<b>Q</b> How do i get to the final scoring screen?<br/>
<b>A</b> when you scroll passed the amount of holes you are playing, it will get you to the final scoring screen.
</p>
<p>
Some screenshots:

<table>
<tr><td><img src="images/arduboy/golf/arduboy_golf_01.png" width="230" /><br />Main Screen</td><td><img src="images/arduboy/golf/arduboy_golf_02.png" width="230" /><br />Name Entry Screen</td></tr>
<tr><td><img src="images/arduboy/golf/arduboy_golf_03.png" width="230" /><br />Score Card Screen</td><td><img src="images/arduboy/golf/arduboy_golf_04.png" width="230" /><br />Final Scoring Screen</td></tr>
</table>

<p>
Big Thanks to <b>@filmote</b> for a lot of help on this one! Also thanks to <b>@Pharap</b> for some help as well.
</p><p>
Now if only i had a green Arduboy! that would of been even better! 
</p>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/GolfCompanion_v1.01" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
