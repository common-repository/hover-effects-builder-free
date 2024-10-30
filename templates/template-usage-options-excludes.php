<div class="panel panel-default">
    <div class="panel-heading" role="tab" data-toggle="collapse" href="#hi-excludes" aria-controls="hi-excludes" style="cursor: pointer">
        <h4 class="panel-title">
            <a href="#">
                <?php _e( 'Exclude Classes', 'hitd' ); ?>
            </a>
        </h4>
    </div>
    <div id="hi-excludes" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <div class="col-sm-8 col-xs-12">

                <div class="row hi-tpl-assign-cblock">
                    <div class="col-xs-12 col-sm-4"><label><?php _e( 'Exclude Classes', 'hitd' ); ?></label>
                    <p class="hi-hray-help"><?php _e( 'Separate classes with commas.', 'hitd' ); ?></p>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <textarea class="form-control hi-tpl-excludes" rows="3" id="hi-excludes"><?php
                            $value = hi_get_array($assigns,'ex',array());
                            $value = hi_get_array($value,'hi-excludes',array());
                            echo implode( ', ', $value );
                            ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
