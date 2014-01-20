<?php get_header(); ?>

<?php // Specificera mer om dom poster vi vill ha inom ()
query_posts("post_type=post&posts_per_page=1"); ?>
<?php if (have_posts()) :
	// Om det finns poster så kan vi göra något här
?>
<?php while (have_posts()) : the_post();
	// Här körs loopen för dom poster som finns
?>
	
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bannerimg' ); ?>

	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="site--intro" style="background:url(<?php echo $image[0] ?>); height='450px'";>
		<?php } else { ?>
			<div class="site--intro" style="background:url(<?php global $NHP_Options; $NHP_Options->show('banner_default_image'); ?>); height='450px'">
		<?php } ?>
			<div class="text">
				<div class="container">
						<span>
					    	<h1><b>SENASTE: </b><?php the_title(); ?></h1>
					    	<?php the_excerpt(); ?>
					 	</span>
						
				</div>
			</div>
		</div>
	</a>

<?php endwhile; else:
	// Om det inte finns några poster kan vi göra något här
?>

<?php endif; //Slut ?>
<?php wp_reset_query(); // Nollställ loopen ?>


<div class="container" role="main">
 <div class="main-content">

 	<?php // Specificera mer om dom poster vi vill ha inom ()
	query_posts("post_type=post&posts_per_page=2&offset=1"); ?>
	<?php if (have_posts()) : ?>
		<div class="box-12">
		<div class="puff nyheter">
        <h3>nyheter</h3>
	<?php while (have_posts()) : the_post(); ?>
		
		<div class="nyhet--container">
			<a href="<?php the_permalink(); ?>">

				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'thumbnail', array('class' => 'nyhet--bild box')); ?>
				<?php } else { ?>
					<img class="nyhet--bild box" src="<?php bloginfo('template_directory') ?>/img/thumbnail-default.jpg" width="148" height="80" />
				<?php } ?>
				
				<div class="nyhet--innehall box">
					<h2><?php the_title(); ?></h2>
					<small><?php the_date(); ?></small>
					<?php the_excerpt(); ?>
				</div>
			</a>
		</div>

    <?php endwhile; ?>
    	<a href="<?php bloginfo('url'); ?>/nyheter" class="btn">Till nyhetsarkivet <i class="fa fa-long-arrow-right"></i></a>
		</div>
		</div>
	<?php else: ?>
 
    <?php endif; //Slut ?>
	<?php wp_reset_query(); // Nollställ loopen ?>

	<?php // Specificera mer om dom poster vi vill ha inom ()
	query_posts("post_type=sponsorer&posts_per_page=4&orderby=rand"); ?>
	<?php if (have_posts()) : ?>
		<div class="box-12">
		<div class="puff puff-sponsor">
		<ul class="sponsorer-framsida">
	<?php while (have_posts()) : the_post(); ?>
		
		<li>
			<?php
			$post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan

			// Om sponsorn har en dedikerad sida, länka till den
			if( get_post_meta($post->ID, 'sponsor_dedikerad_sida', true) ){
				echo '<a href="';
				the_permalink();
				echo '">';
			} else{ // Om sponsorn inte har en dedikerad sida
				//Om sponsorn har en hemsida, länka dit
				if( get_post_meta($post->ID, 'sponsor_url', true) )
					echo '<a href="'. $post_meta_data['sponsor_url'][0] .'" target="_blank">';
			}

			// Visa logotyp
			// Ändra "thumbnail" till den storlek som önskas
			echo wp_get_attachment_image($post_meta_data['sponsor_logo'][0], 'sponsor-logo');

			echo '<p>'. get_the_title() .'</p>';

			// Stäng länk om det finns en dedikerad sida eller hemsida
			if( get_post_meta($post->ID, 'dedikerad_sida', true) || get_post_meta($post->ID, 'sponsor_url', true) )
				echo '</a>';
			?>
		</li>

    <?php endwhile; ?>
		</ul>
		</div>
		</div>
	<?php else: ?>
 
    <?php endif; //Slut ?>
	<?php wp_reset_query(); // Nollställ loopen ?>

	 <?php // Specificera mer om dom poster vi vill ha inom ()
	// Gör så att den aktivitet med närmast datum från idag visas först
	$today = date('Y-m-d');
	$args = array(
		'post_type' => 'kalender',
		'posts_per_page' => 1,
		'kalender_typ' => 'match',
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
		<div class="box-6">
		<div class="puff nastamatch">
        <h3>Nästa match</h3>
	<?php while (have_posts()) : the_post();
		// Här körs loopen för dom poster som finns
	?>
		
		<?php $post_meta_data = get_post_custom($post->ID); ?>

          <div class="box-12 logos">
             <span class="box-5 phone-6">
             	<img src="<?php bloginfo('template_directory'); ?>/img/lag-boltic.gif" width="80" height="80">
             </span>

             <span class="box-2 vs phone-hidden">
             	<small>vs.</small>
             </span>
             
             <span class="box-5 phone-6">
             	<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Tillberga Bandy' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/TillbergaBandy.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Katrineholm VBS' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/KatrineholmsVBS.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'IK Tellus' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/IKtellus.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Haparanda Tornio' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/HaparandaTornio.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'UNIK' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/Unik.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'IFK Rättvik Bandy' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/IFKrattvikbandy.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Örebro SK' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/OrebroSK.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Borlänge Bandy' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/BorlangeBandy.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Gustavsberg IF' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/GustavsbergsIFBK.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Selånger Bandy' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/SelangerBandy.png" />';
				} ?>

				<?php // Om laget är valt i listan, visa motsvarande logo
				if( get_post_meta($post->ID, 'kalender_motstandare', true) == 'Härnösand AIK' ) {
					echo '<img src="';
					bloginfo("template_directory");
					echo '/img/lag/Harnosand.png" />';
				} ?>

             	<?php // Om en lag-logo är uppladdad, visa den
			echo wp_get_attachment_image($post_meta_data['kalender_logo'][0], 'lag-logo'); ?>
             </span>
          </div>

		<span class="lagen"><small><i class="fa fa-flag"></i> IF Boltic vs.
			<?php // Om laget är valt i listan, skriv ut det
			if( get_post_meta($post->ID, 'kalender_motstandare', true) ) {
				echo $post_meta_data['kalender_motstandare'][0];
			} ?>

			<?php // Om laget inte finns i listan och är självskrivet
			if( get_post_meta($post->ID, 'kalender_alternativtlag', true) ) {
				echo $post_meta_data['kalender_alternativtlag'][0];
			} ?>
		</span>

		<?php // Om plats är valt, skriv ut det
		if( get_post_meta($post->ID, 'kalender_plats', true) ) {
				echo '<span class="arena"><i class="fa fa-map-marker"></i>';
				echo ' '. $post_meta_data['kalender_plats'][0];
				echo '</span>';
		} ?>

		<?php // Om datum och tid är valt, skriv ut det
		if( get_post_meta($post->ID, 'kalender_datum', true) || get_post_meta($post->ID, 'kalender_tid', true) ) {
				echo '<span class="tid"><i class="fa fa-clock-o"></i>';
				echo ' '. $post_meta_data['kalender_datum'][0];

				if( get_post_meta($post->ID, 'kalender_tid', true) )
					echo ' Kl. '. $post_meta_data['kalender_tid'][0];
				echo '</span></small>';
		} ?>

	<?php endwhile; ?>
		</div>
		</div>
	<?php else:
		// Om det inte finns några poster kan vi göra något här
	?>

	<?php endif; //Slut ?>
	<?php wp_reset_query(); // Nollställ loopen ?>

    <?php // Specificera mer om dom poster vi vill ha inom ()
	query_posts("post_type=puffar&posts_per_page=1"); ?>
	<?php if (have_posts()) : ?>
		<div class="box-6">
		<div class="puff ovrigt">
			<h3>övrigt</h3>
	<?php while (have_posts()) : the_post(); ?>
		<?php //Hämta meta-box fälten för att använda nedan
		$post_meta_data = get_post_custom($post->ID); ?>  

          <h2><?php the_title(); ?></h2>
          <small><?php the_date(); ?></small>
          
			<?php 
			echo apply_filters('the_content', $post_meta_data['puffar_info'][0]);
			?>

			<?php // Om det finns en länk så omsluter den hela nyheten=större klickarea
			if( get_post_meta($post->ID, 'puffar_url', true) ) {
				echo '<a class="btn" href="'. $post_meta_data['puffar_url'][0] .'" target="_blank">';
			} ?>
				Läs mer <i class="fa fa-chevron-right"></i>
			<?php // Här slutar länken om det finns någon
			if( get_post_meta($post->ID, 'puffar_url', true) ) {
				echo '</a>';
			} ?>
	<?php endwhile; ?>
		</div>
		</div>
	<?php else: ?>
 
    <?php endif; //Slut ?>
	<?php wp_reset_query(); // Nollställ loopen ?>

    <div class="box-12">
       <div class="puff boltic">
          <h3>Bli en del av boltic</h3>
          <div class="box-6">
             <div class="box-4"><img class="sponsor phone-6 center" src="<?php bloginfo('template_directory'); ?>/img/sponsor.png" alt="" width="140"></div>
             <div class="box-8">
                <h2>Sponsra</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <a href="#" class="btn">Sponsra <i class="fa fa-chevron-right"></i></a>
             </div>
          </div>
          <div class="box-6">
             <div class="box-4"><img class="phone-6 center" src="<?php bloginfo('template_directory'); ?>/img/member.png" alt="" width="100%"></div>
             <div class="box-8">
                <h2>Bli medlem</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <a href="<?php bloginfo('url'); ?>/bli-medlem" class="btn">Bli medlem <i class="fa fa-chevron-right"></i></a>
             </div>
          </div>
       </div>
    </div>

    <?php // Specificera mer om dom poster vi vill ha inom ()
	// Gör så att den aktivitet med närmast datum från idag visas först
	$today = date('Y-m-d');
	$args = array(
		'post_type' => 'kalender',
		'posts_per_page' => 1,
		'kalender_typ' => 'ovrigt',
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
		<div class="box-6">
		<div class="puff">
        <h3>Nästa aktivitet</h3>
	<?php while (have_posts()) : the_post();
		// Här körs loopen för dom poster som finns
	?>
		<?php $post_meta_data = get_post_custom($post->ID); ?>

		<div class="calendar">
			<h2><?php the_title(); ?></h2>
				
			<?php if( get_post_meta($post->ID, 'kalender_datum', true) ) {
				echo '<p><i class="fa fa-calendar"></i>  '. $post_meta_data['kalender_datum'][0] .'</p>';
			} ?>

			<?php if( get_post_meta($post->ID, 'kalender_tid', true) ) {
				echo '<p><i class="fa fa-clock-o"></i> '. $post_meta_data['kalender_tid'][0] .'</p>';
			} ?>

			<?php // Om plats är valt, skriv ut det
			if( get_post_meta($post->ID, 'kalender_plats', true) ) {
				echo '<p><i class="fa fa-map-marker"></i> ' . $post_meta_data['kalender_plats'][0] . '</p>';
			} ?>
					
			<?php if( get_post_meta($post->ID, 'kalender_info', true) ) {
				echo apply_filters('the_content', $post_meta_data['kalender_info'][0]);
			} ?>
		</div>
	<?php endwhile; ?>
		<a class="btn cal-btn" href="<?php bloginfo('url'); ?>/kalender">
			Till kalendern <i class="fa fa-chevron-right"></i>
		</a>

		</div>
		</div>
	<?php else:
		// Om det inte finns några poster kan vi göra något här
	?>

	<?php endif; //Slut ?>
	<?php wp_reset_query(); // Nollställ loopen ?>

    <div class="box-6">
       <div class="puff ovrigt">
          <h3>annons</h3>
          <h2>Volvo sponsrar</h2>
          <small>10 november 2013</small>
          <p>Lorem ipsum sit amet, consectetur adipiscing elit. Lorem dolor sit amet, consectetur adipiscing elit...</p>
          <a href="" class="btn">Läs mer <i class="fa fa-chevron-right"></i></a>
       </div>
    </div>
    <!--/MAIN-->
 </div>

 <?php get_sidebar('sidebarMain'); ?>

<?php get_footer(); ?>