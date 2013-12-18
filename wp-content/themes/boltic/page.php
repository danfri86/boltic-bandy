<?php
/*
Template Name: Nyheter
*/
?>

<?php get_header(); ?>

<?php if (have_posts()) :
	// Om det finns poster så kan vi göra något här
?>
<?php while (have_posts()) : the_post();
	// Här körs loopen för dom poster som finns
?>

	<?php //Hämta meta-box fälten för att använda nedan
	$post_meta_data = get_post_custom($post->ID); ?>
				
	<?php $image = wp_get_attachment_image_src($post_meta_data['sidor_headerBild'][0], 'bannerimg'); ?>

	<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'enKolumnSidebarHeader' || get_post_meta($post->ID, 'sidor_layout', true) == 'fullBreddHeader' ) { ?>
		<div class="site--intro" style="background:url(<?php echo $image[0]; ?>); height='450px'";></div>
	<?php } else { ?>
		<div class="room box"></div>
	<?php } ?>

<?php endwhile; ?>
<?php else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>
<?php wp_reset_query(); // Nollställ loopen ?>

<?php if (have_posts()) :
	// Om det finns poster så kan vi göra något här
?>
<?php while (have_posts()) : the_post();
	// Här körs loopen för dom poster som finns
?>
	<?php //Hämta meta-box fälten för att använda nedan
	$post_meta_data = get_post_custom($post->ID); ?>

	<div class="container single-page-nyhet" role="main">
		<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'fullBredd' || get_post_meta($post->ID, 'sidor_layout', true) == 'fullBreddHeader' ) { ?>
			<div class="main-content" style="width:100%;">
		<?php } else { ?>
			<div class="main-content">
		<?php } ?>

			<div class="box-12">
				<div class="pufftest">
					<?php the_breadcrumb(); ?>  

					<h2><?php the_title(); ?></h2>
								
					<?php 
					echo apply_filters('the_content', $post_meta_data['sidor_content'][0]);
					?>

				</div>
			</div>	

		<!--/MAIN-->
		</div>

		<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'fullBredd' || get_post_meta($post->ID, 'sidor_layout', true) == 'fullBreddHeader' ) { ?>
		<?php } else { ?>
			<?php get_sidebar('sidebarMain'); ?>
		<?php } ?>

<?php endwhile; ?>	

<?php else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>
	
<?php get_footer(); ?>