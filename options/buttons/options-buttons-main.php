<?php

hi_make_option( array(
    'key'     => 'hi-buttons-enable',
    'name'    => __( 'Buttons', 'hitd' ),
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
    'showif'  => 'hi-buttons-enable=on'
) );

hi_make_option( array(
    'key'     => 'hi-buttons-set',
    'name'    => __( 'Buttons Set', 'hitd' ),
    'type'    => 'checkbox',
    'values'  => array(
        'link' => __( 'Link', 'hitd' ),
        'view' => __( 'View', 'hitd' ),
    ),
    'default' => array(
        'link' => 'link',
        'view' => 'view',
    ),
    'help'    => __( 'Select which button(s) will be shown in this template.', 'hitd' )
) );

// added in 1.0.9
hi_make_option( array(
    'type'    => 'trigger',
    'default' => 'start',
    'showif'  => 'hi-buttons-set=link'
) );

hi_make_option( array(
    'key'     => 'hi-buttons-link-single-enable',
    'name'    => __( 'Link Button on Single Page', 'hitd' ),
    'type'    => 'radio',
    'values'  => array(
        'on'  => __( 'Show', 'hitd' ),
        'off' => __( 'Hide', 'hitd' ),
    ),
    'default' => 'off',
    'help'    => __( 'Show/Hide Link button on featured image on single page.', 'hitd' )
) );

hi_make_option( array(
    'type'    => 'trigger',
    'default' => 'stop',
    'hr'      => true
) );
// # added in 1.0.9

hi_make_option( array(
    'type'    => 'trigger',
    'default' => 'start',
    'showif'  => 'hi-buttons-set=view'
) );

hi_make_option( array(
    'key'     => 'hi-pretty-photo',
    'name'    => __( 'Use PrettyPhoto', 'hitd' ),
    'type'    => 'radio',
    'values'  => array(
        'on'  => __( 'Yes', 'hitd' ),
        'off' => __( 'No', 'hitd' ),
    ),
    'default' => 'on',
    'help'    => 'Enable/disable prettyPhoto script for View <i class="hi-ff-view"></i> button.',
) );

hi_make_option( array(
    'type'    => 'trigger',
    'default' => 'stop',
    'hr'      => true
) );