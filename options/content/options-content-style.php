<?php

	hi_make_option( array(
		'key'     => 'hi-h-content-md1',
		'name'    => __( 'General Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-type',
		'name'    => __( 'Content Area Type', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'partial' => __( 'Partial', 'hitd' ),
			'full'    => __( 'Cover full', 'hitd' ),
		),
		'default' => 'full',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-type=partial'
	) );

	hi_make_option( array(
		'key'     => 'hi-content-partial-size',
		'name'    => __( 'Content Area Size', 'hitd' ),
		'type'    => 'startstop',
		'values'  => array(
			'start' => array(
				'min'     => 10,
				'max'     => 1000,
				'step'    => 1,
				'postfix' => 'px'
			),
		),
		'default' => array( 'start' => 70 ),
		'names'   => array( 'start' => false, ),
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-partial-position',
		'name'    => __( 'Content Area Position', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'left'   => '<i class="hi-fb-arrow-left no-margin"></i>',
			'top'    => '<i class="hi-fb-arrow-up no-margin"></i>',
			'right'  => '<i class="hi-fb-arrow-right no-margin"></i>',
			'bottom' => '<i class="hi-fb-arrow-down no-margin"></i>',
		),
		'default' => 'bottom',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop'
	) );

	hi_make_option( array(
		'key'     => 'hi-content-background',
		'name'    => __( 'Background Color', 'hitd' ),
		'type'    => 'color',
		'default' => '#000000',
		'opacity' => '0.8',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-background-margin',
		'name'    => __( 'Content Area Margin', 'hitd' ),
		'type'    => 'startstop',
		'values'  => array(
			'start' => array(
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'postfix' => 'px'
			),
		),
		'default' => array( 'start' => 0 ),
		'names'   => array( 'start' => false ),
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-align',
		'name'    => __( 'Content Align', 'hitd' ),
		'type'    => 'radio',
		'values'  => array(
			'left'   => '<i class="hi-fb-align-left no-margin"></i>',
			'center' => '<i class="hi-fb-align-center no-margin"></i>',
			'right'  => '<i class="hi-fb-align-right no-margin"></i>',
		),
		'default' => 'center',
		'help'    => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-parts=title'
	) );

	hi_make_option( array(
		'key'     => 'hi-h-content-md2',
		'name'    => __( 'Title Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

    hi_make_option( array(
        'key'     => 'hi-content-title-type',
        'name'    => __( 'Title Type', 'hitd' ),
        'type'    => 'radio',
        'values'  => array(
            'link'  => __( 'Link', 'hitd' ),
            'heading' => __( 'Heading', 'hitd' ),
        ),
        'default' => 'link',
        'help'    => false
    ) );

	hi_make_option( array(
		'key'    => 'hi-content-title-typo',
		'name'   => __( 'Typography', 'hitd' ),
		'type'   => 'typo',
		'values' => array(
			'font-size'  => array(
				'key'     => 'hi-content-title-typo-font-size',
				'values'  => array(
					'min'     => 14,
					'max'     => 128,
					'step'    => 2,
					'postfix' => 'px',
				),
				'default' => '18'
			),
			'color'      => array(
				'key'     => 'hi-content-title-typo-color',
				'default' => '#ffffff',
				'opacity' => false
			),
			'font-style' => array(
				'key'     => 'hi-content-title-typo-font-style',
				'values'  => array(
					'bold'      => '<i class="hi-fb-bold no-margin"></i>',
					'italic'    => '<i class="hi-fb-italic no-margin"></i>',
					'underline' => '<i class="hi-fb-underline no-margin"></i>',
					'uppercase' => '<i class="hi-fb-text-height no-margin"></i>',
				),
				'default' => array(
					'italic'     => '',
					'bold'       => 'bold',
					'underline'  => '',
					'capitalize' => '',
				),
			),
		),
		'help'   => false
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop'
	) );

	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-parts=excerpt'
	) );

	hi_make_option( array(
		'key'     => 'hi-h-content-md3',
		'name'    => __( 'Excerpt Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-excerpt-length',
		'name'    => __( 'Excerpt Length', 'hitd' ),
		'type'    => 'startstop',
		'values'  => array(
			'start' => array(
				'min'     => 1,
				'max'     => 20,
				'step'    => 1,
				'postfix' => 'lines'
			),
		),
		'default' => array( 'start' => 4 ),
		'names'   => array( 'start' => false ),
		'help'    => false
	) );

	// Excerpt typography
	hi_make_option( array(
		'key'    => 'hi-content-excerpt-typo',
		'name'   => __( 'Typography', 'hitd' ),
		'type'   => 'typo',
		'values' => array(
			'font-size'  => array(
				'key'     => 'hi-content-excerpt-typo-font-size',
				'values'  => array(
					'min'     => 8,
					'max'     => 24,
					'step'    => 2,
					'postfix' => 'px',
				),
				'default' => '12'
			),
			'color'      => array(
				'key'     => 'hi-content-excerpt-typo-color',
				'default' => '#ffffff',
				'opacity' => false
			),
			'font-style' => array(
				'key'     => 'hi-content-excerpt-typo-font-style',
				'values'  => array(
					'bold'      => '<i class="hi-fb-bold no-margin"></i>',
					'italic'    => '<i class="hi-fb-italic no-margin"></i>',
					'underline' => '<i class="hi-fb-underline no-margin"></i>',
					'uppercase' => '<i class="hi-fb-text-height no-margin"></i>',
				),
				'default' => array(
					'italic'     => '',
					'bold'       => '',
					'underline'  => '',
					'capitalize' => '',
				),
			),
		),
		'help'   => false
	) );

	// trigger stop
	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop'
	) );

	// trigger start
	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-parts=categories'
	) );

	hi_make_option( array(
		'key'     => 'hi-h-content-md4',
		'name'    => __( 'Categories Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	// categories typography
	hi_make_option( array(
		'key'    => 'hi-content-categories-typo',
		'name'   => __( 'Typography', 'hitd' ),
		'type'   => 'typo',
		'values' => array(
			'font-size'  => array(
				'key'     => 'hi-content-categories-typo-font-size',
				'values'  => array(
					'min'     => 8,
					'max'     => 24,
					'step'    => 2,
					'postfix' => 'px',
				),
				'default' => '12'
			),
			'color'      => array(
				'key'     => 'hi-content-categories-typo-color',
				'default' => '#ffffff',
				'opacity' => false
			),
			'font-style' => array(
				'key'     => 'hi-content-categories-typo-font-style',
				'values'  => array(
					'bold'      => '<i class="hi-fb-bold no-margin"></i>',
					'italic'    => '<i class="hi-fb-italic no-margin"></i>',
					'uppercase' => '<i class="hi-fb-text-height no-margin"></i>',
				),
				'default' => array(
					'italic'     => '',
					'bold'       => '',
					'capitalize' => '',
				),
			),
		),
		'help'   => false
	) );

	// trigger stop
	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop'
	) );

	// trigger start
	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'start',
		'showif'  => 'hi-content-parts=shares'
	) );

	hi_make_option( array(
		'key'     => 'hi-h-content-md5',
		'name'    => __( 'Share Buttons Settings', 'hitd' ),
		'type'    => 'heading',
		'default' => 'md',
		'help'    => false
	) );

	// on - off content
	hi_make_option( array(
		'key'     => 'hi-content-shares-enable',
		'name'    => __( 'Share Buttons Set', 'hitd' ),
		'type'    => 'checkbox',
		'values'  => array(
			'twitter'    => '<i class="hi-ff-twitter"></i>',
			'facebook'   => '<i class="hi-ff-facebook"></i>',
			'googleplus' => '<i class="hi-ff-googleplus"></i>',
			'pinterest'  => '<i class="hi-ff-pinterest"></i>',
			'tumblr'     => '<i class="hi-ff-tumblr"></i>',
			'linkedin'   => '<i class="hi-ff-linkedin"></i>',
			'reddit'     => '<i class="hi-ff-reddit"></i>',
			'digg'       => '<i class="hi-ff-digg"></i>',
		),
		'default' => array(
			'twitter'    => 'twitter',
			'facebook'   => 'facebook',
			'googleplus' => 'googleplus',
			'pinterest'  => 'pinterest',
			'tumblr'     => '',
			'linkedin'   => '',
			'reddit'     => '',
			'digg'       => '',
		),
		'help'    => false
	) );


	// shares typography
	hi_make_option( array(
		'key'    => 'hi-content-shares-typo',
		'name'   => __( 'Typography', 'hitd' ),
		'type'   => 'typo',
		'values' => array(
			'font-size' => array(
				'key'     => 'hi-content-shares-typo-font-size',
				'values'  => array(
					'min'     => 8,
					'max'     => 24,
					'step'    => 2,
					'postfix' => 'px'
				),
				'default' => '14'
			),
			'color'     => array(
				'key'     => 'hi-content-shares-typo-color',
				'default' => '#ffffff',
				'opacity' => false
			),
		),
		'help'   => false
	) );

	hi_make_option( array(
		'key'     => 'hi-content-shares-radius',
		'name'    => __( 'Border Radius', 'hitd' ),
		'type'    => 'startstop',
		'values'  => array(
			'start' => array(
				'min'     => 0,
				'max'     => 50,
				'step'    => 1,
				'postfix' => '%'
			),
		),
		'default' => array( 'start' => 0 ),
		'names'   => array( 'start' => false ),
		'help'    => false
	) );



	// trigger stop
	hi_make_option( array(
		'type'    => 'trigger',
		'default' => 'stop'
	) );
