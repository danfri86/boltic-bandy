<?php /*
Denna sida används för alla enskilda nyheter.
Används också för alla posttypers enskilda poster om dom inte har en egen single-posttyp.php.
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

	<h1><?php the_title(); ?></h1>

	<div class="nyhetsInfo">
		<span class="author"><i class="fa fa-user"></i> <?php the_author(); ?></span>
		<span class="author"><i class="fa fa-clock-o"></i> <?php the_date(); ?></span>
		<span class="author"><i class="fa fa-folder-open"></i> <?php $category = get_the_category(); 
echo $category[0]->cat_name; ?></span>
	</div>

	<?php the_content(); ?>

	<a class="showComments" id="showComments">Visa kommentarer <i class="fa fa-chevron-right"></i></a>	

<?php endwhile; ?>
</div>
</div>

<div class="box-12" id="comments">
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