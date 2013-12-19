<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'boltic_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function boltic_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */

	// Better has an underscore as last sign
	$prefix = 'puffar_';

	// Sponsorer
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'puffar_information',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Innehåll', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'puffar' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// URL
			array(
				'name'  => __( 'Länk', 'rwmb' ),
				'id'    => "{$prefix}url",
				'desc'  => __( 'Länka dit du vill', 'rwmb' ),
				'type'  => 'url',
				'std'   => 'http://',
			),
			// TEXTAREA
			array(
				'name' => __( 'Information', 'rwmb' ),
				'desc' => __( '', 'rwmb' ),
				'id'   => "{$prefix}info",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	// Better has an underscore as last sign
	$prefix = 'sponsor_';

	// Sponsorer
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'sponsor_information',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Information', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'sponsorer' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TAXONOMY
			array(
				'name'    => __( 'Sponsortyp', 'rwmb' ),
				'id'      => "{$prefix}typ",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'sponsorer_kat',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type' => 'select',
					// Additional arguments for get_terms() function. Optional
					'args' => array()
				),
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Logo', 'rwmb' ),
				'id'               => "{$prefix}logo",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			// URL
			array(
				'name'  => __( 'Hemsida', 'rwmb' ),
				'id'    => "{$prefix}url",
				'desc'  => __( 'Länka till sponsorns hemsida', 'rwmb' ),
				'type'  => 'url',
				'std'   => 'http://',
			),
			// CHECKBOX
			array(
				'name' => __( 'Dedikerad sida', 'rwmb' ),
				'id'   => "{$prefix}dedikerad_sida",
				'type' => 'checkbox',
				'desc' => 'Vill du ge denna sponsor en egen reklamsida?',
				// Value can be 0 or 1
				'std'  => 0,
			),
			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Dedikerad sida', 'rwmb' ),
				'id'   => 'fake_id', // Not used but needed for plugin
			),
			// TEXTAREA
			array(
				'name' => __( 'Information', 'rwmb' ),
				'desc' => __( 'Beskriv företaget med den info ni/sponsorn vill ge', 'rwmb' ),
				'id'   => "{$prefix}info",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 10,
			),
		),
	);
	
	// Better has an underscore as last sign
	$prefix = 'spelare_';

	// Spelare
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'spelare_info',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Information om spelare', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'spelare' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Profilbild', 'rwmb' ),
				'id'               => "{$prefix}bild",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			// SELECT BOX
			array(
				'name'     => __( 'Födelseår', 'rwmb' ),
				'id'       => "{$prefix}fodelsear",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'1950' => __( '1950', 'rwmb' ),
					'1951' => __( '1951', 'rwmb' ),
					'1952' => __( '1952', 'rwmb' ),
					'1953' => __( '1953', 'rwmb' ),
					'1954' => __( '1954', 'rwmb' ),
					'1955' => __( '1955', 'rwmb' ),
					'1956' => __( '1956', 'rwmb' ),
					'1957' => __( '1957', 'rwmb' ),
					'1958' => __( '1958', 'rwmb' ),
					'1959' => __( '1959', 'rwmb' ),
					'1960' => __( '1960', 'rwmb' ),
					'1961' => __( '1961', 'rwmb' ),
					'1962' => __( '1962', 'rwmb' ),
					'1963' => __( '1963', 'rwmb' ),
					'1964' => __( '1964', 'rwmb' ),
					'1965' => __( '1965', 'rwmb' ),
					'1966' => __( '1966', 'rwmb' ),
					'1967' => __( '1967', 'rwmb' ),
					'1968' => __( '1968', 'rwmb' ),
					'1969' => __( '1969', 'rwmb' ),
					'1970' => __( '1970', 'rwmb' ),
					'1971' => __( '1971', 'rwmb' ),
					'1972' => __( '1972', 'rwmb' ),
					'1973' => __( '1973', 'rwmb' ),
					'1974' => __( '1974', 'rwmb' ),
					'1975' => __( '1975', 'rwmb' ),
					'1976' => __( '1976', 'rwmb' ),
					'1977' => __( '1977', 'rwmb' ),
					'1978' => __( '1978', 'rwmb' ),
					'1979' => __( '1979', 'rwmb' ),
					'1980' => __( '1980', 'rwmb' ),
					'1981' => __( '1981', 'rwmb' ),
					'1982' => __( '1982', 'rwmb' ),
					'1983' => __( '1983', 'rwmb' ),
					'1984' => __( '1984', 'rwmb' ),
					'1985' => __( '1985', 'rwmb' ),
					'1986' => __( '1986', 'rwmb' ),
					'1987' => __( '1987', 'rwmb' ),
					'1988' => __( '1988', 'rwmb' ),
					'1989' => __( '1989', 'rwmb' ),
					'1990' => __( '1990', 'rwmb' ),
					'1991' => __( '1991', 'rwmb' ),
					'1992' => __( '1992', 'rwmb' ),
					'1993' => __( '1993', 'rwmb' ),
					'1994' => __( '1994', 'rwmb' ),
					'1995' => __( '1995', 'rwmb' ),
					'1996' => __( '1996', 'rwmb' ),
					'1997' => __( '1997', 'rwmb' ),
					'1998' => __( '1998', 'rwmb' ),
					'1999' => __( '1999', 'rwmb' ),
					'2000' => __( '2000', 'rwmb' ),
					'2001' => __( '2001', 'rwmb' ),
					'2002' => __( '2002', 'rwmb' ),
					'2003' => __( '2003', 'rwmb' ),
					'2004' => __( '2004', 'rwmb' ),
					'2005' => __( '2005', 'rwmb' ),
					'2006' => __( '2006', 'rwmb' ),
					'2007' => __( '2007', 'rwmb' ),
					'2008' => __( '2008', 'rwmb' ),
					'2009' => __( '2009', 'rwmb' ),
					'2010' => __( '2010', 'rwmb' ),
					'2011' => __( '2011', 'rwmb' ),
					'2012' => __( '2012', 'rwmb' ),
					'2013' => __( '2013', 'rwmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => __( 'Välj ett årtal', 'rwmb' ),
			),
			// NUMBER
			array(
				'name' => __( 'Längd (cm)', 'rwmb' ),
				'id'   => "{$prefix}langd",
				'type' => 'number',

				'min'  => 160,
				'step' => 1,
			),
			// NUMBER
			array(
				'name' => __( 'Vikt (kg)', 'rwmb' ),
				'id'   => "{$prefix}vikt",
				'type' => 'number',

				'min'  => 60,
				'step' => 1,
			),
			// NUMBER
			array(
				'name' => __( 'Tröjnummer #', 'rwmb' ),
				'id'   => "{$prefix}trojnummer",
				'type' => 'number',

				'min'  => 1,
				'step' => 1,
			),
			// CHECKBOX LIST
			array(
				'name' => __( 'Spelposition', 'rwmb' ),
				'id'   => "{$prefix}spelposition",
				'type' => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'Målvakt' => __( 'Målvakt', 'rwmb' ),
					'Försvar' => __( 'Försvar', 'rwmb' ),
					'Mittfält' => __( 'Mittfält', 'rwmb' ),
					'Anfall' => __( 'Anfall', 'rwmb' ),
					'Lagledare' => __( 'Lagledare', 'rwmb' ),
					'Tränare' => __( 'Tränare', 'rwmb' ),
					'Materialare' => __( 'Materialare', 'rwmb' ),
				),
			),
			// TEXTAREA
			array(
				'name' => __( 'Information', 'rwmb' ),
				'desc' => __( 'Information om spelaren', 'rwmb' ),
				'id'   => "{$prefix}info",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 5,
			),
		),
	);

	// Better has an underscore as last sign
	$prefix = 'medlemmar_';

	// Medlemmar
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'medlemmar_information',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Information om medlem', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'medlemmar' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Adress', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}adress",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Postnummer', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}postnummer",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Stad', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}stad",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// EMAIL
			array(
				'name'  => __( 'E-post', 'rwmb' ),
				'id'    => "{$prefix}epost",
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'email',
				'std'   => '',
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Telefon', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}telefon",
				// Field description (optional)
				'desc'  => __( '', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( '', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
		),
	);

	// Medlemmar 2
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'medlemmar_information2',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Tid & betalning', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'medlemmar' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'side',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'low',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// DATE
			array(
				'name' => __( 'Medlem sedan', 'rwmb' ),
				'id'   => "{$prefix}medlemSedan",
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			array(
				'name' => __( 'Utgångsdatum', 'rwmb' ),
				'id'   => "{$prefix}utgangsdatum",
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// CHECKBOX
			array(
				'name' => __( 'Betalning genomförd', 'rwmb' ),
				'id'   => "{$prefix}betald",
				'type' => 'checkbox',
				'desc' => 'Har medlemmen betalat för perioden?',
				// Value can be 0 or 1
				'std'  => 0,
			),
		),
	);

	// Better has an underscore as last sign
	$prefix = 'sidor_';

	// Sidor
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'sidor_layout',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Layout', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'side',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// RADIO BUTTONS
			array(
				'name' => __( 'Välj sidans layout', 'rwmb' ),
				'id' => "{$prefix}layout",
				'type' => 'radio',
				'std' => 'enKolumnSidebar',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'enKolumnSidebar' => __( '1 kolumn+sidebar', 'rwmb' ),
					'enKolumnSidebarHeader' => __( '1 kolumn+sidebar+stor bild', 'rwmb' ),
					'fullBredd' => __( 'Full bredd', 'rwmb' ),
					'fullBreddHeader' => __( 'Full bredd+stor bild', 'rwmb' ),
				),
			),
		),
	);

	// Sidor innehåll
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'sidor_enkolumn_sidebar',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Innehåll', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'page' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Bild', 'rwmb' ),
				'id'               => "{$prefix}headerBild",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'Ladda upp den bild som ska visas högst upp. Bilden skalas till 1200*450px så länge bilden är större än så.',
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( '', 'rwmb' ),
				'id'   => "{$prefix}content",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				//'std'  => __( 'WYSIWYG default value', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 18,
					'teeny'         => true,
					'media_buttons' => true,
				),
			),
		),
	);

	// Better has an underscore as last sign
	$prefix = 'kalender_';

	// Kalender innehåll
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'kalender_info',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Aktivitet', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'kalender' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// DATE
			array(
				'name' => __( 'Datum', 'rwmb' ),
				'id'   => "{$prefix}datum",
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// TIME
			array(
				'name' => __( 'Tid', 'rwmb' ),
				'id'   => "{$prefix}tid",
				'type' => 'time',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => false,
					'currentText' => 'Nu',
					'closeText' => "Stäng",
					'timeFormat' => "hh:mm",
					'timeOnlyTitle' => 'Välj tid',
					'timeText' => 'Klockslag',
					'hourText' => 'Timme',
					'minuteText' => 'Minut',
				),
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Plats', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}plats",
				// Field description (optional)
				'desc'  => __( 'Var äger aktivitetet rum?', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXTAREA
			array(
				'name' => __( 'Information', 'rwmb' ),
				'desc' => __( 'Beskriv aktiviteten', 'rwmb' ),
				'id'   => "{$prefix}info",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 5,
			),
		),
	);

	// Kalender match
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'kalender_match',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Match', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'kalender' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// SELECT BOX
			array(
				'name'     => __( 'Motståndare', 'rwmb' ),
				'id'       => "{$prefix}motstandare",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'Tillberga Bandy' => __( 'Tillberga Bandy', 'rwmb' ),
					'Katrineholm VBS' => __( 'Katrineholm VBS', 'rwmb' ),
					'IK Tellus' => __( 'IK Tellus', 'rwmb' ),
					'Haparanda Tornio' => __( 'Haparanda Tornio', 'rwmb' ),
					'UNIK' => __( 'UNIK', 'rwmb' ),
					'IFK Rättvik Bandy' => __( 'IFK Rättvik Bandy', 'rwmb' ),
					'Örebro SK' => __( 'Örebro SK', 'rwmb' ),
					'Borlänge Bandy' => __( 'Borlänge Bandy', 'rwmb' ),
					'Gustavsberg IF' => __( 'Gustavsberg IF', 'rwmb' ),
					'Selånger Bandy' => __( 'Selånger Bandy', 'rwmb' ),
					'Härnösand AIK' => __( 'Härnösand AIK', 'rwmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				//'std'         => 'value2',
				'placeholder' => __( 'Välj lag', 'rwmb' ),
				'desc' => 'Allsvenskan Norra 2013/2014',
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Alternativt lag', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}alternativtlag",
				// Field description (optional)
				'desc'  => __( 'Om laget inte finns i listan ovan, skriv det här', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Bild', 'rwmb' ),
				'id'               => "{$prefix}logo",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'Ladda upp alternativt lags logotyp. Behöver inte göras om laget finns i listan!',
			),
		),
	);

	// Better has an underscore as last sign
	$prefix = 'kontaktperson';

	// Sponsorer
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id' => 'kontaktpersoner_information',

		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title' => __( 'Information', 'rwmb' ),

		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
		'pages' => array( 'kontaktpersoner' ),

		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context' => 'normal',

		// Order of meta box: high (default), low. Optional.
		'priority' => 'high',

		// Auto save: true, false (default). Optional.
		'autosave' => true,

		// List of meta fields
		'fields' => array(
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Arbetsroll', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}arbetsroll",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Telefon', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}telefon",
				// Field description (optional)
				//'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				//'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),
			// EMAIL
			array(
				'name'  => __( 'Epost', 'rwmb' ),
				'id'    => "{$prefix}epost",
				//'desc'  => __( 'Email description', 'rwmb' ),
				'type'  => 'email',
				//'std'   => 'namn@email.com',
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Profilbild', 'rwmb' ),
				'id'               => "{$prefix}profilbild",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'desc' => 'Ladda upp bild på personen',
			),
		),
	);

	//Avsluta metaboxar
	return $meta_boxes;
}

