<?php

hi_make_option(array(
    'key' => 'hi-h-general',
    'name' => __('General Options', 'hitd'),
    'type' => 'heading',
    'values' => '',
    'default' => 'md',
    'help' => false
));

// Set image scale effect option
hi_make_option(array(
    'key' => 'hi-image-overflow',
    'name' => __('Image Wrapper Overflow', 'hitd'),
    'type' => 'radio',
    'values' => array(
        'hidden' => __('Hidden', 'hitd'),
        'visible' => __('Visible', 'hitd')
    ),
    'default' => 'hidden',
    'help' => __('Hide or show elements that are out of image wrapper.', 'hitd'),
    'cols' => '6+6'
));

hi_make_option(array(
    'key' => 'hi-transition_speed',
    'name' => __('Animation Duration', 'hitd'),
    'type' => 'startstop',
    'values' => array(
        'start' => array(
            'min' => 0,
            'max' => 5000,
            'step' => 10,
            'postfix' => 'ms'
        ),
    ),
    'default' => array('start' => 400),
    'names' => array('start' => false),
    'help' => __('Define how many milliseconds an animation will take to complete one cycle.', 'hitd'),
    'cols' => '5+7',
    'half' => '12'
));
//
hi_make_option( array(
    'key'     => 'hi-image-radius',
    'name'    => __( 'Border Radius', 'hitd' ),
    'type'    => 'startstop',
    //'orientation'=>'vertical',
    'values'  => array(
        'start' => array(
            'min'     => 0,
            'max'     => 3000,
            'postfix' => false
        ),
        'stop'  => array(
            'min'     => 0,
            'max'     => 3000,
            'postfix' => false
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
    'key'     => 'hi-image-radius-units',
    'name'    => __( 'Border Radius Units', 'hitd' ),
    'type'    => 'radio',
    'values'  => array(
        '%'  => __( '%', 'hitd' ),
        'px' => __( 'px', 'hitd' ),
    ),
    'default' => 'px',
    'help'    => false
) );