<?php

	// Set image scale effect option
	hi_make_option( array(
		'key'         => 'hi-mode',
		'name'        => __( 'Preview State', 'hitd' ),
		'type'        => 'radio',
		'values'      => array(
			'view' => __( 'Default', 'hitd' ),
			'edit' => __( 'Hover', 'hitd' ),
		),
		'default'     => 'view',
		'help'        => __( 'Set Default mode to test the animation effects. Or set Hover mode to see all changes in preview window during editing the settings.', 'hitd' ),
	    'cols'        => '6+6'
	) );

	global $_wp_additional_image_sizes;
	$previewSizes = array();
	$previewSizes[ '420xauto' ] = __( 'Default preview size', 'hitd' );
	foreach( $_wp_additional_image_sizes as $nick => $size )
	{
		$name = ucfirst( str_replace( array( '-', '_' ), ' ', $nick ) );
		$previewSizes[ $size[ 'width' ] . 'x' . $size[ 'height' ] ] = $name . ' ( ' . $size[ 'width' ] . ' x ' . $size[ 'height' ] . ' )px';
	}

	hi_make_option( array(
		'key'         => 'hi-preview-sizes',
		'name'        => __( 'Preview Size', 'hitd' ),
		'type'        => 'select',
		'values'      => $previewSizes,
		'default'     => '450xauto',
		'cols'        => '6+6',
		'help'        => 'You can change the image preview size to one of thumbnail sizes registered in your WordPress theme.',
	) );


