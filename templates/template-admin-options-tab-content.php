<?php include( HIF_PATH . 'options/content/options-content-main.php' ); ?>

<!-- Tabs -->
<ul class="nav nav-tabs hi-nav-tabs" id="hi-options-content-tabs">
	<li><a href="#hi-content-style-tab"><?php _e( 'Styling', 'hitd' ); ?></a></li>
	<li><a href="#hi-content-fade-slide-tab"><?php _e( 'Fade and Slide', 'hitd' ); ?></a></li>
	<li><a href="#hi-content-transform-tab"><?php _e( 'Transform', 'hitd' ); ?></a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane hi-options-pane" id="hi-content-style-tab">
		<?php include( HIF_PATH . 'options/content/options-content-style.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-content-fade-slide-tab">
		<?php include( HIF_PATH . 'options/content/options-content-fade-slide.php' ); ?>
	</div>
	<div class="tab-pane hi-options-pane" id="hi-content-transform-tab">
		<?php include( HIF_PATH . 'options/content/options-content-transform.php' ); ?>
	</div>
</div>

<?php include( HIF_PATH . 'options/content/options-content-end.php' ); ?>