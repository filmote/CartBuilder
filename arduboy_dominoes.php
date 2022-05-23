<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=24;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/dominoes/arduboy_dominoes_00.png" width="480" />
<br/>
<br/>
<h1>Dominoes 'All Fives’</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Dominoes" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/Dominoes.hex" target="_new">Hex File</a><br>
</p>
<p>
This version allows you to play the computer or play another human!
</p><p>
All Fives is a popular variant of Dominoes where players the goal of the game is not just to go out, but to make the open ends of the layout add up to 5 (or a multiple of five).
</p>

<details>
<summary>
Dominoes Rules
</summary>
<p>
There are many different versions of Dominoes ‘All Fives’. The version I have created is based on the rules that I were taught as a child. Some of the rules can easily be changed by simply altering a constant or two in the code (starting number of tiles or the overall point target, for example) whereas others will require code changes (end of hand scoring or forcing a user to play a bone if they can rather than drawing a bone).
</p><p>
All versions of ‘All Fives’ have the same objective - play the bones in order to score points with the first person to reach a previously agreed target - typically 100 - winning. Bones are played by matching the ‘pips’ on a bone to the open ends of the bones already played. Points are scored if the pips on the end bones that have already been played are a multiple of five. Points can also be scored by playing all of your bones at which point the pip count in your opponent’s hand is added to your score.
</p><p>
The bones are placed face down in the graveyard and shuffled. Each player draws seven tiles and the round begins.
</p><p>
In this version of Dominoes, the human always goes first - from that point on play alternates between the computer and player even between rounds. A player may optionally draw tiles from the graveyard and add to his hand however they must ultimately play a tile to complete his turn. It is possible that no bone can be played from the players hand which would force them to draw a bone from the graveyard. If the graveyard is empty, the player is forced to pass.
</p><p>
The human can play any bone from his hand but typical opening plays include bones that will score points immediately (0:5, 1:4, 2:3, 5:5 or the 6:4). Assume the human plays the 5:5 bone which both scores 10 points due to its ‘pips’ adding to 10 and happens to be a double. The first double played is known as the spinner and as the game progresses forms the centre of a four-way ‘cross’.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_01.png" />
</p><p>
The computer will then play a bone. His bone must match the ‘pips’ of the first tile. Let’s assume he plays the 5:3 bone. This does not score any points as the open ends of the tiles add up to 13 points (3 points on the newly placed tile and the original 10 from the first tile). The sum of the open ends is often referred to as the ‘board score’ or ‘board value’.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_02.png" />
</p><p>
The human plays again by placing the 4:5 tile on the other side of the original tile. At this point, the board has a value of 7 as the spinner has bones on either side of it and is not considered (hence it is greyed out).
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_03.png" />
</p><p>
The computer plays the 6:3 tile and scores 10 points. Note that in the image below, the 5:3 tile has been greyed out as it, like the 5:5, plays no part in the game or the scoring.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_04.png" />
</p><p>
Play continues with the human playing the 4:4 tile. As it is not the first double played, it behaves like any other bone. Playing the 4:4 results in the score not changing and scoring the player 10 points as well. Note that some versions of ‘All Fives’ would count both ends of the 4:4 to calculate a ‘board score’ of 14.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_05.png" />
</p><p>
As both ends of the spinner have been played, the computer can now add tiles from the other two ends. He plays the 5:6 for a ‘board score’ or 16 which results in no score for him.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_06.png" />
</p><p>
And play continues until either player has used up all their bones or neither player can play or draw from the boneyard. If a player has emptied their hand, the ‘pips’ from the other player’s hand are tallied, rounded to the nearest 5 and added to the first player’s score. If neither player can play a bone, the difference between the two hands is added to the score of the player whose hand scores the lowest.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_07.png" />
</p><p>
When playing doubles after the spinner, they are laid cross ways as shown below. The pip count at this point is 12 (the 6, the 4, and 2 for the double 1). The player could score points by playing the 6:4 on the western side for 10 points, the 4:2 on the eastern side for 10 points or the 1:5 on the southern side for 15 points. If it had not already been played, the player could also have played the 5:3 on the northern side for 15 points.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_08.png" />
</details>

<details>
<summary>
Dominoes and a 128x64 pixel screen
</summary>
<p>
In a typical domino game, players add a domino tile (known as a ‘bone’) to an existing one by matching the number of ‘pips’. This results in a long string of dominoes joined end-to-end which would very quickly exceed the available real-estate of the Arduboy screen. This version tackles this issue by removing intermediate tiles and placing them face up in a pile at the right of screen. This allows the player to see what bones he can play against and what bones have been previously played.
</p>
</details>

<details>
<summary>
Game Play
</summary>
<p>
Game play starts with a basic splash screen.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_09.png" width="256" />
</p><p>
After pressing the A button, the domino board is shown. The computers score and number of bones in his hand are shown at the top of the screen whereas the human’s score is shown at the bottom. After dealing the bones, the remainder are available for selection on the right-hand side of the screen.
</p><p>
The human plays first. The human’s hand is show at the bottom of the screen with the selected bone highlighted. The player can scroll left to right to locate the bone he wishes to play and select it by clicking the <b>A button</b>. Alternatively, the player can scroll to the graveyard and select a tile to add to his hand.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_10.png" width="256" />
</p><p>
Control moves to the board where the player must select a position on the board to play. When playing the first tile, only one option is available - the center position. This is selected by clicking the A button again.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_11.png" width="256" />
</p><p>
The player’s turn is over. The positions on either side of the played tile are now available for the computer to play a bone.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_12.png" width="256" />
</p><p>
The computer contemplates his next move …
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_13.png" width="256" />
</p><p>
… and plays a bone. Note the number of bones in the computer’s hand has decreased to 6. The animations and dialogues can be skipped simply by pressing the <b>A</b> or <b>B button</b>.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_14.png" width="256" />
</p><p>
As play continues, bones that are not important to the play are moved to the graveyard and placed face up. In this way, those bones that have been played are still visible.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_16.png" width="256" />
</p><p>
Once the east and west side of the spinner are played, the north and south positions become available for play.
</p><p>
<img src="images/arduboy/dominoes/arduboy_dominoes_17.png" width="256" />
</p>
</details>

<details>
<summary>
Tactics
</summary>
<p>
Unlike some variants of Dominoes, ‘All Fives’ is not a pure chance game and there are some tactics involved. The computer will attempt to (in order) :

<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Play a domino that scores.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Play a domino that blocks an end of the play using a bone where this is no other bone that can be played from other player’s hands.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Play a domino that reduces the pip count thus preventing other players from scoring highly.</td</tr>
</table>

</p>
</details>



</details>
<br />
<img src="images/arduboy/dominoes/arduboy_dominoes_09.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/dominoes/arduboy_dominoes_13.png" width="230" />
<br/>
<img src="images/arduboy/dominoes/arduboy_dominoes_14.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/dominoes/arduboy_dominoes_17.png" width="230" />
<br/>
<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Dominoes.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
