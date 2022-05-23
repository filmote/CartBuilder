<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=26;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/toolbox/arduboy_toolbox_00.png" width="480" />
<br/>
<br/>
<h1>Coder's Toolbox</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/CodersToolbox" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.bloggingadeadhorse.com/ppot/hex/Toolbox.hex" target="_new">Hex File</a><br>
</p>
<p>
A toolbox of tools for developing ArduboyTones compatible music and Sprites compatible images. The toolbox permits you to save the progress of your creations in EEPROM allowing you to complete your masterpieces over a number of sessions. Once complete, the output can be downloaded using a serial monitor (like that shipped with the Arduino IDE) in a format you can then paste directly into an Arduboy sketh.
</p>
<h2>Developing Music</h2>
<p>
Selecting Music from the main menu allows you to edit a new score. A score can be up to 150 notes or rests in length, with each note being up to 8 periods in length.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/toolbox/arduboy_toolbox_02.png" width="230" />
<br/>
<p>
Start by pressing the <b>A button</b> to place a note on the musical staff.
</p>
<p>
Press and hold the <b>A button</b> while pressing ..</br>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>the <b>Right button</b> to extend the duration of a note.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>the <b>Left button</b> to shorten the duration of a note.</td</tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>the <b>Up</b> or <b>Down button</b> to raise or lower the pitch of the note.</td</tr>
</table>
<p>
Once you have completed the note, press the Left or Right button to navigate between notes.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_03.png" width="230" />
<br/>
<p>
Press and hold the <b>B button</b> for three seconds to reveal the menu. You can then scroll through the options pages using the <b>Left</b> and <b>Right buttons</b>. Pressing the <b>B button</b> again will exit the menu.
</p><p>
The first menu page has options that allow you to hear your creation from either the beginning (Play from start) or from the current cursor position to the end (Play from cursor). You can save your creation using the Save to EEPROM option. Once a creation has been saved, you will be able to select the two remaining options, Load from EEPROM andClear EEPROM.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_04.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/toolbox/arduboy_toolbox_05.png" width="230" />
<br/>
<p>
The second menu page has options that allow you to change the temp of the tune and the note range. To change either of these, select the desired option using the <b>Up</b> and <b>Down buttons</b> and then pressing the A button to reveal the editor. Toggle the values using the <b>Left</b> and <b>Right buttons</b>. Once complete, press the <b>A button</b> to return to the normal menu.
</p><p>
You can output your tune in an ArduboyTones compatible format by connecting your Arduboy to a computer and monitor the Arduboy via the Serial Monitor. Choose the Export to Serial option to print the tune to the serial monitor.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_06.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/toolbox/arduboy_toolbox_07.png" width="230" />
<br/>
<p>
The third and fourth menus detail the key combinations you can use when editing a tune. Important combinations include the <b>B</b> and <b>Left buttons</b> which delete the current note and <b>B</b> and <b>Right</b> which inserts a note at the current cursor position. Pressing and holding the <b>A button</b> on a note will toggle it between an audible note 
</p>

<h2>Developing Art</h2>
<p>
Select Art from the main menu allows you to edit images. The system will allow you to edit up to 8 images, each a maximum of 16 x 16 pixels each.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_08.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/toolbox/arduboy_toolbox_09.png" width="230" />
<br/>
<p>
Use the <b>Up</b> / <b>Down</b> / <b>Left</b> / <b>Right buttons</b> to navigate around the image canvas. Press the <b>A button</b> to toggle each cell on or off. Alternatively, press and hold the <b>A button</b> and then navigate to draw a continuous line.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_10.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/toolbox/arduboy_toolbox_11.png" width="230" />
<br/>
<p>
Press and hold the <b>B button</b> for three seconds to reveal the menu. You can then scroll through the options pages using the Left and Right buttons. Pressing the <b>B button</b> again will exit the menu.
</p><p>
The first menu page has options that allow you to change the width and height of the image. To change either of these, select the desired option using the <b>Up</b> and <b>Down buttons</b> and then pressing the <b>A button</b> to reveal the editor. Toggle the values using the <b>Left</b> and <b>Right buttons</b>. Once complete, press the <b>A button</b> to return to the normal menu.
</p><p>
The <i>Copy</i> an image an image reveals a similar editor that allows you to specify which of the 8 slots to copy the current image to. By default, it will select the next image in the sequence. Pressing the <b>A button</b> will perform the copy whereas pressing the <b>B button</b> will cancel the action.
</p>
<img src="images/arduboy/toolbox/arduboy_toolbox_12.png" width="230" />
<br/>
<p>
The second menu page has options that allow you to save your image creations using the Save to EEPROM option. Once a creation has been saved, you will be able to select the two remaining options, Load from EEPROM andClear EEPROM. All eight images are saved together.
</p><p>
You can output your tune in an Sprites compatible format by connecting your Arduboy to a computer and monitor the Arduboy via the Serial Monitor. Choose the Export to Serial option to print the images to the serial monitor - only those images with at least one pixel set will be exported.
</p><p>
<img src="images/arduboy/toolbox/arduboy_toolbox_13.png" width="230" />
<br/>

The third menu page details the key combinations you can use when editing an image. Important combinations include the <b>B</b> and <b>Up</b> / <b>Down buttons</b> that allow you to cycle through the eight images.
<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Toolbox.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
