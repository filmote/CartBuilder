<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=12;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/whist/arduboy_whist_00.png" width="480" />
<br/>
<br/>
<h1>German Whist</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Whist" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Whist/tree/master/distributable/Whist.100.hex" target="_new">Hex File</a><br>
</p>
<p>
The following instructions are sourced from <a href="https://www.pagat.com/whist/german_whist.html" target="_new">https://www.pagat.com/whist/german_whist.html</a>

<h2>Introduction</h2>
<p>
German Whist is an adaptation of classic Whist for two players. There is nothing German about it - as far as anyone can tell it is of British origin.
</p>
<details>
<summary>
Players and Cards
</summary>
<p>
This is a game for two players only, using a standard pack of 52 cards ranked A(high) K Q J 10 9 8 7 6 5 4 3 2 (low) in each suit.
</p>
</details>
<details>
<summary>
Deal
</summary>
<p>
The players agree who should deal first, and the turn to deal alternates after each hand. The deal is 13 cards each, dealt one at a time. The stock of undealt cards is placed on the table, face-down except for the top card which is turned face-up and placed on top of the stock. The suit of this face-up card determines the trump suit for the hand.
</p>
</details>
<details>
<summary>
Play
</summary>
<p>
The play is in tricks and consists of two stages: in the first stage the players compete to win good cards from the stock to add to their hand; in the second stage, when the stock is empty, the object is to win the majority of the tricks. The non-dealer leads (plays the first card) to the first trick.
</p><p>
A trick consists of one card played by each player. The person who plays first to a trick may play any card, and the other player must play a card of the same suit if possible. Having no cards of the suit led, the second player may play any card. If both cards are of the same suit, the higher card wins the trick. If they are of different suits the first player wins unless the second player played a trump, in which case the trump wins.
</p><p>
When you win a trick you must take the face-up card from the top of the stock and add it to your hand. The loser then takes the next card of the stock, which is face-down, without showing it to the winner, so that both players again have 13 cards in their hands. The two cards played to the trick are turned face down and set aside, the top card of the remaining stock is turned face-up. This does not change the trump suit - the suit of the card turned up at the start of the play remains trump until all the cards have been played. The winner of the trick just played leads a card to the next one.
</p><p>
Play continues in this way until, after 13 tricks have been played, there are no cards left in the stock. The winner of the 13th trick leads, and the play continues without replenishment until after 13 more tricks both players run out of cards. In this second stage each player keeps the tricks they won in front of them, and whoever wins the majority of the 13 tricks of this second stage wins the hand.
</p>
</details>
<details>
<summary>
Tactics
</summary>
<p>

Notice that tricks won in the first stage do not count towards winning the game; the sole aim in the first stage is to collect cards that will enable you to win the majority of tricks in the second stage. Therefore you only try to win a trick if you judge that the exposed card on top of the stock is likely to be better than the card underneath it. For example if hearts are trumps and the exposed card is the diamond5 you would definitely try to lose the trick, as the next card is likely to be better. Even if the exposed card is average (say the spadeJ) you would not use a high card to win it, as all this would achieve would be to replace a high card in your hand by an average one.
</p>
</details>
<br />
<img src="images/arduboy/whist/arduboy_whist_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/whist/arduboy_whist_02.png" width="230" />
<br/>
<img src="images/arduboy/whist/arduboy_whist_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/whist/arduboy_whist_04.png" width="230" />
<br/>
<img src="images/arduboy/whist/arduboy_whist_05.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/whist/arduboy_whist_06.png" width="230" />
<br/>

<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Whist.100.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
