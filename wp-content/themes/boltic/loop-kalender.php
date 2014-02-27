<?php // Specificera mer om dom poster vi vill ha inom ()
// Gör så att den aktivitet med närmast datum från idag visas först
$today = date('Y-m-d');
$args = array(
	'post_type' => 'kalender',
	'posts_per_page' => 999,
	'meta_key' => 'kalender_datum',
	'orderby' => 'meta_value',
	'order' => 'ASC',
	'meta_query' => array( // Visa bara inlägg som har datum satt till senare än, eller exakt, dagens datum
       array(
           'value' => $today,
           'compare' => '>=',
           'type' => 'DATE'
       )
	)
	// Gör något som visar inlägg som ligger efter dagens datum. Då tas dom tidigare workshops'en bort
);
query_posts($args);
?>

<?php if (have_posts()) : ?>
	<ul class="kalender-poster">
<?php while (have_posts()) : the_post();
	// Här körs loopen för dom poster som finns
?>
	<?php $post_meta_data = get_post_custom($post->ID); ?>

	<li>
		<?php // Om laget är valt i listan, skriv ut det
		if( get_post_meta($post->ID, 'kalender_motstandare', true) || get_post_meta($post->ID, 'kalender_alternativtlag', true) ) {
			echo '<h2>Boltic vs. ';

			if( get_post_meta($post->ID, 'kalender_motstandare', true))
				echo $post_meta_data['kalender_motstandare'][0];

			if( get_post_meta($post->ID, 'kalender_alternativtlag', true))
				echo $post_meta_data['kalender_alternativtlag'][0];
			echo '</h2>';
		} else {
			echo '<h2>'. get_the_title() .'</h2>';
		} ?>
			
		<?php if( get_post_meta($post->ID, 'kalender_datum', true) ) {
			echo '<small><i class="fa fa-calendar-o"></i> '. $post_meta_data['kalender_datum'][0] .'</small>';
		} ?>

		<?php if( get_post_meta($post->ID, 'kalender_tid', true) ) {
			echo '<small><i class="fa fa-clock-o"></i> '. $post_meta_data['kalender_tid'][0] .'</small>';
		} ?>

		<?php // Om plats är valt, skriv ut det
		if( get_post_meta($post->ID, 'kalender_plats', true) ) {
			echo '<small><i class="fa fa-map-marker"></i> '. $post_meta_data['kalender_plats'][0] .'</small>';
		} ?>
				
		<?php if( get_post_meta($post->ID, 'kalender_info', true) ) {
			echo apply_filters('the_content', $post_meta_data['kalender_info'][0]);
		} ?>
	</li>
<?php endwhile; ?>
	</ul>
<?php else: endif; //Slut ?>
<?php wp_reset_query(); // Nollställ loopen ?>