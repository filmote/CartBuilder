<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=27;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/loverush/arduboy_loverush_00.gif" width="256" />
<br/>
<br/>
<h1>Love Rush</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/vampirics/LoveRush/releases" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/LoveRush_v1.1.2.hex" target="_new">Hex File</a><br>
</p>
<p>
A cute infinite shooter for the Arduboy dedicated to my wife.
</p>
It’s my first project for the Arduboy, so i tried to keep everything simple.
You need to get all the hearts you can while avoiding the falling angry faces.
Let’s see the scores you guys can get!
</p>
<p>
Game Features:
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Parallax scrolling.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>HighScore saving (with a way to reset it by pressing B on title screen).</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Cute hearts all over the screen!</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Press <b>A</b> to shoot</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Press <b>B</b> to pause the game</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Catching heart gives you 5pts</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Shooting a heart is -10pts</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You get 1 shield back for every 15 hearts you catch</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Shooting angry faces gives you 10pts</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>A collision with an angry face is -1 shield (you have 4 shields total at the start)</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Collision with enemies makes the red LED flash briefly</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Speed is going up after a certain amount of points and warn you by a green LED flashing once</td</tr>
</table>
<p>
Special thanks to <b>@filmote</b> and <b>@Pharap</b> for all the help i got from them to learn faster.</br>
And my wife for putting up with me talking about arduboy coding all the time.
</p>
</details>
<br />
<img src="images/arduboy/loverush/arduboy_loverush_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/loverush/arduboy_loverush_02.png" width="230" />
<br/>
<img src="images/arduboy/loverush/arduboy_loverush_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/loverush/arduboy_loverush_04.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/LoveRush_v1.1.2.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
