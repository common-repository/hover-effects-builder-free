<?php

	hi_make_option( array(
		'key'     => 'hi-content-fade',
		'name'    => __( 'Fade Effect', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'On', 'hitd' ),
			'off' => __( 'Off', 'hitd' ),
		),
		'default' => 'on',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-slide',
		'name'    => __( 'Slide Effect', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'On', 'hitd' ),
			'off' => __( 'Off', 'hitd' ),
		),
		'default' => 'off',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-slide=on'
	) );

	hi_make_option( array(
		'key'     => 'hi-content-slide-direction',
		'name'    => __( 'Slide Direction', 'hitd' ),
		'type'    => 'direction',
		'names'   => array(
			'direction' => __( 'Slide Direction', 'hitd' ),
		),
		'values'  => array(
			'min' => 0,
			'max' => 360,
		),
		'default' => 0,
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-image-push',
		'name'    => __( 'Push the Image', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'Yes', 'hitd' ),
			'off' => __( 'No', 'hitd' ),
		),
		'default' => 'off',
		'help'    => 'The content overlay will push the image according to the slide direction setting.'
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
		'hr'      => true
	) );