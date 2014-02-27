</div>

<div id="sidr" class="toggleSidebar">
    <?php
	$args = array(
			'menu'		=>	'huvudmeny',
			'container'	=>	'nav', // Ingen div runt menyn
			'container_class' => '',
			'container_id'    => '',
			'menu_class'=>	'', // Lämnar class tomt
			'menu_id'	=>	'', // Lämnar id tomt
			'items_wrap'=>	'<ul><a id="menuTablet" href="javascript:void(0)">x <span>stäng</span></a>%3$s</ul>', // Tar bort ul id och class helt och hållet
		);
	wp_nav_menu( $args );
	?>

	<a href="#" class="fb"><i class="fa fa-facebook"></i> Gilla på Facebook</a>

	<a href="#" class="twit"><i class="fa fa-twitter"></i> Följ på Twitter</a>

	<a href="#" class="insta"><i class="fa fa-instagram"></i> Följ på Instagram</a>

	<a href="#" class="shop"><i class="fa fa-shopping-cart"></i> Besök vår webshop</a>

 </div>

<?php wp_footer(); ?>

<footer class="box" role="contentinfo">
	<div class="container puff">

		<?php global $NHP_Options; ?>
		
		<div class="box-3">
			<i class="fa fa-phone"> </i>  <b>Telefon</b> <?php $NHP_Options->show('footer_telefon'); ?>
		</div>

		<div class="box-3"><i class="fa fa-envelope-o"></i> <b>E-mail</b> <?php $NHP_Options->show('footer_epost'); ?>
		</div>

		<div class="box-3">
			<i class="fa fa-map-marker"></i> <b>Adress</b> <?php $NHP_Options->show('footer_adress'); ?>
		</div>

		<a href="<?php bloginfo('url'); ?>/kontakt" class="btn">Till kontakt-sidan <i class="fa fa-chevron-right"></i></a>
	</div>
</footer>
<script>
jQuery(document).ready(function($) {
	$('#right-menu').sidr({
	});
});
</script>
</body>
</html>