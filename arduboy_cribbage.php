<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<?php $id=5;  $small=true; include("include/arduboy_nav.php"); ?>



<img src="images/arduboy/cribbage/arduboy_cribbage_00.png" width="480" />
<br/>
<br/>
<h1>Cribbage</h1>

<p>
Source &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Cribbage" target="_new">GitHub Source</a><br>
Hex &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/Press-Play-On-Tape/Cribbage/tree/master/distributable/Cribbage.V101.hex" target="_new">Hex File</a><br>
</p>
<p>
An electronic version of the classic card game.
</p>
<img src="images/arduboy/cribbage/arduboy_cribbage_01.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/cribbage/arduboy_cribbage_02.png" width="230" />
<br/>
<img src="images/arduboy/cribbage/arduboy_cribbage_03.png" width="230" />&nbsp;&nbsp;
<img src="images/arduboy/cribbage/arduboy_cribbage_04.png" width="230" />
<br/>
<img src="images/arduboy/cribbage/arduboy_cribbage_05.png" width="230" />
<br/>

<h2>Simple Cribbage Rules</h2>
<p>
The following rules have been taken from <a href="http://cribbagecorner.com/" target="_new">Cribbage Corner</a>.
</p>
<p>
The rules of cribbage are simple - it’s one of the easiest card games to learn and certainly one of the most satisfying. Once you’ve read through these simple rules for cribbage, you’ll be playing in no time!
</p>
<p>
Cribbage belongs to the family of card games known as ‘adders’ - that is, games in which the idea is to add successive card values to a running total with the aim of making certain totals - in this case, 31. In the first phase of the hand, players take turns playing a card from their hand which is added to the running total. Two points are scored for making the total 15 or 31. Pairs and sequences also earn points. Once the hands have been played out in this way, the players then score points based on the pairs and sequences in their hands, plus the combinations that add up to 15, and record the score on the cribbage board.
</p>
<h2>Cribbage Tutorial</h2>
<p>
The interweaving of luck and skill in cribbage is particularly interesting. Although you have no control over the cards you receive (and thus the points you score in the second phase), there is much opportunity for skilful play in the first, or pegging, phase. A good player can make many more points from a given hand than a novice. However, the element of chance is such that a single high-scoring hand can strongly affect the outcome of the whole game. Thus a rank beginner can comfortably beat an expert, given only a little luck. Over many games, though, the luck of the deal should average out and the skilful player’s edge will become apparent.
</p>

<h2>The Basics</h2>
<p>You have to be able to walk before you can run.</p>
<details>
<summary>
The Cards and Cribbage Board
</summary>
<p>
Cribbage is played with an ordinary 52-card deck with the jokers removed. The cribbage boards used to keep score are traditionally made of wood, with 30, 60 or 120 holes per player.
</p>
</details>
<details>
<summary>
The Deal
</summary>
<p>
In this version of Cribbage the computer always deals first and alternates with each hand. The dealer then deals six cards to each player.
</p>
</details>
<details>
<summary>
The Discard
</summary>
<p>
Following the deal, each player throws away two cards from his hand into the ‘crib’ - a third hand that is scored by the dealer. Since the crib scores points for its owner, your choice of discard will generally be different depending on whether the crib is yours or your opponent’s.
</p>
</details>
<details>
<summary>
The Turn-Up
</summary>
<p>
The game of cribbage then begins with the dealer turning up the top card on the remaining pile after the cards have been dealt to each player. This card is called the turn-up or starter. If the turn-up card is a Jack, the dealer immediately scores two points (“two for his heels”).
</p>
</details>
<details>
<summary>
The Count
</summary>
<p>
Following the deal, the discard and the turn-up, the hand proper begins.
</p>
<p>
In the playing phase of Cribbage, the players take it in turns to lay down a card, trying to make the running total equal to certain values. The non-dealer plays first and states the value of her card (for example, “ten” for a Jack). Court cards count ten (together with the face 10 they are known as the ‘ten-cards’). Ace counts as one.

