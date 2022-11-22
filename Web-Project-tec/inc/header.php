<div class="top-bar">
			<div class="parts">
				<a href="index.php"><img src="images/icons/ensis-logo-square.png"></a>
			</div>	<!--parts-->
			<div class="top-bar-links">
				<ul>
					<div class="parts">
						<div class="link1">
							<li><a href="#"><i class="fas fa-envelope"></i><p>info@ceylonseafoods.com</p></a></li>
						</div>
					</div>	<!--parts-->
					<div class="parts">
						<div class="link2">
							<li><a href="#"><i class="fas fa-phone-alt"></i><p>011-8246781/011-8246782</p></a></li>
						</div>
					</div>	<!--parts-->
					<div class="parts">
						<div class="link3">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
						</div>	<!--links-->
					</div>	<!--parts-->
				</ul>
			</div>	<!--top-bar-links-->
	</div>	<!--top-bar-->	
	<nav>
		<ul>
			<li><a href="index.php">HOME</a></li>
			<li><a href="about-us.php">ABOUT US</a></li>
			<li><a href="contact-us.php">CONTACT US</a></li>
			<li><a href="photo-gallery.php">PHOTO GALLERY</a></li>
			<li><a href="video-gallery.php">VIDEO GALLERY</a></li>
			<?php  
			if(isset($_SESSION['return_cus_first_name'])){
						echo '<li><a href="logout.php">LOG OUT <p class=name>('.$_SESSION['return_cus_first_name']." ".$_SESSION['return_cus_last_name'].')</p></a></li>';
					}else{
						echo '<li><a href="sign-in.php">SIGN IN</a></li>';
					}
			?>
			
		</ul>
	</nav>