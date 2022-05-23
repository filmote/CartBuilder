<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>
	<div id="content">
		<div id="left">
			<div class="post">
				<h2>About Press Play on Tape </h2>
				<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultricies turpis sit amet pulvinar imperdiet. Proin et efficitur lectus. Etiam malesuada eu diam tristique aliquam. Vestibulum efficitur efficitur orci ut blandit. 
</p></p>
Curabitur eleifend sapien eu elit ullamcorper tincidunt vitae in nisl. Suspendisse vitae cursus sapien. Integer aliquam sem vel mauris pretium, congue tristique quam placerat. Cras tincidunt lorem in tortor pretium, quis rutrum diam malesuada. 
</p>				
				<br/>
				<table>
				<tr><td><a href="arduboy.php"><img src="images/arduboy.png" width="100" /></a><br /></td><td width="10"></td><td>
				<?php $small=true; include("include/arduboy_nav.php"); ?>
				</td></tr>
				<tr><td><a href="pokitto.php"><img src="images/pokitto.png" width="120" /></a></td><td></td><td>
				<?php $small=true; include("include/pokitto_nav.php"); ?>
				</td></tr>
				</table>
			</div>
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
