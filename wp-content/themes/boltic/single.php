<?php /*
Denna sida används för alla enskilda nyheter.
Används också för alla posttypers enskilda poster om dom inte har en egen single-posttyp.php.
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

	<h1><?php the_title(); ?></h1>

	<div class="nyhetsInfo">
		<span class="author"><i class="fa fa-user"></i> <?php the_author(); ?></span>
		<span class="author"><i class="fa fa-clock-o"></i><?php the_time(); ?> <?php the_date(); ?> </span>
		<span class="author"><i class="fa fa-folder-open"></i> <?php $category = get_the_category(); 
echo $category[0]->cat_name; ?></span>
	</div>

	<?php the_content(); ?>

	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fbDela"><i class="fa fa-facebook"></i> <span>Dela på Facebook<span></a>
	<a href="https://twitter.com/share" data-lang="en" target="_blank" class="twitterDela"><i class="fa fa-twitter"></i> <span>Dela på Twitter<span></a>
	<a class="showComments" id="showComments">Visa kommentarer <i class="fa fa-chevron-right"></i></a>

	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php endwhile; ?>
</div>
</div>

<div class="box-12" id="comments-nyhet">
	<div class="pufftest">
		<?php comments_template(); ?>
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