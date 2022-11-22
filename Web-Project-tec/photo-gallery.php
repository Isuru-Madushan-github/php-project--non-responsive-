<?php  
	include('inc/contact-footer-form.php')
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ceylon Seafoods-Photo Gallery</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrapper">
		<?php include('inc/header.php'); ?>
		<div class="heading">
			<h3>Our Photo Gallery</h3>
		</div>
		<div class="photo-gall">
			<div class="video-photo-container">
				<div class="video-img">
					<img src="images/2.jpeg">
					<div class="desc">Description Here</div>
				</div>
				<div class="video-img">
					<img src="images/3.jpg">
					<div class="desc">Fresh chilled Tuna</div>
				</div>
				<div class="video-img">
					<img src="images/4.jfif">
					<div class="desc">Description Here</div>
				</div>
				<div class="video-img">
					<img src="images/istockphoto-469390528-170667a.jpg">
					<div class="desc">The cutting of a Tuna fish in factory, Tuna processing</div>
				</div>
				<div class="video-img">
					<img src="images/istockphoto-451428015-170667a.jpg">
					<div class="desc">Whole Salmons lying on ice</div>
				</div>
				<div class="video-img">
					<img src="images/frozen.jpeg">
					<div class="desc">Frozen King Prawn</div>
				</div>
				<div class="video-img">
					<img src="images/Frozen Tuna Fish Yellow - Yellow Fin whole round frozen.jpg">
					<div class="desc">Frozen Tuna Fish Yellow - Yellow Fin whole round frozen</div>
				</div>
				<div class="video-img">
					<img src="images/Frozen Sardine Morocco.jpg">
					<div class="desc">Frozen Sardine</div>
				</div>
				<div class="video-img">
					<img src="images/OIP (1).jfif">
					<div class="desc">Scoop net with the fresh pink salmon catch.</div>
				</div>
				<div class="video-img">
					<img src="images/OIP (2).jfif">
					<div class="desc">Salmon harwest</div>
				</div>
				<div class="video-img">
					<img src="images/R.jfif">
					<div class="desc">Fish processing Plant</div>
				</div>
			</div>
			</div>
		<?php include('inc/footer.php'); ?>
	</div>
	<script>
		var video=document.querySelectorAll('video')
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