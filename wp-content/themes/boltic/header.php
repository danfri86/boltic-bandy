<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<style type="text/css">
		body{
			background: #eee;
		}

		div.kod{
			margin: 0 auto;
			max-width: 800px;
			padding: 20px 0;
			border-bottom: 1px solid #ddd;
		}

		div img{
			display: block;
		}
	</style>	
</head>

<body <?php body_class(); ?>>

	<div class="kod">
		<p>Här är huvudmenyn</p>
		<?php
		$args = array(
				'menu'		=>	'huvudmeny',
				'container'	=>	'nav', // Ingen div runt menyn
				'container_class' => '',
				'container_id'    => '',
				'menu_class'=>	'', // Lämnar class tomt
				'menu_id'	=>	'', // Lämnar id tomt
				'items_wrap'=>	'<ul>%3$s</ul>', // Tar bort ul id och class helt och hållet
			);
		wp_nav_menu( $args );
		?>
	</div>
