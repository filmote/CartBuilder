<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=1;  $small=true; include("include/arduboy_nav.php"); ?>


<img src="images/arduboy/cyberhack/arduboy_cyberhack_00.png" width="480" />
<br />
<br />
<h1>CyberHack</h1>
<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Cyberhack" target="_new">GitHub Source</a><br/>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Cyberhack/releases/download/V1.0/Cyberhack_V10.hex" target="_new">Hex File</a>
</p>
<p>
The corrupted Corpo has to be stopped and your hacking skills will be invaluable.
</p>
<p>
Hack your way through some of their perimeter servers to earn enough money to buy a CyberDeck which, in turn, will allow you to hack more important servers for even more money.  With each CyberDeck purchase, you will progress to the servers holding the inner secrets of the corporation.  Complete all available hacks to take down the corporation and make as much money as possible – after all, your actions are not entirely altruistic!
</p>
<p>
Travel from the safety of your home to the business district to buy CyberDecks as you can afford them or when you have completed all available hacks that your current CyberDeck allows you to access.  There are three CyberDecks available and upgrading from one to the next increases the size of the hacking grid, the number of available hacks and the buffer size allowing you to earn more money from a single hack.
</p>
<p>
But be careful when travelling between locations as you may be spotted by the corporation’s guards which will increase your threat level.  Use obstacles in the street to hide behind or hack a building door to reveal a hiding place.  Lamp posts can also be hacked which will distract the guards allowing you to run past them.
</p>
<p>
You can visit the slums to pay for your threat level to be lowered.  However, as each CyberDeck only exposes a certain number of hacks, you will need to ensure that you raise the maximum amount of money possible per hack and minimise spending that money to lower your threat level.  If you do not earn enough money or spend too much, you may not be able to afford to upgrade your CyberDeck and you will have failed your mission. 
</p>
<br/>
<h2>Instructions</h2>
<p>
Expand the various topics below to learn how to play the game.
</p>
<details>
<summary>Basic Movement</summary>

<p>
You can travel between the Commercial District, the Slums District and your Safe House using the directions on the gamepad.  Press the <b>A button</b> to reveal the menu of options available to you.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_01.png" width="256" />
</details>

<details>
<summary>How to Hack</summary>

<p>
You are a skilled netrunner and are adept at injecting malicious code into the unprotected buffers of servers. When hacking a server, you will be presented with a number of hacks that you can install.  The more hacks you install and the longer those hacks are, the more money you will earn.
</p><p>
To install a hack, enter its code into the server’s buffer via your terminal.  The buffer length will ultimately determine how many hacks you can enter and the purchase of advanced CyberDecks will increase the buffer size for you.  However, you can maximise the number of hacks installed by overlapping common codes from the one to the other.
</p><p>
Let’s play a simple example:
</p><p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_02.png" width="256" />
<br/>
 

<p>
The first thing to note is the buffer size which in this case is 6 characters wide.  
</p><p>
Looking at the hacks, you may notice that there are common strings of characters at the end of some hacks which overlap with the start of some of the others.  In the example above, these hacks can be logically rearranged as shown below.  Arranging them this way allows you enter the codes `3F E7 16 06 06` into the buffer and install all the hacks.  In this particular hack, only five of the six buffer positions are required to complete the hack completely.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_03.png" width="256" />
<br/>
 
 
<p>
However, not all hacks can be solved this easily.  In the example below, it is not possible to arrange the hacks so that all can be achieved.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_04.png" width="256" />
<br/>
 

