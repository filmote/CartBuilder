<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=19;  $small=true; include("include/arduboy_nav.php"); ?>




<h1>Logix</h1>
<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/filmote/Logix" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/Logix.V0.94.hex" target="_new">Hex File</a><br>
</p>
<p>
Logix is an educational game that teaches the basic logic gates used in digital electronics. Once you have completed some introductory puzzles that feature a single gate each, you can move on to harder puzzles that test your learning!
</p>

<img src="images/arduboy/logix/arduboy_logix_00.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/logix/arduboy_logix_01.png" width="230" />
<br/>
<br/>
<img src="images/arduboy/logix/arduboy_logix_02.gif" width="256" />
<br />
<br />

<details>
<summary>
What are Logic Gates?
</summary>
<p>
A logic gate is an elementary building block of a digital circuit. Most logic gates have two inputs and one output. At any given moment, every terminal is in one of the two binary conditions low (0) or high (1), represented by different voltage levels. The logic state of a terminal can, and generally does, change often, as the circuit processes data. In most logic gates, the low state is approximately zero volts (0 V), while the high state is approximately five volts positive (+5 V).
</p><p>
There are seven basic logic gates - AND, OR, XOR, NOT, NAND, NOR, and XNOR. This game also utilises two additional gates, the Negative-AND and the Negative-OR which are also known as NEGAND and NEGOR respectively.
<p>

<h3>AND</h3>
</p><p>
The AND gate is so named because, if 0 is called “false” and 1 is called “true,” the gate acts in the same way as the logical “and” operator. The following illustration and table show the circuit symbol and logic combinations for an AND gate. (In the symbol, the input terminals are at left and the output terminal is at right.) The output is “true” when both inputs are “true.” Otherwise, the output is “false.”
</p>
<img src="images/arduboy/logix/arduboy_logix_03.png" width="50%" />

<h3>OR</h3>
</p><p>
The OR gate gets its name from the fact that it behaves after the fashion of the logical inclusive “or.” The output is “true” if either or both of the inputs are “true.” If both inputs are “false,” then the output is “false.”
</p>
<img src="images/arduboy/logix/arduboy_logix_04.jpg" width="50%" />

<h3>XOR</h3>
</p><p>
The XOR (exclusive-OR) gate acts in the same way as the logical “either / or.” The output is “true” if either, but not both, of the inputs are “true.” The output is “false” if both inputs are “false” or if both inputs are “true.” Another way of looking at this circuit is to observe that the output is 1 if the inputs are different, but 0 if the inputs are the same.
</p>
<img src="images/arduboy/logix/arduboy_logix_05.png" width="50%" />

<h3>NOT</h3>
</p><p>
A logical inverter, sometimes called a NOT gate to differentiate it from other types of electronic inverter devices, has only one input. It reverses the logic state.
</p>
<img src="images/arduboy/logix/arduboy_logix_06.jpg" width="50%" />

<h3>NAND</h3>
</p><p>
The NAND gate operates as an AND gate followed by a NOT gate. It acts in the manner of the logical operation “and” followed by negation. The output is “false” if both inputs are “true.” Otherwise, the output is “true.”
</p>
<img src="images/arduboy/logix/arduboy_logix_07.jpg" width="50%" />

<h3>NOR</h3>
</p><p>
The NOR gate is a combination OR gate followed by an inverter. Its output is “true” if both inputs are “false.” Otherwise, the output is “false.”
</p>
<img src="images/arduboy/logix/arduboy_logix_08.jpg" width="50%" />

<h3>XNOR</h3>
</p><p>
The XNOR (exclusive-NOR) gate is a combination XOR gate followed by an inverter. Its output is “true” if the inputs are the same, and"false" if the inputs are different.
</p>
<img src="images/arduboy/logix/arduboy_logix_09.jpg" width="50%" />

</details>


