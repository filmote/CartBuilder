<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=17;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/spacecab/arduboy_spacecab_00.jpg" width="480" />
<br/>
<br/>
<h1>Space Cab</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/SpaceCab/releases" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/SpaceCab/releases/download/V1.0.1/SpaceCab.hex" target="_new">Hex File</a><br>
</p>
<p>
Introducing Space Cab - a tribute to the classic Commodore 64 game Space Taxi 89.
</p><p>
Collect and deliver customers to their destination as quickly as possible to make the most money! But be careful and make sure you do not run out of fuel, land without deploying your landing gear or squash a customer.
</p>
<table>
<tr><td><b>Button</b></td><td><b>Function</b></td></tr>
<tr><td>A Button</td><td>Thruster.</td></tr>
<tr><td>B Button</td><td>Deploy landing gear.</td></tr>
<tr><td>Left and Right</td><td>Steering.</td></tr>
</table>
</p><p>
On the High Score screen, pressing and holding the <b>Up</b> and <b>Down Buttons</b> simultaneously for a few seconds resets the high scores.
</p><p>
As always, thanks to <a href="https://community.arduboy.com/u/pharap/summary" target="_new">Pharap</a> for his advice, help and problem solving skills. There is a tribute level in the game with his skull in it! Also, if you decide to compile this yourself please note that it uses <a href="https://community.arduboy.com/u/pharap/summary" target="_new">Pharap</a>'s Fixed Point Library 2 which you will need to install through the Arduino IDE Library Manager.
</p>
</details>
<br />
<img src="images/arduboy/spacecab/arduboy_spacecab_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/spacecab/arduboy_spacecab_02.png" width="230" />
<br/>
<img src="images/arduboy/spacecab/arduboy_spacecab_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/spacecab/arduboy_spacecab_04.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/SpaceCab.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