// Ladda in script på vissa sidor där poster skapas
function posttyper_load_scripts() {
	global $post_type;
 	
 	// Om vi är i posttyp sponsorer
	if( $post_type == 'sponsorer' ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$heading = $('.rwmb-heading-wrapper');
				$info = $('#sponsor_info').parent().parent();
				//Göm fält
				$($info).hide();
				$($heading).hide();

				//Om kryssrutan för "dedikerad sida" är vald så visas fält
				$('#sponsor_dedikerad_sida').click(function(){
				    if (this.checked) {
				        $($info).show();
						$($heading).show();
				    } else{
				    	$($info).hide();
						$($heading).hide();
				    }
				});

				$('#titlewrap label').text("Ange sponsorns namn här");
			});
		</script>
	<?php }

	// Om vi är i posttyp spelare
	if( $post_type == 'spelare' ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#titlewrap label').text("Ange spelarens namn här");
			});
		</script>
	<?php }

	// Om vi är i posttyp medlemmar
	if( $post_type == 'medlemmar' ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#titlewrap label').text("Ange medlemmens namn här");
			});
		</script>
	<?php }

	// Om vi är i posttyp kontaktpersoner
	if( $post_type == 'kontaktpersoner' ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#titlewrap label').text("Ange namn här");
			});
		</script>
	<?php }

	// Om vi är i posttyp sidor
	if( $post_type == 'page' ) {
		?>

		<style type="text/css">			
			/* Sätt storleken på label till samma storlek som ikonerna */
			#sidor_layout div.rwmb-radio-wrapper div.rwmb-input label{
			    //height: 30px;
			    display:block;
			    padding: 12px 0;
			    border-bottom: 1px solid #ddd; 
			    background-repeat: no-repeat;
			    background-position: center right;
			}
		</style>
		
		<script type="text/javascript">
			jQuery(document).ready(function($){

				// Sätt ikon som bakgrundsbild på varje label
				$("#sidor_layout div.rwmb-radio-wrapper div.rwmb-input label:nth-child(1)").css("background-image", "url(http://localhost/boltic/wp-content/themes/boltic/custom-post-type/img/layoutEnKolumSidebar.png)");

				$("#sidor_layout div.rwmb-radio-wrapper div.rwmb-input label:nth-child(2)").css("background-image", "url(http://localhost/boltic/wp-content/themes/boltic/custom-post-type/img/layoutEnKolumSidebarHeaderBild.png)");

				$("#sidor_layout div.rwmb-radio-wrapper div.rwmb-input label:nth-child(3)").css("background-image", "url(http://localhost/boltic/wp-content/themes/boltic/custom-post-type/img/layoutFullBredd.png)");

				$("#sidor_layout div.rwmb-radio-wrapper div.rwmb-input label:nth-child(4)").css("background-image", "url(http://localhost/boltic/wp-content/themes/boltic/custom-post-type/img/layoutFullBreddHeaderBild.png)");

				// Göm visa bildfältet beroende på vald layout
				var layoutEnKolumSidebarHeader = ("#sidor_layout input[value='enKolumnSidebarHeader']");
				var layoutFullBreddHeader = ("#sidor_layout input[value='fullBreddHeader']");
				var inputBild = $("label[for='sidor_headerBild']");

				$(inputBild).parent().parent().hide();				

				$("#sidor_layout input[type='radio']").on("change", function(){
					if ($(layoutEnKolumSidebarHeader).attr("checked") == "checked" || $(layoutFullBreddHeader).attr("checked") == "checked" ){
						$(inputBild).parent().parent().show();
					}
					else{
						$(inputBild).parent().parent().hide();
					}
				});
			});
		</script>
		
	<?php }

	// Om vi är i posttyp medlemmar
	if( $post_type == 'kalender' ) {
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				
				$("form#post").each(function(){
					$(this).on("submit", function(theEvent){
						$('#kalender_typchecklist input').click(function(){

							var cnt = $('#kalender_typchecklist input:checked').length;

							if( cnt == 0 ) {
								alert('Du måste välja en kategori');
								theEvent.preventDefault();
								theEvent.stopPropagation();

								alert('Du måste välja en kategori');
							} else {

							}
						});
					});
				});
			});
		</script>
	<?php }
}
add_action('admin_footer', 'posttyper_load_scripts');

