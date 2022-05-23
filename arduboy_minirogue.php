<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=16;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/minirogue/arduboy_minirogue_00.png" width="480" />
<br/>
<br/>
<h1>Mini Rogue</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/MiniRogue" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/MiniRogue/tree/master/distributable/MiniRogue.ino.hex" target="_new">Hex File</a><br>
</p>
<p>
<h2>Background</h2>
<p>
Mini Rogue is a 9-card game in which a single player delves into a deep dungeon to get the famous ruby called The Og’s Blood on the bottom floor. The player must choose how to spend their resources in order to be powerful enough to confront ever difficult monsters. Random events and encounters make every play-through a unique experience.
</p><p>
The game was originally developed by <b>Paolo Di Stefano</b> and <b>Gabriel Gendron</b> for the <a href="https://boardgamegeek.com/thread/1491476/2016-9-card-nanogame-pnp-design-contest" target="_new">2016 9-Card Nanogame Design Contest</a>. It won:<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;1st place - Best New Designers<br />
&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;2nd place - Best Overall Game<br />
&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;2nd place - Best Solitaire Game<br />
&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;2nd place - Best Artwork<br />
&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;3rd place - Best Thematic Game<br />
&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;3rd place - Best Written Rules<br />
<br />
More information about the game can be found <a href="https://gumroad.com/l/MiniRogue12" target="_new">here</a>.
</p><p>
The Arduboy version of Mini Rogue was created with the permission of the original authors. Mini Rogue is published by Mountain Gold Games. Copyright 2016 Mountain Gold Games. All Rights Reserved.
</p>

<details>
<summary>
Object of the Game
</summary>
<p>
In this solitaire game, you play as an adventurer that delves into a dungeon, room after room, area after area, level after level, to loot the <b>Og’s Blood</b>: a fabled and mysterious ruby gemstone. Each area of the dungeon is laid out as a branching of rooms. Each time you face two rooms, you’ll have to choose one. You will resolve each encounter by rolling dice, and decide on how to pursue the adventure. In each room, you may encounter a monster, find a treasure, discover a resting area, meet a merchant, dodge traps, or face other surprising events. Each level ends with a powerful boss monster that you’ll have to defeat to continue onto to the next level. You win the game if you can reach the last room of the Dungeon and defeat the final Boss Monster.
</p>
</details>

<details>
<summary>
Arduboy Version
</summary>
<p>
In adapting the game to the Arduboy, we have taken a few liberties but in the whole have tried to stay true to the original game by keeping the dice and card metaphor.
</p><p>
The following instructions have been summarised from the complete instructions originally written by <b>Paolo Di Stefano</b> and <b>Gabriel Gendron</b>. We encourage you to read the full instructions as those below are incomplete and probably contain errors! The instructions and card artwork are included in \distributable directory of the project repo.
</p>
</details>
<br/>
<h2>Game Play</h2>
<br/>

<details>
<summary>
Starting the Game
</summary>
<p>
Mini Rogue has four starting levels that dictate the amount of armour, HP, gold and food you start your adventure with.
</p>
<table
<tr><td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>&nbsp;&nbsp;HP&nbsp;&nbsp;</b></td><td><b>&nbsp;&nbsp;Gold&nbsp;&nbsp;</b></td><td><b>&nbsp;&nbsp;Food&nbsp;&nbsp;</b></td></th>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Easy</td><td>&nbsp;&nbsp;1</td><td>&nbsp;&nbsp;5</td><td>&nbsp;&nbsp;5</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Normal</td><td>&nbsp;&nbsp;0</td><td>&nbsp;&nbsp;5</td><td>&nbsp;&nbsp;3</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hard </td><td>&nbsp;&nbsp;0</td><td>&nbsp;&nbsp;4</td><td>&nbsp;&nbsp;2</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hell</td><td>&nbsp;&nbsp;0</td><td>&nbsp;&nbsp;3</td><td>&nbsp;&nbsp;1</td></tr>
</table>
<p>
These statistics and others are displayed on the right-hand side of the screen, as shown below.
</p>
<table>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_01.png" width="32" />&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Rank:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>As you accumulate experience (XP) in the dungeon your rank. This will assist in your ability to fight the various monsters you will find in the dungeon, refer Monster Card and Boss Monster Card below.</td</tr>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_02.png" width="32" /></td><td>XP:</td><td>You will be rewarded XP as you defeat monsters or stumble across treasures in the  dungeon.</td</tr>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_03.png" width="32" /></td><td>HP:</td><td>Your health will take a beating as you battle monsters but you can top it up when you visit a Merchant or discover it hidden in the dungeon.</td</tr>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_04.png" width="32" /></td><td>Armour:</td><td>Armour will protect you when you inevitably encounter a monster in the dungeon. Armour can be bought at the Merchant or destroyed through acid rain.</td</tr>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_05.png" width="32" /></td><td>Gold:</td><td>You can buy your way out of trouble with enough gold. Gain extra gold be killing monsters and finding treasures.</td</tr>
<tr><td><img src="images/arduboy/minirogue/arduboy_minirogue_06.png" width="32" /></td><td> Food:</td><td>Food is essential to life in the dungeon. You will need consume a food ration every time you complete an area in the dungeon.</td</tr>
</table>                               
</p>
</details>



