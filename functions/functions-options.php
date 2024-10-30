<?php

	function hi_get_option( $key )
	{
		$o = get_option( $key );
		if( $o === false )
		{
			return array();
		}

		return $o;
	}

	function hi_make_option( $params )
	{
		$data = wp_parse_args( $params, array(
			'key'         => '',
			'type'        => '',
			'name'        => '',
			'default'     => '',
			'help'        => '',
			'showif'      => '',
			'orientation' => 'horizontal',
			'align'       => 'left',
			'values'      => array(),
			'opacity'     => false,
			'h'           => 'h5',
			'cols'        => '3+9',
			'hr'          => false,
			'half'        => '6'
		) );

		$data[ 'showif' ]
			? $t_p = 'hi-trigger'
			: $t_p = '';
		$control_function_name = 'hi_make_control_' . $data[ 'type' ];
		$colsN = explode( '+', $data[ 'cols' ] );

		/* Trigger block */
		if( $data[ 'type' ] == 'trigger' )
		{
			if( $data[ 'default' ] == 'start' )
			{
				echo '<div class="' . $t_p . '" data-showif="' . $data[ 'showif' ] . '">';
			}

			if( $data[ 'default' ] == 'stop' )
			{
				if( $data[ 'hr' ] )
				{
					echo '<hr>';
				}
				echo '</div>';
			}
		}
		/* Heading block */
		elseif( $data[ 'type' ] == 'heading' )
		{
			echo '<div class="hi-header-' . $data[ 'default' ] . '"><div class="hi-header-title">' . $data[ 'name' ] . '</div></div>';
		}
		else
		{
			$data[ 'orientation' ] == 'horizontal'
				? $cols = array( 'col-xs-' . $colsN[ 0 ], 'col-xs-' . $colsN[ 1 ] )
				: $cols = array( 'col-xs-12', 'col-xs-12' );
			?>
		<div class="<?php echo implode( ' ', array( $t_p, 'hi-' . $data[ 'orientation' ] ) ); ?>" data-showif="<?php echo $data[ 'showif' ]; ?>">
			<div class="hi-option-wrap <?php echo $data[ 'key' ]; ?>-wrap">
				<div class="row">
					<div class="<?php echo $cols[ 0 ]; ?>">
						<?php
							if( $data[ 'name' ] )
							{
								printf( '<%1$s class="hi-option-title">%2$s</%1$s>', $data[ 'h' ], $data[ 'name' ] );
							}
							if( $data[ 'orientation' ] == 'horizontal' )
							{
								//printf( '<p class="hi-option-help">%1$s</p>', $data[ 'help' ] );
							}
						?>
					</div>

					<div class="<?php echo $cols[ 1 ]; ?> text-<?php echo $data[ 'align' ]; ?>">
						<div class="hi-option-control hi-control-<?php echo $data[ 'type' ]; ?>"><?php
								if( function_exists( $control_function_name ) )
								{
									call_user_func( $control_function_name, $data );
								}
								else
								{
									_e( 'Can not find control rendering function: ', 'hitd' );
									echo $data[ 'type' ];
								} ?>
						</div>
					</div>
					<div class="col-xs-12">
						<?php printf( '<p class="hi-option-help">%1$s</p>', $data[ 'help' ] ); ?>
					</div>
				</div>
			</div>
			</div><?php
		}
	}

	function hi_make_control_radio( $data )
	{
		$html = '';

		foreach( $data[ 'values' ] as $value => $title )
		{
			$id = $data[ 'key' ] . '-' . $value;
			$attr = array(
				'id="' . $id . '"',
				'type="radio"',
				'name="' . $data[ 'key' ] . '"',
				'value="' . $value . '"',
				'class="' . $data[ 'key' ] . '"',
				'autocomplete="off"',
				checked( $value, $data[ 'default' ], false )
			);
			$html .= '<label class="btn btn-primary" for="' . $id . '"><input ' . implode( ' ', $attr ) . ' />' . $title . '</label>';
		}

		echo '<div class="btn-group" data-toggle="buttons">' . $html . '</div>';
	}

	function hi_make_control_checkbox( $data )
	{
		$html = '';

		foreach( $data[ 'values' ] as $value => $title )
		{
			array_key_exists( $value, $data[ 'default' ] )
				? $cValue = $data[ 'default' ][ $value ]
				: $cValue = '';

			$id = $data[ 'key' ] . '-' . $value;
			$attr = array(
				'id="' . $id . '"',
				'type="checkbox"',
				'name="' . $data[ 'key' ] . '[' . $value . ']"',
				'value="' . $value . '"',
				'class="' . $data[ 'key' ] . '"',
				'autocomplete="off"',
				checked( $value, $cValue, false )
			);
			$html .= '<label class="btn btn-primary" for="' . $id . '"><input ' . implode( ' ', $attr ) . ' />' . $title . '</label>';
		}

		echo '<div class="btn-group" data-toggle="buttons">' . $html . '</div>';
	}

	function hi_make_control_origin( $data )
	{
		$values = array(
			'left top',
			'center top',
			'right top',
			'left center',
			'center center',
			'right center',
			'left bottom',
			'center bottom',
			'right bottom'
		);

		foreach( $values as $title )
		{
			$title == $data[ 'default' ]
				? $c = 'primary active'
				: $c = 'default';
			echo '<span class="btn btn-' . $c . '" value="' . $title . '"><div class="hi-c-' . str_replace( ' ', '-', $title ) . '"><i></i></div></span>';
		}

		echo '<input type="hidden" value="' . $data[ 'default' ] . '" name="' . $data[ 'key' ] . '" class="' . $data[ 'key' ] . '">';
	}

	function hi_make_control_select( $data )
	{
		$html = '';
		if( array_key_exists( 'min', $data[ 'values' ] ) )
		{
			$data[ 'values' ] = hi_make_select_array( $data[ 'values' ] );
		};

		$html .= '<select name="' . $data[ 'key' ] . '" class="' . $data[ 'key' ] . ' form-control">';
		foreach( $data[ 'values' ] as $key => $value )
		{
			if( is_array( $value ) )
			{
				$html .= '<optgroup label="' . $key . '">';
				foreach( $value as $key2 => $value2 )
				{
					$html .= '<option value="' . $key2 . '" ' . selected( $key2, $data[ 'default' ], false ) . '>' . $value2 . '</option>';
				}
				$html .= '</optgroup>';
			}
			else
			{
				$html .= '<option value="' . $key . '" ' . selected( $key, $data[ 'default' ], false ) . '>' . $value . '</option>';
			}
		}
		$html .= '</select>';
		echo $html;
	}

	function hi_make_select_array( $data )
	{
		$range = array();
		foreach( range( $data[ 'min' ], $data[ 'max' ], $data[ 'step' ] ) as $k => $v )
		{
			$range[ $v ] = $v . $data[ 'postfix' ];
		}

		return $range;
	}

	function hi_make_control_color( $data )
	{
		$datas = array();
		if( $data[ 'opacity' ] !== false )
		{
			$datas[ ] = 'data-opacity="' . $data[ 'opacity' ] . '"';
		}

		printf( '<input type="text"  maxlength="7" name="%2$s" value="%1$s" class="hi-cp %2$s form-control" id="%2$s" data-oi="#%2$s-opacity" %3$s />', $data[ 'default' ], $data[ 'key' ], implode( ' ', $datas ) );
		printf( '<input type="hidden" name="%2$s-o" value="%1$s" id="%2$s-opacity" />', $data[ 'opacity' ], $data[ 'key' ] );
	}

	function hi_make_control_rotate( $data )
	{
		$html = '';

		$html .= '<div class="blockWrap">';

		foreach( $data[ 'values' ] as $axis => $axis_data )
		{
			$html .= '<div class="row hi-special-row-1">';

			$html .= '<div class="col-md-12 col-lg-2 hi-subtitle">';
			$axis == 'p'
				? $html .= $data[ 'names' ][ 'perspective' ]
				: $html .= $data[ 'names' ][ 'axis' ] . strtoupper( $axis );
			$html .= '</div>'; // col-xs-12 col-md-2 hi-subtitle

			$html .= '<div class="col-md-12 col-lg-10">';
			$html .= '<div class="hi-tsw">';

			foreach( $axis_data[ 'default' ] as $position => $position_value )
			{
				$attr = array(
					'id="' . $data[ 'key' ] . '-' . $axis . '-' . $position . '"',
					'class="' . $data[ 'key' ] . '-' . $axis . ' form-control hi-touchspin"',
					'size="3"',
					'type="text"',
					'name="' . $data[ 'key' ] . '-' . $axis . '[' . $position . ']"',
					'value="' . $data[ 'default' ][ $axis ][ $position ] . '"',
					'data-position="' . $position . '"',
				);

				if( $axis != 'p' )
				{
					$attr[ ] = 'data-min="-360"';
					$attr[ ] = 'data-max="360"';
				}

				foreach( array( 'min', 'max', 'step', 'postfix' ) as $key )
				{
					if( array_key_exists( $key, $axis_data ) && !is_array( $key ) )
					{
						$attr[ ] = 'data-' . $key . '="' . $axis_data[ $key ] . '"';
					}
				}

				if( $axis != 'p' )
				{
					$attr[ ] = 'data-prefix="' . $data[ 'names' ][ $position ] . '"';
				}

				$html .= '<div class="hi-tse hi-margin-bottom"><input ' . implode( ' ', $attr ) . ' /></div>';
			}
			$html .= '</div>'; // row
			$html .= '</div>'; // col-xs-12 col-md-10

			$html .= '<div class="hi-divider-light"></div></div>'; // row hi-special-row-1
		}
		$html .= '</div>'; // blockWrap

		echo $html;
	}

	function hi_make_control_scale( $data )
	{
		$html = '';

		$html .= '<div class="blockWrap">';
		$html .= '<div class="row">';

		$html .= '<div class="col-xs-12 col-md-2 hi-subtitle">' . $data[ 'names' ][ 'scale' ] . '</div>';

		$html .= '<div class="col-xs-12 col-md-10">';
		$html .= '<div class="hi-tsw">';

		foreach( $data[ 'values' ] as $position => $position_data )
		{
			$attr = array(
				'id="' . $data[ 'key' ] . '-' . $position . '"',
				'class="' . $data[ 'key' ] . ' form-control hi-touchspin"',
				'size="3"',
				'type="text"',
				'name="' . $data[ 'key' ] . '[' . $position . ']"',
				'value="' . $data[ 'default' ][ $position ] . '"',
				'data-position="' . $position . '"'
			);

			foreach( array( 'min', 'max', 'step', 'postfix' ) as $key )
			{
				if( array_key_exists( $key, $position_data ) && !is_array( $key ) )
				{
					$attr[ ] = 'data-' . $key . '="' . $position_data[ $key ] . '"';
				}
			}
			$attr[ ] = 'data-prefix="' . $data[ 'names' ][ $position ] . '"';

			$html .= '<div class="hi-tse hi-margin-bottom"><input ' . implode( ' ', $attr ) . ' /></div>';
		}
		$html .= '</div>'; // row
		$html .= '</div>'; // col-xs-12 col-md-10

		$html .= '</div>'; // row
		$html .= '</div>'; // blockWrap

		echo $html;
	}

	function hi_make_control_direction( $data )
	{
		$html = '';
		$attr = array(
			'id="' . $data[ 'key' ] . '"',
			'class="' . $data[ 'key' ] . ' form-control hi-touchspin"',
			'size="3"',
			'type="text"',
			'name="' . $data[ 'key' ] . '"',
			'value="' . $data[ 'default' ] . '"'
		);
		foreach( $data[ 'values' ] as $pKey => $pVal )
		{
			$attr[ ] = 'data-' . $pKey . '="' . $pVal . '"';
		}
		$attr[ ] = 'data-postfix="<i class=\'hi-fb-arrow-down hi-dir-icon\'></i>"';

		$html .= '<div class="row"><div class="col-lg-6 col-xs-12 hi-margin-bottom"><input ' . implode( ' ', $attr ) . ' /></div></div>';

		echo $html;
	}

	function hi_make_control_startstop( $data )
	{
		$html = '';

		$html .= '<div class="hi-tsw">';

		foreach( $data[ 'values' ] as $position => $position_data )
		{
			$attr = array(
				'id="' . $data[ 'key' ] . '-' . $position . '"',
				'class="' . $data[ 'key' ] . ' form-control hi-touchspin"',
				'size="3"',
				'type="text"',
				'name="' . $data[ 'key' ] . '[' . $position . ']"',
				'value="' . $data[ 'default' ][ $position ] . '"',
				'data-position="' . $position . '"'
			);

			foreach( array( 'min', 'max', 'step', 'postfix' ) as $key )
			{
				if( array_key_exists( $key, $position_data ) && !is_array( $key ) )
				{
					$attr[ ] = 'data-' . $key . '="' . $position_data[ $key ] . '"';
				}
			}
			$attr[ ] = 'data-prefix="' . $data[ 'names' ][ $position ] . '"';
			$html .= '<div class="hi-tse hi-margin-bottom"><input ' . implode( ' ', $attr ) . ' /></div>';
		}
		$html .= '</div>'; // row

		echo $html;
	}

	function hi_make_control_typo( $data )
	{
		echo '<div class="form-inline">';

		if( array_key_exists( 'font-size', $data[ 'values' ] ) )
		{
			echo '<div class="form-group hi-typo-block">';
			hi_make_control_select( $data[ 'values' ][ 'font-size' ] );
			echo '</div>';
		}
		if( array_key_exists( 'color', $data[ 'values' ] ) )
		{
			echo '<div class="form-group hi-typo-block">';
			hi_make_control_color( $data[ 'values' ][ 'color' ] );
			echo '</div>';
		}
		if( array_key_exists( 'font-style', $data[ 'values' ] ) )
		{
			echo '<div class="form-group hi-typo-block">';
			hi_make_control_checkbox( $data[ 'values' ][ 'font-style' ] );
			echo '</div>';
		}

		echo '</div>';
	}

	function hi_easing_array()
	{
		return array(
			'Defaults'                        => array(
				'linear'      => 'Linear',
				'ease'        => 'Ease',
				'ease-in'     => 'Ease In',
				'ease-out'    => 'Ease Out',
				'ease-in-out' => 'Ease In Out'
			),
			'Penner Equations (approximated)' => array(
				'easeInQuad'     => 'EaseInQuad',
				'easeInCubic'    => 'EaseInCubic',
				'easeInQuart'    => 'EaseInQuart',
				'easeInQuint'    => 'EaseInQuint',
				'easeInSine'     => 'EaseInSine',
				'easeInExpo'     => 'EaseInExpo',
				'easeInCirc'     => 'EaseInCirc',
				'easeInBack'     => 'EaseInBack',
				'easeOutQuad'    => 'EaseOutQuad',
				'easeOutCubic'   => 'EaseOutCubic',
				'easeOutQuart'   => 'EeaseOutQuart',
				'easeOutQuint'   => 'EaseOutQuint',
				'easeOutSine'    => 'EaseOutSine',
				'easeOutExpo'    => 'EaseOutExpo',
				'easeOutCirc'    => 'EaseOutCirc',
				'easeOutBack'    => 'EaseOutBack',
				'easeInOutQuad'  => 'EaseInOutQuad',
				'easeInOutCubic' => 'EaseInOutCubic',
				'easeInOutQuart' => 'EaseInOutQuart',
				'easeInOutQuint' => 'EaseInOutQuint',
				'easeInOutSine'  => 'EaseInOutSine',
				'easeInOutExpo'  => 'EaseInOutExpo',
				'easeInOutCirc'  => 'EaseInOutCirc',
				'easeInOutBack'  => 'EaseInOutBack'
			)
		);
	}

	function hi_ajax_post_action()
	{
		if( !wp_verify_nonce( $_POST[ 'security' ], 'hi-ajax-nonce' ) )
		{
			die( 'error' );
		}

		if( array_key_exists( 'type', $_POST ) == false )
		{
			die( 'error' );
		}

		if ( ! current_user_can('manage_options') ) {
			die( 'no_rights' );
		}

		if( $_POST[ 'type' ] == 'save' )
		{
			array_key_exists( 'name', $_POST )
				? $name = trim( $_POST[ 'name' ] )
				: $name = 'Untitled';
			array_key_exists( 'id', $_POST )
				? $id = $_POST[ 'id' ]
				: $id = '';
			array_key_exists( 'data', $_POST )
				? $data = json_decode( stripslashes( $_POST[ 'data' ] ) )
				: $data = array();

			$data->tplname = $name;

			$data = array(
				'name' => $name,
				'data' => $data
			);

			// new tpl
			if( $id == '' )
			{
				$slug = sanitize_title( $name );
				$hi_tpls = hi_get_option( HIF_TEMPLATES );

				if( $hi_tpls )
				{
					$slug_org = $slug;
					$counter = 0;
					while( array_key_exists( $slug, $hi_tpls ) )
					{
						$counter++;
						$slug = $slug_org . '_' . $counter;
					}
					$hi_tpls[ $slug ] = $data;
				}
				else
				{
					$hi_tpls = array(
						$slug => $data
					);
				}

				$hi_tpls[ $slug ][ 'data' ]->tplid = $slug;

				update_option( HIF_TEMPLATES, $hi_tpls );
			}
			else
			{
				$slug = $id;
				$hi_tpls = hi_get_option( HIF_TEMPLATES );

				if( $hi_tpls )
				{
					$hi_tpls[ $slug ] = $data;
				}
				else
				{
					$hi_tpls = array(
						$slug => $data
					);
				}

				update_option( HIF_TEMPLATES, $hi_tpls );
			}

			$assigns = hi_get_assigns_array();

			$tpl = hi_render_tpl( $slug, $data, $assigns );

			die( json_encode( array( 'id' => $slug, 'tpl' => $tpl ) ) );
		}

		if( $_POST[ 'type' ] == 'save-order' )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );

			array_key_exists( 'data', $_POST )
				? $data = json_decode( stripslashes( $_POST[ 'data' ] ), true )
				: $data = array();

			$hi_tpls_new = array();

			foreach( $data as $key => $val )
			{
				$slug = $val[ 'slug' ];
				if( array_key_exists( $slug, $hi_tpls ) )
				{
					$hi_tpls_new[ $slug ] = $hi_tpls[ $slug ];
				}
			}
			update_option( HIF_TEMPLATES, $hi_tpls_new );
			die( 'save-order' );
		}

		if( $_POST[ 'type' ] == 'remove-tpl' )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );
			if( array_key_exists( $_POST[ 'name' ], $hi_tpls ) )
			{
				unset( $hi_tpls[ $_POST[ 'name' ] ] );
				update_option( HIF_TEMPLATES, $hi_tpls );
			}
			die( '1' );
		}

		if( $_POST[ 'type' ] == 'rename' )
		{
			$hi_tpls = hi_get_option( HIF_TEMPLATES );
			if( array_key_exists( $_POST[ 'id' ], $hi_tpls ) )
			{
				$hi_tpls[ $_POST[ 'id' ] ][ 'name' ] = $_POST[ 'name' ];
				$hi_tpls[ $_POST[ 'id' ] ][ 'data' ]->tplname = $_POST[ 'name' ];
				update_option( HIF_TEMPLATES, $hi_tpls );
			}
			die( '1' );
		}

		if( $_POST[ 'type' ] == 'save-assigns' )
		{
			array_key_exists( 'data', $_POST )
				? $data = json_decode( stripslashes( $_POST[ 'data' ] ), true )
				: $data = array();
			update_option( HIF_ASSIGNS, $data );
			die( '1' );
		}

		if( $_POST[ 'type' ] == 'get-assigns' )
		{
			$assigns_array = hi_get_assigns_array();
			$hi_tpls       = hi_get_option( HIF_TEMPLATES );

			if( is_array( $hi_tpls ) )
			{
				foreach( array_keys( $hi_tpls ) as $slug )
				{
					$assigns_array[ $slug ][ 'html' ] = hi_get_assign_names( $slug, $assigns_array );
				}

				die( json_encode( $assigns_array ) );
			}
			else
			{
				die( 'error' );
			}
		}
	}

	function hi_get_assigns_array()
	{
		$hi_assigns = hi_get_option( HIF_ASSIGNS );
		$hi_assigns_fi = hi_get_array( $hi_assigns, 'fi' );
		$assigns = array();
		foreach( $hi_assigns_fi as $pt => $tid )
		{
			$assigns[ $tid ][ $pt ] = $pt;
		}

		return $assigns;
	}
