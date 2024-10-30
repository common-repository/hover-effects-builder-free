<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

class VCExtendAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );
    }
 
    public function integrateWithVC()
    {
        // Check if Visual Composer is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Visual Compser is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

	    // get templates array
	    $hi_tpls = hi_get_option( HIF_TEMPLATES );
	    $tpls_list = array();
	    $tpls_list[ __( 'No', 'js_composer' ) ] = '';
	    foreach( $hi_tpls as $tpl_id => $tpl_data )
	    {
		    $tpls_list[ $tpl_data[ 'name' ] ] = $tpl_id;
	    }

	    $link = $title = $text = $view = '';
	    if( array_key_exists( 'post_id', $_POST ) )
	    {
		    $post = get_post( $_POST[ 'post_id' ] );
		    if( $post )
		    {
			    $link = get_permalink( $post->ID );
			    $title = get_the_title( $post->ID );
			    $text = get_the_excerpt();
		    }
	    }

	    if( array_key_exists( 'post', $_GET ) )
	    {
		    $post = get_post( $_GET[ 'post' ] );
		    if( $post )
		    {
			    $link = get_permalink( $post->ID );
			    $title = get_the_title( $post->ID );
			    $text = get_the_excerpt();
		    }
	    }

        vc_map( array(
            "name" => __("Image with Hover Effect", 'hitd' ),
            "description" => __("Single image with hover effect.", 'hitd' ),
            "base" => "hi_image",
            "class" => "",
            "controls" => "full",
            "icon" => HIF_URL . 'functions/extension/vc/vc-image-ext/assets/hover_vc_icon_32x32.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category" => __('Content', 'js_composer'),
            "params" => array(
	            array(
		            'type' => 'attach_image',
		            'heading' => __( 'Image', 'js_composer' ),
		            'param_name' => 'image',
		            'value' => '',
		            'description' => __( 'Select image from media library.', 'js_composer' )
	            ),
	            array(
		            'type' => 'dropdown',
		            'heading' => __( "Template", 'hitd' ),
		            'param_name' => 'id',
		            'value' => $tpls_list,
		            'description' => __( "Hover effect template name.", 'hitd' )
	            ),
	            array(
		            'type' => 'textfield',
		            'heading' => __( 'Image size', 'js_composer' ),
		            'param_name' => 'size',
		            'description' => __( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'js_composer' )
	            ),
	            array(
		            'type' => 'dropdown',
		            'heading' => __( 'Image alignment', 'js_composer' ),
		            'param_name' => 'alignment',
		            'value' => array(
			            __( 'Align left', 'js_composer' ) => '',
			            __( 'Align right', 'js_composer' ) => 'right',
			            __( 'Align center', 'js_composer' ) => 'center'
		            ),
		            'description' => __( 'Select image alignment.', 'js_composer' )
	            ),
	            array(
		            'type' => 'textfield',
		            'heading' => __( "Link URL", 'hitd' ),
		            'param_name' => 'link',
		            'value' => $link,
		            'description' => __( 'Custom URL for Title link or <i class="hi-ff-link"></i> button.', 'hitd' )
	            ),
	            /*
	            array(
		            'type' => 'textfield',
		            'heading' => __( "View Link", 'hitd' ),
		            'param_name' => 'view',
		            'value' => $view,
		            'description' => __( 'Custom URL on <i class="hi-ff-view"></i> button.', 'hitd' )
	            ),
	            /**/
	            array(
		            'type' => 'textfield',
		            'heading' => __( "Title", 'hitd' ),
		            'param_name' => 'title',
		            'value' => $title,
		            'description' => __( 'Set custom title for content section.', 'hitd' )
	            ),
	            array(
		            'type' => 'textarea',
		            'heading' => __( "Text", 'hitd' ),
		            'param_name' => 'text',
		            'value' => $text,
		            'description' => __( 'Set custom text for excerpt.', 'hitd' )
	            ),
	            array(
		            'type' => 'dropdown',
		            'heading' => __( "Share", 'hitd' ),
		            'param_name' => 'share',
		            'value' => array( __( 'Post', 'hitd' ) => 'post', __( 'Image', 'hitd' ) => 'image' ),
		            'description' => __( "Choose what to share via social buttons.", 'hitd' )
	            ),
            )
        ) );
    }
    
    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
    }
}
// Finally initialize code
new VCExtendAddonClass();