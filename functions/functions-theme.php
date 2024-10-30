<?php

	/*
	 * Init frontend hooks
	 * */
	function hi_frontend_hooks()
	{
		add_action( 'wp_footer', 'hi_theme_styles', 100 );
		add_filter( 'post_thumbnail_html', 'hi_post_thumbnail_html', 10, 5 );
		add_action( 'wp_print_styles', 'hi_assets' );
	}

	/*
	 * enqueue frontend scc & js files
	 * */
	function hi_assets()
	{
		// prettyPhoto
		wp_enqueue_style( 'hi-pretty-photo', HIF_URL . 'assets/css/pretty-photo/css/prettyPhoto.css', false, HIF_VERSION );

		// icon font frontend
		wp_enqueue_style( 'hi-icons-frontend', HIF_URL . 'assets/css/font-frontend/style.css', false, HIF_VERSION );

		// frontend style
		wp_enqueue_style( 'hi-frontend', HIF_URL . 'assets/css/hi-frontend.css', false, HIF_VERSION );

		// frontend script
		wp_enqueue_script( 'hi-frontend', HIF_URL . 'assets/js/hi-frontend.min.js', array( 'jquery' ), HIF_VERSION );
	}

	/*
	 * post_thumbnail_html hook
	 * */
	function hi_post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr )
	{
		if( $html == '' )
		{
			return '';
		}
		else
		{
			return hi_make( $html, $post_id, $post_thumbnail_id );
		}
	}

	/*
	 * Call generate hi data function and return wrapped html
	 * @return string
	 * */
	function hi_make( $html, $post_id, $media_id = false )
	{
		// generate hi data
		$slug = hi_make_hidata( $post_id, $media_id );
		if( $slug == false )
		{
			return $html;
		}
		else
		{
			// return wrapped html
			return sprintf( '<div class="hi-tpl" data-hidata="%1$sX%2$s" data-align="center">%3$s</div>', $post_id, $media_id, $html );
		}
	}

	/*
	 * Generate hi data
	 * @return void
	 * */
	function hi_make_hidata( $post_id, $media_id, $api_nick = false )
	{
		// set globals
		global $hi_tpls;
		global $hi_assigns;
		global $hi_tpls_html;

		if( !$hi_tpls )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );
		}

		if( !$hi_assigns )
		{
			$hi_assigns = hi_get_option( HIF_ASSIGNS );
		}

		// get slug for this post by post id
		$hi_slug = hi_get_tpl_by_post( $post_id );

		// if no assigned tpl, return $html
		if( $hi_slug === false )
		{
			return false;
		}

		// get tpl
		$hi_tpl = hi_get_array( $hi_tpls, $hi_slug, false );
		if( $hi_tpl == false )
		{
			return false;
		}

		// tpl name & data
		$name = $hi_tpl[ 'name' ];
		$data = $hi_tpl[ 'data' ];

        $data = hi_check_for_new( $data );

		// get tpl HTML
		if( ! is_array( $hi_tpls_html ) || ! array_key_exists( $post_id, $hi_tpls_html ) || ! array_key_exists( $media_id, $hi_tpls_html[ $post_id ] ) )
		{
			hi_tpls_html( $name, $data, $post_id, $media_id );
		}

		return $hi_slug;
	}

	/*
	 * Generate hi data ad set it to global $hi_tpls_html
	 * @return void
	 * */
	function hi_tpls_html( $name, $data, $post_id, $media_id, $custom = array() )
	{
		// set globals
		global $hi_tpls_html;
		// predefine data
		$hi_data = array(
			'tplid'   => $data->tplid,
			'name'    => $name,
			'overlay' => 0,
			'content' => 0,
			'buttons' => 0,
			'shares'  => 0
		);

		// Overlay
		if( $data->overlay->enable )
		{
			$hi_data[ 'overlay' ] = true;
		}

		/* Buttons */
		if( $data->buttons->enable )
		{
			$hi_data[ 'buttons' ] = array();

			if( $data->buttons->set->view )
			{
				if( array_key_exists( 'view', $custom ) )
				{
					$hi_data[ 'buttons' ][ 'view' ] = $custom[ 'view' ];
				}
				else
				{
					$media_data = wp_get_attachment_image_src( $media_id, 'full' );
					$hi_data[ 'buttons' ][ 'view' ] = $media_data[ 0 ];
				}
			}
			if( $data->buttons->set->link )
			{
			    // Target param
				( array_key_exists( 'new_window', $custom ) && $custom['new_window'] == '1' )
					? $hi_data[ 'buttons' ][ 'target' ] = '_blank'
					: $hi_data[ 'buttons' ][ 'target' ] = '_self';

                // Link destination
				( array_key_exists( 'link', $custom ) )
                    ? $hi_data[ 'buttons' ][ 'link' ] = $custom[ 'link' ]
                    : $hi_data[ 'buttons' ][ 'link' ] = get_permalink( $post_id );

                // always show link button on single page
                $hi_data[ 'buttons' ][ 'link_single' ] = true;

                // except featured image
                if(
                    !array_key_exists( 'scp', $custom ) && is_single() && $data->buttons->link_single == false ){
                    $hi_data[ 'buttons' ][ 'link_single' ] = false;
                }
			}
		}

		/* Content */
		if( $data->content->enable )
		{
			$hi_data[ 'content' ] = array();

			// Content title
			if( $data->content->enable_parts->title )
			{
				if( array_key_exists( 'title', $custom ) )
				{
					array_key_exists( 'link', $custom )
						? $title_link = $custom[ 'link' ]
						: $title_link = get_permalink();

					( array_key_exists( 'new_window', $custom ) && $custom['new_window'] == '1' )
						? $target = '_blank'
						: $target = '_self';

                    ( isset( $data->content->title_type ) ) ? $title_type = $data->content->title_type : $title_type = 'link';

					$hi_data[ 'content' ][ 'title' ] = array(
                        'title_type' => $title_type,
						'permalink' => $title_link,
						'attr'      => array(
							'title' => the_title_attribute( array(
								'before' => '',
								'after'  => '',
								'echo'   => false
							) ),

						),
						'target'    => $target,
						'title'     => $custom[ 'title' ]
					);
				}
				else
				{
					$hi_data[ 'content' ][ 'title' ] = array(
						'permalink' => get_permalink(),
						'attr'      => array(
							'title' => the_title_attribute( array(
								'before' => __( 'Permalink to: ', 'hitd' ),
								'after'  => '',
								'echo'   => false
							) ),
						),
						'title'     => get_the_title( $post_id )
					);
				}
			}

			// Content excerpt
			if( $data->content->enable_parts->excerpt )
			{
				if( array_key_exists( 'text', $custom ) )
				{
					$hi_data[ 'content' ][ 'excerpt' ] = $custom[ 'text' ];
				}
				else
				{
					$hi_data[ 'content' ][ 'excerpt' ] = get_the_excerpt();
				}

				$hi_data[ 'content' ][ 'clamp' ] = $data->content->typo->excerpt->length;
			}

			// content categories
			if( $data->content->enable_parts->categories )
			{

				if( array_key_exists( 'categories', $custom ) )
				{
					$hi_data[ 'content' ][ 'categories' ] = $custom[ 'categories' ];
				}
				else
				{
					$categories       = get_the_category();
					$categories_array = array();

					if( $categories )
					{
						foreach( $categories as $category )
						{
							$categories_array[ ] = array(
								'link'  => get_category_link( $category->term_id ),
								'title' => esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ),
								'name'  => $category->cat_name
							);
						}
					}
					$hi_data[ 'content' ][ 'categories' ] = $categories_array;
				}
			}

			// content shares
			if( $data->content->enable_parts->shares )
			{

				global $post;

				$shares_links = array();

				$title = urlencode( get_the_title() );
				$post_link = urlencode( get_permalink() );

                $excerpt = '';
                if( has_excerpt() ){
                    $excerpt = urlencode( get_the_excerpt() );
                }

				has_post_thumbnail( $post->ID )
					? $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' )
					: $image = false;
				( $image )
					? $post_img = $image[ 0 ]
					: $post_img = false;

				$custom_share = array_key_exists( 'share', $custom );
/**/

				foreach( $data->content->shares_enable as $share => $enable )
				{
					if( $enable )
					{
						switch( $share )
						{
							case 'twitter':
								$icon  = 'hi-ff-twitter';
								$color = '#00ACED';
								$link  = 'https://twitter.com/share?url={url}&text={title}&via={via}&hashtags={hashtags}';
								break;
							case 'facebook':
								$icon  = 'hi-ff-facebook';
								$color = '#3B5998';
								$link  = 'http://www.facebook.com/sharer.php?s=100&p[url]={url}&p[images][0]={img}&p[title]={title}&p[summary]={desc}';
								break;
							case 'googleplus':
								$icon  = 'hi-ff-googleplus';
								$color = '#DD4B39';
								$link  = 'https://plus.google.com/share?url={url}';
								break;
							case 'pinterest':
								$icon  = 'hi-ff-pinterest';
								$color = '#CB2027';
								$link  = 'https://pinterest.com/pin/create/bookmarklet/?media={img}&url={url}&is_video={is_video}&description={title}';
								break;
							case 'tumblr':
								$icon  = 'hi-ff-tumblr';
								$color = '#2C4762';
								$link  = 'http://www.tumblr.com/share/link?url={url}&name={title}&description={desc}';
								break;
							case 'linkedin':
								$icon  = 'hi-ff-linkedin';
								$color = '#3399CC';
								$link  = 'http://www.linkedin.com/shareArticle?url={url}&title={title}';
								break;
							case 'reddit':
								$icon  = 'hi-ff-reddit';
								$color = '#ff5700';
								$link  = 'http://reddit.com/submit?url={url}&title={title}';
								break;
							case 'digg':
								$icon  = 'hi-ff-digg';
								$color = '#0093CC';
								$link  = 'http://digg.com/submit?url={url}&title={title}';
								break;
							default:
								$icon  = '';
								$color = '';
								break;
						}

						if( $custom_share && $custom[ 'share' ] == 'image' )
						{
							$link = str_replace( '{url}', $custom[ 'view' ], $link );
							$link = str_replace( '{title}', $custom[ 'title' ], $link );
							$link = str_replace( '{desc}', $custom[ 'text' ], $link );
							$link = str_replace( '{img}', $custom[ 'view' ], $link );
							$link = str_replace( '{is_video}', '', $link );
							$link = str_replace( '{via}', '', $link );
							$link = str_replace( '{hashtags}', '', $link );
						}
						else
						{
							$link = str_replace( '{url}', $post_link, $link );
							$link = str_replace( '{title}', $title, $link );
							$link = str_replace( '{desc}', $excerpt, $link );
							$link = str_replace( '{img}', $post_img, $link );
							$link = str_replace( '{is_video}', '', $link );
							$link = str_replace( '{via}', '', $link );
							$link = str_replace( '{hashtags}', '', $link );
						}

						$shares_links[ ] = array(
							'link'  => $link,
							'color' => $color,
							'icon'  => $icon
						);
					}
				}
				$hi_data[ 'content' ][ 'shares' ] = $shares_links;
			}
		}

		// set $hi_data to global $hi_tpls_html
		$hi_tpls_html[ $post_id ][ $media_id ] = $hi_data;
	}


	/*
	 * Get tpl slug (id) by post id
	 * @return string
	 * */
	function hi_get_tpl_by_post( $post_id )
	{
		global $hi_assigned;

		$post_type = get_post_type( get_post( $post_id ) );

		switch( $post_type )
		{
			case 'page':
				$slug = hi_get_assign( 'all-pages' );
				$hi_assigned[ 'all-pages' ] = $slug;
				break;

			case 'post':
				$format = get_post_format( $post_id );
				if( $format == false )
				{
					$format = 'standard';
				}
				// all posts & pages match
				$slug = hi_get_assign( 'post-format-' . $format );
				if( $slug == false )
				{
					$slug = hi_get_assign( 'all-posts' );
				}
				$hi_assigned[ 'post-format-' . $format ] = $slug;
				break;

			default:
				$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects', 'and' );
				if( count( $post_types ) > 0 )
				{
					if( array_key_exists( $post_type, $post_types ) )
					{
						$slug = hi_get_assign( 'post-custom-' . $post_type );
						$hi_assigned[ 'post-custom-' . $post_type ] = $slug;
					}
				}
				else
				{
					$slug = false;
				}
				break;
		}

		return $slug;
	}


	/*
	 * Get tpl slug (id) by post id
	 * @return string
	 * */
	function hi_get_assign( $key )
	{
		global $hi_assigned;
        global $hi_assigns;
		$hi_assigned = hi_is_array( $hi_assigned );
		$assigns_fi  = hi_get_array( $hi_assigns, 'fi' );
		$slug        = hi_get_array( $hi_assigned, $key, false );
        if( $slug === false )
        {
            $slug = hi_get_array( $assigns_fi, $key, false );
        }
		return $slug;
	}

	function hi_theme_styles()
	{
		global $hi_ss;
		global $hi_tpls;
		global $hi_tpls_html;
		global $hi_assigned;
        global $hi_assigns;

		$hi_ss       = hi_is_array( $hi_ss );
		$hi_tpls     = hi_is_array( $hi_tpls );
		$hi_assigned = hi_is_array( $hi_assigned );

		$ss_html = array();
		foreach( $hi_assigned as $post_format => $slug )
		{
			if( $slug !== false )
			{
				if( array_key_exists( $slug, $hi_tpls ) )
				{
					$ss_key = '.hi-' . $slug;

					array_key_exists( $ss_key, $hi_ss )
						? $assets = $hi_ss[ $ss_key ]
						: $assets = hi_render_style( $ss_key, $hi_tpls[ $slug ][ 'data' ] );

					// styles
					$s = '<!-- ' . $slug . ' styles -->' . '<style class="hi-style '.$slug.'">' . implode( '', $assets[ 'style' ] ) . '</style>' . '<!-- end ' . $slug . ' styles -->' . "\n";

					// scripts
					//$s .= '<!-- ' . $slug . ' scripts -->' . '<script>jQuery(document).ready(function ($) { ' . implode( " ", $assets[ 'script' ] ) . ' } );</script>' . '<!-- end ' . $slug . ' scripts -->' . "\n";

					$ss_html[ $ss_key ] = $s;
				}
			}
		}

		echo implode( '', $ss_html );

		if( is_array( $hi_tpls_html ) )
		{
			foreach( $hi_tpls_html as $pid => $hidata )
			{
				echo '<div style="display: none" id="hi-data-post-' . $pid . '">' . json_encode( $hidata ) . '</div>';
			}
		}

        // Exclude classes: since 1.0.3


        if( is_array( $hi_assigns ) && array_key_exists( 'ex', $hi_assigns ) )
        {

            if( array_key_exists( 'hi-excludes', $hi_assigns['ex'] ) && count( $hi_assigns['ex']['hi-excludes'] ) )
            {
                echo '<div style="display: none" id="hi-excludes">' . json_encode( $hi_assigns['ex']['hi-excludes'] ) . '</div>';
            }
        }
	}

	function hi_get_array( $array, $key, $default = array() )
	{
		if( is_bool( $key ) )
		{
			$key = parse_str( $key );
		}

		if( is_array( $array ) && array_key_exists( $key, $array ) )
		{
			return $array[ $key ];
		}
		return $default;
	}

	function hi_is_array( $array, $default = array() )
	{
		if( is_array( $array ) )
		{
			return $array;
		}
		return $default;
	}

	/*
	 * API
	 * */
	function hi_api_get_wrapper( $api_nick, $media_id = false, $html = '', $atts = array() )
	{
		global $post;
		global $hi_tpls;
		global $hi_api;
		global $hi_assigns;
		global $hi_assigned;
		global $hi_tpls_html;

		if( !is_array( $hi_api ) )
		{
			return $html;
		}

		if( !$hi_tpls )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );
		}

		if( !$hi_assigns )
		{
			$hi_assigns = hi_get_option( HIF_ASSIGNS );
		}

		preg_match( '@src="([^"]+)"@' , $html , $match );
		isset( $match[ 1 ] )
			? $src = $match[ 1 ]
			: $src = '#';

		$params = wp_parse_args( $atts, array(
			'id'   => '',
			'view' => $src,
			'link' => get_permalink( $post->ID ),
			// content
			'title'      => get_the_title( $post->ID ),
			'text'       => get_the_excerpt(),
			'categories' => '',
			'share'      => 'post'
		) );

		array_key_exists( 'api', $hi_assigns )
			? $assigns = $hi_assigns[ 'api' ]
			: $assigns = array();

		array_key_exists( $api_nick, $assigns )
			? $slug = $assigns[ $api_nick ]
			: $slug = false;

		$hi_assigned[ $api_nick ] = $slug;

		// get tpl

		$hi_tpl = hi_get_array( $hi_tpls, $slug, false );
		if( $hi_tpl == false )
		{
			return $html;
		}

		if( $slug == false )
		{
			return $html;
		}
		else
		{
			// get tpl HTML
			if( ! is_array( $hi_tpls_html ) || ! array_key_exists( $api_nick, $hi_tpls_html ) || ! array_key_exists( $media_id, $hi_tpls_html[ $api_nick ] ) )
			{
				hi_tpls_html( $hi_tpl[ 'name' ], $hi_tpl[ 'data' ], $api_nick, $media_id, $params );
			}

			// return wrapped html
			return sprintf( '<div class="hi-tpl" data-hidata="%1$sX%2$s" data-align="center">%3$s</div>', $api_nick, $media_id, $html );
		}
	}


	/*
	 * SC
	 * */
	// Add Shortcode
	function hi_image_shortcode( $atts , $content = null )
	{
		// set globals
		global $hi_tpls;
		global $hi_assigned;
		global $hi_tpls_html;
		global $hi_image;
		global $post;

		if( ! $hi_image )
		{
			$hi_image = 0;
		}

		if( ! $hi_tpls )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );
		}

		$content = str_replace( array( '<br />', '<br/>', "\n" ), '', trim( $content ) );

		preg_match( '@src="([^"]+)"@' , $content , $match );
		isset( $match[ 1 ] )
			? $src = $match[ 1 ]
			: $src = '#';


        $excerpt = '';
        if( has_excerpt() ){
            $excerpt = get_the_excerpt();
        }

		$params = wp_parse_args( $atts, array(
			'id'   => '',
			'view' => $src,
			'link' => get_permalink( $post->ID ),
		    'title'      => get_the_title( $post->ID ),
			'text'       => $excerpt,
			'categories' => '',
		    'share'      => 'post',

		    // since 1.0.1
			'image'      => '',
			'size'       => '',
			'alignment'  => 'left',

            // sinse 1.0.3
            'display' => 'block',
			'new_window' => '0',
			'size_wrap' => '',
            'scp' => '1'
		) );



		$id = trim( $params[ 'id' ] );

		if( $content == '' )
		{
			if( $params[ 'image' ] != '' )
			{
				$img_data = wp_get_attachment_image_src( $params[ 'image' ], 'full' );
				$content = wp_get_attachment_image( $params[ 'image' ], $params[ 'image' ] );
				$params['view'] = $img_data[0];
			}
			// if no content and no image id
			else
			{
				return '';
			}
		}

		// if no assigned tpl, return $html
		if( $id === '' )
		{
			return $content;
		}

		$hi_assigned[ 'sc-' . $id ] = $id;

		// get tpl
		$hi_tpl = hi_get_array( $hi_tpls, $id, array() );
		if( count( $hi_tpl ) == 0 )
		{
			return $content;
		}

        $tpl_styles = array();

		// get tpl HTML
		if(
               ! is_array( $hi_tpls_html )
            || ! array_key_exists( $post->ID, $hi_tpls_html )
            || ! array_key_exists( $hi_image, $hi_tpls_html[ $post->ID ] )
        )
		{
			hi_tpls_html( $hi_tpl[ 'name' ], $hi_tpl[ 'data' ], $post->ID, $hi_image, $params );
		}


		$tpl_styles = array();

		// size
		$image_size = hi_get_image_sizes( $params['size'] );
		if( $image_size[ 'width' ] != '' || $image_size[ 'height' ] != '' )
		{
			$s['width']  = trim( $image_size[ 'width' ], 'px' );
			$s['height'] = trim( $image_size[ 'height' ], 'px' );
			foreach( $s as $k => $v )
			{
				$l = substr( $v, -1 );

				if( $l != '%' && $v != 'auto' )
				{
					$s[$k] = $v . 'px';
				}
			}
			$tpl_styles[] = 'width: ' . $s[ 'width' ] . '; height: ' . $s[ 'height' ] . ';';
		}

		// tpl block classes
		$tpl_class = array();
		$tpl_class[] = 'hi-tpl';
		//$tpl_class[] = 'text-' . $params['alignment'];
        $tpl_class[] = $params[ 'display' ];

		// tpl block styles
		count( $tpl_styles ) > 0
			? $style_str = ' style="' . implode( ' ', $tpl_styles ) . '"'
			: $style_str = '';


        $content = '<div class="' . implode( ' ', $tpl_class ) . '" ' .
			'data-align="' . $params['alignment'] . '" ' .
			'data-sizew="' . $params['size_wrap'] . '" ' .
			'data-hidata="' . $post->ID . 'X' . $hi_image . '"' . $style_str . '>' . $content . '</div>';


		$hi_image++;
		return $content;
	}
	add_shortcode( 'hi_image', 'hi_image_shortcode' );

	function hi_get_image_sizes( $size = '' )
	{
		global $_wp_additional_image_sizes;

		if( $size == '' )
		{
			return array( 'width' => '', 'height'=> '' );
		}

		$sizes = array();
		$get_intermediate_image_sizes = get_intermediate_image_sizes();

		// Create the full array with sizes and crop info
		foreach( $get_intermediate_image_sizes as $_size )
		{
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) )
			{
				$sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
				$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
			}
			elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) )
			{
				$sizes[ $_size ] = array(
					'width' => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height']
				);
			}
		}

		// Get only 1 size if found


		if( $size )
		{
			if( isset( $sizes[ $size ] ) )
			{
				return $sizes[ $size ];
			}
			else
			{
				if( $size != '' )
				{
					$sizes = array();
					preg_match_all( '/(.*)x(.*)/', $size, $match );
					isset( $match[ 1 ][ 0 ] ) ? $sizes[ 'width' ] = $match[1][0] : $sizes[ 'width' ] = '';
					isset( $match[ 2 ][ 0 ] ) ? $sizes[ 'height' ] = $match[2][0] : $sizes[ 'height' ] = '';
					return $sizes;
				}
				return false;
			}
		}

		return $sizes;
	}




