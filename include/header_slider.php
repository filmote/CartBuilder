<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Template Design by TheWebhub.com | http://www.thewebhub.com | Released for free under a Creative Commons Attribution-Share Alike 3.0 Philippines -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Blogging a Dead Horse</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/jquery.bxSlider.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="shadowbox.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			var slider = $('#slider1').bxSlider({
				controls: false
			});
		
			$('.thumbs a').click(function(){
				var thumbIndex = $('.thumbs a').index(this);
				slider.goToSlide(thumbIndex);
				$('.thumbs a').removeClass('pager-active');
				$(this).addClass('pager-active');
				return false;
			});
			
			$('.thumbs a:first').addClass('pager-active');
					
		});
				
	</script>

</head>
<body>