<details>
<summary>
Rank and XP
</summary>
<p>
As you become more experienced fighting monsters in the dungeon, your XP points will increase. Once you have accumulated enough XP points, your rank will be upgraded (to a maximum of four). Increased rank provides you with additional weapons when fighting the dungeon’s monsters. Refer to the section <b>Monster Card</b> and <b>Boss Monster Card</b> below.
</p>
<table>
<tr><td><b>&nbsp;&nbsp;&nbsp;Starting Rank</b></td><td><b>&nbsp;&nbsp;&nbsp;Number of XP</b></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6 XP</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12 XP</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18 XP</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Maximum Rank!</td></tr>
</table>
</details>



<details>
<summary>
Progressing through the Dungeon
</summary>
<p>
Each level in the dungeon has a number of areas and each area has a number of rooms. The rooms are represented by 7 cards and are dealt randomly on each level. You must progress through the rooms before delving to the next area. When completing the last area of a level, you will fight a Boss monster and be rewarded handsomely if you win.
</p><p>
When starting a level or area, the room cards are dealt in the pattern shown below. If the current area is not the last one for the level, the last card shown will be a ‘delving’ card that will take you to the next area (as shown on the left). If not, the last card will be a Boss Monster which will hamper your movement between areas (as shown on the right).
</p>
<img src="images/arduboy/minirogue/arduboy_minirogue_07.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_08.png" width="230" />
<br/>
<p>
As you can see, the current level and area are displayed in the top left hand corner.
</p><p>
Play starts by flipping the first card. As there is only one visible card, you must complete the room by pressing the A button before moving on. Refer to the room description below for a brief description. Once the room is complete, you will return to the dungeon screen and the next two cards will be revealed. You can scroll between them by pressing up or down and selecting the either room to investigate.
</p><p>
Once you have completed the last room in an area you must consume 1 Food before proceeding to the next area or level. As in real life, if you run out of food its game over!
</p><p>
The dungeon levels and area are laid out as shown below:
</p>
<img src="images/arduboy/minirogue/arduboy_minirogue_09.png" width="230" />
<br/>
</details>

<br/>
<h2>The Rooms</h2>
<br />

<details>
<summary>
Treasure Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_10.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_11.png" width="230" />
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_12.png" width="230" />
<br/>
<p>
On your journey, you will find forgotten stashes of loot in varying quantities. Monsters still protect the most valuable treasures in the dungeon.
</p><p>
Your reward is determined by the roll of a die. If you roll four or below, you are simply rewarded with gold. If you roll a five or above, you are rewarded a random treasure from the list below. In either case, the amount of gold you receive is depends on whether you have defeated any Monster earlier in this same Area – if so, you gain 2 Gold pieces otherwise you only gain 1 Gold piece.
</p><p>
Possible rewards include:
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Armour Piece</b></td><td>Immediately gain 1 Armour.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Better Weapon</b></td><td>Immediately gain 2 XP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Fireball Spell</b>&nbsp;&nbsp;</td><td>In combat, inflict 8 damage points to a Monster.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Ice Spell</b></td><td>In combat, freeze a Monster for one turn. The Monster does not counter-attack.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Poison Spell</b></td><td>In combat, inflict 5 extra damage per turn for the remainder of the fight.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Healing Spell</b></td><td>Gain 8 HP in combat.</td></tr>
</table>
<br/>
</details>

