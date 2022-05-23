<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=25;  $small=true; include("include/arduboy_nav.php"); ?>



<br/>
<h1>Pipes</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/filmote/LayingPipe" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/Pipes.hex" target="_new">Hex File</a><br>
</p>
<p>
A version of the classic pipes game where you must lay pipe between each pair of nodes without the pipes crossing each other. This version has puzzles ranging from 5 x 5 to 9 x 9.
</p>

<h2>Game Play</h2>
<p>
The initial splash screen is animated and shows pipes being layed. The user can skip this and jump straight to the action by pressing the ‘A’ button. The ‘B’ button toggles the sound on and off.
</p>
<br />
<img src="images/arduboy/pipes/arduboy_pipes_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/pipes/arduboy_pipes_02.png" width="230" />

<p>
The game has six levels ranging from super easy to hard. The easy puzzles have a 5 x 5 cell configuration and they increase in size to 9 x 9. Press ‘A’ to select a level or ‘B’ to return to the front splash screen.
</b>
<br />
<img src="images/arduboy/pipes/arduboy_pipes_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/pipes/arduboy_pipes_04.png" width="230" />
<p>
Depending on the level chosen, the board may fit onto the screen or you may need to scroll up and down to see the action. Pressing ‘A’ on a node will select that node.
</p>
<br/>
<img src="images/arduboy/pipes/arduboy_pipes_05.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/pipes/arduboy_pipes_06.png" width="230" />
<br/>
<img src="images/arduboy/pipes/arduboy_pipes_07.png" width="230" />
<br/>
<p>
Pressing the ‘B’ button will return you to the level select if no node has been selected. Alternatively, if a node has been selected, pressing ‘B’ will erase the pipe that is currently being layed.
</p>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Pipes.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
