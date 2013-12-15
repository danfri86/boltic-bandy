<?php

// Custom Post Types och metaboxar
require_once('custom-post-type/index.php');






/*********************
LADDA JQUERY
*********************/
add_action( 'wp_enqueue_script', 'load_jquery' );
function load_jquery() {
    wp_enqueue_script( 'jquery' );
}







/*********************
CSS FIL
*********************/
function mitt_egna_stylesheet() { ?>
    <link rel="stylesheet" id="custom_wp_admin_css"  href="<?php echo get_template_directory_uri() . '/css/styles.css'; ?>" type="text/css" media="all" />
<?php } ?>
<?php
add_action( 'wp_enqueue_scripts', 'mitt_egna_stylesheet' );






/*********************
SCRIPTS
*********************/
function boltic_scripts() {
  wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'modernizr' );
  
  wp_register_script( 'custom_functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'custom_functions' );

   wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'classie' );

   wp_register_script( 'cbpAnimatedHeader', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'cbpAnimatedHeader' );

   wp_register_script( 'sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'sidr' );
}
add_action( 'wp_enqueue_scripts', 'boltic_scripts' );







// Ta bort onödig info från wp_head()
function remove_header_info() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');         // for WordPress <  3.0
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head'); // for WordPress >= 3.0
}
add_action('init', 'remove_header_info');









// Ta bort Wordpress admin notifikation om uppdatering för alla användare utom admins
global $user_login;
get_currentuserinfo();

// Om en användare har tillräckligt höga rättigheter för att uppdatera plugin (dvs. admins)
if (!current_user_can('update_plugins')) {
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
 }





// Sätt längden för excerpts till annan än default
 /*
function new_excerpt_length($length) { 
  return 100;
}

add_filter('excerpt_length', 'new_excerpt_length');
*/






// Support för meny
add_theme_support( 'menus' );

// Registrera huvudmenyn
register_nav_menu( 'huvudmeny', 'Huvudmenyn' );

// Support för thumbnail-bilder
add_theme_support( 'post-thumbnails' );

// Lägg till bildstorlek om inte Wordpress räcker till med sina tre vanliga.
add_image_size( 'bannerimg', 1200, 580, true );
// true=exakt crop, false=bredden som angivet, auto höjd





// Ändra längd på the_excerpt()
function custom_excerpt_length( $length ) {
  return 8;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );







// OPRÖVAD AV DANIEL. FUNGERAR?
// Lägger till storlekar endast för vald posttyp
// Byt namn på värdet inom type(posttyp) och value(thumbnail-namn)
/*
add_filter( 'intermediate_image_sizes', function($sizes){
    $type = get_post_type($_REQUEST['post_id']);
    foreach($sizes as $key => $value){
        if($type=='post_type'  &&  $value != 'img_size_name'){
            unset($sizes[$key]);
        }
    }
    return $sizes;
});
*/






// Registrera sidebar
register_sidebar(array(
  'id' => 'sidebar-main',
  'name' => 'Sidebar main',
  'description' => 'Standard sidebar som visas på framsida, enstaka sidor m.m.',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget' => '</div>',
  'before_title' => '<h4 class="widgettitle">',
  'after_title' => '</h4>',
));






// Redirect till startsidan när man loggat in. (Istället för admin. Det finns ändå adminBar)
add_filter( 'login_redirect', create_function(
  '$url,$query,$user', 'return home_url();'
), 10, 3 );






// Ta bort widgets från admin dashboard (adminpanel)
function remove_dashboard_widgets() {
  global $wp_meta_boxes;
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

  // Ta bort gravity forms med denna
  remove_meta_box('rg_forms_dashboard', 'dashboard', 'normal;'); 
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );







// wp_dashboard_setup is the action hook
add_action('wp_dashboard_setup', 'posttyper_info');

// add dashboard widget
function posttyper_info() {
    wp_add_dashboard_widget('custom_posttyper_info', 'Inläggsinfo','custom_posttyper_medlemmar');
}

function custom_posttyper_medlemmar(){

    $args = array(
        'public' => true ,
        '_builtin' => false );
    $output = 'object';
    $operator = 'and';
    echo '<table>';
    //loop over all custom post types
    $post_types = get_post_types( $args , $output , $operator );
    foreach( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name , intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = "<a href='edit.php?post_type=$post_type->name'>$num</a>";
            $text = "<a href='edit.php?post_type=$post_type->name'>$text</a>";
        }
        echo '<tr><td class="first b b-' . $post_type->name . '">' . $num . '</td>';
        echo '<td class="t ' . $post_type->name . '">' . $text . '</td></tr>';
    }
    echo '</table>';
}








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
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
};







// Ta bort extra CSS som 'Recent Comments' widget sätter dit
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
add_action('widgets_init', 'remove_recent_comments_style');