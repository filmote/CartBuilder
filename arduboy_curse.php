<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=29;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/curse/arduboy_curse_00.png" width="480" />
<br/>
<br/>
<h1>The Curse of AstaroK</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/The-Curse-Of-AstaroK" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/Curse.V1.0.hex" target="_new">Hex File</a><br>
</p>
<p>
A 'push your luck' Dungeon Crawl game - save your town from the curse of AztaroK.
</p>

<img src="images/arduboy/curse/arduboy_curse_02.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/curse/arduboy_curse_14.png" width="230" />
<br/>
<img src="images/arduboy/curse/arduboy_curse_22.gif" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/curse/arduboy_curse_08.png" width="230" />
<br/>
<br/>

<details>
<summary>
Background
</summary>
<p>
The evil Astarok has cast a nasty curse on the folk of Griford and turned them into pumpkins! The town’s people have asked you to battle the AstaroK and his evil friends in their hideout - an old castle on the edge of town.
</p><p>
You need to fight your way in the dark castle of the evil AstaroK, by casting runes that will release different powers depending on the combinations cast. You start with a limited arsenal of skills but will be able to acquire more advanced skills with the SP (Skill Points) that you gain by winning battles in the dark castle. You may also win gold too if you are lucky! When you win a battle, you can continue further into the dungeon or head back to town to buy more supplies with your winnings.
</p><p>
Be careful, if you are defeated in a battle you will be warp back to town but with half of the SP that you gained during the game. You will also forfeit a helmet or potion as punishment.
</p>
</details>

<details>
<summary>
The Town
</summary>
<p>
<img src="images/arduboy/curse/arduboy_curse_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/curse/arduboy_curse_02.png" width="230" />
<br/>
<p>
As you wander around the town of Griford, you can talk to people to gain information or enter shops to buy supplies used when battling the monster in the castle.
</p>
</details>

<details>
<summary>
Inventory and Statistics
</summary>
<p>
The Inventory and Statistics panel shows vital information regarding your inventory and health and any attacking enemy details.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_03.png" width="230" /> Fig 1: Inventory</td><td><img src="images/arduboy/curse/arduboy_curse_04.png" width="230" /> Fig 2: Health and Statistics</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_05.png" width="230" /> Fig 3: Purchased Rune Combinations</td><td><img src="images/arduboy/curse/arduboy_curse_06.png" width="230" /> Fig 4: Enemy Statistics</td></tr>
</table>
</p>
<p>
The Inventory and Statistics panel can be accessed from any screen simply by pressing the <b>B button</b>. Once exposed, you can navigate through the panels using the <b>Left</b> and <b>Right buttons</b>.
</p><p>
The ‘Inventory’ pane will allow you to scroll through purchased items and selecting them for use using the <b>A button</b>. The current helmet being worn is denoted with an ‘E’ symbol on the right of the dialogue. Using a potion will deplete the number adjacent to it until all of that type of potion has been consumed at which point the item itself will be removed from the dialogue.
</p>
</details>


<details>
<summary>
Saving and Restoring a Game
</summary>
<p>
Game progress can be saved and restored.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_07.png" width="230" /> Fig 1: The Excalibur Sword</td><td><img src="images/arduboy/curse/arduboy_curse_08.png" width="230" /> Fig 2: Save and Restore Menu</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_09.png" width="230" /> Fig 3: Prompt to Overwrite Existing Game</td><td><img src="images/arduboy/curse/arduboy_curse_10.png" width="230" /> Fig 4: Confirmation of Save</td></tr>
</table>
</p>
The Save and Restore menu is revealed by pressing the <b>A button</b> when standing in front of Excalibur (Fig 1) which is to the left of the player’s starting position in the game. The Save and Restore dialogue allows you to save a game in progress, start a new game or restore a game previously saved (Fig 2). The last option to restore a game will only be visible if a game has been previously saved. When saving a game, you will be prompted to confirm the overwrite of any existing, saved game (Fig 3).
</p>
</details>


