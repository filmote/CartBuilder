<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=13;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/blackjack/arduboy_blackjack_00.png" width="480" />
<br/>
<br/>
<h1>Black Jack</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Blackjack" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Blackjack/tree/master/distributable/Blackjack.ino.hex" target="_new">Hex File</a><br>
</p>
<p>
<h2>Rules</h2>
<p>
The rules are pretty simple.
</p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td colspan="2">You nominate your starting bet. In this game anywhere from $1 to $200.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td colspan="2">You and the dealer are then dealt two cards. You can see your hand and you can see the dealers top card. At this point and depending on the cards showing you have a number of choices:</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If you have a pair you can split them into two hands. You have to double your bet to do this but you can potentially win twice as much. Typically you should split Aces and Eights but never 10s (or picture cards).</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>You can double up. You double your bet and are dealt a single card (at right angles to your normal cards). This is the end of your hand. Best to double up when your had equals 10 or 11.</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If the dealer has an Ace showing you will be offered an insurance bet. This is a side bet and will pay out if the dealer has BlackJack. An insurance bet effectively offsets you original bet - you win money because the dealer has a Blackjack but you lose on the main hand (unless you too have a blackjack).</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td colspan="2">You then start playing your first hand. You can draw cards to get your hand score as close to 21 as you can without going bust. Aces can be counted as 1 or 11 - your choice.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td colspan="2">You play your second hand (if you have one).</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td colspan="2">Dealer plays his hand and works out who has won.</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If you have a black jack, the Dealer pays you out 5:2 (two and a half times your original bet).</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If you have a non-black jack hand that is better than the dealers, he pays you 2:1 (twice your original bet).</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If you and the dealer have the same, you get your money back</td></tr>
<tr><td></td><td>&bull;&nbsp;&nbsp;</td><td>If the dealer has a better hand you lose!</td></tr>
</table>

</p>
</details>
<br />
<img src="images/arduboy/blackjack/arduboy_blackjack_01.gif" width="230" />&nbsp;&nbsp;<img src="images/arduboy/blackjack/arduboy_blackjack_02.gif" width="230" />
<br/>
<img src="images/arduboy/blackjack/arduboy_blackjack_03.gif" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Blackjack.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
