
<form id="hi-form" method="post" action="<?php echo esc_attr( $_SERVER[ 'REQUEST_URI' ] ); ?>" enctype="multipart/form-data">
	<input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce( 'hi-ajax-nonce' ); ?>"/>

	<div class="blockWrap">

		<!-- Tabs -->
		<ul class="nav nav-tabs hi-nav-tabs" id="hi-options-tabs">
            <li><a href="#hi-general-tab"><?php _e( 'General',       'hitd' ); ?></a></li>
            <li><a href="#hi-image-tab"><?php   _e( 'Image',         'hitd' ); ?></a></li>
			<li><a href="#hi-overlay-tab"><?php _e( 'Image Overlay', 'hitd' ); ?></a></li>
			<li><a href="#hi-buttons-tab"><?php _e( 'Buttons',       'hitd' ); ?></a></li>
			<li><a href="#hi-content-tab"><?php _e( 'Content',       'hitd' ); ?></a></li>
		</ul><!-- // ul#hi-options-tabs -->

		<!-- Tab panes -->
		<div class="tab-content">

            <!-- general-tab-pane -->
            <div class="tab-pane hi-options-pane" id="hi-general-tab">
                <?php include( HIF_PATH . 'templates/template-admin-options-tab-general.php' ); ?>
            </div><!-- // general-tab-pane -->

			<!-- image-tab-pane -->
			<div class="tab-pane hi-options-pane" id="hi-image-tab">
				<?php include( HIF_PATH . 'templates/template-admin-options-tab-image.php' ); ?>
			</div><!-- // image-tab-pane -->

			<!-- overlay-tab -->
			<div class="tab-pane hi-options-pane" id="hi-overlay-tab">
				<?php include( HIF_PATH . 'templates/template-admin-options-tab-overlay.php' ); ?>
			</div>
			<!-- end overlay-tab -->

			<!-- buttons-tab -->
			<div class="tab-pane hi-options-pane" id="hi-buttons-tab">
				<?php include( HIF_PATH . 'templates/template-admin-options-tab-buttons.php' ); ?>
			</div>
			<!-- end buttons-tab -->

			<!-- content-tab -->
			<div class="tab-pane hi-options-pane" id="hi-content-tab">
				<?php include( HIF_PATH . 'templates/template-admin-options-tab-content.php' ); ?>
			</div>
			<!-- end content-tab -->

		</div>

	</div><!-- div.blockWrap -->

</form>