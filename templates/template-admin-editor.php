<div id="hi-def-tpl" class="hide">{"tplId":"","assigned":{},"edit_mode":false,"transition_speed":"400","wrapper":{"overflow":"hidden","background":"rgba(255, 255, 255, 0)"},"image":{"slide":0,"scale":false,"scale_percents":{"start":"100","stop":"110"},"rotate":false,"rotate_grad_x":{"start":"0","stop":"0"},"rotate_grad_y":{"start":"0","stop":"0"},"rotate_grad_z":{"start":"0","stop":"0"},"perspective":"400","origin":"center center"},"overlay":{"enable":false,"background":"rgba(0, 0, 0, 0.6)","opacity":"1","fade":true,"slide":false,"slide_direction":"0","scale":false,"scale_percents":{"start":"0","stop":"100"},"rotate":false,"rotate_grad_x":{"start":"0","stop":"0"},"rotate_grad_y":{"start":"0","stop":"0"},"rotate_grad_z":{"start":"0","stop":"0"},"perspective":"400","origin":"center center"},"buttons":{"enable":false,"pphoto":true,"set":{"link":true,"view":true},"radius":{"start":"50","stop":"0"},"size":28,"type":"background","background":"#ffffff","opacity":"1","fade":true,"slide":false,"slide_direction":"0","scale":false,"scale_percents":{"start":"0","stop":"100"},"rotate":false,"rotate_grad_x":{"start":"0","stop":"0"},"rotate_grad_y":{"start":"0","stop":"0"},"rotate_grad_z":{"start":"0","stop":"0"},"perspective":"400","origin":"center center","color":"#000000"},"content":{"enable":false,"enable_parts":{"title":true,"excerpt":true,"categories":true,"shares":true},"shares_enable":{"twitter":true,"facebook":true,"googleplus":true,"pinterest":true,"tumblr":false,"linkedin":false,"reddit":false,"digg":false},"shares_radius":0,"typo":{"title":{"size":18,"height":22,"color":"#ffffff","bold":"bold","italic":false,"underline":false,"uppercase":false},"excerpt":{"length":4,"size":12,"height":16,"color":"#ffffff","bold":false,"italic":false,"underline":false,"uppercase":false},"categories":{"size":12,"height":16,"color":"#ffffff","bold":false,"italic":false,"underline":0,"uppercase":false},"shares":{"size":14,"color":"#ffffff","radius":0}},"background":"rgba(0, 0, 0, 0.8)","opacity":"1","excerpt_length":4,"align":"center","partial":"full","partial_size":"70","margin":0,"fade":true,"slide":false,"slide_direction":"0","scale":true,"scale_percents":{"start":"0","stop":"100"},"rotate":false,"rotate_grad_x":{"start":"0","stop":"0"},"rotate_grad_y":{"start":"0","stop":"0"},"rotate_grad_z":{"start":"0","stop":"0"},"perspective":"400","origin":"center center","partial_position":"bottom"},"tplid":"","tplname":"<?php _e( 'Untitled', 'hitd' ); ?>"}</div>
<input id="hi-tpl-id" name="hi-tpl-id" type="hidden" value="">
<input id="hi-tpl-name" name="hi-tpl-name" type="hidden" value="<?php _e( 'Untitled', 'hitd' ); ?>">

<div class="blockWrap">
    <p class="bg-info" style="padding: 10px 15px;">
        <?php _e( 'Please note, that Editor Tab works in demo mode in the free version. <br>You can try absolutely all features available in the Editor Tab. You can edit any templates or create new ones, but no changes can be saved in the free version. <br>To create new effects or edit effects from the Templates Gallery <a target="_blank" href="http://codecanyon.net/item/hover-effects-builder-wordpress-plugin/10932318">buy full version on Codecanyon</a>.', 'hitd' ); ?>
    </p>
</div>

<div class="blockWrap">
	<div class="hi-header-xl">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div id="hi-tpl-name-div" class="hi-header-title" data-emptytext="<?php _e( 'Untitled', 'hitd' ); ?>"><?php _e( 'Untitled', 'hitd' ); ?></div>
				<span id="hi-tpl-id-title" data-text=" ( <?php _e( 'Not saved yet...', 'hitd' ); ?> )"> ( <?php _e( 'Not saved yet...', 'hitd' ); ?> )</span>
			</div>
			<div class="col-xs-12 col-sm-6 text-right">
				<button type="button" class="btn btn-link hi-add-new"><?php _e( 'Reset to default', 'hitd' ); ?></button>
				<button type="button" class="btn btn-primary" id="hi-save" data-toggle="modal" data-target="#demoModal"><?php _e( 'Save changes', 'hitd' ); ?><i class="hi-fb-refresh hi-spinner hi-btn-i-right hide"></i></button>
			</div>
		</div>
	</div>
</div>

<div id="hi-controls-block">
	<div id="hi-preview-block" style="width: 450px;" >
		<?php include( HIF_PATH . 'templates/template-admin-preview-wrapper.php' ); ?>
	</div>
	<div id="hi-options-block" style="width: auto;">
		<?php include( HIF_PATH . 'templates/template-admin-options-wrapper.php' ); ?>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php _e( 'Demo Note', 'hitd' ); ?></h4>
            </div>
            <div class="modal-body">
                <?php _e( 'Please note, that Editor Tab works in demo mode in the free version. <br><br>You can try absolutely all features available in the Editor Tab. You can edit any templates or create new ones, but no changes can be saved in the free version. <br><br>To create new effects or edit effects from the Templates Gallery <a target="_blank" href="http://codecanyon.net/item/hover-effects-builder-wordpress-plugin/10932318">buy full version on Codecanyon</a>.', 'hitd' ); ?>
            </div>
            <div class="modal-footer">
                <a target="_blank" href="http://codecanyon.net/item/hover-effects-builder-wordpress-plugin/10932318" type="button" class="btn btn-success">Buy Full Version</a>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e( 'Close', 'hitd' ); ?></button>
            </div>
        </div>
    </div>
</div>
