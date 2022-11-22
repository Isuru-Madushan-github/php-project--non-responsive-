<?php  
	include('inc/contact-footer-form.php');
	include('inc/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ceylon Seafoods-video gallery</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrapper">
		<?php include('inc/header.php'); ?>
		<div class="heading">
				<h3>Our Video Gallery</h3>	
		</div>
		<div class="video-photo-container">
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/oe_jiVU08Vk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/2BzO-aTkCx0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/XkwRtwJmP8U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/6tcmhdz9ea4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/G32vZ8e76Xs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/R8n8teVLsdQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/e7u-X8XR1hs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/WiOKmqLhtrA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="876" height="414" src="https://www.youtube.com/embed/0AuXwO-u0mU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-img">
				<iframe width="853" height="480" src="https://www.youtube.com/embed/BtCM6ktBbhU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<?php include('inc/footer.php'); ?>
	</div>
	<script>
		var video=document.querySelectorAll('iframe')
		video.forEach(play=>play.addEventListnear('click',()=>{
			play.classList.toggle('active');
			if(play.paused){
				play.play();
			}else{
				play.pause();
				play.currentTime=0;
			}
		}));
	</script>
</body>
</html>