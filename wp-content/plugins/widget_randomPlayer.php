<?php
/*
Plugin Name: Widget: Visa slumpvald spelare
Plugin URI: http://danielfriberg.se/
Version: 1.0
Description: Visa en slumpvald spelare med namn och bild
Author: Daniel Friberg
Author URI: http://danielfriberg.se/
*/
 
class randomPlayer_widget extends WP_Widget
{
  function randomPlayer_widget()
  {
    $widget_ops = array('classname' => 'randomPlayer_widget', 'description' => 'Visa en slumpvald spelare');
    $this->WP_Widget('randomPlayer_widget', 'Visa slumpvald spelare', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
    
    global $post;

    // Do Your Widgety Stuff Here...
    // Specificera mer om dom poster vi vill ha inom ()
    $args = array(
      'post_type' => 'spelare',
      'posts_per_page' => 1,
      'orderby' => 'rand',

    );
    query_posts($args);
    if (have_posts()) :
      // Om det finns poster så kan vi göra något här
   
    while (have_posts()) : the_post();
      // Här körs loopen för dom poster som finns
   
      $post_meta_data = get_post_custom($post->ID); //Hämta meta-box fälten för att använda nedan

      echo '<a href="';
      the_permalink();
      echo '">';
      // Ändra "thumbnail" till den storlek som önskas
      echo wp_get_attachment_image($post_meta_data['spelare_bild'][0], 'medium');

      echo '<p>';
      if( get_post_meta($post->ID, 'spelare_trojnummer', true) ) {
        echo '<span>#'. $post_meta_data['spelare_trojnummer'][0] .' </span>';
      };
      echo the_title() .'</p>';
      echo '</a>';

    endwhile; endif;
    wp_reset_query(); // Nollställ loopen
 
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("randomPlayer_widget");') );
 
?>