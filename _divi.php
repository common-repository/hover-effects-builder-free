<?php
// Start Fix Code
/// Modify by SeaWebster. Add Hover Effects Builder Plugin support
// this function prints thumbnail from Post Thumbnail or Custom field or First post image

if( !function_exists( 'print_thumbnail' ) )
{
	function print_thumbnail( $thumbnail = '', $use_timthumb = true, $alttext = '', $width = 100, $height = 100, $class = '', $echoout = true, $forstyle = false, $resize = true, $post = '', $et_post_id = '' )
	{
		if( is_array( $thumbnail ) )
		{
			extract( $thumbnail );
		}

		if( $post == '' )
		{
			global $post, $et_theme_image_sizes;
		}

		$output = '';

		$et_post_id = '' != $et_post_id ? (int)$et_post_id : $post->ID;

		if( has_post_thumbnail( $et_post_id ) )
		{
			$thumb_array[ 'use_timthumb' ] = false;

			$image_size_name = $width . 'x' . $height;
			$et_size = isset( $et_theme_image_sizes ) && array_key_exists( $image_size_name, $et_theme_image_sizes ) ? $et_theme_image_sizes[ $image_size_name ] : array( $width, $height );

			$et_attachment_image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $et_post_id ), $et_size );
			$thumbnail = $et_attachment_image_attributes[ 0 ];
		}
		else
		{
			$thumbnail_orig = $thumbnail;

			$thumbnail = et_multisite_thumbnail( $thumbnail );

			$cropPosition = '';

			$allow_new_thumb_method = false;

			$new_method = true;
			$new_method_thumb = '';
			$external_source = false;

			$allow_new_thumb_method = !$external_source && $new_method && $cropPosition == '';

			if( $allow_new_thumb_method && $thumbnail <> '' )
			{
				$et_crop = get_post_meta( $post->ID, 'et_nocrop', true ) == '' ? true : false;
				$new_method_thumb = et_resize_image( et_path_reltoabs( $thumbnail ), $width, $height, $et_crop );
				if( is_wp_error( $new_method_thumb ) )
				{
					$new_method_thumb = '';
				}
			}

			$thumbnail = $new_method_thumb;
		}

		if( false === $forstyle )
		{
			$output = '<img src="' . esc_url( $thumbnail ) . '"';

			if( $class <> '' )
			{
				$output .= " class='" . esc_attr( $class ) . "' ";
			}

			$dimensions = apply_filters( 'et_print_thumbnail_dimensions', " width='" . esc_attr( $width ) . "' height='" . esc_attr( $height ) . "'" );

			$output .= " alt='" . esc_attr( strip_tags( $alttext ) ) . "'{$dimensions} />";

			if( !$resize )
			{
				$output = $thumbnail;
			}
		}
		else
		{
			$output = $thumbnail;
		}

		if( function_exists( 'hi_make' ) )
		{
			$output = hi_make( $output, $post->ID, get_post_thumbnail_id() );
		}
		// End Hover Effects Builder Plugin injection

		if( $echoout )
		{
			echo $output;
		}
		else
		{
			return $output;
		}
	}
}
/**/
// End Fix Code