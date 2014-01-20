
<?php /*
Denna sida används för alla enskilda sponsorer.
*/ ?>

<?php get_header(); ?>

<div class="room box"></div>

	<div class="container single-page-nyhet" role="main">
		<div class="main-content">

			<div class="box-12">
				<div class="pufftest">
					<!--<div class="breadcrumbs"><h3><span>Start > Nyheter > </span>Förlust i hemmapremiären</h3></div>-->

					<?php the_breadcrumb(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>

	<h1><?php the_title(); ?></h1>

	<?php
	//Om sponsorn har en hemsida, länka dit
	if( get_post_meta($post->ID, 'sponsor_url', true) ){
		echo '<a href="'. $post_meta_data['sponsor_url'][0] .'" target="_blank">Besök hemsida</a>';
	}

	// Visa logotyp
	// Ändra "thumbnail" till den storlek som önskas
	echo wp_get_attachment_image($post_meta_data['sponsor_logo'][0], 'thumbnail');
			
	echo apply_filters('the_content', $post_meta_data['sponsor_info'][0]);
	?>

<?php endwhile; ?>
</div>
</div>		

<!--/MAIN-->
</div>

<?php get_sidebar('sidebarMain'); ?>
<?php else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>

<?php get_footer(); ?>