	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingOne">
			<h4 class="panel-title">
				<a data-toggle="collapse" href="#hi-usage-api" aria-controls="hi-usage-api">
					<?php _e( 'Theme support: API', 'hitd' ); ?>
				</a>
			</h4>
		</div>
		<div id="hi-usage-api" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<div class="panel-body">
				<div class="col-sm-8 col-xs-12">
					<?php
						array_key_exists( 'api', $assigns )
							? $assigns_api = $assigns['api']
							: $assigns_api = array();

						$html = '';
						foreach ( $hi_api  as $api_data )
						{
							$html .= hi_make_control_assign_api( $api_data[ 'id' ], $api_data, $tpls, $assigns_api );
						}
						echo $html;
					?>
				</div>
			</div>
		</div>
	</div>
