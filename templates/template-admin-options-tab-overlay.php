<?php include( HIF_PATH . 'options/overlay/options-overlay-main.php' ); ?>

<!-- Tabs -->
<ul class="nav nav-tabs hi-nav-tabs" id="hi-options-overlay-tabs">
	<li><a href="#hi-overlay-style-tab"><?php _e( 'Styling', 'hitd' ); ?></a></li>
	<li><a href="#hi-overlay-fade-slide-tab"><?php _e( 'Fade and Slide', 'hitd' ); ?></a></li>
	<li><a href="#hi-overlay-transform-tab"><?php _e( 'Transform', 'hitd' ); ?></a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane hi-options-pane" id="hi-overlay-style-tab">
		<?php include( HIF_PATH . 'options/overlay/options-overlay-style.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-overlay-fade-slide-tab">
		<?php include( HIF_PATH . 'options/overlay/options-overlay-fade-slide.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-overlay-transform-tab">
		<?php include( HIF_PATH . 'options/overlay/options-overlay-transform.php' ); ?>
	</div>
</div>

<?php include( HIF_PATH . 'options/overlay/options-overlay-end.php' ); ?>