// MÖJLIGA METAFÄLT
///////////////////////////////
/*
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __( 'Text', 'rwmb' ),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}text",
				// Field description (optional)
				'desc'  => __( 'Text description', 'rwmb' ),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __( 'Default text value', 'rwmb' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
			// CHECKBOX
			array(
				'name' => __( 'Checkbox', 'rwmb' ),
				'id'   => "{$prefix}checkbox",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),
			// RADIO BUTTONS
			array(
				'name'    => __( 'Radio', 'rwmb' ),
				'id'      => "{$prefix}radio",
				'type'    => 'radio',
				// Array of 'value' => 'Label' pairs for radio options.
				// Note: the 'value' is stored in meta field, not the 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
			),
			// SELECT BOX
			array(
				'name'     => __( 'Select', 'rwmb' ),
				'id'       => "{$prefix}select",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => 'value2',
				'placeholder' => __( 'Select an Item', 'rwmb' ),
			),
			// HIDDEN
			array(
				'id'   => "{$prefix}hidden",
				'type' => 'hidden',
				// Hidden field must have predefined value
				'std'  => __( 'Hidden value', 'rwmb' ),
			),
			// PASSWORD
			array(
				'name' => __( 'Password', 'rwmb' ),
				'id'   => "{$prefix}password",
				'type' => 'password',
			),
			// TEXTAREA
			array(
				'name' => __( 'Textarea', 'rwmb' ),
				'desc' => __( 'Textarea description', 'rwmb' ),
				'id'   => "{$prefix}textarea",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
			// HEADING
			array(
				'type' => 'heading',
				'name' => __( 'Heading', 'rwmb' ),
				'id'   => 'fake_id', // Not used but needed for plugin
			),
			// SLIDER
			array(
				'name' => __( 'Slider', 'rwmb' ),
				'id'   => "{$prefix}slider",
				'type' => 'slider',

				// Text labels displayed before and after value
				'prefix' => __( '$', 'rwmb' ),
				'suffix' => __( ' USD', 'rwmb' ),

				// jQuery UI slider options. See here http://api.jqueryui.com/slider/
				'js_options' => array(
					'min'   => 10,
					'max'   => 255,
					'step'  => 5,
				),
			),
			// NUMBER
			array(
				'name' => __( 'Number', 'rwmb' ),
				'id'   => "{$prefix}number",
				'type' => 'number',

				'min'  => 0,
				'step' => 5,
			),
			// DATE
			array(
				'name' => __( 'Date picker', 'rwmb' ),
				'id'   => "{$prefix}date",
				'type' => 'date',

				// jQuery date picker options. See here http://api.jqueryui.com/datepicker
				'js_options' => array(
					'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
					'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
			),
			// DATETIME
			array(
				'name' => __( 'Datetime picker', 'rwmb' ),
				'id'   => $prefix . 'datetime',
				'type' => 'datetime',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute'     => 15,
					'showTimepicker' => true,
				),
			),
			// TIME
			array(
				'name' => __( 'Time picker', 'rwmb' ),
				'id'   => $prefix . 'time',
				'type' => 'time',

				// jQuery datetime picker options.
				// For date options, see here http://api.jqueryui.com/datepicker
				// For time options, see here http://trentrichardson.com/examples/timepicker/
				'js_options' => array(
					'stepMinute' => 5,
					'showSecond' => true,
					'stepSecond' => 10,
				),
			),
			// COLOR
			array(
				'name' => __( 'Color picker', 'rwmb' ),
				'id'   => "{$prefix}color",
				'type' => 'color',
			),
			// CHECKBOX LIST
			array(
				'name' => __( 'Checkbox list', 'rwmb' ),
				'id'   => "{$prefix}checkbox_list",
				'type' => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
			),
			// EMAIL
			array(
				'name'  => __( 'Email', 'rwmb' ),
				'id'    => "{$prefix}email",
				'desc'  => __( 'Email description', 'rwmb' ),
				'type'  => 'email',
				'std'   => 'name@email.com',
			),
			// RANGE
			array(
				'name'  => __( 'Range', 'rwmb' ),
				'id'    => "{$prefix}range",
				'desc'  => __( 'Range description', 'rwmb' ),
				'type'  => 'range',
				'min'   => 0,
				'max'   => 100,
				'step'  => 5,
				'std'   => 0,
			),
			// URL
			array(
				'name'  => __( 'URL', 'rwmb' ),
				'id'    => "{$prefix}url",
				'desc'  => __( 'URL description', 'rwmb' ),
				'type'  => 'url',
				'std'   => 'http://google.com',
			),
			// OEMBED
			array(
				'name'  => __( 'oEmbed', 'rwmb' ),
				'id'    => "{$prefix}oembed",
				'desc'  => __( 'oEmbed description', 'rwmb' ),
				'type'  => 'oembed',
			),
			// SELECT ADVANCED BOX
			array(
				'name'     => __( 'Select', 'rwmb' ),
				'id'       => "{$prefix}select_advanced",
				'type'     => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'value1' => __( 'Label1', 'rwmb' ),
					'value2' => __( 'Label2', 'rwmb' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'rwmb' ),
			),
			// TAXONOMY
			array(
				'name'    => __( 'Taxonomy', 'rwmb' ),
				'id'      => "{$prefix}taxonomy",
				'type'    => 'taxonomy',
				'options' => array(
					// Taxonomy name
					'taxonomy' => 'category',
					// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
					'type' => 'checkbox_list',
					// Additional arguments for get_terms() function. Optional
					'args' => array()
				),
			),
			// POST
			array(
				'name'    => __( 'Posts (Pages)', 'rwmb' ),
				'id'      => "{$prefix}pages",
				'type'    => 'post',

				// Post type
				'post_type' => 'page',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type' => 'select_advanced',
				// Query arguments (optional). No settings means get all published posts
				'query_args' => array(
					'post_status' => 'publish',
					'posts_per_page' => '-1',
				)
			),
			// WYSIWYG/RICH TEXT EDITOR
			array(
				'name' => __( 'WYSIWYG / Rich Text Editor', 'rwmb' ),
				'id'   => "{$prefix}wysiwyg",
				'type' => 'wysiwyg',
				// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
				'raw'  => false,
				'std'  => __( 'WYSIWYG default value', 'rwmb' ),

				// Editor settings, see wp_editor() function: look4wp.com/wp_editor
				'options' => array(
					'textarea_rows' => 4,
					'teeny'         => true,
					'media_buttons' => false,
				),
			),
			// DIVIDER
			array(
				'type' => 'divider',
				'id'   => 'fake_divider_id', // Not used, but needed
			),
			// FILE UPLOAD
			array(
				'name' => __( 'File Upload', 'rwmb' ),
				'id'   => "{$prefix}file",
				'type' => 'file',
			),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name' => __( 'File Advanced Upload', 'rwmb' ),
				'id'   => "{$prefix}file_advanced",
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'application,audio,video', // Leave blank for all file types
			),
			// IMAGE UPLOAD
			array(
				'name' => __( 'Image Upload', 'rwmb' ),
				'id'   => "{$prefix}image",
				'type' => 'image',
			),
			// THICKBOX IMAGE UPLOAD (WP 3.3+)
			array(
				'name' => __( 'Thickbox Image Upload', 'rwmb' ),
				'id'   => "{$prefix}thickbox",
				'type' => 'thickbox_image',
			),
			// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
			array(
				'name'             => __( 'Plupload Image Upload', 'rwmb' ),
				'id'               => "{$prefix}plupload",
				'type'             => 'plupload_image',
				'max_file_uploads' => 4,
			),
			// IMAGE ADVANCED (WP 3.5+)
			array(
				'name'             => __( 'Image Advanced Upload', 'rwmb' ),
				'id'               => "{$prefix}imgadv",
				'type'             => 'image_advanced',
				'max_file_uploads' => 4,
			),
			// BUTTON
			array(
				'id'   => "{$prefix}button",
				'type' => 'button',
				'name' => ' ', // Empty name will "align" the button to all field inputs
			),

			'validation' => array(
				'rules' => array(
					"{$prefix}password" => array(
						'required'  => true,
						'minlength' => 7,
					),
				),
				// optional override of default jquery.validate messages
				'messages' => array(
					"{$prefix}password" => array(
						'required'  => __( 'Password is required', 'rwmb' ),
						'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
					),
				)
*/