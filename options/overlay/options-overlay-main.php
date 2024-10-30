<?php

	hi_make_option( array(
		'key'     => 'hi-overlay-enable',
		'name'    => __( 'Image Overlay', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'Enable', 'hitd' ),
			'off' => __( 'Disable', 'hitd' ),
		),
		'default' => 'on',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-overlay-enable=on'
	) );