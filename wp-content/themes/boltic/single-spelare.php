
<?php /*
Denna sida används för alla enskilda nyheter.
Används också för alla posttypers enskilda poster om dom inte har en egen single-posttyp.php.
*/ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>

	<h1><?php the_title(); ?></h1>

	<?php // Ändra "thumbnail" till den storlek som önskas
	echo wp_get_attachment_image($post_meta_data['spelare_bild'][0], 'thumbnail'); ?>

	<?php if( get_post_meta($post->ID, 'spelare_trojnummer', true) ) {
		echo '<p>Tröjnummer: #'. $post_meta_data['spelare_trojnummer'][0] .'</p>';
	} ?>
	
	<?php if( get_post_meta($post->ID, 'spelare_fodelsear', true) ) {
		echo '<p>Födelsår: '. $post_meta_data['spelare_fodelsear'][0] .'</p>';
	} ?>

	<?php if( get_post_meta($post->ID, 'spelare_langd', true) ) {
		echo '<p>Längd: '. $post_meta_data['spelare_langd'][0] .'cm</p>';
	} ?>

	<?php if( get_post_meta($post->ID, 'spelare_vikt', true) ) {
		echo '<p>Vikt: '. $post_meta_data['spelare_vikt'][0] .'kg</p>';
	} ?>

	<?php if (get_post_meta($post->ID, 'spelare_spelposition', true)) {
		$positioner = $post_meta_data['spelare_spelposition'];
		$raknare = 1; // Ränka antalet varv i foreach>else>if-loopen

		// Om en spelare har flera spelpositioner skrivs dom ut med , mellan
		// Har spelaren en position skrivs endast positionen ut
		echo '<p>Spelposition: ';
		foreach($positioner as $position){
			if( count($positioner) == 1 )
				echo $position;
			else {
				if( $raknare == 1 ) {
					echo $position;
				} else {
					echo ', '. $position;
				}
				$raknare++;
			}
		}
		echo '</p>';
	}
	?>
			
	<?php 
		echo apply_filters('the_content', $post_meta_data['spelare_info'][0]);
	?>

<?php endwhile; else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>

<?php get_footer(); ?>