<details>
<summary>
Aim of the Game
</summary>
<p>
Logix presents the player with a series of puzzles that test your knowledge of the basic logic gates. By wiring switches on the left of the playing field to various logic gates you can control the LEDs on the right hand side of the screen. By alternating the switch positions between on and off, the LEDs will turn on and off based on the logic you have implemented.
</p></p>
In each puzzle, you will be presented a chart like that shown below which details the outcomes that you must achieve to complete the puzzle.
</p>
<img src="images/arduboy/logix/arduboy_logix_10.png" width="256" />
</p></p>
Looking at the first column, the three rows indicate that the puzzle has both three input switches and three output LEDs. The ‘S’ (switch) column indicates that the position of the switches and the ‘L’ column indicates the expected outcome of the LEDs.
</p></p>
When starting the game, the switches and LEDs will already be placed on the puzzle area for you. Sometimes a gate or two may also be placed in the puzzle area and this must be incorporated in the solution.
</p>
<img src="images/arduboy/logix/arduboy_logix_11.png" width="256" />
</p></p>
The completed puzzle is shown below. Note that the switches are all in the down / low / off position and the top two LEDs are on and the bottom one off. This corresponds to the first column of the solution outcome.
</p>
<img src="images/arduboy/logix/arduboy_logix_12.png" width="256" />
</p></p>
Changing the top and bottom switches to the up / high / on position turns all three LEDs off. This matches the second column of the solution outcome.
</p>
<img src="images/arduboy/logix/arduboy_logix_13.png" width="256" />
</p></p>
Finally, moving all switches to the up / high / on position turns the top two LEDs off and the lowest LED on. As you may have guessed, this matches the third column in the solution outcome and completes the puzzle.
</p>
<img src="images/arduboy/logix/arduboy_logix_14.png" width="256" />
</p>
</details>


<details>
<summary>
A Walkthrough
</summary>
<p>
Take the example puzzle below which involves one switch and one LED. When the switch is off, the LED should be on and vice-versa. This is an example of a simple NOT circuit and makes a great starting point to learn the game.
</p>
<img src="images/arduboy/logix/arduboy_logix_15.png" width="256" />
</p>

<details>
<summary>
Highlighting a Square
</summary>
<p>
The selected element or gate can be changed by scrolling using the <b>Up</b>, <b>Down</b>, <b>Left</b> and <b>Right buttons</b>. You can navigate to blank spots within the puzzle and add logic gates. This is shown later on.
</p>
</details>

<details>
<summary>
Wiring Elements Together
</summary>
<p>
Most elements of the game have two input on the left-hand side of the element and a single out on the right. The logical NOT gate and the LED are the exceptions. The inputs and output of the selected element can be wired by pressing and holding the <b>A button</b>. An indicator on the upper right-hand side of the screen will indicate which of the inputs or output you are about to wire.
</p><p>
Releasing and repressing the <b>A button</b> will toggle between the three modes shown below.
</p>
<p>
<table>
<tr><td><img src="images/arduboy/logix/arduboy_logix_16.png" width="18px" />&nbsp;&nbsp;&nbsp;&nbsp;</td><td>The first mode will allow you to wire from the first input of the element to another element.</td></tr>
<tr><td><img src="images/arduboy/logix/arduboy_logix_17.png" width="18px" /></td><td>The second mode will allow you to wire from the second input of an element to another element.</td></tr>
<tr><td><img src="images/arduboy/logix/arduboy_logix_18.png" width="18px" /></td><td>A final release and press of the <b>A button</b> will reveal the output</td></tr>
</table>
</p><p>
Back to our example. When we started the game, it showed two elements – a switch on the left-hand side and an LED on the right. Running across the top and down the left-hand side of the screen is a positive rail – running across the bottom and inset slightly from the left-hand side is a negative rail.
</p><p>
Typically, a switch would be wired so that when the switch is in the high position it would be connected to the positive rail. Likewise, when the switch is in the lower position, it would be connected to the negative rail. Let’s walk through doing this.
</p><p>
After highlighting the switch, press the <b>A button</b> until the top input connector is highlighted. The top input is the one that is connected to the output when the switch is in the ‘up’ position.
</p>
<img src="images/arduboy/logix/arduboy_logix_19.png" width="256" />
</p><p>
While continuing to press the <b>A button</b>, press the <b>Left button</b> to extend a ‘wire’ from the switch to the negative rail. Press the <b>Left button</b> a second time to continue the wire to the positive rail. As the wire is being ‘laid’ it will appear as a dotted line and will flash.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_20.png" width="256" />
</p><p>
Once the wire is correctly laid and is connecting the upper input of the switch to the positive rail, release the <b>A button</b>. The wire will now be made permanent and will be represented as solid line.
</p><p>
Repeat the process to connect the lower switch input to the negative rail.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_21.png" width="256" />
</p>
</details>

<details>
<summary>
Adding new Elements
</summary>
<p>
The board allows you to add up to six logic gates (in two columns of three) into each puzzle. To add an element, highlight a vacant cell and press and hold the <b>B button</b>. An up / down indicator will be shown in the upper right-hand side of the screen.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_22.png" width="256" />
</p><p>
While continuing to hold the <b>B button</b>, press the <b>Up</b> and <b>Down buttons</b> to scroll through the available logic gate selections. In addition to the logic gates, there is a blank entry that indicates that no gate will be used. The picture below shows a AND gate selected.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_23.png" width="256" />
</p><p>
Clicking the Up button once more changes the AND into a NAND gate.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_24.png" width="256" />
</p><p>
To complete the first puzzle, continue to hold the <b>B button</b> and scroll up and down until you have found the NOT gate. Release the <b>B button</b> to confirm the selection.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_25.png" width="256" />
</p><p>
Tip You can change the chosen gate type by selecting an existing gate using the technique above. Changing between gates typically will not affect any wiring you have in already laid except when you swap between a gate with two inputs to the single input NOT gate or the blank.
</p><p>
Once the NOT gate is selected, the remainder of the wiring can be laid. Wire the output of the NOT gate to the input of the LED.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_26.png" width="256" />
</p>
</details>


