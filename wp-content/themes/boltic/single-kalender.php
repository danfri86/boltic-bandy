
<?php /*
Denna sida används för alla enskilda aktiviteter i kalendern.
*/ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>

	<h1><?php the_title(); ?></h1>
	
	<?php // Om det finns en länk så omsluter den hela nyheten=större klickarea
	if( get_post_meta($post->ID, 'kalender_datum', true) ) {
		echo '<p>Datum: '. $post_meta_data['kalender_datum'][0] .'</p>';
	} ?>

	<?php // Om det finns en länk så omsluter den hela nyheten=större klickarea
	if( get_post_meta($post->ID, 'kalender_tid', true) ) {
		echo '<p>Tid: '. $post_meta_data['kalender_tid'][0] .'</p>';
	} ?>
			
	<?php if( get_post_meta($post->ID, 'kalender_info', true) ) {
		echo apply_filters('the_content', $post_meta_data['kalender_info'][0]);
	} ?>

<?php endwhile; else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>

<?php get_footer(); ?>