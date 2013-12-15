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

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="site--intro" style="background:url(<?php echo $image[0] ?>); height='450px'";>
	<?php } else { ?>
		<div class="site--intro">
	<?php } ?>
		<div class="text">
			<div class="container">
				<a href="<?php the_permalink(); ?>">
					<span>
				    	<h1><b>SENASTE: </b><?php the_title(); ?></h1>
				    	<?php the_excerpt(); ?>
				 	</span>
					
					<a class="btn">Läs mer <i class="fa fa-chevron-right"></i></a>
				</a>
			</div>
		</div>
	</div>

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

				<?php the_post_thumbnail( 'thumbnail', array('class' => 'nyhet--bild box')); ?>
				
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

          
    <div class="box-6">
       <div class="puff nastamatch">
          <h3>Nästa match</h3>
          <div class="box-12 logos">
             <span class="box-5 phone-6"><img src="http://www.relita.se/data/galleri/idrott/vsk-bandy.gif"></span>
             <span class="box-2 vs phone-hidden"><small>vs.</small></span>
             <span class="box-5 phone-6"><img src="http://4.bp.blogspot.com/-koEU1sIamAc/UneWRNhs_9I/AAAAAAAAi4w/vdvEWSk3Ls4/s1600/Hammarby+IF.gif"></span>
          </div>
          <span class="lagen"><small><i class="fa fa-flag"></i> IF Boltic vs. Hammarby</span>
          <span class="arena"><i class="fa fa-map-marker"></i> Friends Arena</span>
          <span class="tid"><i class="fa fa-clock-o"></i> Söndagen 24/11 kl 15.00</span></small>
       </div>
    </div>

    <?php // Specificera mer om dom poster vi vill ha inom ()
	query_posts("post_type=puffar"); ?>
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
                <a href="#" class="btn">Bli medlem <i class="fa fa-chevron-right"></i></a>
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
			<h1><?php the_title(); ?></h1>
				
			<?php if( get_post_meta($post->ID, 'kalender_datum', true) ) {
				echo '<p>Datum: '. $post_meta_data['kalender_datum'][0] .'</p>';
			} ?>

			<?php if( get_post_meta($post->ID, 'kalender_tid', true) ) {
				echo '<p>Tid: '. $post_meta_data['kalender_tid'][0] .'</p>';
			} ?>
					
			<?php if( get_post_meta($post->ID, 'kalender_info', true) ) {
				echo apply_filters('the_content', $post_meta_data['kalender_info'][0]);
			} ?>
		</div>
	<?php endwhile; ?>
		<a class="btn" href="<?php bloginfo('url'); ?>/kalender">
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
 <div class="sidebar box">
    <div class="box-12 social">
       <a href="" class="fb"><i class="fa fa-facebook"></i> Följ på Facebook</a>
       <a href="" class="twit"><i class="fa fa-twitter"></i> Följ på Twitter</a>
       <div class="box-12 nyhetsbrev">
          <h3><i class="fa fa-envelope-o"></i> Nyhetsbrev</h3>
          <p>Senaste nyheterna direkt i mailen.</p>
          <input type="text" placeholder="Din e-mailadress">
       </div>
    </div>
    <div class="box-12 tabellen">
       <h3><i class="fa fa-table"></i> Tabellen</h3>
       <iframe height="220" width="100%" src="http://templates.lagta.idrottonline.se/ft.aspx?scr=tablemedium&ftid=2&sportid=5"></iframe>
    </div>
    <div class="box-12 gastbok">
       <h3><i class="fa fa-comment-o"></i> Skriv i gästboken</h3>
       <input type="text" placeholder="Ditt namn">
       <input type="text" placeholder="Ditt meddelande">
       <a href="" class="btn">Skicka <i class="fa fa-chevron-right"></i></a>
    </div>
    <div class="box-12 alaget">
       <h3><i class="fa fa-user"></i> A-laget</h3>
       <div class="box-12">
          <img src="http://vskbandy.se/wp-content/uploads/2013/11/AkselEkblom.jpg">
          <p> <span>#20</span> Jonatan Lidholm</p>
       </div>
    </div>
 </div>
 <!-- TABLET SIDEBAR -->
 <div id="sidr" class="toggleSidebar">
    <ul>
       <a id="menuTablet" href="javascript:void(0)">x <span>stäng</span></a>
       <li>Nyheter <small>Senaste nyheterna</small> <i class="fa fa-chevron-right"></i></li>
       <li>Laget <small>Allt om laget</small> <i class="fa fa-chevron-right"></i></li>
       <li>Historik <small>Då & nu</small> <i class="fa fa-chevron-right"></i></li>
       <li>Ungdom <small>Vår framtid</small> <i class="fa fa-chevron-right"></i></li>
       <li>Gästbok <small>Klotterplank</small> <i class="fa fa-chevron-right"></i></li>
       <li>Kontakt <small>Personer & kansli</small> <i class="fa fa-chevron-right"></i></li>
    </ul>
    <div class="box-12 social">
       <a href="" class="fb"><i class="fa fa-facebook"></i> Följ på Facebook</a>
       <a href="" class="twit"><i class="fa fa-twitter"></i> Följ på Twitter</a>
       <div class="box-12 nyhetsbrev">
          <h3><i class="fa fa-envelope-o"></i> Nyhetsbrev</h3>
          <p>Senaste nyheterna direkt i mailen.</p>
          <input type="text" placeholder="Din e-mailadress">
       </div>
    </div>
    <div class="box-12 tabellen">
       <h3><i class="fa fa-table"></i> Tabellen</h3>
       <iframe height="220" width="100%" src="http://templates.lagta.idrottonline.se/ft.aspx?scr=tablemedium&ftid=2&sportid=5"></iframe>
    </div>
    <div class="box-12 gastbok">
       <h3><i class="fa fa-comment-o"></i> Skriv i gästboken</h3>
       <input type="text" placeholder="Ditt namn">
       <input type="text" placeholder="Ditt meddelande">
       <a href="" class="btn">Skicka <i class="fa fa-chevron-right"></i></a>
    </div>
    <div class="box-12 alaget">
       <h3><i class="fa fa-user"></i> A-laget</h3>
       <div class="box-12">
          <img src="http://vskbandy.se/wp-content/uploads/2013/11/AkselEkblom.jpg">
          <p> <span>#20</span> Jonatan Lidholm</p>
       </div>
    </div>
 </div>
</div>

<?php get_footer(); ?>