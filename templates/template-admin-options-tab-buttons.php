<?php include( HIF_PATH . 'options/buttons/options-buttons-main.php' ); ?>

<!-- Tabs -->
<ul class="nav nav-tabs hi-nav-tabs" id="hi-options-buttons-tabs">
	<li><a href="#hi-buttons-style-tab"><?php _e( 'Styling', 'hitd' ); ?></a></li>
	<li><a href="#hi-buttons-fade-slide-tab"><?php _e( 'Fade and Slide', 'hitd' ); ?></a></li>
	<li><a href="#hi-buttons-transform-tab"><?php _e( 'Transform', 'hitd' ); ?></a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane hi-options-pane" id="hi-buttons-style-tab">
		<?php include( HIF_PATH . 'options/buttons/options-buttons-style.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-buttons-fade-slide-tab">
		<?php include( HIF_PATH . 'options/buttons/options-buttons-fade-slide.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-buttons-transform-tab">
		<?php include( HIF_PATH . 'options/buttons/options-buttons-transform.php' ); ?>
	</div>
</div>

<?php include( HIF_PATH . 'options/buttons/options-buttons-end.php' ); ?>