<details>
<summary>
Item Shop
</summary>
<p>
The item shop sells helmets and potions to be used in battle.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_11.png" width="230" /> Fig 1: The Item Shop</td><td><img src="images/arduboy/curse/arduboy_curse_12.png" width="230" /> Fig 2: Helmets and Potions for Sale</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_13.png" width="230" /> Fig 3: Buying a helmet or item</td><td><img src="images/arduboy/curse/arduboy_curse_14.png" width="230" /> Fig 4: Enough money?</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_15.png" width="230" /> Fig 5: Items in your Inventory</td><td></td></tr>
</table>
</p>
<p>
The Item Shop is entered by pressing the <b>Up button</b> while standing in front of the door (Fig 1). Once inside, you can scroll up and down to look at the goods for sale (Fig 2) and selecting items to purchase by pressing the 
<b>A button</b> (Fig 3). Pressing <b>A</b> a second time will confirm the purchase or pressing B will cancel the transaction. If you do not have enough gold to purchase the item a message will remind you of your bad luck (Fig 4). Purchased items can be viewed in the inventory panel (Fig 5).
</p>
<p>
The item details are listed below:
</p>
<p>
<table>
<tr><td width="25%"><b>Item</b></td><td width="10%"><b>Cost</b></td><td width="65%"><b>Description</b></td></tr>
<tr><td>Crystal Helmet</td><td>65 GP</td><td>&bull;&nbsp;&nbsp;10 additional DEF points<br/>&bull;&nbsp;&nbsp;10 additional attack points</td></tr>
<tr><td>High Helmet</td><td>40 GP</td><td>&bull;&nbsp;&nbsp;5 additional DEF points<br/>&bull;&nbsp;&nbsp;5 additional attack points</td></tr>
<tr><td>Round Helmet</td><td>40 GP</td><td>&bull;&nbsp;&nbsp;5 additional DEF points</td></tr>
<tr><td>Fire Potion </td><td>20 GP</td><td>&bull;&nbsp;&nbsp;When used, the Fire Potion inflicts an additional 10 points of damage on top of your next cast. If attacking a Gelatinous Cube, the Fire Potion has double the effect (ie 20 points of damage)</td></tr>
<tr><td>Health Potion</td><td>15 GP</td><td>&bull;&nbsp;&nbsp;20 HP points added immediately</td></tr>
<tr><td>Speed Potion</td><td>20 GP</td><td>&bull;&nbsp;&nbsp;When used, the Speed Potion will allow you to cast the runes an additional time. Multiple speed potions can be consumed to increase the number of recasts from 3 to 4 or more!</td></tr>
</table>
</p>
<p>
<b>Notes:</b>
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can buy one of each helmet type. To wear a hat, access you inventory items and select the helmet using the Up / Down buttons and the A button.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can purchase up to 6 of each potion type. You can use these items at any time while in the town of Griford or as part of your turn in a fight.</td></tr>
</table>
</p>
</details>

<details>
<summary>
Rune Shop
</summary>
<p>
Purchasing a rune with Skill Points will unlock that combination and make it available within a fight. If you cast the combination, the special powers are released.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_16.png" width="230" /> Fig 1: The Rune Shop</td><td><img src="images/arduboy/curse/arduboy_curse_17.png" width="230" /> Fig 2: Fire Blaze Rune Combination</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_18.png" width="230" /> Fig 3: Healing Wind Rune Combination</td><td><img src="images/arduboy/curse/arduboy_curse_19.png" width="230" /> Fig 4: Rising Star Rune Combination</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_20.png" width="230" /> Fig 5: Items in your Inventory</td><td><img src="images/arduboy/curse/arduboy_curse_21.png" width="230" /> Fig 6: Runes in your Inventory</td></tr>
</table>
</p>
The Rune Shop is entered by pressing the <b>Up button</b> while standing in front of the door (Fig 1). As with the Item Shop, runes can be reviewed and purchased using the <b>Up</b> / <b>Down buttons</b> and the <b>A button</b>. 
Each rune combination shows the combination’s name, the damage it inflicts and the purchase price (in SP on the right) (Fig 2 - 5). The rune combinations themselves are shown with special characters ≠ and ? indicating that the runes should not equal each other or the rune value can be any value, respectively. Purchased runes can be views in your inventory (Fig 6).
</p>
<p>
The rune combination and details are listed below:
<table>
<tr><td width="25%"><b>Item</b></td><td width="10%"><b>Cost</b></td><td width="65%"><b>Description</b></td></tr>
<tr><td>Fire Blaze</td><td>30 GP</td><td>&bull;&nbsp;&nbsp;20 damage points applied immediately<br/>&bull;&nbsp;&nbsp;5 additional damage points applied to the next two casts for Skeletons, Werewolves and Astarok
&bull;&nbsp;&nbsp;10 additional damage points applied to the next two casts for Gelatinous Cubes.
</td></tr>
<tr><td>Healing Wind</td><td>25 GP</td><td>&bull;&nbsp;&nbsp;20 HP points applied immediately</td></tr>
<tr><td>Rising Star</td><td>35 GP</td><td>&bull;&nbsp;&nbsp;35 damage points applied immediately</td></tr>
<tr><td>Venom Mist</td><td>35 GP</td><td>&bull;&nbsp;&nbsp;20 damage points applied immediately for Skeletons, Werewolves, Gelatinous Cubes and Astarok<br/>&bull;&nbsp;&nbsp;
2 additional damage points applied to the next two casts for Gelatinous Cubes, Small Werewolves and Astarok.<br/>
&bull;&nbsp;&nbsp;4 additional damage points that are applied to the next two casts for the Large Werewolf only.<br/>
&bull;&nbsp;&nbsp;The Venom Mist does not affect the Skeleton.
</td></tr>
</table>
<p>
Notes:
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>For rune combinations that apply damage on subsequent casts, the additional damage points are forfeited if you do not cast a scoring sequence in the next cast(s).</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can only purchase a rune combination once. Its power remains with you when used and even if you die.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Rune combinations do not need to be cast in the exact sequence listed however must contain the exact tiles. In the Venom Mist, all tiles must be different. In the Fire Blaze combination, you must throw the two pairs shown - the remaining rune can be another of the same runes (thus making a Full House) or a different rune altogether.</td></tr>
</table>
</p>
</details>