<details>
<summary>
Checking your results.
</summary>
<p>
After completing the wiring, we can test the results against the initial puzzle outcomes. If you recall, the original criteria was simple – when the switch is down or off, the LED is on. When the switch is up (or on) the LED is off. The original screen is shown below to remind you.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_27.png" width="256" />
</p><p>
To change the switch from the lower to upper position, highlight it and press and hold the <b>B button</b> as if you were about to change the gate type. Pressing the </b>Up</b> and </b>Down button</b> will change the switch from the on and off / up and down positions respectively.
<br />
The image below shows the switch in the on position. When in this position, the output of the switch is high but it is inverted by the NOT gate to be low – hence the LED is off.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_28.png" width="256" />
</p><p>
Pressing and holding the <b>B button</b> followed by the down button will change the switch to the down position and the output off the switch is low. This signal is inverted by the NOT gate and it in turn lights the LED as shown below.
</p><p>
Our tests have shown that when the switch is on, the LED is off. Conversely, when the switch is off, the LED is on. It looks like we have proven the puzzle!
</p><p>
<img src="images/arduboy/logix/arduboy_logix_29.png" width="256" />
</p>
</details>

<details>
<summary>
Completing the Puzzle
</summary>
<p>
Now that we appear to have completed the puzzle, we can check our results by navigating to the Menu option in the lower right-hand side of the screen.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_30.png" width="256" />
</p><p>
Pressing the <b>A button</b> will reveal the menu. Scroll down to the ‘Test’ menu and press the <b>A button</b> a second time.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_31.png" width="256" />
</p><p>
Each of the puzzle outcomes will be tested against your circuit. Feedback will be provided via the Arduboy’s LED with green meaning a correct solution and red incorrect, as well as visually with a smiley or frown face.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_32.png" width="256" />
</p><p>
The Game menu also has some other useful options. The ‘Info’ option will repeat the pizzle outcomes that were shown at the beginning of the game.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_33.png" width="256" />
</p><p>
The ‘Help’ option displays the various logic gates used in the puzzles with a summary of the input states for the two inputs (A and B) and the resultant output (0). You can scroll between the gates by pressing the <b>Up</b> and <b>Down buttons</b>.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_34.png" width="256" />
</p><p>
The ‘Back’ option will take you back to the game. The ‘Quit’ option will return you to the title screen.
</p>
</details>

<details>
<summary>
Proceeding to the Next Puzzle
</summary>
<p>
Once you have successfully completed the current puzzle, return to the game play. You will be prompted to continue to the next level if you are ready. Selecting ‘Y’ to continue of ‘N’ to remain on the current level and review your handiwork. When you do decide to move on, navigate back to the ‘Test’ menu and re-evaluate your solution.
</p><p>
<img src="images/arduboy/logix/arduboy_logix_35.png" width="256" />
</p>
</details>


<details>
<summary>
Other Hints and Tips
</summary>
<p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Levels are saved in the EEPROM. You can reset the saved levels by pressing and holding the <B>Up</b> and <b>Down buttons</b> simultaneously for 3 or 4 seconds whilst on the title screen.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can remove a wire by laying the same wire over the top of the existing one. When you complete the second wire, the first will simply vanish!</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can wire an output to many inputs, as shown below.<br><img src="images/arduboy/logix/arduboy_logix_36.png" width="256" /><br></td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>You can wire the inputs of logic gates to either the positive or negative rails as shown below.<br><img src="images/arduboy/logix/arduboy_logix_37.png" width="256" /><br></td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Elements are wired from left to right – you cannot have a wire from an output loop back to the input of an element that is to the left of the current element or in the same column.<br><img src="images/arduboy/logix/arduboy_logix_38.png" width="256" /><br></td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Logic gates that are placed as part of the puzzle cannot be changed. When pressing the B button, the Up / Down indicator in the top, right-hand side of the screen is replaced with a padlock.<br><img src="images/arduboy/logix/arduboy_logix_39.png" width="256" /><br></td</tr>
</table>
</details>



</details>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Logix.V0.94.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
