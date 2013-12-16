<?php

// skapa funktionen för posttyper
function boltic_post_type() { 
	// registrera posttyp
	register_post_type( 'puffar', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// lägg till inställningar för denna posttyp
		array('labels' => array(
			'name' => __('Puffar', 'puffar'), /* Titel på gruppen av poster */
			'singular_name' => __('Puff', 'puff'), /* Individuell typ */
			'add_new' => __('Lägg till ny', 'puff'), /* Text för att skapa ny i menyn */
			'add_new_item' => __('Lägg till ny puff'), /* Text för lägg till ny posttyp */
			'edit' => __( 'Redigera' ), /* Redigera */
			'edit_item' => __('Redigera puff'), /* Redigera posttyp */
			'new_item' => __('Ny puff'), /* Ny posttyp */
			'view_item' => __('Visa puff'), /* Visa posttyp */
			'search_items' => __('Sök puff'), /* Sök posttyp */ 
			'not_found' =>  __('Ingenting hittades i databasen.'), /* Visas om inga poster är gjorda */ 
			'not_found_in_trash' => __('Ingenting hittades i Papperskorgen.'), /* Om inget hittas i papperskorgen */
			'parent_item_colon' => ''
			), /* Slut på labels */
			'description' => __( 'Mini-nyheter "puffar" för Boltic Göta' ), /* posttyp beskrivning */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4, /* Var i menyn ska posttypen visas */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/custom-post-type/img/post_type_puffar.png', /* Ikon för posttypen i menyn */
			// Denna är standard 'rewrite' => true,
			'rewrite' => array(
			    'slug' => 'puff',
			 ),
			'capability_type' => 'post',
			'hierarchical' => false,
			/* Nästa förklarar vilka metaboxar som ska visas */
			'supports' => array( 'title')
	 	) /* slut på inställningar för posttyp */
	); /* slut för registrering av posttyp */

	register_post_type( 'sponsorer', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// lägg till inställningar för denna posttyp
		array('labels' => array(
			'name' => __('Sponsorer', 'sponsorer'), /* Titel på gruppen av poster */
			'singular_name' => __('Sponsor', 'sponsor'), /* Individuell typ */
			'add_new' => __('Lägg till ny', 'sponsor'), /* Text för att skapa ny i menyn */
			'add_new_item' => __('Lägg till ny sponsor'), /* Text för lägg till ny posttyp */
			'edit' => __( 'Redigera' ), /* Redigera */
			'edit_item' => __('Redigera sponsor'), /* Redigera posttyp */
			'new_item' => __('Ny sponsor'), /* Ny posttyp */
			'view_item' => __('Visa sponsor'), /* Visa posttyp */
			'search_items' => __('Sök sponsor'), /* Sök posttyp */ 
			'not_found' =>  __('Ingenting hittades i databasen.'), /* Visas om inga poster är gjorda */ 
			'not_found_in_trash' => __('Ingenting hittades i Papperskorgen.'), /* Om inget hittas i papperskorgen */
			'parent_item_colon' => ''
			), /* Slut på labels */
			'description' => __( 'Sponsorer för Boltic Göta' ), /* posttyp beskrivning */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 6, /* Var i menyn ska posttypen visas */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/custom-post-type/img/post_type_sponsorer.png', /* Ikon för posttypen i menyn */
			// Denna är standard 'rewrite' => true,
			'rewrite' => array(
			    'slug' => 'sponsor',
			 ),
			'capability_type' => 'page',
			'hierarchical' => false,
			/* Nästa förklarar vilka metaboxar som ska visas */
			'supports' => array( 'title')
	 	) /* slut på inställningar för posttyp */
	); /* slut för registrering av posttyp */

	register_post_type( 'spelare', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// lägg till inställningar för denna posttyp
		array('labels' => array(
			'name' => __('Spelare', 'spelare'), /* Titel på gruppen av poster */
			'singular_name' => __('Spelare', 'spelare'), /* Individuell typ */
			'add_new' => __('Lägg till ny', 'spelare'), /* Text för att skapa ny i menyn */
			'add_new_item' => __('Lägg till ny spelare'), /* Text för lägg till ny posttyp */
			'edit' => __( 'Redigera' ), /* Redigera */
			'edit_item' => __('Redigera spelare'), /* Redigera posttyp */
			'new_item' => __('Ny spelare'), /* Ny posttyp */
			'view_item' => __('Visa spelare'), /* Visa posttyp */
			'search_items' => __('Sök spelare'), /* Sök posttyp */ 
			'not_found' =>  __('Ingenting hittades i databasen.'), /* Visas om inga poster är gjorda */ 
			'not_found_in_trash' => __('Ingenting hittades i Papperskorgen.'), /* Om inget hittas i papperskorgen */
			'parent_item_colon' => ''
			), /* Slut på labels */
			'description' => __( 'Spelare för Boltic Göta' ), /* posttyp beskrivning */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 5, /* Var i menyn ska posttypen visas */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/custom-post-type/img/post_type_spelare.png', /* Ikon för posttypen i menyn */
			// Denna är standard 'rewrite' => true,
			'rewrite' => array(
			    'slug' => 'spelare',
			 ),
			'capability_type' => 'page',
			'hierarchical' => false,
			/* Nästa förklarar vilka metaboxar som ska visas */
			'supports' => array( 'title')
	 	) /* slut på inställningar för posttyp */
	); /* slut för registrering av posttyp */

	register_post_type( 'medlemmar', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// lägg till inställningar för denna posttyp
		array('labels' => array(
			'name' => __('Medlemmar', 'medlemmar'), /* Titel på gruppen av poster */
			'singular_name' => __('Medlem', 'medlem'), /* Individuell typ */
			'add_new' => __('Lägg till ny', 'medlem'), /* Text för att skapa ny i menyn */
			'add_new_item' => __('Lägg till ny medlem'), /* Text för lägg till ny posttyp */
			'edit' => __( 'Redigera' ), /* Redigera */
			'edit_item' => __('Redigera medlem'), /* Redigera posttyp */
			'new_item' => __('Ny medlem'), /* Ny posttyp */
			'view_item' => __('Visa medlem'), /* Visa posttyp */
			'search_items' => __('Sök medlem'), /* Sök posttyp */ 
			'not_found' =>  __('Ingenting hittades i databasen.'), /* Visas om inga poster är gjorda */ 
			'not_found_in_trash' => __('Ingenting hittades i Papperskorgen.'), /* Om inget hittas i papperskorgen */
			'parent_item_colon' => ''
			), /* Slut på labels */
			'description' => __( 'Medlemmar i Boltic Göta' ), /* posttyp beskrivning */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* Var i menyn ska posttypen visas */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/custom-post-type/img/post_type_medlemmar.png', /* Ikon för posttypen i menyn */
			// Denna är standard 'rewrite' => true,
			'rewrite' => array(
			    'slug' => 'medlem',
			 ),
			'capability_type' => 'page',
			'hierarchical' => false,
			/* Nästa förklarar vilka metaboxar som ska visas */
			'supports' => array( 'title')
	 	) /* slut på inställningar för posttyp */
	); /* slut för registrering av posttyp */
	
	register_post_type( 'kalender', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// lägg till inställningar för denna posttyp
		array('labels' => array(
			'name' => __('Kalender', 'kalender'), /* Titel på gruppen av poster */
			'singular_name' => __('Aktivitet', 'aktivitet'), /* Individuell typ */
			'add_new' => __('Lägg till ny', 'aktivitet'), /* Text för att skapa ny i menyn */
			'add_new_item' => __('Lägg till ny aktivitet'), /* Text för lägg till ny posttyp */
			'edit' => __( 'Redigera' ), /* Redigera */
			'edit_item' => __('Redigera aktivitet'), /* Redigera posttyp */
			'new_item' => __('Ny aktivitet'), /* Ny posttyp */
			'view_item' => __('Visa aktivitet'), /* Visa posttyp */
			'search_items' => __('Sök aktivitet'), /* Sök posttyp */ 
			'not_found' =>  __('Ingenting hittades i databasen.'), /* Visas om inga poster är gjorda */ 
			'not_found_in_trash' => __('Ingenting hittades i Papperskorgen.'), /* Om inget hittas i papperskorgen */
			'parent_item_colon' => ''
			), /* Slut på labels */
			'description' => __( 'Kalender för Boltic Göta' ), /* posttyp beskrivning */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* Var i menyn ska posttypen visas */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/custom-post-type/img/post_type_kalender.png', /* Ikon för posttypen i menyn */
			// Denna är standard 'rewrite' => true,
			'rewrite' => array(
			    'slug' => 'kalender',
			 ),
			'capability_type' => 'post',
			'hierarchical' => false,
			/* Nästa förklarar vilka metaboxar som ska visas */
			'supports' => array( 'title')
	 	) /* slut på inställningar för posttyp */
	); /* slut för registrering av posttyp */
	
	/* this ads your post categories to your custom post type */
	// register_taxonomy_for_object_type('category', 'custom_type');
	/* this ads your post tags to your custom post type */
	// register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'boltic_post_type');
	
	/*
	för mer information om taxonomies, titta här:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// lägg till egna kategorier
    register_taxonomy( 'sponsorer_kat', 
    	array('sponsorer'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Sponsortyp' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Sponsortyp' ), /* single taxonomy name */
    			'search_items' =>  __( 'Sök sponsortyp' ), /* search title for taxomony */
    			'all_items' => __( 'Alla sponsortyper' ),  /* all title for taxonomies */
    			'parent_item' => __( 'Föregående sponsortyp' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Föregående sponsortyp:' ), /* parent taxonomy title */
    			'edit_item' => __( 'Redigera sponsortyp' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Uppdatera sponsortyp' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Lägg till ny sponsortyp' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'Ny sponsortyp' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    		'show_in_nav_menus' => false,
    	)
    );

	// lägg till egna kategorier
    register_taxonomy( 'kalender_typ', 
    	array('kalender'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Kategori' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Kategori' ), /* single taxonomy name */
    			'search_items' =>  __( 'Sök kategori' ), /* search title for taxomony */
    			'all_items' => __( 'Alla kategorier' ),  /* all title for taxonomies */
    			'parent_item' => __( 'Föregående kategori' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Föregående kategori:' ), /* parent taxonomy title */
    			'edit_item' => __( 'Redigera kategori' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Uppdatera kategori' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Lägg till ny kategori' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'Ny kategori' ) /* name title for taxonomy */
    		),
    		'show_ui' => true,
    		'query_var' => true,
    		'show_in_nav_menus' => false,
    	)
    ); 
	
	// Ta bort sponsortyper från "Lägg till ny"-sidan. Sponsortyp väljs i en egen metabox istället
	function remove_sponsortyp_meta() {
		remove_meta_box( 'sponsorer_katdiv', 'sponsorer', 'side' );
	}

	add_action( 'admin_menu' , 'remove_sponsortyp_meta' );
    
    
	// now let's add custom tags (these act like tags)
    // register_taxonomy( 'taggar', 
    // 	array('puffar'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    // 	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    // 		'labels' => array(
    // 			'name' => __( 'puff Taggar' ), /* name of the custom taxonomy */
    // 			'singular_name' => __( 'puff Tag' ), /* single taxonomy name */
    // 			'search_items' =>  __( 'Sök Taggar' ), /* search title for taxomony */
    // 			'all_items' => __( 'Alla Taggar' ),  /* all title for taxonomies */
    // 			'parent_item' => __( 'Förra Taggen' ), /* parent title for taxonomy */
    // 			'parent_item_colon' => __( 'Förra Taggen:' ), /* parent taxonomy title */
    // 			'edit_item' => __( 'Redigera Tagg' ), /* edit custom taxonomy title */
    // 			'update_item' => __( 'Uppdatera Tagg' ), /* update title for taxonomy */
    // 			'add_new_item' => __( 'Lägg till ny Tagg' ), /* add new title for taxonomy */
    // 			'new_item_name' => __( 'Nytt Tagg Namn' ) /* name title for taxonomy */
    // 		),
    // 		'show_ui' => true,
    // 		'query_var' => true,
    // 	)
    // ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>