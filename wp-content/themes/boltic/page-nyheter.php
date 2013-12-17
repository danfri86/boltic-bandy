<?php
/*
Template Name: Nyheter
*/
?>

<?php get_header(); ?>

<div class="room box"></div>

	<div class="container single-page-nyhet" role="main">
		<div class="main-content">

			<div class="box-12">
				<div class="pufftest">
					<!--<div class="breadcrumbs"><h3><span>Start > Nyheter > </span>Förlust i hemmapremiären</h3></div>-->

					<?php the_breadcrumb(); ?>
					
					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
					<?php // Specificera mer om dom poster vi vill ha inom ()
					query_posts("post_type=post&paged=". $paged .""); ?>
					<?php if (have_posts()) :
						// Om det finns poster så kan vi göra något här
					?>
					<?php while (have_posts()) : the_post();
						// Här körs loopen för dom poster som finns
					?>
						<div class="nyhet">
							<div class="box-3">
							<?php if ( has_post_thumbnail() ) { ?>
								<?php // Ändra "thumbnail" till den storlek som önskas
								the_post_thumbnail( 'thumbnail' ); ?>
							<?php } else { ?>
								<img src="<?php bloginfo('template_directory') ?>/img/thumbnail-default.jpg" width="148" height="80" />
							<?php } ?>
							</div>

							<div class="box-9">
								<h2><?php the_title(); ?></h2>
								<small><?php the_time('j F, Y'); ?></small>
									
								<?php the_excerpt(); ?>
							</div>
						</div>

					<?php endwhile; ?>
					<div class="pagination"><?php pagination('»', '«'); ?></div>
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