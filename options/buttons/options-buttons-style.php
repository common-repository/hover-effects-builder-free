<?php

	hi_make_option( array(
		'key'     => 'hi-buttons-type',
		'name'    => __( 'Buttons Type', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'simple'     => __( 'Simple', 'hitd' ),
			'background' => __( 'With Background', 'hitd' ),
			'border'     => __( 'With Border', 'hitd' ),
		),
		'default' => 'background',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-buttons-foreground-color',
		'name'    => __( 'Foreground Color', 'hitd' ),
		'type'    => 'color',
		'default' => '#000000',
		'opacity' => false,
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-buttons-background-color',
		'name'    => __( 'Background Color', 'hitd' ),
		'type'    => 'color',
		'default' => '#ffffff',
		'opacity' => false,
		'help'    => false,
		'showif'  => 'hi-buttons-type=background'
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-buttons-type=background||hi-buttons-type=border'
	) );

	hi_make_option( array(
		'key'     => 'hi-buttons-radius',
		'name'    => __( 'Border Radius', 'hitd' ),
		'type'    => 'startstop',
		//'orientation'=>'vertical',
		'values'  => array(
			'start' => array(
				'min'     => 0,
				'max'     => 50,
				'postfix' => '%'
			),
			'stop'  => array(
				'min'     => 0,
				'max'     => 50,
				'postfix' => '%'
			),
		),
		'default' => array(
			'start' => 0,
			'stop'  => 0
		),
		'names'   => array(
			'start' => __( 'Default', 'hitd' ),
			'stop'  => __( 'Hover', 'hitd' ),
		),
		'help'    => false,
		'cols' => '2+10'
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
	) );

	hi_make_option( array(
		'key'     => 'hi-buttons-size',
		'name'    => __( 'Buttons Size', 'hitd' ),
		'type'    => 'startstop',
		'values'  => array(
			'start' => array(
				'min'     => 14,
				'max'     => 48,
				'step'    => 1,
				'postfix' => 'px'
			)
		),
		'default' => array(
			'start' => 28
		),
		'names'   => array(
			'start' => false
		),
		'help'    => false,
	) );
