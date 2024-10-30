<div class="blockWrap">

	<div class="hi-header-xl">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="hi-header-title"><?php _e( 'Assign to...', 'hitd' ) ?></div>
			</div>
			<div class="col-xs-12 col-sm-6 text-right">
				<button type="button" class="btn btn-primary hi-assign-save"><?php _e( 'Save changes', 'hitd' ); ?><i class="hi-fb-refresh hi-btn-i-right hi-spinner hide"></i></button>
			</div>
		</div>
	</div>

	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php
			global $hi_api;
			$hi_api = hi_is_array( $hi_api );

			$tpls = hi_get_option( HIF_TEMPLATES );
			$assigns = hi_get_option( HIF_ASSIGNS );

			include( HIF_PATH . 'templates/template-usage-options-featured.php' );
			include( HIF_PATH . 'templates/template-usage-options-shortcodes.php' );
            include( HIF_PATH . 'templates/template-usage-options-excludes.php' );

			if( count( $hi_api ) )
			{
				include( HIF_PATH . 'templates/template-usage-options-api.php' );
			}
		?>
	</div>

	<hr>
	<a href="#" class="btn btn-primary hi-assign-save"><?php _e( 'Save changes', 'hitd' ); ?><i class="hi-fb-refresh hi-btn-i-right hi-spinner hide"></i></a>
	<hr>
</div>


<?php

	function hi_make_control_assign( $value, $title = false, $tpls, $assigns )
	{
		array_key_exists( $value, $assigns )
			? $cv = $assigns[ $value ]
			: $cv = false;

		$tpls_options = array();
		$tpls_options[ ] = '<option value="">' . __( 'Not assigned', 'hitd' ) . '</option>';

		if( count( $tpls ) )
		{
			foreach( $tpls as $tpl_id => $tpl_data )
			{
				$tpl_id == $cv
					? $sel = ' selected="selected"'
					: $sel = '';
				$tpls_options[ ] = '<option value="' . $tpl_id . '"' . $sel . '>' . $tpl_data[ 'name' ] . ' ( id: ' . $tpl_id . ' )</option>';
			}
		}

		$html = '<div class="row hi-tpl-assign-cblock">';
		$html .= '<div class="col-xs-12 col-sm-4"><label>' . hi_make_control_assign_title( $value, $title ) . '</label></div>';
		$html .= '<div class="col-xs-12 col-sm-8"><select class="form-control hi-tpl-assign hi-tpl-assign-fi" data-key="' . $value . '">' . implode( '', $tpls_options ) . '</select></div>';
		$html .= '</div>';

		return $html;
	}


	function hi_make_control_assign_api( $value, $api, $tpls, $assigns )
	{
		array_key_exists( $value, $assigns )
			? $cv = $assigns[ $value ]
			: $cv = false;
		$tpls_options = array();
		$tpls_options[ ] = '<option value="">' . __( 'Not assigned', 'hitd' ) . '</option>';

		if( count( $tpls ) )
		{
			foreach( $tpls as $tpl_id => $tpl_data )
			{
				$tpl_id == $cv
					? $sel = ' selected="selected"'
					: $sel = '';
				$tpls_options[ ] = '<option value="' . $tpl_id . '"' . $sel . '>' . $tpl_data[ 'name' ] . ' ( id: ' . $tpl_id . ' )</option>';
			}
		}

		$html = '<div class="row hi-tpl-assign-cblock">';
		$html .= '<div class="col-xs-12 col-sm-4"><label>' . $api[ 'name' ] . '</label><p class="hi-option-help">' . $api[ 'desc' ] . '</p></div>';
		$html .= '<div class="col-xs-12 col-sm-8"><select class="form-control hi-tpl-assign hi-tpl-assign-api" data-key="' . $api[ 'id' ] . '">' . implode( '', $tpls_options ) . '</select></div>';

		$html .= '</div>';

		return $html;
	}

	function hi_make_control_assign_class( $classes, $tpls, $tpl, $ace = '' )
	{
		$html = '<div class="row hi-tpl-assign-cblock ' . $ace . '">';
		$html .= '<div class="col-xs-12 col-sm-4"><input class="form-control hi-classes-assign-input" type="text" placeholder=".className" value="' . $classes . '"/></div>';
		$html .= '<div class="col-xs-11 col-sm-7"><select class="form-control hi-tpl-assign hi-tpl-assign-classes">';
		$html .= '<option value="">' . __( 'Not assigned', 'hitd' ) . '</option>';
		if( count( $tpls ) )
		{
			foreach( $tpls as $tpl_id => $tpl_data )
			{
				$tpl_id == $tpl
					? $sel = ' selected="selected"'
					: $sel = '';
				$html .= '<option value="' . $tpl_id . '"' . $sel . '>' . $tpl_data[ 'name' ] . ' ( id: ' . $tpl_id . ' )</option>';
			}
		}
		$html .= '</select></div>';
		$html .= '<div class="col-xs-1 hi-form-line"><a href="#" class="hi-assign-another-class-del" ><i class="hi-fb-close"></i></a></div>';
		$html .= '</div>';

		return $html;
	}

	function hi_make_control_assign_sc( $scs, $tpls, $tpl, $ace = '' )
	{
		$html = '<div class="row hi-tpl-assign-cblock ' . $ace . '">';
		$html .= '<div class="col-xs-12 col-sm-4"><label>[ ' . $scs . ' ]</label></div>';
		$html .= '<div class="col-xs-12 col-sm-8"><select class="form-control hi-tpl-assign hi-tpl-assign-sc" data-key="' . $scs . '">';
		$html .= '<option value="">' . __( 'Not assigned', 'hitd' ) . '</option>';
		if( count( $tpls ) )
		{
			foreach( $tpls as $tpl_id => $tpl_data )
			{


				$tpl_id == $tpl
					? $sel = ' selected="selected"'
					: $sel = '';
				$html .= '<option value="' . $tpl_id . '"' . $sel . '>' . $tpl_data[ 'name' ] . ' ( id: ' . $tpl_id . ' )</option>';
			}
		}
		$html .= '</select></div>';
		$html .= '</div>';

		return $html;
	}

	function hi_make_control_assign_exclude( $classes, $ace = '' )
	{
		$html = '<div class="row hi-tpl-assign-cblock ' . $ace . '">';
		$html .= '<div class="col-xs-11"><input class="form-control hi-exclude-assign-input hi-tpl-assign-excludes" type="text" placeholder=".className" value="' . $classes . '"/></div>';
		$html .= '<div class="col-xs-1 hi-form-line"><a href="#" class="hi-assign-another-exclude-del" ><i class="hi-fb-close"></i></a></div>';
		$html .= '</div>';

		return $html;
	}

	function hi_make_control_assign_title( $value, $post_types = false )
	{
		switch( $value )
		{
			case 'all-pages':
				return __( 'All Pages', 'hitd' );
				break;
			case 'all-posts':
				return __( 'All Posts', 'hitd' );
				break;
			default:
				$substr = substr( $value, 0, 12 );
				if( $substr == 'post-format-' )
				{
					return __( 'Post Format: ', 'hitd' ) . ucfirst( substr( $value, 12, strlen( $value ) ) );
				}
				if( $substr == 'post-custom-' )
				{
					return $post_types[ str_replace( 'post-custom-', '', $value ) ]->label
                    . ' <i class="hi-hray-help">(' . $post_types[ str_replace( 'post-custom-', '', $value ) ]->name . ')</i>';
				}
				break;
		}
	}

?>