<details>
<summary>
Battling Enemies
</summary>
<p>
You will encounter different enemies in the dungeons. The various potions may in ineffective on some enemies and may have an extended effect on others. You will need to determine what works best to maximise the damage you can inflict.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_22.gif" width="230" /> Fig 1: Cast a rune combination</td><td><img src="images/arduboy/curse/arduboy_curse_23.gif" width="230" /> Fig 2: Inflict damage on enemy</td></tr>
<tr><td><img src="images/arduboy/curse/arduboy_curse_24.gif" width="230" /> Fig 3: Additional damage from previous cast</td><td><img src="images/arduboy/curse/arduboy_curse_25.gif" width="230" /> Fig 4: The enemy inflicts damage</td></tr>
</table>
</p>
<p>
You may enter the dungeon at any time, with or without supplies you may have bought from the store. Upon entering the castle, you will encounter an enemy with minimal DEF and HP but as you progress further down into the labyrinth of dungeons the enemies will become stronger.
</p><p>
An enemy may attack you as you enter a dungeon before you have a chance to attack first (Fig 4). When it is your turn to attack you cast the runes by pressing the <b>A button</b>. Once they have rolled to a stop you can choose to keep some and recast the remainder by jumping and touching those you wish to recast. Once all of the runes to recast have been selected, press the <b>A</b> button to recast the selected rune. You can typically recast up to 3 times however if you have consumed a ‘Speed Potion’ you can increase this for the current attack.
</p><p>
If you cast a rune combination that matches one of the runes sets purchased from the town or you cast a combination from the ‘standard’ set below, you may skip a recast by not selecting any runes to recast and simply pressing the <b>A button</b>.
</p><p>
If a scoring rune combination is cast, the damage is inflicted on the enemy immediately (Fig 1 and 2). This may be followed by a secondary damage caused by a Fire Blaze or Venom Mist rune as these have a residual effect that lasts over two subsequent attacks (Fig 3).
</p><p>
<table>
<tr><td><b>Combination</b></td><td><b>Attack Points Inflicted</b></td></tr>
<tr><td>Two Pair</td><td>10</td></tr>
<tr><td>Three of a Kind</td><td>20</td></tr>
<tr><td>Full House</td><td>25</td></tr>
<tr><td>Four of a Kind</td><td>30</td></tr>
<tr><td>Five of a Kind</td><td>45</td></tr>
</table>
</p>
<p>
At any time when it is your turn to attack, you can access you inventory and put on a helmet or drink a potion.
</p>
</details>

<details>
<summary>
Rewards
</summary>
<p>
After successfully defeating an enemy your will be rewarded immediately with some SP - the amount is random and will typically increase as you delve deeper into the dungeons below the castle. Occasionally, you will be rewarded with GP while still in the dungeon and, again, the amount is both random and will increase as you fight stronger and stronger enemies.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/curse/arduboy_curse_26.png" width="230" /> Fig 1: HP Hidden in Town</td><td><img src="images/arduboy/curse/arduboy_curse_27.png" width="230" /> Fig 2: Random HP Amount Gained</td></tr>
</table>
</p>
<p>                                             
You may also be rewarded randomly with some HP but these are placed in the village for you to discover. However, you must leave the dungeon to find the HP which will result in you having to re-enter the dungeons at level one and fight the same enemies again.
</p>
</details>

<details>
<summary>
Warning
</summary>
<p>
USB support has been removed from this game due to size constraints. This can make uploading a new game a little tricky. When uploading a new game, navigate to the title screen and press and hold the ‘Down’ button for a few seconds to force the Arduboy into the bootloader. If you time it correctly, the new game will overwrite the old properly. Alternatively, you can use 'flashlight mode'.
</p>
</details>


<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Curse.V1.0.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
