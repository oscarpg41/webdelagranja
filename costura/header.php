	<header id="navtop">
		<a href="index.php" class="logo fleft">
			<img src="img/logo.jpg" alt="Costura y confección en La Granja" style="padding-right: 10px; width: 200px">
		</a>
		<h3>Costura y confecci&oacute;n en La Granja</h3>
		
		<nav class="fright">
			<ul>
				<li><a href="index.php" <?php if ($_page=="home") echo 'class="navactive"'?>>Home</a></li>
				<li><a href="about.php" <?php if ($_page=="about") echo 'class="navactive"'?>>&iquest;Quien soy&#63;</a></li>
			</ul>
			<ul>
				<li><a href="works.php" <?php if ($_page=="works") echo 'class="navactive"'?>>Trabajos</a></li>
				<li><a href="contact.php" <?php if ($_page=="contacto") echo 'class="navactive"'?>>Contacto</a></li>
			</ul>
			<!-- ul>
				<li><a href="blog.php" <?php if ($_page=="blog") echo 'class="navactive"'?>>Blog</a></li>
				<li>&nbsp;</li>
			</ul-->
		</nav>
	</header>