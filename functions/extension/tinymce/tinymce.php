<?php
/**
 * Init hooks
 */
function hi_tinymce_init() {
    add_action( 'wp_enqueue_editor',     'hi_tinymce_enqueue', 10, 1 );
    add_action( 'print_media_templates', 'hi_tinymce_template' );
}
add_action( 'init', 'hi_tinymce_init' );

/**
 * Enqueue Styles and Scripts for tinymce integration
 */
function hi_tinymce_enqueue( $options ) {
    if ( $options['tinymce'] ) {
        wp_enqueue_script( 'hi_tinymce', HIF_URL . 'functions/extension/tinymce/assets/heb-tinymce.js', array( 'jquery' ), HIF_VERSION, true );
        wp_enqueue_style( 'hi_tinymce',  HIF_URL . 'functions/extension/tinymce/assets/heb-tinymce.css', array(), HIF_VERSION );
    }
}

/**
 * Include form template for Image Details window
 */
function hi_tinymce_template(){
    include HIF_PATH . '/functions/extension/tinymce/tpl.php';
}

/**
 * Content filter.
 */
function hi_tinymce_shortcode_init( $content ) {
    // find all image with 'data-hi_style' attribute
    preg_match_all ("/[^\[caption .*\]](<img .* data-hi_style=.*>)/U", $content, $image_array);

    // if images was found
    if( count( $image_array[1] ) > 0 ) {
        // read data attributes and build shortcode
        foreach( $image_array[1] as $key => $image ) {
            $content = str_replace( $image, hi_tinymce_image_to_sc( $image ), $content );
        }
    }
    return $content;
}
add_filter( 'the_content', 'hi_tinymce_shortcode_init' );

/**
 *  Parsing img tag sting to shortcode
 */
function hi_tinymce_image_to_sc( $image ) {
    preg_match_all ('/(data-hi_(style|title|link|view|text|size|alignment|share|display|new_window))=("[^"]*")/i', $image, $prop_array);
    $props    = array_combine ( $prop_array[2], $prop_array[3] );
    $params   = array();
    if( ! array_key_exists( 'style', $props ) )
    {
        return $image;
    }

    $params[] = 'id=' . $props['style'];
    foreach( $props as $prop_key => $prop_val ) {
        $params[] = $prop_key . '=' . $prop_val;
    }
    $image_new = str_replace('hi_style', 'hi_id', $image );
    $image_new = '[hi_image ' . implode( ' ', $params ) . ']' . $image_new . '[/hi_image]';

    return $image_new;
}

/**
 * Image caption shortcode filter
 */
function hi_tinymce_shortcode_filter( $empty, $attr, $content ) {
    $content = do_shortcode( hi_tinymce_image_to_sc( $content ) );
    return $content;
}
add_filter( 'img_caption_shortcode', 'hi_tinymce_shortcode_filter', 10, 3 );