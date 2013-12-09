<?php /*
Denna sida används för alla enskilda nyheter.
Används också för alla posttypers enskilda poster om dom inte har en egen single-posttyp.php.
*/ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
	<h1><?php the_title(); ?></h1>

	<?php the_date(); ?>
					
	<?php the_content(); ?>

<?php endwhile; else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>

<?php get_footer(); ?>