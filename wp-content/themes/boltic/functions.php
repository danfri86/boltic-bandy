<?php

// Custom Post Types och metaboxar
require_once('custom-post-type/index.php');






// Support för meny
add_theme_support( 'menus' );

// Registrera huvudmenyn
register_nav_menu( 'huvudmeny', 'Huvudmenyn' );

// Support för thumbnail-bilder
add_theme_support( 'post-thumbnails' );

// Lägg till bildstorlek om inte Wordpress räcker till med sina tre vanliga.
//add_image_size( 'thumbnail-namn', breddpx, höjdpx, true ); // true=exakt crop, false=bredden som angivet, auto höjd






// Byt ut Wordpress logo i AdminBar till Boltics logo//
function custom_adminBarLogo() {
    echo '
        <style type="text/css">
            #wp-admin-bar-wp-logo .ab-icon {
        	background-image: url('.get_bloginfo('stylesheet_directory').'/img/admin/logo.png) !important;
			width: 25px !important;
			height: 25px !important;
			background-position: 0 0 !important;
			background-size: contain !important;
    			}
        </style>
    ';
}
add_action('admin_head', 'custom_adminBarLogo');






// Ändra footer-text i admin
function edit_footer_admin () {
  echo 'Hemsidan utvecklad av <a href="http://danielfriberg.se" target="_blank">Daniel Friberg</a>, <a href="http://alexanderhansson.se/" target="_blank">Alexander Hansson</a>, Jonatan Lidholm Jansson och Oskar Kroon ';
}
add_filter('admin_footer_text', 'edit_footer_admin');






// OPRÖVAD AV DANIEL: FUNGERAR?
// Sätt "featured image" automatiskt men om en bild är vald av författaren så används den istället.
function autoset_featured() {
          global $post;
          $already_has_thumb = has_post_thumbnail($post->ID);
              if (!$already_has_thumb)  {
              $attached_image = get_children( "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );
                          if ($attached_image) {
                                foreach ($attached_image as $attachment_id => $attachment) {
                                set_post_thumbnail($post->ID, $attachment_id);
                                }
                           }
                        }
      }
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');








/*********************
Ta bort default meta-boxar från "Sidor" för att inte röra till det. Egna meta-boxar används istället.
/********************/	
if (is_admin()) { // Om man är i backend
	function remove_page_meta_boxes_klient() {
	
		// Ta bort meta boxar från sidor
		//remove_meta_box('pageparentdiv', 'page', 'normal');
		remove_meta_box('postcustom', 'page', 'normal');
		remove_meta_box('commentstatusdiv', 'page', 'normal');
		remove_meta_box('commentsdiv', 'page', 'normal');
		remove_meta_box('slugdiv', 'page', 'normal');
		//remove_meta_box('authordiv', 'page', 'normal');
	}

	$current_user = wp_get_current_user();
	//if ( !1 == $current_user->ID ) {
		add_action( 'admin_menu', 'remove_page_meta_boxes_klient' );
	//}
	
	// Ta bort default text-editorn. Den behövs inte på alla sidor och custom meta box kan användas där det behövs.
	function remove_pages_editor(){
		remove_post_type_support( 'page', 'editor' );
	}   
	add_action( 'admin_menu', 'remove_pages_editor' );
}






// OPRÖVAD AV DANIEL: FUNGERAR?
/* Skapa en pagination-funktion som visas såhär:
[1] 2 3 ... 5 »
« 1 [2] 3 4 5 »
« 1 [2] 3 4 5 »
« 1 ... 3 4 [5]

Anropas utanför loopen men innanför if( have_post() )
Kan anropas t.ex. såhär:
<div class="pagination"><?php pagination('»', '«'); ?></div>

Granska sidkoden för att sätta style med css
*/
function pagination($prev = '«', $next = '»') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __($prev),
        'next_text' => __($next),
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'sida/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
};