<?php query_posts("post_type=spelare&order=ASC&posts_per_page=99");
	if (have_posts()) :  ?>
		<ul class="spelare">
	<?php while (have_posts()) : the_post(); ?>

		<li>

			<?php
			$post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan

			echo '<a href="';
				the_permalink();
			echo '">';
			// Ändra "thumbnail" till den storlek som önskas
			echo wp_get_attachment_image($post_meta_data['spelare_bild'][0], 'spelarprofil');

			echo '<p>';
			if( get_post_meta($post->ID, 'spelare_trojnummer', true) ) {
				echo '<span>#'. $post_meta_data['spelare_trojnummer'][0] .' </span>';
			};

			echo the_title() .'</p>';
			echo '</a>';
			?>

		</li>

<?php endwhile; ?>
</ul>
<?php endif; ?>
<?php wp_reset_query(); // Nollställ loopen ?>