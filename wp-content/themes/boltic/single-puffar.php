
<?php /*
Denna sida används för alla enskilda aktiviteter i kalendern.
*/ ?>

<?php get_header(); ?>

<div class="room box"></div>

	<div class="container single-page-nyhet sida-nyhet" role="main">
		<div class="main-content">

			<div class="box-12">
				<div class="pufftest">
					<!--<div class="breadcrumbs"><h3><span>Start > Nyheter > </span>Förlust i hemmapremiären</h3></div>-->

					<?php the_breadcrumb(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>

	<h1><?php the_title(); ?></h1>
	<small><?php the_date(); ?></small>
  
	<?php 
	echo apply_filters('the_content', $post_meta_data['puffar_info'][0]);
	?>

	<?php // Om det finns en länk så omsluter den hela nyheten=större klickarea
	if( get_post_meta($post->ID, 'puffar_url', true) ) {
		echo '<a class="btn" href="'. $post_meta_data['puffar_url'][0] .'" target="_blank">';
	} ?>
		Länk <i class="fa fa-chevron-right"></i>
	<?php // Här slutar länken om det finns någon
	if( get_post_meta($post->ID, 'puffar_url', true) ) {
		echo '</a>';
	} ?>

<?php endwhile; ?>
</div>
</div>

</div>

<?php get_sidebar('sidebarMain'); ?>

<?php else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>

<?php get_footer(); ?>