<?php
/*
Template Name: Daniel demo
*/
?>

<?php get_header(); ?>

	<div class="kod">
		<p>Här är loopen för den page.php</p>
		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
			<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>
					
			<h1><?php the_title(); ?></h1>
					
			<?php the_content(); ?>

			<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'enKolumnSidebar' ) { ?>
				<p>Innehåll för en kolumn med sidebar.</p>
			<?php } ?>

			<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'enKolumnSidebarHeader' ) { ?>
				<p>Innehåll för en kolumn med sidebar och stor header bild.</p>
			<?php } ?>

			<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'fullBredd' ) { ?>
				<p>Innehåll för fullbredd.</p>
			<?php } ?>

			<?php if( get_post_meta($post->ID, 'sidor_layout', true) == 'fullBreddHeader' ) { ?>
				<p>Innehåll för fullbredd med stor header bild</p>
			<?php } ?>

		<?php endwhile; else:
			// Om det inte finns några poster kan vi göra något här
		?>

		<?php endif; //Slut ?>
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>




	<div class="kod">
		<p>Här hämtas alla nyheter</p>

		<?php // Specificera mer om dom poster vi vill ha inom ()
		// För bildspel kan vi använda showposts=3 för att visa de senaste 3 posterna
		// I det vanliga flödet under kan vi sedan använda offset=3 för att inte ta med de
		// 3 senaste posterna, om det är önskvärt
		query_posts("post_type=post"); ?>
		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
					
			<h1><?php the_title(); ?></h1>

			<?php the_date(); ?>
					
			<?php the_content(); ?>
			
			<p>Featured bild: </p>
			<?php // Ändra "thumbnail" till den storlek som önskas
			the_post_thumbnail( 'thumbnail', array('class' => '')); ?>

		<?php endwhile; else:
			// Om det inte finns några poster kan vi göra något här
		?>

		<?php endif; //Slut ?>
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>



	<div class="kod">
		<p>Här hämtas alla sponsorer</p>

		<?php // Specificera mer om dom poster vi vill ha inom ()
		query_posts("post_type=sponsorer"); ?>
		<?php // För att hämta ur olika kategorier, lägg till:
		// &sponsorer_kat=huvuvdsponsor
		// &sponsorer_kat=guldsponsor
		// &sponsorer_kat=silversponsor
		// &sponsorer_kat=bronssponsor
		?>
		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
			<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>
					
			<h1><?php the_title(); ?></h1>

			<?php
			echo '<p>Sponsorns kategori: ';
			$sponsorKat = get_the_terms( $post->ID, 'sponsorer_kat' );
			
			foreach ( $sponsorKat as $term ) {
				echo $term->name;
			}
			echo '</p>';
			?>

			<?php // obs! Länken omger logotypen
			if( get_post_meta($post->ID, 'sponsor_url', true) ) {
				echo '<a href="'. $post_meta_data['sponsor_url'][0] .'" target="_blank">';
			} ?>

			<?php // Ändra "thumbnail" till den storlek som önskas
			echo wp_get_attachment_image($post_meta_data['sponsor_logo'][0], 'thumbnail'); ?>

			<?php // Slut på länken
			if( get_post_meta($post->ID, 'sponsor_url', true) ) {
				echo '</a>';
			} ?>

			<?php 
				echo apply_filters('the_content', $post_meta_data['sponsor_info'][0]);
			?>

		<?php endwhile; else:
			// Om det inte finns några poster kan vi göra något här
		?>

		<?php endif; //Slut ?>
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>




	<div class="kod">
		<p>Här hämtas alla spelare</p>

		<?php // Specificera mer om dom poster vi vill ha inom ()
		query_posts("post_type=spelare"); ?>
		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
			<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>

			<h1><?php the_title(); ?></h1>

			<?php // Ändra "thumbnail" till den storlek som önskas
			echo wp_get_attachment_image($post_meta_data['spelare_bild'][0], 'thumbnail'); ?>

			<?php if( get_post_meta($post->ID, 'spelare_trojnummer', true) ) {
				echo '<p>Tröjnummer: #'. $post_meta_data['spelare_trojnummer'][0] .'</p>';
			} ?>
			
			<?php if( get_post_meta($post->ID, 'spelare_fodelsear', true) ) {
				echo '<p>Födelsår: '. $post_meta_data['spelare_fodelsear'][0] .'</p>';
			} ?>

			<?php if( get_post_meta($post->ID, 'spelare_langd', true) ) {
				echo '<p>Längd: '. $post_meta_data['spelare_langd'][0] .'cm</p>';
			} ?>

			<?php if( get_post_meta($post->ID, 'spelare_vikt', true) ) {
				echo '<p>Vikt: '. $post_meta_data['spelare_vikt'][0] .'kg</p>';
			} ?>

			<?php if (get_post_meta($post->ID, 'spelare_spelposition', true)) {
				$positioner = $post_meta_data['spelare_spelposition'];
				$raknare = 1; // Ränka antalet varv i foreach>else>if-loopen

				// Om en spelare har flera spelpositioner skrivs dom ut med , mellan
				// Har spelaren en position skrivs endast positionen ut
				echo '<p>Spelposition: ';
				foreach($positioner as $position){
					if( count($positioner) == 1 )
						echo $position;
					else {
						if( $raknare == 1 ) {
							echo $position;
						} else {
							echo ', '. $position;
						}
						$raknare++;
					}
				}
				echo '</p>';
			}
			?>
					
			<?php 
				echo apply_filters('the_content', $post_meta_data['spelare_info'][0]);
			?>

		<?php endwhile; else:
			// Om det inte finns några poster kan vi göra något här
		?>

		<?php endif; //Slut ?>
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>






	<div class="kod">
		<p>Här hämtas alla puffar</p>

		<?php // Specificera mer om dom poster vi vill ha inom ()
		query_posts("post_type=puffar"); ?>
		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
			<?php $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan ?>
			
			<?php // Om det finns en länk så omsluter den hela nyheten=större klickarea
			if( get_post_meta($post->ID, 'puffar_url', true) ) {
				echo '<a href="'. $post_meta_data['puffar_url'][0] .'" target="_blank">';
			} ?>

			<h1><?php the_title(); ?></h1>
					
			<?php 
				echo apply_filters('the_content', $post_meta_data['puffar_info'][0]);
			?>

			<?php // Här slutar länken om det finns någon
			if( get_post_meta($post->ID, 'puffar_url', true) ) {
				echo '</a>';
			} ?>

		<?php endwhile; else:
			// Om det inte finns några poster kan vi göra något här
		?>

		<?php endif; //Slut ?>
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>







	<div class="kod">
		<p>Här hämtas aktiviteter från kalendern</p>

		<?php // Specificera mer om dom poster vi vill ha inom ()
		// Gör så att den aktivitet med närmast datum från idag visas först
		$today = date('Y-m-d');
		$args = array(
			'post_type' => 'kalender',
			'posts_per_page' => 2,
			'meta_key' => 'kalender_datum',
			'orderby' => 'meta_value',
			'order' => ASC,
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

		<?php if (have_posts()) :
			// Om det finns poster så kan vi göra något här
		?>
		<?php while (have_posts()) : the_post();
			// Här körs loopen för dom poster som finns
		?>
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
		<?php wp_reset_query(); // Nollställ loopen ?>
	</div>
	
<?php get_footer(); ?>