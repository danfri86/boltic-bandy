<?php
/*

Här tar vi bort och lägger till egna kolumner på översikten för alla posttyper

*/


/*********************
Sponsorer
*********************/
add_filter('manage_sponsorer_posts_columns', 'sponsorer_kolumn_head', 10);  
add_action('manage_sponsorer_posts_custom_column', 'sponsorer_kolumn_content', 10, 2);

function sponsorer_kolumn_head($defaults) {
	$defaults['sponsortyp'] = 'Sponsortyp';
	$defaults['logo'] = 'Logo';
    
    // Byt namn på title
   	$defaults['title'] = _x('Sponsor', 'column name');

    unset($defaults['categories']);
    unset($defaults['author']);
    unset($defaults['tags']);
    unset($defaults['comments']);
    unset($defaults['date']);
    return $defaults; 
}  
  
function sponsorer_kolumn_content($column_name, $post_ID) {
	$post_meta_data = get_post_custom($post->ID);
	
	if($column_name == 'sponsortyp') {
		$sponsorKat = get_the_terms( $post->ID, 'sponsorer_kat' );
		
		foreach ( $sponsorKat as $term ) {
			echo $term->name;
		}
    }
	
	if($column_name == 'logo') {
		echo wp_get_attachment_image($post_meta_data['sponsor_logo'][0], 'thumbnail');
	}
}

/*********************
Spelare
*********************/
add_filter('manage_spelare_posts_columns', 'spelare_kolumn_head', 10);  
add_action('manage_spelare_posts_custom_column', 'spelare_kolumn_content', 10, 2);

function spelare_kolumn_head($defaults) {
	$defaults['fodelsear'] = 'Födelseår';
	$defaults['spelposition'] = 'Spelposition';
	$defaults['trojnummer'] = 'Tröjnummer';

	// Byt namn på title
   	$defaults['title'] = _x('Spelare', 'column name');
    
    unset($defaults['categories']);
    unset($defaults['author']);
    unset($defaults['tags']);
    unset($defaults['comments']);
    unset($defaults['date']);
    return $defaults;  
}  
  
function spelare_kolumn_content($column_name, $post_ID) { 
	$post_meta_data = get_post_custom($post->ID);
	
	if($column_name == 'fodelsear') {  
		echo $post_meta_data['spelare_fodelsear'][0];
    } 
	
	if($column_name == 'spelposition') {
		$positioner = $post_meta_data['spelare_spelposition'];
		$raknare = 1; // Ränka antalet varv i foreach>else>if-loopen

		// Om en spelare har flera spelpositioner skrivs dom ut med , mellan
		// Har spelaren en position skrivs endast positionen ut
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
	}

	if($column_name == 'trojnummer') {  
		echo $post_meta_data['spelare_trojnummer'][0];
    } 
}

/*********************
Medlemmar
*********************/
add_filter('manage_medlemmar_posts_columns', 'medlemmar_kolumn_head', 10);  
add_action('manage_medlemmar_posts_custom_column', 'medlemmar_kolumn_content', 10, 2);

function medlemmar_kolumn_head($defaults) {
	$defaults['medlemSedan'] = 'Medlem sedan';
	$defaults['utgangsDatum'] = 'Utgångsdatum';
	$defaults['email'] = 'E-post';
	$defaults['betald'] = 'Avgift betald';

	// Byt namn på title
   	$defaults['title'] = _x('Namn', 'column name');
    
    unset($defaults['categories']);
    unset($defaults['author']);
    unset($defaults['tags']);
    unset($defaults['comments']);
    unset($defaults['date']);
    return $defaults;  
}  
  
function medlemmar_kolumn_content($column_name, $post_ID) { 
	$post_meta_data = get_post_custom($post->ID);
	
	if($column_name == 'medlemSedan') {  
		echo $post_meta_data['medlemmar_medlemSedan'][0];
    }
	
	if($column_name == 'utgangsDatum') {
		echo $post_meta_data['medlemmar_utgangsdatum'][0];
	}

	if($column_name == 'email') {  
		echo $post_meta_data['medlemmar_epost'][0];
    }

    if($column_name == 'betald') {
		if( $post_meta_data['medlemmar_betald'][0] )
			echo 'Ja';
    	else
    		echo 'Nej';
    }
}

// Dessa indenterade funktioner gör så att det går att sortera kolumnerna för bättre översikt
	add_filter( 'manage_edit-medlemmar_sortable_columns', 'medlemmar_sortable_columns' );
	function medlemmar_sortable_columns( $columns ) {
		$columns['utgangsDatum'] = 'utgangsDatum';
		$columns['betald'] = 'betald';
		return $columns;
	}

	// Kör bara på edit sidan i admin
	add_action( 'load-edit.php', 'my_edit_medlemmar_load' );
	function my_edit_medlemmar_load() {
		add_filter( 'request', 'my_sort_medlemmar' );
	}

	// Sortera medlemmarna
	function my_sort_medlemmar( $vars ) {
		/* Check if we're viewing the 'movie' post type. */
		if ( isset( $vars['post_type'] ) && 'medlemmar' == $vars['post_type'] ) {
			// Kolla om ordning är satt efter utgångsdatum
			if ( isset( $vars['orderby'] ) && 'utgangsDatum' == $vars['orderby'] ) {
				// Kolla mot dom egna metafälten
				$vars = array_merge(
					$vars,
					array(
						'meta_key' => 'medlemmar_utgangsdatum',
						'orderby' => 'meta_value'
					)
				);
			}
			
			// Kolla om ordning är satt efter betalning
			if ( isset( $vars['orderby'] ) && 'betald' == $vars['orderby'] ) {
				// Kolla mot dom egna metafälten
				$vars = array_merge(
					$vars,
					array(
						'meta_key' => 'medlemmar_betald',
						'orderby' => 'meta_value'
					)
				);
			}
		}
		return $vars;
	}

/*********************
Kalender
*********************/
add_filter('manage_kalender_posts_columns', 'kalender_kolumn_head', 10);  
add_action('manage_kalender_posts_custom_column', 'kalender_kolumn_content', 10, 2);

function kalender_kolumn_head($defaults) {
	$defaults['datum'] = 'Datum';
	$defaults['tid'] = 'Tid';
	$defaults['kategori'] = 'Kategori';

	// Byt namn på title
   	$defaults['title'] = _x('Aktivitet', 'column name');
    
    unset($defaults['categories']);
    unset($defaults['author']);
    unset($defaults['tags']);
    unset($defaults['comments']);
    unset($defaults['date']);
    return $defaults;  
}  
  
function kalender_kolumn_content($column_name, $post_ID) { 
	$post_meta_data = get_post_custom($post->ID);
	
	if($column_name == 'datum') {  
		echo $post_meta_data['kalender_datum'][0];
    } 
	
	if($column_name == 'tid') {
		echo $post_meta_data['kalender_tid'][0];
	}

	if($column_name == 'kategori') {
		$kalenderKat = get_the_terms( $post->ID, 'kalender_typ' );
		
		foreach ( $kalenderKat as $term ) {
			echo $term->name;
		}
	}
}

?>