<p>
Rearranging the top four hacks happens to provide a sequence that fits into the provided buffer however it does not use all of the available hacks. This happens some times!
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_05.png" width="256" />
<br/>
<p>
When presented with a puzzle like that above, you should look at solving as many hacks as possible.  Additional money is awarded for longer hacks so always consider those first.
</p><p>
To help you visualise the hacks, you can press the <b>B button</b> to enter a mode where you can scroll through the elements of each hack on the right-hand side of the screen and have corresponding cells highlighted on the left.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_06.png" width="256" />
<br/>
<p>
Once you have determined which hacks you are planning to complete. You can start the actual attack itself.
</p><p>
Hacks are entered by selecting an element from the highlighted row, followed by an element from the selected column, followed by an element from the selected row and so on until all hacks are complete or unable to be completed or your buffer is full.  You are also racing against the clock – your window for entering the hacks will be shut when the time runs out.
</p><p>
Let’s start entering the hacks.  In our example, we are planning to enter codes <b>3F E7 16 06 06</b> to complete all hacks.  When the hack begins, you can only scroll horizontally on the first row.  
<p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_07.png" width="256" />
<br/>
<p>
Selecting the <b>3F</b> from the top row adds it to the buffer shown at the bottom of the screen and changes the selection mode to allow column selection.  You will notice that the <b>3F</b> on the hack in the right-hand side is also highlighted – showing that this hack is in progress.  The <b>3F</b> in the top row of the grid also has a small check mark beside it to show that it has been selected previously and cannot be re-used.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_08.png" width="256" />
<br/>
<p>
Scrolling down and selecting the <b>E7</b> again adds it to the buffer.  This time the <b>E7</b> is highlighted in the hack we had previously started and at the start of a new hack – we are currently completing two separate hacks simultaneously as the characters overlap.  The selection mode has also switched back to row again.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_09.png" width="256" />
<br/>
<p>
Selecting the <b>16</b> further completes the two active hacks and starts another.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_10.png" width="256" />
<br/>
<p>
Selecting the two <b>06</b> characters in the bottom-right and bottom-left of the grid completes all of the hacks and the hack is completed!
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_11.png" width="256" />
<br/>
<p>
In more complex puzzles, some of the hacks will be marked as failed as you install other ones as there is simply not enough room to left in the buffer to accommodate them.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_12.png" width="256" />
<br/>
<p>
The time you have to complete a hack is dictated by the complexity of the puzzle and the CyberDeck you are using.  If you run out of time, only those hacks you have installed will be rewarded.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_13.png" width="256" />
<br/>

</details>

<details>
<summary>Hacking for Money</summary>
<p>
You need to make money from your hacks in order to proceed.  As mentioned earlier, longer hacks earn more money than shorter ones and you will need to balance the completion of hacks against each other.  
</p>
<p>
Hacks of 2 characters earn $3.
Hacks of 3 characters earn $8.
Hacks of 4 characters earn $15.
Hacks of 5 characters earn $30.
</p>
<p>
Furthermore, each breach attempt has a target amount - shown in the top right corner which you must achieve for the hack to be successful.  Failing a breach attempt will cause your threat level to go up.
</p>
<p>
In the example hack below, the target is $24.  The value of each hack is also listed and you can see that various combinations of individual hacks will get you to your target.  Attempting the first, third and fourth hack will earn $3 + $8 + 15 = $26 and complete a successful hack.  Completing the fifth hack alone will earn $30.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_14.png" width="256" />
<br/>
</details>

<details>
<summary>Moving between Areas</summary>
<p>
When moving between locationsyou may be spotted by the corporation’s guards which will increase your threat level. Use obstacles in the street to hide behind or hack a building door to reveal a hiding place. Lamp posts can also be hacked which will distract the guards allowing you to run past them.

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_15.png" width="256" />
<br/>

You start at the left hand side of the world and must progress to the right hand side - not a simple feat!  You can hide behind obstacles in the street by positioning yourself immediately adjacent to it and pressing the 'Down' button.  You will crouch down and will be out of view of the guards.

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_16.png" width="256" />
<br/>

**Lamps** can be hacked by pressing the 'A' button to reveal your reticle.  Move the reticle between the building doorways and lamps to select the one to hack.  Press 'A' a second time to activate the hack.

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_17.png" width="256" />
<br/>

Any guard on the screen will be stunned for a number of seconds, giving you time to slip past.

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_18.png" width="256" />
<br/>

**Building doors** can also be hacked by revealing the reticle - using the 'A' button and selecting the door. 

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_19.png" width="256" />
<br/>

Once open, you can hide in the doorway by moving to it and pressing the 'Up' button to hide. Guards in the area will simply walk past you  .. but be careful as the doors close after a while, dumping you back into the street and in plain view of the guards!

</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_20.png" width="256" />
<br/>

If you get caught in the guard's torch beam, he will become alerted to your presence and will start following you.  Your health will decrease (as indicated in the top left hand corner) and, if caught, your threat level will be increased.
</p>
<img src="images/arduboy/cyberhack/arduboy_cyberhack_21.png" width="256" />
<br/>
</details>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=https://raw.githubusercontent.com/Press-Play-On-Tape/Cyberhack/master/distributable/Cyberhack_V10.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
