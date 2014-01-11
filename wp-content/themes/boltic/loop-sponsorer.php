<?php query_posts("post_type=sponsorer&order=ASC&posts_per_page=99");
	if (have_posts()) :  ?>
		<ul class="sponsorer">
	<?php while (have_posts()) : the_post(); ?>

		<li>

			<?php
			$post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan

			// Om sponsorn har en dedikerad sida, länka till den
			if( get_post_meta($post->ID, 'sponsor_dedikerad_sida', true) ){
				echo '<a href="';
				the_permalink();
				echo '">';
			} else{ // Om sponsorn inte har en dedikerad sida
				//Om sponsorn har en hemsida, länka dit
				if( get_post_meta($post->ID, 'sponsor_url', true) )
					echo '<a href="'. $post_meta_data['sponsor_url'][0] .'" target="_blank">';
			}

			// Visa logotyp
			// Ändra "thumbnail" till den storlek som önskas
			echo wp_get_attachment_image($post_meta_data['sponsor_logo'][0], 'thumbnail');

			echo '<p>'. the_title() .'</p>';

			// Stäng länk om det finns en dedikerad sida eller hemsida
			if( get_post_meta($post->ID, 'dedikerad_sida', true) || get_post_meta($post->ID, 'sponsor_url', true) )
				echo '</a>';
			?>

		</li>

<?php endwhile; ?>
</ul>
<?php endif; ?>
<?php wp_reset_query(); // Nollställ loopen ?>