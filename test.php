<?php include("include/header.php"); ?>
<div id="wrapper">
    <?php include("include/pageheader.php"); ?>

	<div id="content">

		<div id="left">

			<h2>Tools</h2>
			<p>Since the demise of the Team ARG website, PPOT has been proud to host their original image conversion tools.  They are presented here without modification and with links to their original licences.</p>
			<a href="TeamARGImgConverter\index.htm" target="_new">Team ARG Image Converter</a>		<br/>	
			<a href="TeamARGSpriteConverter\index.htm" target="_new">Team ARG Sprite Converter</a>		<br/>	
			<a href="TeamARGTileSetConverter\index.htm" target="_new">Team ARG Tile Set Converter</a>		<br/>	


    
		</div>
		<div id="right">
			<?php $newsItems = 5; include('include/news.php'); ?>
		</div>
	</div>
<?php include("include/footer.php"); ?> 
