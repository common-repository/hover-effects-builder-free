<?php

	hi_make_option( array(
		'key'     => 'hi-buttons-fade',
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
		'key'     => 'hi-buttons-slide',
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
		'showif'  => 'hi-buttons-slide=on'
	) );

	hi_make_option( array(
		'key'     => 'hi-buttons-slide-direction',
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
		'help'    => false,
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
	) );