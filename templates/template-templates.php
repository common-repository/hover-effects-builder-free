<div class="hi-header-xl">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="hi-header-title"><?php _e( 'Templates', 'hitd' ) ?></div>
		</div>
		<div class="col-xs-12 col-sm-6 text-right">
			<button type="button" class="btn btn-primary hi-template-new-btn hi-add-new"><i class="hi-fb-plus hi-btn-i-left"></i><?php _e( 'New template', 'hitd' ); ?></button>
		</div>
	</div>
</div>

<div class="blockWrap" id="hi-tpls">
<?php
	$hi_tpls = hi_get_option( HIF_TEMPLATES );
	$assigns = hi_get_assigns_array();

	if( is_array( $hi_tpls ) && count( $hi_tpls ) == 0 ){
		$hi_tpls = array();
		echo '<div class="hi-no-saved-tpls">' . __( 'No saved templates yet' ) . '</div>';
	}

	foreach( $hi_tpls as $slug => $tpl_data )
	{
		echo hi_render_tpl( $slug, $tpl_data, $assigns );
	}
?>
</div>