<table>
<tr><td valign="top">15&nbsp;and&nbsp;31&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>
The dealer then plays a card, the value of which is added to the current running total. The player who makes the total exactly 15 scores two points (“fifteen for two”). Two points are also awarded for making 31. Additionally, you score a point if your opponent cannot play without going over 31 (“Go for one”). You must play if you can (reneging is against the rules).
</td></tr>
<tr><td valign="top">Pairs</td>
<td>If your card is the same rank as the last card played, you score two for a pair. If your opponent plays a third card of the same rank, he scores 6 for a "pair royal" (three of a kind). Four of a kind scores 12 ("double pair royal").
</td></tr>
<tr><td valign="top">Runs</td>
<td>
If the last 3 cards played form a sequence, the player making the sequence scores 3 for a "run". For example, 3-4-5 makes a run of 3 and so scores 3 for the player laying down the 5. If the opponent then plays a 6 (or a 2) to extend the sequence to 4 cards, she scores 4, and so on as long as the sequence is unbroken.
</td></tr>
</table>
</details>
<details>
<summary>
The Go
</summary>
<p>
You earn a point for go when your opponent cannot go. This may be (a) because he has no cards (sometimes called ‘One for last’), or (b) because he cannot play without going over 31 (‘One for the go’). In either case if you make the total 31 you score only 2 points on the cribbage board, not 3 (because the go is included, as described above). However, you may well make 15 with the last card (in which case you do score 3).
</p>
</details>
<br/>
<h2>Scoring</h2>
<p>
Know when to hold them, know when to fold them ..
</p>
<details>
<summary>
Scoring details.
</summary>
<p>
Having played out all the cards, both players then score their hands, pone first - this time including the turn-up card as part of both hands. The dealer’s crib also includes the turn-up. Again, points are scored for 15s, runs, and pairs; you can also score for a flush (all cards of the same suit) - see the cribbage scoring chart below for a handy reference. It is a key part of the rules of cribbage that the non-dealer should score first - at the end of the game, both players may have enough points to win, and the right to score first will determine victory. The cribbage board’s positions usually alternate during the game, with first one player leading, then the other. The trick is to be in the first-scoring position when you are close enough to win!
</p>
<p>
<table>
<tr><td valign="top">Cribbage&nbsp;pairs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>2 points are scored for a pair in cribbage, and 6 for a pair royal - that is, three cards of the same rank. This can be considered as 3 different pairs worth 2 points each. Similarly, double pair royal (four of a kind) scores 12 as there are 6 ways of picking two cards from four. You begin to see why mathematicians love this game.
<br />
Combinations of cards making 15 score two points each - for example, 8 and 7. As many ways as you can make 15 with your cards, you score 2 points for each of them. For example, 8-7-7-A can make 15 three ways: the 8 and one 7, the 8 and the other 7, and the 7-7-A. Consequently it scores 6 points (for 15s, and a further 2 for the pair of 7s).
</td></tr>
<tr><td valign="top">
Cribbage runs</td><td>Runs score as many points as there are cards in them. For example, a four-card run 9-T-J-Q scores 4.
 </td></tr>
<tr><td valign="top">
Cribbage nobs 
</td><td valign="top">You also score 1 point if you have the Jack of the same suit as the starter card (known as 'his nob' or just 'nobs').
</td></tr>
<tr><td valign="top">Sequences</td><td>Sequence do not have to be in order. For example, if the play goes 7-9-6, you can then play an 8 to score 4 for a run of 4.
</td></tr>
</table>
<br/>
</p>
</details>
<br />
<h2>Cribbage Strategy</h2>
<p>
Cribbage strategy is a key part of playing and winning cribbage.
<details>
<summary>
General Cribbage Strategy
</summary>
<p>
<table>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Don’t lead a 5 or a 10-card. If you do, you give your opponent the chance to score 15-2.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Aim to bait your opponent to create runs during play. For example, if you lead with a 7, your opponent could play 8 for 15-2. You can then play a 9 to score three points for a run of 3.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Leading from a pair is often a good idea. If your opponent plays the matching card, you can play your own card, scoring 6 points for a pair royal.</td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Throw good cards to your own crib, such as pairs, two cards in sequence, or 5s. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>If it’s the opponent’s crib, discard your least valuable cards. Avoid giving them any cards that make easy 15s, such as 5s, or ten-cards. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Approaching the end of the game, hang on to low cards and don’t discard them. You’ll have more opportunities to score points for go. </td></tr>
</table>
</p>
</details>
<details>
<summary>
Discard Strategy
</summary>
<p>
Cribbage rules and cribbage strategy make the discard one of the key elements of skill in cribbage. You must try to maximise the remaining points in your hand, while leaving yourself useful cards to play in different tactical situations during the pegging, and without giving your opponent cards which may help her in the crib. When discarding to your own crib, you will be trying to anticipate what kind of cards your opponent is likely to give you, and discard cards which will work with them to create big scores in the crib.
</p>
<p>
<b>Cribbage discard hints</b>
<p>
Here are some simple hints to help you get started with your cribbage discards:
</p><p>
<table><tr><td>&bull;&nbsp;&nbsp;</td><td>Never throw fives to your opponent’s crib. If your opponent discards ten-cards, they will score against you with your five. If your opponent discards fives, they will pair with yours. </td></tr>

<tr><td>&bull;&nbsp;&nbsp;</td><td>Avoid giving your opponent pairs, or cards that make 15 (9-6, 8-7) or 5 (3-2, 4-1). They will all score against you. 7-8 is particularly damaging to you if it meets a 5 or 9. </td></tr>

<tr><td>&bull;&nbsp;&nbsp;</td><td>Don’t discard sequence cards to your opponent, particularly ten-cards. Your 10-J may meet your opponent’s Q-K for an uncomfortable score against you. </td></tr>

