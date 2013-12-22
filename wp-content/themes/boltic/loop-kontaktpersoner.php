<?php query_posts("post_type=kontaktpersoner&order=ASC&posts_per_page=99");
	if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php //Hämta meta-box fälten för att använda nedan
		$post_meta_data = get_post_custom($post->ID); ?>
					
		<?php $image = wp_get_attachment_image_src($post_meta_data['kontaktperson_profilbild'][0], 'thumbnail'); ?>

		<h2><?php the_title(); ?></h2>

		<?php // Om laget är valt i listan, skriv ut det
		if( get_post_meta($post->ID, 'kontaktperson_arbetsroll', true) ) {
			echo $post_meta_data['kontaktperson_arbetsroll'][0];
		} ?>

		<?php // Om laget är valt i listan, skriv ut det
		if( get_post_meta($post->ID, 'kontaktperson_telefon', true) ) {
			echo $post_meta_data['kontaktperson_telefon'][0];
		} ?>

		<?php // Om laget är valt i listan, skriv ut det
		if( get_post_meta($post->ID, 'kontaktperson_epost', true) ) {
			echo $post_meta_data['kontaktperson_epost'][0];
		} ?>

<?php endwhile; endif; ?>
<?php wp_reset_query(); // Nollställ loopen ?>