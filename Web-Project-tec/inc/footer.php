		<div class="footer">	
		<div class="footer-col">
			<img src="images/icons/ensis-logo-square.png">
			<h2>ABOUT CEYLON SEAFOODS PVT LTD</h2>
			<p>We work closely with our community, to bring change for the better. Our aim is to bring the highest quality sustainable SRI LANKAN's seafood to our customers – giving back to our fishermen the best premium possible. </p>
			<h2>FOLLOW US</h2>
			<ul class="social-meadia">
				<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
				<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
				<li><a href="#"><i class="fab fa-twitter"></i></a></li>
				<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
			</ul>
		</div>
		<div class="footer-col">
			<h2>MAIN LINKS</h2>
			<ul class="links">
				<li><a href="index.php">&raquo;Home</a></li>
				<li><a href="about-us.php">&raquo;About Us</a></li>
				<li><a href="contact-us.php">&raquo;Contact Us</a></li>
				<li><a href="photo-gallery.php">&raquo;Photo Gallery</a></li>
				<li><a href="video-gallery.php">&raquo;Video Gallery</a></li>
				<li><a href="sign-in.php">&raquo;Sign In</a></li>
			</ul>
		</div>
		<div class="footer-col">
			<h2>CONTACT US</h2>
			<?php 	 
				if(!empty($errors)){
					echo "<div class=errmsg>";
					echo "<p>For successfull messege:</p> <br>";
					echo "</div>";
					foreach ($errors as $error) {
						echo "<div class=errmsg>";
						echo "<p>"."&nbsp;"."&nbsp;"."&nbsp;"."-".$error."</p><br>";
						echo "</div>";
					}
				}
			?>
			<form action="index.php" method="post">
				<input type="text" name="name" placeholder="Your Name*" <?php echo 'value="'.$name.'"';?>>
				<input type="text" name="phone" placeholder="Your Phone*" <?php echo 'value="'.$phone.'"';?>>
				<input type="text" name="email" placeholder="Your Email*" <?php echo 'value="'.$email.'"';?>>
				<input type="text" name="message" placeholder="Your Message*" <?php echo 'value="'.$message.'"';?>>
				<?php if(!empty($success)){
					echo "<br>";
					echo "<div class=success>";
					echo "<p>".$success."</p>";
					echo "</div>";
				} ?>
				<br>	
				<button type="submit" name="submit">SUBMIT</button>
			</form>
		</div>
	</div>
	<div class="copyright">
		<div class="left">
			Copyright &copy; 2021 Domain Name-All rights Reserved
		</div>
		<div class="right">
			Template by IsUru MaDusHan
		</div>

	</div><!--copyright-->