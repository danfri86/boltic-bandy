<!DOCTYPE html>
<html lang="en" class="no-js">
   <!--[if IE]>
   <style type="text/css"></style>
   <meta http-equiv="imagetoolbar" content="no">
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <![endif]-->
   <!--
      ,--.,------.    ,-----.   ,-----. ,--.,--------.,--. ,-----. 
      |  ||  .---'    |  |) /_ '  .-.  '|  |'--.  .--'|  |'  .--./ 
      |  ||  `--,     |  .-.  \|  | |  ||  |   |  |   |  ||  |     
      |  ||  |`       |  '--' /'  '-'  '|  '--.|  |   |  |'  '--'\ 
      `--'`--'        `------'  `-----' `-----'`--'   `--' `-----' 
                                                                                                                                                                                
      ,--.   ,--.,------.    ,--.    ,-----.,--.   ,--.,------.    ,-----.    ,---.  ,--.  ,--.,------.,--.   ,--. 
      |  |   |  ||  .---'    |  |   '  .-.  '\  `.'  / |  .---'    |  |) /_  /  O  \ |  ,'.|  ||  .-.  \\  `.'  /  
      |  |.'.|  ||  `--,     |  |   |  | |  | \     /  |  `--,     |  .-.  \|  .-.  ||  |' '  ||  |  \  :'.    /   
      |   ,'.   ||  `---.    |  '--.'  '-'  '  \   /   |  `---.    |  '--' /|  | |  ||  | `   ||  '--'  /  |  |    
      '--'   '--'`------'    `-----' `-----'    `-'    `------'    `------' `--' `--'`--'  `--'`-------'   `--'   
                                                                                                                                                                                                          
      -->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?>>

	<header role="banner" class="top" id="top">
         <div class="top--menu">
            <div class="container">
               <ul>
                  <li><small><i class="fa fa-phone"> </i> 0134-122122</small></li>
                  <li><small><i class="fa fa-envelope-o"></i> info@kansliet.se</small></li>
               </ul>
            </div>
         </div>
         <div class="container">
            <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/boltic-logo.gif" alt=""></a></h1>
            <?php
   			$args = array(
   					'menu'		=>	'huvudmeny',
   					'container'	=>	'nav', // Ingen div runt menyn
   					'container_class' => '',
   					'container_id'    => '',
   					'menu_class'=>	'', // Lämnar class tomt
   					'menu_id'	=>	'', // Lämnar id tomt
   					'items_wrap'=>	'<ul>%3$s<li><a id="right-menu" href="#sidr"><i class="fa fa-align-justify"></i></a><a id="btn-mobile-open" class="btn-mobile"><i class="fa fa-align-justify"></i></a></li></ul>', // Tar bort ul id och class helt och hållet
   				);
   			wp_nav_menu( $args );
   			?>
         </div>
      </header>