<details>
<summary>
Trap Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_13.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_14.png" width="230" />
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_15.png" width="230" />
<br/>
<p>
Dungeon means danger, and danger sometimes means traps. Many adventurers perished not through combat, but through lack of scrutiny. You can avoid a trap if you are sufficiently skilled. This is determined by a roll of a die – if the result is less than or equal to your rank you can skip the trap. If not, you must endure one of the following traps:
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Mould</b></td><td>A terrible stench seems to have added a layer of white and blue hair on your meat. Lose 1 Food ration.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Tripwire</b></td><td>You tripped and fell hard to the ground. A Gold piece was ejected from your bag. Lose 1 Gold.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Acid Mist</b></td><td>Powerful acid falls from the ceiling and damages your equipment. Lose 1 Armour.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Spring Blades</b>&nbsp;&nbsp;</td><td>You walked on a pressure plate and jumped just in time to avoid losing your head. Lose 1 HP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Moving Walls</b></td><td>Moving walls were about to crush you, but you sacrificed your sword to save yourself. Lose 1 XP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Pit</b></td><td>You fell into a hole and landed a Level below. You broke a bone. Lose 2 HP and drop a level in the maze.</td></tr>
</table>
<br/>
</details>

<details>
<summary>
Event Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_16.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_17.png" width="230" />
<br/>
<p>
Like the Trap Card (above), your fate will be tested by your skill level. Roll a number greater than your rank, and you will be awarded with something useful. Occasionally you will be made to fight an extra monster - sometimes when you least expect it.
</p>
<img src="images/arduboy/minirogue/arduboy_minirogue_18.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_19.png" width="230" />
<br/>
<p>
Dungeon means danger, and danger sometimes means traps. Many adventurers perished not through combat, but through lack of scrutiny. You can avoid a trap if you are sufficiently skilled. This is determined by a roll of a die – if the result is less than or equal to your rank you can skip the trap. If not, you must endure one of the following traps:
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Found Ration</b></td><td>You don’t know what this meat is, and you don’t care. Gain 1 Food.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Found&nbsp;Health&nbsp;Potion</b>&nbsp;&nbsp;</td><td>A Monster’s favourite drink. Might as well take a sip too. Gain 2 HP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Found Loot</b></td><td>You have found a coin hidden in a crack between two stones. Gain 2 Gold.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Found Whetstone</b></td><td>You have found a Monster’s blade sharpening tools. Gain 2 XP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Found Armour</b></td><td>A piece of armour found on a Monster’s carcass. Gain 1 Armour.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td><b>Monster Fight! </b></td><td>The monster will inflict damage to the value of the current Level x 2. You will receive 2 XP if you defeat it.</td></tr>
</table>
<br/>
</details>


<details>
<summary>
Resting Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_20.png" width="230" />
<br/>
<p>
Every man needs respite, for death could come anytime soon. When resting, you may choose only one of the available options by scrolling the highlight and pressing the <b>A</b> button to select.
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Reinforce your weapon. Gain 1 XP.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Search for Ration. Gain 1 Food.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Take the time to Heal. Gain 2 HP.</td></tr>
</table>
<br/>
</details>

<details>
<summary>
Merchant Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_21.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_22.png" width="230" />
<br/>
<p>
Some unsettling beings that call themselves merchants can be seen wandering in the dungeon. Surely a peculiar place for them to be doing business…
</p><p>
When you encounter the Merchant card, you may spend any number of Gold pieces to purchase items that will improve your Armour, Food, HP as well as Spells. You may buy or sell any number of items on your turn, as long as you have the money. It is never mandatory; you may skip the Merchant card if needed by pressing the <b>B Button</b>.
</p><p>
Scroll through the available choices using the <b>Up</b> and <b>Down Buttons</b>. Commit to a transaction by pressing the <b>A Button</b>. Toggle between buying and selling by pressing the <b>Left</b> and <b>Right Buttons</b>. When complete, press the <b>B Button</b> to return to the dungeon.
</p>
<table>
<tr><td><b>Item</b></td><td><b>Buy Price&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Sell Price&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Effect</b></td></tr>
<tr><td>Ration</td><td>1 Gold</td><td>-</td><td>Gain 1 Food.</td></tr>
<tr><td>Health Potion</td><td>1 Gold</td><td>-</td><td>Gain 1 HP.</td></tr>
<tr><td>Big Health Potion&nbsp;&nbsp;&nbsp;&nbsp;</td><td>3 Gold</td><td>-</td><td>Gain 4 HP.</td></tr>
<tr><td>Armour Piece</td><td>6 Gold</td><td>3 Gold</td><td>Gain 1 Armour.</td></tr>
<tr><td>Any 1 Spell</td><td>8 Gold</td><td>4 Gold</td><td>Gain any 1 Spell.</td></tr>
</table>
<br/>
</details>


