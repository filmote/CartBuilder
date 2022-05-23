<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=10;  $small=true; include("include/pokitto_nav.php"); ?>

<img src="images/pokitto/spacecab/pokitto_spacecab_00.png" width="480" />
<br/>
<br/>
<h1>Space Cab</h1>
<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/SpaceCab_Pokitto" target="_new">GitHub Source</a><br>
Zip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://talk.pokitto.com/uploads/short-url/ygwLYkeEiildWFaSGsPxKBkfTTc.zip" target="_new">Zip File</a><br>
</p>
<img src="images/pokitto/spacecab/pokitto_spacecab_01.gif" />
<br />
<h2>Overview</h2>
<br/>

<details>
<summary>
Synopsis
</summary>
<p>
PPOT have redeveloped a game we previously released on the Arduboy. This new version takes advantage of the extra features of the Pokitto - namely sound, extra memory and the SD card. Not only are you be able to play the levels packaged with the game but you will be able to create new ones using the built-in level editor.
</p>
</details>

<details>
<summary>
Game Play
</summary>
<p>
Earn your keep by transporting customers from one platform to another. The quicker you do that the more money you will make. After completing a number of fares, you will be instructed to go to the gate (at the top of the screen) by a passenger and this will lead you to the next level.
</p><p>
To fly, press and hold the <b>A button</b> to ignite your thrusters. You will note that as you gain height, your landing gears will retract allowing you to reach maximum speed when flying. However, you will need to press <b>B</b> to deploy the landing gear before landing otherwise you will crash - and customers hate that!
</p><p>
Also, you must control your speed when descending and landing. You must slow down by activating the thrusters immediately before landing. You can monitor the downward speed on the right-hand side of the HUD.
</p>
</details>

<details>
<summary>
The Level Editor
</summary>
<p>
The game has a number of levels already included but we would love to see some of your creations. After entering the design port (you will have to discover how to do that yourself!), you will see a list of existing levels and an option to add a new level at the end of the list.
</p><p>
You can alter existing levels as well!
</p><p>
Select a level by pressing the A button to reveal the sub-menu of options. As shown in the image below, you can edit the level, move it higher or lower in the list and even delete it. You can also test the level as you develop it to make sure its both complete and fun! Pressing B will return you to your previous selection.
</p>
<img src="images/pokitto/spacecab/pokitto_spacecab_02.png" width="230" />&nbsp;&nbsp;
<img src="images/pokitto/spacecab/pokitto_spacecab_03.png" width="230" />
<br/>
<p>
Editing a level will present you with details of the level itself - including its height, width and number of fares that need to be collected before progressing to the next level. The Fuel setting details how much fuel the player starts with and the Gate setting specifies how long internal gates remain open when switched on or off.
</p>
<img src="images/pokitto/spacecab/pokitto_spacecab_04.png" width="230" />
<br />
<p>
Once these settings are confirmed, you proceed to the level editor itself. You can scroll around the map placing tiles by pressing the <b>A button</b>. Holding the A button while moving will leave a trail of tiles which is useful for ‘painting’ large areas.
</p><p>
Press <b>C</b> to reveal the tile selector. In addition to selecting different tiles, you can also position the player at the start of the level by selecting the Player button at the bottom of the list.
</p>
<img src="images/pokitto/spacecab/pokitto_spacecab_05.png" width="230" />&nbsp;&nbsp;
<img src="images/pokitto/spacecab/pokitto_spacecab_06.png" width="230" />
<br/>
<p>
When you have completed your level, you must click Save to exit and save your creation. Levels are validated as they are created ensuring that they are complete and playable *
</p><p>
In summary though, levels must have a single exit gate at the top of the level and two or more signs for picking up / dropping off customers. When you place a sign, you must leave space on one side or the other to allow the cab to land.
</p>
<img src="images/pokitto/spacecab/pokitto_spacecab_07.png" width="230" />
</br>
<p><sup>
* Conditions apply. You can still make unsolvable levels if you really try!
</sup></p>
</details>

<details>
<summary>
Online Level Editor
</summary>
<p>
Tuxinator made an online level editor that is really handy for developing larger levels.  It can be found <a href="https://tuxinator2009.github.io/SpaceCab_Pokitto/export/editor.html" target="_new">here</a>.
</details>

<details>
<summary>
Sharing Levels
</summary>
<p>
When you have finished designing your new level in the Space Cabs game, select ‘Export Level’ from the designer menu. This will create a level file (suffixed with .raw) in the <b>SPCAB_EXPORT</b> directory. This file can be copied an distributed to other players.
</p><p>
To import a level from another player, simply copy it into the <b>SPCAB_IMPORT</b> directory. When you next start Space Cabs, the new file will be detected and imported into the level collection. Once the process is complete, the import file will be automatically deleted.
</p><p>
If you make a level you are particularly proud of then please share it with us. If we like it, we will package it in the next release of the game!
</p>
</details>

<br />
<h2>Installation Instructions</h2>
<p>
This game consists of a POP file and supporting sound / level assets packaged in a .zip file. Please expand the contents into a directory on you computer - you will see a POP file and a sub-directory called music. If you expand the music directory, you will see it contains three directories - <b>SPCAB_FILES</b>, <b>SPCAB_IMPORT</b> and <b>SPCAB_EXPORT</b>.
</p><p>
Please ensure the .POP file, the music folder and its sub-directories are copied to the root directory of your SD card. You must maintain the folder structure as is!
</p><p>
Depending on what other games are installed on your Pokitto, you may already have a sub-directory called /music on your machine. If prompted, simply merge the contents of the Space Cab directory with the folder already on your machine. The names of the file are unique and should not clash!
</p>


			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
