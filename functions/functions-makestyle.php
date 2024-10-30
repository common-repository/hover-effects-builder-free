<?php

	function hi_ms_typo( $data )
	{
		$style = array();

		if( property_exists( $data, 'size' ) )
		{
			$style[ ] = 'font-size: ' . $data->size . 'px;';
		}

		if( property_exists( $data, 'height' ) )
		{
			$style[ ] = 'line-height: ' . $data->height . 'px;';
		}

		if( property_exists( $data, 'color' ) )
		{
			$style[ ] = 'color: ' . $data->color . ' !important;';
		}

		if( property_exists( $data, 'bold' ) )
		{
			if( $data->bold )
			{
				$style[ ] = 'font-weight: bold;';
			}
		}

		if( property_exists( $data, 'italic' ) )
		{
			if( $data->italic )
			{
				$style[ ] = 'font-style: italic;';
			}
		}

		if( property_exists( $data, 'underline' ) )
		{
			if( $data->underline )
			{
				$style[ ] = 'text-decoration: underline;';
			}
		}

		if( property_exists( $data, 'uppercase' ) )
		{
			if( $data->uppercase )
			{
				$style[ ] = 'text-transform: uppercase;';
			}
		}

		return implode( '', $style );
	}

	function hi_ms_transition( $data, $part )
	{
		// transition
		$transitions = array();
		$types       = hi_ms_get_transition( $data->$part );

		if( count( $types ) )
		{
			foreach( hi_ms_get_transition( $data->$part ) as $type )
			{
				$transitions[ ] = $type . ' ' . $data->transition_speed . 'ms ease 0s';
			}

			$transitions = implode( ', ', $transitions );

			$strs = array();
			foreach( array( '-moz-', '-o-', '-webkit-', '-ms-', '' ) as $pref )
			{
				$transition = str_replace( 'transform', $pref . 'transform', $transitions );
				$strs[ ]    = $pref . 'transition:' . $transition;
			}

			return implode( ';', $strs ) . ';';
		}

		return '';
	}

	function hi_ms_get_transition( $data )
	{
		$transition = array();

		if( property_exists( $data, 'fade' ) && $data->fade )
		{
			$transition[ ] = 'opacity';
		}

		if(
			( property_exists( $data, 'fade' ) && $data->slide ) ||
			( property_exists( $data, 'rotate' ) && $data->rotate ) ||
			( property_exists( $data, 'push' ) && $data->push ) ||
			( property_exists( $data, 'scale' ) && $data->scale ) )
		{
			$transition[ ] = 'transform';
		}

		if( property_exists( $data, 'type' ) )
		{
			if( $data->type == 'border' || $data->type == 'background' )
			{

			}
		}

        $transition[ ] = 'border-radius';

		return $transition;
	}

	function hi_ms_transform( $data, $part, $hover )
	{
		$transform = array();

		// scale
		$transform[ ] = hi_ms_scale( $data, $part, $hover );

		// perspective
		$transform[ ] = hi_ms_perspective( $data, $part, $hover );

		//slide
		$transform[ ] = hi_ms_slide( $data, $part, $hover );

		// rotate
		$transform[ ] = hi_ms_rotate( $data, $part, $hover );


		$transform = trim( implode( ' ', $transform ) );

		$strs = array();

		if( $transform == '' )
		{
			return '';
		}

		foreach( array( '-moz-', '-o-', '-webkit-', '-ms-', '' ) as $pref )
		{
			$strs[ ] = $pref . 'transform:' . $transform;
		}

		return implode( ';', $strs ) . ';';
	}

	function hi_ms_perspective( $data, $part, $hover )
	{
		if( $data->$part->rotate )
		{
			if( $data->$part->perspective > 0 )
			{
				return 'perspective(' . $data->$part->perspective . 'px)';
			}
		}
			return '';
	}

	function hi_ms_scale( $data, $part, $hover )
	{
		if( $data->$part->scale )
		{
			$hover ? $p = 'stop' : $p = 'start';
			$v = $data->$part->scale_percents->$p / 100;
			return 'scale(' . $v . ',' . $v . ')';
		}

		return '';
	}

	function hi_ms_slide( $data, $part, $hover )
	{
		if( $part == 'image' )
		{
			if( $hover && $data->image->push && $data->content->enable && $data->content->slide )
			{
				$s = '';
				if( $data->content->partial == 'partial' )
				{
					$push_size = $data->content->partial_size . 'px';
					switch ( $data->content->partial_position )
					{
						case 'top':    $s = '0, ' . $push_size . ', 0';  break;
						case 'bottom': $s = '0, -' . $push_size . ', 0';  break;
						case 'left':   $s =       $push_size . ', 0, 0';  break;
						case 'right':  $s = '-' . $push_size . ', 0, 0';  break;
					}
					return 'translate3d( ' . $s . ')';
				}
				else
				{
					$v = hi_ms_slide_pos( $data->content->slide_direction );
					foreach( $v as $i => $s )
					{
						$s[ 0 ] == '-' ? $v[ $i ] = substr( $s, 1, strlen( $s ) ) : $v[ $i ] = '-' . $s;
					}
					return 'translate3d( ' . $v[ 1 ] . ', ' . $v[ 0 ] . ', 0)';
				}
			}
		}
		else
		{
			if( $data->$part->slide )
			{
				$hover ? $C = array( 0, 0 ) : $C = hi_ms_slide_pos( $data->$part->slide_direction );

				return 'translate3d(' . $C[ 1 ] . ',' . $C[ 0 ] . ',0)';
			}
		}
		return '';
	}

	function hi_ms_rotate( $data, $part, $hover )
	{
		if( $data->$part->rotate )
		{
			$hover ? $p = 'stop' : $p = 'start';

			$Gx = $data->$part->rotate_grad_x->$p;
			$Gy = $data->$part->rotate_grad_y->$p;
			$Gz = $data->$part->rotate_grad_z->$p;

			return 'rotateX( ' . $Gx . 'deg ) rotateY( ' . $Gy . 'deg ) rotateZ( ' . $Gz . 'deg )';
		}

		return '';
	}

	function hi_ms_buttons_type( $data, $type, $hover )
	{
		$style = array();
		$hover ? $p = 'stop' : $p = 'start';

		if( $type == 'background' && $data->buttons->type == 'background' )
		{
			$style[ ] = 'background:' . $data->buttons->background . ';';
			$style[ ] = 'border-radius:' . $data->buttons->radius->$p . '%;';
			$style[ ] = 'border:solid 0px transparent;';
		}

		if( $type == 'border' && $data->buttons->type == 'border' )
		{
			$style[ ] = 'background:' . $data->buttons->background . ';';
			$style[ ] = 'border-radius:' . $data->buttons->radius->$p . '%;';
			$style[ ] = 'border:solid ' . ceil( $data->buttons->size * 0.06 ) . 'px ' . $data->buttons->color . ';';
		}

		return implode( '', $style );
	}

	function hi_ms_button_sizes( $data )
	{
		$style = array();
		$size = ceil( $data->buttons->size * 1.618 * 1.618 );
		$style[ ] = 'font-size:' . ( $data->buttons->size ) . 'px;';
		$style[ ] = 'width:' . ( $size ) . 'px;';
		$style[ ] = 'height:' . ( $size ) . 'px;';
		$style[ ] = 'line-height:' . ( $size ) . 'px;';
		return implode( '', $style );
	}

	function hi_ms_button_margin_top( $data )
	{
		$style = array();
		$size     = ceil( $data->buttons->size * 1.618 * 1.618 );
		$style[ ] = 'margin-top:-' . ( $size / 2 ) . 'px;';
		return implode( '', $style );
	}

	function hi_ms_partial( $data, $part )
	{
		if( $data->$part->partial == 'full' )
		{
			return 'top: 0; left: 0; right: 0; bottom: 0; height: 100%; width: 100%;';
		}
		$size = $data->$part->partial_size;
		$pos  = $data->$part->partial_position;
		switch( $pos )
		{
			case 'top':
				return 'top: 0; left: 0; right: 0; bottom: auto; height:' . $size . 'px; width: 100%;';
				break;
			case 'bottom':
				return 'top: auto; left: 0; right: 0; bottom: 0; height:' . $size . 'px; width: 100%;';
				break;
			case 'left':
				return 'top: 0; left: 0; right: auto; bottom: 0; width:' . $size . 'px; height: 100%;';
				break;
			case 'right':
				return 'top: 0; left: auto; right: 0; bottom: 0; width:' . $size . 'px; height: 100%;';
				break;
			default:
				return '';
				break;
		}
	}

	function hi_ms_slide_pos( $G )
	{
		$t = 0;
		$l = 0;

		if( $G >= 0 && $G <= 45 )
		{
			$l = ceil( $G * 2.222 );
			$t = - 100;
		}
		if( $G >= 46 && $G <= 135 )
		{
			$l = 100;
			$t = - ( 100 - ceil( ( $G - 45 ) * 2.222 ) );
		}
		if( $G >= 136 && $G <= 225 )
		{
			$l = 100 - ceil( ( $G - 135 ) * 2.222 );
			$t = 100;
		}
		if( $G >= 226 && $G <= 315 )
		{
			$l = - 100;
			$t = 100 - ceil( ( $G - 225 ) * 2.222 );
		}
		if( $G >= 316 && $G <= 360 )
		{
			$l = - 100 + ceil( ( $G - 315 ) * 2.222 );
			$t = - 100;
		}

		return array( $t . '%', $l . '%' );
	}

	function hi_check_for_new( $data )
	{
		if( ! isset( $data->image->push ) ) { $data->image->push = false; }
		if( ! isset( $data->content->always ) ) { $data->content->always = false; }

        if( ! isset( $data->image->radius ) ) { $data->image->radius = false; }
        if( ! isset( $data->image->radius_units ) ) { $data->image->radius_units = false; }

        if( ! isset( $data->buttons->link_single ) ) { $data->buttons->link_single = true; }

		return $data;
	}

	function hi_render_tpl( $slug, $tpl_data, $assigns )
	{
		global $hi_ss;
        global $post_types;

		$hi_ss = hi_is_array( $hi_ss );

		$name = $tpl_data[ 'name' ];
		$data = $tpl_data[ 'data' ];

		$data = hi_check_for_new( $data );

		$overlay = $buttons = $content = $output = '';

		/* Overlay */
		if( $data->overlay->enable )
		{
			$overlay = '<div class="hi-overlay"></div>';
		}

		/* Buttons */
		if( $data->buttons->enable )
		{
			$link = $view = '';
			if( $data->buttons->set->view )
			{
				$adClass = '';
				if( $data->buttons->pphoto )
				{
					$adClass = ' pphoto';
				}
                $view = '<a href="' . HIF_URL . 'assets/img/dummy.jpg" class="hi-ff-view hi-view-button' . $adClass . '" target="_blank"></a>';
			}
            if( $data->buttons->set->link )
            {
                if( is_single() )
                {
                    if( $data->buttons->link_single )
                    {
                        $link = '<a href="#" class="hi-ff-link"></a>';
                    }
                } else {
                    $link = '<a href="#" class="hi-ff-link"></a>';
                }
            }
			$buttons = '<div class="hi-tpl-buttons-wrap"><div class="hi-tpl-buttons">' . $view . $link . '</div></div>';
		}

		/* Content */
		if( $data->content->enable )
		{
			$title = $excerpt = $categories = $shares = '';

			if( $data->content->enable_parts->title )
			{
				$title = '<a href="#" class="hi-content-title">Enim esse assentior</a>';
			}

			if( $data->content->enable_parts->excerpt )
			{
				$excerpt = '<p class="hi-content-excerpt" data-hc="0" data-clamp="' . $data->content->typo->excerpt->length . '">Liber postulant dissentiunt vix te, diceret facilisi qui ad. At novum mollis intellegebat ius, ut duo nisl facilis necessitatibus, vel epicuri consetetur comprehensam et. Liber postulant dissentiunt vix te, diceret facilisi qui ad. At novum mollis intellegebat ius, ut duo nisl facilis necessitatibus, vel epicuri consetetur comprehensam et.</p>';
			}

			if( $data->content->enable_parts->categories )
			{
				$categories = '<div class="hi-content-categories"><a href="#">Voluptua</a>, <a href="#">dicat</a>, <a href="#">movet</a>, <a href="#">fabulas</a>, <a href="#">suscipit</a></div>';
			}

			if( $data->content->enable_parts->shares )
			{
				$shares_links = '';

				foreach( $data->content->shares_enable as $share => $enable )
				{
					if( $enable )
					{
						switch( $share )
						{
							case 'twitter':    $icon = 'hi-ff-twitter'; $color = '#00ACED'; break;
							case 'facebook':   $icon = 'hi-ff-facebook'; $color = '#3B5998'; break;
							case 'googleplus': $icon = 'hi-ff-googleplus'; $color = '#DD4B39'; break;
							case 'pinterest':  $icon = 'hi-ff-pinterest'; $color = '#CB2027'; break;
							case 'tumblr':     $icon = 'hi-ff-tumblr'; $color = '#2C4762'; break;
							case 'linkedin':   $icon = 'hi-ff-linkedin'; $color = '#3399CC'; break;
							case 'reddit':     $icon = 'hi-ff-reddit'; $color = '#ff5700'; break;
							case 'digg':       $icon = 'hi-ff-digg'; $color = '#0093CC'; break;
							default:           $icon = ''; $color = ''; break;
						}
						$shares_links .=  sprintf( '<a target="_blank" data-color="%2$s" class="%1$s" href="#"></a>', $icon, $color );
					}
				}
				$shares = sprintf( '<div class="hi-content-share">%s</div>', $shares_links );

				$data->content->typo->shares->height = $data->content->typo->shares->size;
			}
			$content = sprintf( '<div class="hi-tpl-content-wrap"><div class="hi-tpl-content">%1$s%2$s%3$s%4$s</div></div>', $title, $excerpt, $categories, $shares );
		}

		$ss_key = '#hi-' . $slug;

		array_key_exists( $ss_key, $hi_ss )
			? $assets = $hi_ss[ $ss_key ]
			: $assets = hi_render_style( '#hi-' . $slug, $data );

		$output .= '<div class="hi-margin-bottom hi-tpl-item" data-slug="' . $slug . '">';
		$output .= '<div id="hi-' . $slug . '" class="hi-tpl-frame">';
		$output .= '<div class="hi-tpl-wrapper">';
		$output .= '<div class="hi-tpl-b">';

		$output .= '<div class="hi-tpl-header">';
		$output .= '<a href="#" class="hi-tpl-name" data-id="' . $slug . '" data-title="' . __( 'Rename template', 'hitd' ) . '">' . $name . '</a>';
		$output .= ' <i href="#" class="hi-tpl-id-name">( ID: ' . $slug . ' )</i>';
		$output .= '<div class="hi-tpl-ctrls">';
		$output .= '<i class="hi-fb-copy hi-tpl-copy" title="' . __( 'Clone template', 'hitd' ) . '" data-tpl="#data-' . $slug . '" data-name="' . $name . '"></i>';
		$output .= '<i class="hi-fb-pencil hi-tpl-edit" title="' . __( 'Edit template', 'hitd' ) . '" data-tpl="#data-' . $slug . '"></i>';
		$output .= '<i class="hi-fb-trash hi-tpl-remove" title="' . __( 'Delete template', 'hitd' ) . '" data-tpl="#' . $slug . '" data-confirm="' . __( 'Delete template?', 'hitd' ) . '"></i>';
		$output .= '</div>'; // .hi-tpl-ctrls
		$output .= '</div>'; // .hi-tpl-header

		$output .= '<div class="hi-tpl">';

		$output .= '<img src="' . HIF_URL . 'assets/img/dummy.jpg" alt="Inani elitr apeirian" class="hi-tpl-image" />';
		$output .= $overlay . $buttons . $content;
		$output .= '</div>'; // .hi-tpl

		$output .= '</div>'; // .hi-tpl-b

		$output .= '<div id="data-' . $slug . '" class="hide">' . json_encode( $data ) . '</div>';

		// assigned
		$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects', 'and' );

		// assign to...
		$output .= hi_get_assign_names( $slug, $assigns );

		$output .= '<style>' . implode( '', $assets[ 'style' ] ) . '</style>';

		$output .= '</div>'; // .hi-tpl-wrapper
		$output .= '</div>'; // #slug
		$output .= '</div>'; // col..

		return $output;
	}

	function hi_get_assign_names( $slug, $assigns )
	{
		$list = array();
        global $post_types;
        if( !$post_types )
        {
            $post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects', 'and' );
        }

		if( array_key_exists( $slug, $assigns ) )
		{
			foreach( $assigns[ $slug ] as $nick => $value )
			{
				switch( $nick )
				{
					case 'all-pages': $list[ 0 ][] = __( 'All pages', 'hitd' ); break;
					case 'all-posts': $list[ 0 ][] = __( 'All posts', 'hitd' ); break;
					case 'hclasses': $list[ 3 ][] =  '( ' . trim( implode( ', ', $value ), ',' ) . ' )'; break;
					default:
						$substr = substr( $nick, 0, 12 );
						if( $substr == 'post-format-' )
						{
							$list[ 1 ][] = ucfirst( substr( $nick, 12, strlen( $nick ) ) );
						}
						if( $substr == 'post-custom-' )
						{
							$key = str_replace( 'post-custom-', '', $nick );

							if( isset( $post_types[ $key ] ) )
							{
								$list[ 2 ][] = $post_types[ str_replace( 'post-custom-', '', $nick ) ]->label;
							}
						}
						break;
				}
			}
		}

		$assign_str = array();
		array_key_exists( 0, $list ) && count( $list[ 0 ] ) > 0
			? $assign_str[] = implode( ', ', $list[ 0 ] ) : '';
		array_key_exists( 1, $list ) && count( $list[ 1 ] ) > 0
			? $assign_str[] = '<strong>' . __( 'Post format(s): ', 'hitd' ) . '</strong> ' . implode( ', ', $list[ 1 ] ) . '' : '';
		array_key_exists( 2, $list ) && count( $list[ 2 ] ) > 0
			? $assign_str[] = '<strong>' . __( 'Custom format(s): ', 'hitd' ) . '</strong> ' . implode( ', ', $list[ 2 ] ) . '' : '';
		array_key_exists( 3, $list ) && count( $list[ 3 ] ) > 0
			? $assign_str[] = '<strong>' . __( 'Custom class(es): ', 'hitd' ) . '</strong> ' . implode( ', ', $list[ 3 ] ) . '' : '';

		if( count( $assign_str ) == 0 ){
			$assign_str[] = __( 'None', 'hitd' );
		}

		return '<div class="hi-tpl-assigned-info"><a href="#" class="hi-assigned-link"><strong>' . __( 'Assigned to', 'hitd' ) . ':</strong></a> ' . implode( '. ', $assign_str ) . '</div>';
	}


    function hi_br( $data, $hover ){

        if( $data->image->radius != false )
        {
            if( $hover )
            {
                return 'border-radius:'.$data->image->radius->stop . $data->image->radius_units.';';
            }
            return 'border-radius:'.$data->image->radius->start . $data->image->radius_units.';';
        }
        return 'border-radius:0;';
    }


	function hi_render_style( $prefix, $data )
	{
		global $hi_ss;
		$data = hi_check_for_new( $data );

		$hi_ss = hi_is_array( $hi_ss );

		$style  = array();
		$script = array();

        $border_radius_normal = hi_br( $data, false );
        $border_radius_hover = hi_br( $data, true );

            /* WRapper */
		$style[ ] = $prefix . ' .hi-tpl-wrap{';
		$style[ ] = '}';

		$style[ ] = $prefix . ' .hi-tpl{';
		$style[ ] = 'overflow: ' . $data->wrapper->overflow . ';';
		$style[ ] = 'background:' . $data->wrapper->background . ';';
		$style[ ] = '}';

		/* Image */
		// transition
		$transition = hi_ms_transition( $data, 'image' );

		/* Transform */
		$transform_normal = hi_ms_transform( $data, 'image', false );
		$transform_hover  = hi_ms_transform( $data, 'image', true );

		/* default */
		$style[ ] = $prefix . ' .hi-tpl img{';
		$style[ ] = $transition;
		$style[ ] = $transform_normal;
		$style[ ] = hi_transform_origin( $data->image->origin );
        $style[ ] = $border_radius_normal;
		$style[ ] = '}';

		/* hover */
		$style[ ] = $prefix . ' .hi-tpl:hover img {';
		$style[ ] = $transform_hover;
        $style[ ] = $border_radius_hover;
		$style[ ] = '}';


        /* Overlay */
		if( $data->overlay->enable )
		{
			// transition
			$transition = hi_ms_transition( $data, 'overlay' );

			// Transform
			$transform_normal = hi_ms_transform( $data, 'overlay', false );
			$transform_hover  = hi_ms_transform( $data, 'overlay', true );

			// default
			$style[ ] = $prefix . ' .hi-overlay {';
			$style[ ] = 'background:' . $data->overlay->background . ';';
			$style[ ] = 'opacity: ' . hi_def_opacity( $data->overlay ) . ';';
			$style[ ] = $transition;
			$style[ ] = $transform_normal;
			$style[ ] = hi_transform_origin( $data->overlay->origin );
            $style[ ] = $border_radius_normal;
			$style[ ] = '}';

			// hover
			$style[ ] = $prefix . ' .hi-tpl:hover .hi-overlay {';
			$style[ ] = 'opacity:' . $data->overlay->opacity . ';';
			$style[ ] = $transform_hover;
            $style[ ] = $border_radius_hover;
			$style[ ] = '}';
		}

		/* Buttons */
		if( $data->buttons->enable )
		{
			// transition
			$transition = hi_ms_transition( $data, 'buttons' );

			// Transform
			$transform_normal = hi_ms_transform( $data, 'buttons', false );
			$transform_hover  = hi_ms_transform( $data, 'buttons', true );

			// background type
			$type_background_normal = hi_ms_buttons_type( $data, 'background', false );
			$type_background_hover  = hi_ms_buttons_type( $data, 'background', true );

			$type_border_normal = hi_ms_buttons_type( $data, 'border', false );
			$type_border_hover  = hi_ms_buttons_type( $data, 'border', true );

			// sizes
			$button_sizes = hi_ms_button_sizes( $data );

			// margin top
			$button_margin_top = hi_ms_button_margin_top( $data );

			// buttons wrap
			$style[ ] = $prefix . ' .hi-tpl-buttons-wrap {';
			$style[ ] = 'opacity: ' . hi_def_opacity( $data->buttons ) . ';';
			$style[ ] = hi_transform_origin( $data->buttons->origin );
			$style[ ] = $transition;
			$style[ ] = $transform_normal;
			$style[ ] = '}';

			$style[ ] = $prefix . ' .hi-tpl:hover .hi-tpl-buttons-wrap {';
			$style[ ] = 'opacity: 1;';
			$style[ ] = $transform_hover;
			$style[ ] = '}';

			// default
			$style[ ] = $prefix . ' .hi-tpl-buttons {';
			$style[ ] = $button_margin_top;
			$style[ ] = '}';

			// a
			$style[ ] = $prefix . ' .hi-tpl-buttons a{';
			$style[ ] = 'color:' . $data->buttons->color . ' !important;';
			$style[ ] = $button_sizes;
			$style[ ] = $type_background_normal;
			$style[ ] = $type_border_normal;
			$style[ ] = $transition;
			$style[ ] = '}';

			// a hover
			$style[ ] = $prefix . ' .hi-tpl-buttons a:hover{';
			$style[ ] = $type_background_hover;
			$style[ ] = $type_border_hover;
			$style[ ] = 'text-decoration: none;';
			$style[ ] = '}';
		}

		/* Content */
		if( $data->content->enable )
		{
			$title = $excerpt = $categories = $shares = '';

			// transition
			$transition = hi_ms_transition( $data, 'content' );

			// Transform
			$transform_normal = hi_ms_transform( $data, 'content', $data->content->always );
			$transform_hover  = hi_ms_transform( $data, 'content', true );

			$data->content->always
				? $content_opacity = 1
				: $content_opacity = hi_def_opacity( $data->content );

			// partial view
			$partial = hi_ms_partial( $data, 'content' );

			// wrap default
			$style[ ] = $prefix . ' .hi-tpl-content-wrap {';
			$style[ ] = 'opacity: ' . $content_opacity . ';';
			$style[ ] = 'padding:' . $data->content->margin . 'px;';
			$style[ ] = $transition;
			$style[ ] = $transform_normal;
			$style[ ] = hi_transform_origin( $data->content->origin );

			$style[ ] = $partial;

			$style[ ] = '}';

			// wrap hover
			$style[ ] = $prefix . ' .hi-tpl:hover .hi-tpl-content-wrap {';
			$style[ ] = 'opacity: 1;'; //' . $content_opacity . ';';
			$style[ ] = $partial;
			$style[ ] = $transform_hover;

			$style[ ] = '}';

			// default
			$style[ ] = $prefix . ' .hi-tpl-content {';
			$style[ ] = 'background:' . $data->content->background . ';';
			$style[ ] = 'text-align:' . $data->content->align . ';';
            $style[ ] = $border_radius_normal;
			$style[ ] = '}';

            $style[ ] = $prefix . ' .hi-tpl:hover .hi-tpl-content {';
            $style[ ] = $border_radius_hover;
            $style[ ] = '}';


			if( $data->content->enable_parts->title )
			{
				$style[ ] = $prefix . ' .hi-content-title:hover,';
				$style[ ] = $prefix . ' .hi-content-title:visited,';
				$style[ ] = $prefix . ' .hi-content-title {';
				$style[ ] = hi_ms_typo( $data->content->typo->title );
				$style[ ] = 'text-decoration: none;';
				$style[ ] = '}';
			}

			if( $data->content->enable_parts->excerpt )
			{
				$style[ ] = $prefix . ' .hi-content-excerpt {';
				$style[ ] = hi_ms_typo( $data->content->typo->excerpt );
				$style[ ] = '}';
			}

			if( $data->content->enable_parts->categories )
			{
				$style[ ] = $prefix . ' .hi-content-categories, ' . $prefix . ' .hi-content-categories a {';
				$style[ ] = hi_ms_typo( $data->content->typo->categories );
				$style[ ] = 'text-decoration: none;';
				$style[ ] = '}';
			}

			if( $data->content->enable_parts->shares )
			{
				$data->content->typo->shares->height = $data->content->typo->shares->size;

				$style[ ] = $prefix . ' .hi-content-share a {';
				$style[ ] = hi_ms_typo( $data->content->typo->shares );
				$style[ ] = 'text-decoration: none;';
				$style[ ] = 'border-radius: ' . $data->content->typo->shares->radius . '%;';
				$style[ ] = '}';

				$style[ ] = $prefix . ' .hi-content-share a:hover {';
				$style[ ] = 'color: #ffffff !important;';
				$style[ ] = '}';
			}
		}

		$hi_ss[ $prefix ] = array( 'style' => $style, 'script' => $script );

		return $hi_ss[ $prefix ];
	}

	function hi_transform_origin( $v )
	{
		$str = '';
		foreach( array('','-ms-','-moz-','-o-','-webkit-') as $p )
		{
			$str .= $p.'transform-origin:' . $v . ';';
		}
		return $str;
	}


	function hi_def_opacity( $data )
	{
		if( isset( $data->fade ) )
		{
			return intval( !$data->fade );
		}
		return 0;
	}


	function hi_assigned_name( $nick )
	{
		$nick = ucfirst( str_replace( '-', ' ', $nick ) );
		return $nick;
	}