<details>
<summary>
Monster Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_23.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_24.png" width="230" />
<br/>
<p>
You have encountered a Monster and must defeat him in order to progress. The monsters HP increases in line with your own level and is calculated by adding a dice roll to the level value. If you are on level 2, the monster could have an HP in the range of 3 to 8 (ie. level 2 plus a dice roll of 1 – 6). The damage a monster inflicts and the reward you will receive if you defeat it are also dependent on your level and are detailed in the card below:
</p><p>
You attack first by rolling a dice. The dice score indicates the amount of damage you will inflict on the monster, however …
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>If you roll a 1, you will inflict no damage.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>If you roll a 6, you may re-roll the dice and combine the newly rolled value and the original 6 together. Rolling a dice again is risky – if you happen to roll a 1 you have lost everything. To re-roll a dice, highlight it by scrolling left or right and press the <b>A button</b>.</td></tr>
</table>
<p>
As the game progresses, your XP will increase and your rank will increase as detailed in the section <b>Rank and XP</b>. In addition to the rank increase, the number of dice you possess will also increase making combat against stronger foes possible.
</p><p>
Once you have finished rolling, select the ‘Arrow’ and press <b>A Button</b> to apply the damage, if any, to the monster.
</p><p>
If you have collected any wands, you may cast a spell now. The various wands will be displayed along with your current inventory holdings. To apply a spell, highlight the appropriate wand and press the <b>A Button</b> to invoke it. You do not have to use a wand and you may highlight the arrow instead and press the <b>A button</b> to continue.
</p><p>
The monster will now attack. The damage inflicted is shown in the top left hand corner of the screen. If you are lucky enough to have armour, then the damage value is reduced by the amount of armour you have.
</p><p>
Play continues until you or the monster is dead. If you are victorious then you will be rewarded with gold and XP before returning to the dungeon.
</p>
<table>
<tr><td><b>Level</b></td><td><b>HP&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Reward</b></td></tr>
<tr><td>1 Undead Soldier</td><td>2</td><td>1 XP</td></tr>
<tr><td>2 Skeleton</td><td>2</td><td>1 XP</td></tr>
<tr><td>3 Undead Knight</td><td>6</td><td>2 XP</td></tr>
<tr><td>4 Serpent Knight</td><td>8</td><td>2 XP</td></tr>
<tr><td>5 OG’s Sanctum Guard</td><td>10</td><td>3 XP</td></tr>
</table>
<br/>
</details>


<details>
<summary>
Boss Monster Card
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_25.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/minirogue/arduboy_minirogue_26.png" width="230" />
<br/>
<p>
These fallen titans were once great Lords. Only cats and hags know their original identities, for their names have been forsaken.
</p><p>
The Boss Monster’s HP and damage inflicted are detailed in the card below. In addition to these perks, you will receive a random treasure (see <b>Treasure Card</b> above) as well.
</p>
<table>
<tr><td><b>Level</b></td><td><b>HP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Damage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td><b>Reward</b></td></tr>
<tr><td>1 Undead Giant</td><td>10</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3</td><td>2 Gold + 2 XP + Item</td></tr>
<tr><td>2 Skeleton Lord</td><td>15</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5</td><td>2 Gold + 3 XP + Item</td></tr>
<tr><td>3 Undead Lord</td><td>20</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7</td><td>3 Gold + 4 XP + Item</td></tr>
<tr><td>4 Serpent Demon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>25</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9</td><td>3 Gold + 5 XP + Item</td></tr>
<tr><td>5 OG’s Remains</td><td>30</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12</td><td>Og’s Blood</td></tr>
</table>
<p>
Game play is identical to the Monster Card described above.
</p>
</details>

<details>
<summary>
Scoring
</summary>
<br/>
<img src="images/arduboy/minirogue/arduboy_minirogue_27.png" width="230" />
<br/>
<p>
You are rewarded points for every area you enter, boss monster’s you kill and the collection of goodies along the way. To reset the scores, hold down the Up Button and Down Buttons simultaneously for about 5 seconds while on this screen.
</p>
</details>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/MiniRogue.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
