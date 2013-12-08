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
}

?>