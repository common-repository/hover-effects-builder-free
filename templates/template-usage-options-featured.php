	<div class="panel panel-default">
		<div class="panel-heading" role="tab" data-toggle="collapse" href="#hi-usage-fi" aria-controls="hi-usage-fi" style="cursor: pointer">
			<h4 class="panel-title">
				<a href="#">
					<?php _e( 'Featured Image', 'hitd' ); ?>
				</a>
			</h4>
		</div>
		<div id="hi-usage-fi" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<div class="col-sm-8 col-xs-12">
					<?php
						array_key_exists( 'fi', $assigns )
							? $assigns_fi = $assigns['fi']
							: $assigns_fi = array();

						$html = '';
						$html .= hi_make_control_assign( 'all-pages', false, $tpls, $assigns_fi );
						$html .= hi_make_control_assign( 'all-posts', false, $tpls, $assigns_fi );
						$html .= '<hr><h4>' . __( 'Post Formats', 'hitd' ) . '</h4>';
						$post_formats = get_theme_support( 'post-formats' );
						if( is_array( $post_formats ) )
						{
							$html .= hi_make_control_assign( 'post-format-standard', false, $tpls, $assigns_fi );
							foreach( $post_formats[ 0 ] as $format )
							{
								$html .= hi_make_control_assign( 'post-format-' . $format, false, $tpls, $assigns_fi );
							}
						}

						$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects', 'and' );
						if( count( $post_types ) > 0 )
						{
							$html .= '<hr><h4>' . __( 'Custom post types', 'hitd' ) . '</h4>';
							foreach ( $post_types  as $post_type )
							{
								$html .= hi_make_control_assign( 'post-custom-' . $post_type->name, $post_types, $tpls, $assigns_fi );
							}
						}
						echo $html;
					 ?>
				</div>
			</div>
		</div>
	</div>



