<?php query_posts("post_type=kontaktpersoner&order=ASC&posts_per_page=99");
	if (have_posts()) :  ?>

	<div class="box-12 kontakt">
		<ul class="kontaktpersoner">
			<h2>Kontaktpersoner</h2>
	<?php while (have_posts()) : the_post(); ?>

		<li>

			<?php //Hämta meta-box fälten för att använda nedan
			$post_meta_data = get_post_custom($post->ID); ?>

			<?php if( get_post_meta($post->ID, 'kontaktperson_profilbild', true) ) {					
				echo wp_get_attachment_image($post_meta_data['kontaktperson_profilbild'][0], 'thumbnail');
			} ?>

			<h2><?php the_title(); ?></h2>

			<?php // Om laget är valt i listan, skriv ut det
			if( get_post_meta($post->ID, 'kontaktperson_arbetsroll', true) ) {
				echo '<p>'. $post_meta_data['kontaktperson_arbetsroll'][0] .'</p>';
			} ?>

			<?php // Om laget är valt i listan, skriv ut det
			if( get_post_meta($post->ID, 'kontaktperson_telefon', true) ) {
				echo '<p> <i class="fa fa-phone"></i>'. $post_meta_data['kontaktperson_telefon'][0] .'</p>';
			} ?>

			<?php // Om laget är valt i listan, skriv ut det
			if( get_post_meta($post->ID, 'kontaktperson_epost', true) ) {
				echo '<p> <i class="fa fa-envelope"></i> <a href="mailto:'. $post_meta_data['kontaktperson_epost'][0] . '">' .  $post_meta_data['kontaktperson_epost'][0]  .  '</a></p>';
			} ?>

		</li>

<?php endwhile; ?>
</ul>
</div>
<?php endif; ?>
<?php wp_reset_query(); // Nollställ loopen ?>