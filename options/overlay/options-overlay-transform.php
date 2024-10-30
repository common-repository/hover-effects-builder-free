<?php

	hi_make_option( array(
		'key'     => 'hi-h-overlay-transform',
		'name'    => __( 'Transform Effects', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-overlay-rotate-enable',
		'name'    => __( 'Rotation Effect', 'hitd' ),
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
		'showif'  => 'hi-overlay-rotate-enable=on'
	) );

	hi_make_option( array(
		'key'         => 'hi-overlay-rotate-grad',
		'type'        => 'rotate',
		'orientation' => 'vertical',
		'names'       => array(
			'start'       => __( 'Default', 'hitd' ),
			'stop'        => __( 'Hover', 'hitd' ),
			'axis'        => __( 'Axis ', 'hitd' ),
			'perspective' => __( 'Perspective', 'hitd' ),
		),
		'values'      => array(
			'x' => array(
				'default' => array(
					'start' => 0,
					'stop'  => 0
				),
				'postfix' => '°',
			),
			'y' => array(
				'default' => array(
					'start' => 0,
					'stop'  => 0
				),
				'postfix' => '°',
			),
			'z' => array(
				'default' => array(
					'start' => 0,
					'stop'  => 0
				),
				'postfix' => '°',
			),
			'p' => array(
				'default' => array(
					'start' => 0,
				),
				'min'     => 0,
				'max'     => 2000,
				'step'    => 10,
				'postfix' => 'px',
				'prefix'  => false
			)
		),
		'default'     => array(
			'x' => array(
				'start' => 0,
				'stop'  => 0
			),
			'y' => array(
				'start' => 0,
				'stop'  => 0
			),
			'z' => array(
				'start' => 0,
				'stop'  => 0
			),
			'p' => array(
				'start' => 400,
			)
		),
		'help'        => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
		'hr'      => true
	) );

	hi_make_option( array(
		'key'     => 'hi-overlay-scale-enable',
		'name'    => __( 'Scale Effect', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'on'  => __( 'On', 'hitd' ),
			'off' => __( 'Off', 'hitd' ),
		),
		'default' => 'off'
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-overlay-scale-enable=on'
	) );

	hi_make_option( array(
		'key'         => 'hi-overlay-scale-percents',
		'type'        => 'scale',
		'orientation' => 'vertical',
		'names'       => array(
			'start' => __( 'Default', 'hitd' ),
			'stop'  => __( 'Hover', 'hitd' ),
			'scale' => __( 'Scale Values ', 'hitd' ),
		),
		'values'      => array(
			'start' => array(
				'min'     => 0,
				'max'     => 200,
				'postfix' => '%',
			),
			'stop'  => array(
				'min'     => 0,
				'max'     => 200,
				'postfix' => '%',
			),
		),
		'default'     => array(
			'start' => 0,
			'stop'  => 100
		),
		'help'        => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
		'hr'      => true
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-overlay-scale-enable=on||hi-overlay-rotate-enable=on'
	) );

	hi_make_option( array(
		'key'     => 'hi-h-overlay-transform2',
		'name'    => __( 'Additional Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-overlay-origin',
		'name'    => __( 'Overlay Origin', 'hitd' ),
		'type'    => 'origin',
		'default' => 'center center',
		'help'    => __( 'Set starting position of transformed elements.', 'hitd' ),
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop',
	) );