<tr><td>&bull;&nbsp;&nbsp;</td><td>When discarding to your own crib, put in cards which are likely to work with whatever your opponent gives you. Fives are an obvious choice. A ten-card in the turn-up will work just as well with a five in your crib as one in your hand. </td></tr>

<tr><td>&bull;&nbsp;&nbsp;</td><td>The next most valuable discard to your own is a 3. An opponent will probably be giving you some of their lowest cards, including 2s, which are likely to make scores for you. </td></tr>
</table>
</p>
</details>
<details>
<summary>
Should you discard for the maximum score?
</summary>
<p>
It’s a common cribbage maxim that you should choose your discard in such a way as to maximise the score in your hand, rather than attempting to increase the score in your crib, or reduce it in your opponent’s crib. In many cases, this is sound advice, but like all rules of thumb, it should not be applied blindly.
</p><p>
Let’s look at an example hand of 4-5-6-Q-Q-K. You could either discard so as to keep the 5 and face cards, or to keep the 4-5-6. Although in the first case your hand scores 8, and in the second case only 7, the numbers show that following the cut, the run hand averages 10.15 points, while the 5 hand averages only 9.91 points. Don’t forget to work out which cuts will help you, and make sure you have a basic grasp of the odds involved.
</p>
</details>
<details>
<summary>
Leading Strategy
</summary>
<p>
Basic lead strategy in cribbage:
</p><p>
<table><tr><td>&bull;&nbsp;&nbsp;</td><td>If in doubt, lead a 4. This is the highest card on which the opponent cannot immediately make 15. Lower cards are best kept for later. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Remember that ten-cards in cribbage far outnumber any others in the pack. Thus, your opponent is quite likely to have one or more 10s. Consequently, do not lead a 5, or make 21. Naturally enough, 10s are often accompanied by 5s. Beware of making 26. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Conversely, making 11 is generally a good move, providing of course you hold the necessary ten-card to follow up your opponent’s. </td></tr>
</table>
</p>
</details>
<details>
<summary>
Replying to the Leading Strategy
</summary>
<p>
As there are so few cards played in a hand of cribbage, strategy is important with each play. Your choice of reply to the opponent’s lead can be critical.
</p>
<p>
<table><tr><td>&bull;&nbsp;&nbsp;</td><td>Never play a 6 to a led 4, or vice versa. This leads to a nasty sting as your opponent slaps down a 5, for five points (4-6-5 run and 15). It is a common mistake in cribbage strategy to set up runs for your opponent. Unless you’ve got a plan up your sleeve, of course… </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Get rid of your higher cards first, as they will be a liability when the count approaches 31. Save Aces - they are your emergency escape strategy to turn a point-losing 30 into a 2-point-winning 31 (but get rid of lone aces - see below). </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Do not pair your opponent’s card unless you also hold another of the same card in reserve. For example, if your opponent plays a 4, you should not reply with a 4 if it is the only 4 you hold - because your opponent is quite likely to have another 4 herself (making a pair royal for 6 points). Conversely, you should encourage your opponent to pair your card when you yourself hold a pair. The chances of her holding the fourth card to make double pair royal (12 points) are minimal. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>When holding two cards that together make 5 (for example 4 and Ace), lead one of them. Your opponent is likely to play a 10 onto it, enabling you to make 15. </td></tr>
<tr><td>&bull;&nbsp;&nbsp;</td><td>Watch for runs! Don’t play a card with a value 1 or 2 away from your opponent’s card - for example a 9 on a 7 - as he is likely to complete the run. The exception, of course, is when you hold the necessary card to extend the run yourself and top your opponent’s points. Beware of ‘banging your head’ on 31, though - calculate beforehand whether you will be able to play onto the run without going over 31. </td></tr>
</table>
</p>
</details>
<details>
<summary>
Play your 5s early
</summary>
<p>

If you hold 5s, play them as early as you can to avoid them being trapped. For example, if you hold 5-J-Q-K and your opponent holds 3-6-7-8, the play might go like this. You lead one of the ten-cards; opponent replies with 8, hoping you will play another ten-card so that he can make 31 with the 3. If you do, he will reply 6 to your next ten-lead, resulting in: 10 - 6 - 5 - 7 for a three-point run and go. That’s a six-point trap which you would do well to avoid. Use this rule: if your opponent does not have a 5-shaped hand (hasn’t played any 10s or 5s), your 5 should be a safe lead.
</p>
</details>



<br/>
<h2>Play Online!</h2>
<p>You can play this game online thanks to the emulator provided by <a href="https://community.arduboy.com/u/fmanga/summary" target="_new">Fmanga</a>.  However, the sound effects, LED lights and EEPROM saving features of the game will not be available for you to experience it was written.
</p>
<iframe src="https://felipemanga.github.io/ProjectABE/?hex=http://www.bloggingadeadhorse.com/ppot/hex/Cribbage.hex" width="480" height="760">

</iframe>
			
				
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
