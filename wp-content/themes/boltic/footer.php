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
			'items_wrap'=>	'<ul>%3$s</ul>', // Tar bort ul id och class helt och hållet
		);
	wp_nav_menu( $args );
	?>

    <?php get_sidebar('sidebarMain'); ?>
 </div>

<?php wp_footer(); ?>

<footer class="box" role="contentinfo">
	<div class="container puff">
		<div class="box-3">
			<i class="fa fa-phone"> </i>  <b>Telefon</b>	  0134-122122
		</div>

		<div class="box-3"><i class="fa fa-envelope"></i> <b>E-mail</b> 	info@kansliet.se
		</div>

		<div class="box-3">
			<i class="fa fa-map-marker"></i> <b>Adress</b>  Tingvalla isstadion
		</div>

		<div class="box-3">
			<a id="btn" class="btn-border">Sitemap <i class="fa fa-chevron-right"></i> </a>
		</div>
	</div>
</footer>
<script>
jQuery(document).ready(function($) {
$('#right-menu').sidr({
   /*name: 'sidr',
   side: 'right'*/
});
});
</script>
</body>
</html>