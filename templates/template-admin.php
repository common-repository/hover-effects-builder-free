<div id="HI" class="">

	<div class="container-fluid hi-panel-main">

		<div class="row hi-header-lg">
			<div class="col-xs-12 col-lg-6">
				<div class="hi-header-title">
					<?php _e( 'Hover Effects Builder', 'hitd' ); ?>
				</div>
			</div>
			<div class="col-xs-12 col-lg-6 text-right">
			</div>
		</div>

		<div class="row hi-contents">
			<div class="col-xs-12">

				<!-- Tabs -->
				<ul class="nav nav-tabs hi-nav-tabs" id="hi-tabs-main">
					<li><a href="#hi-templates-tab"><?php _e( 'Templates',     'hitd' ); ?></a></li>
					<li><a href="#hi-editor-tab"><?php    _e( 'Editor',        'hitd' ); ?></a></li>
					<li><a href="#hi-options-tab"><?php   _e( 'Usage Options', 'hitd' ); ?></a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane" id="hi-templates-tab">
						<?php include( HIF_PATH . 'templates/template-templates.php' ); ?>
					</div>

					<div class="tab-pane" id="hi-editor-tab">
						<?php include( HIF_PATH . 'templates/template-admin-editor.php' ); ?>
					</div>

					<div class="tab-pane" id="hi-options-tab">
						<?php include( HIF_PATH . 'templates/template-usage-options.php' ); ?>
					</div>

				</div><!-- // .tab-content -->

			</div><!-- // .col-xs-12 -->

		</div><!-- // .row hi-contents -->

	</div><!-- // .container hi-panel-main -->

</div><!-- // #HI -->
