<?php

	hi_make_option( array(
		'key'     => 'hi-content-enable',
		'name'    => __( 'Content', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'Enable', 'hitd' ),
			'off' => __( 'Disable', 'hitd' ),
		),
		'default' => 'off',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-enable=on'
	) );

	hi_make_option( array(
		'key'     => 'hi-content-parts',
		'name'    => __( 'Content Elements', 'hitd' ),
		'type'    => 'checkbox',
		'values'  => array(
			'title'      => __( 'Title', 'hitd' ),
			'excerpt'    => __( 'Excerpt', 'hitd' ),
			'categories' => __( 'Categories', 'hitd' ),
			'shares'     => __( 'Share buttons', 'hitd' ),
		),
		'default' => array(
			'title'      => 'title',
			'excerpt'    => 'excerpt',
			'categories' => 'categories',
			'shares'     => 'shares'
		),
		'help'    => __( 'Select which content element(s) will be shown in this template.', 'hitd' )
	) );

	hi_make_option( array(
		'key'     => 'hi-content-always',
		'name'    => __( 'Always Show', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'Yes', 'hitd' ),
			'off' => __( 'No', 'hitd' ),
		),
		'default' => 'off',
		'help'    => __( 'Always show content in default and hover state.', 'hitd' )
	) );
