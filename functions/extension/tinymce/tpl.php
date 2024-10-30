<script type="text/html" id="tmpl-advanced-hi">
<div class="heb-section heb-visible">
    <h2><button type="button" class="button-link heb-toggle"><?php _e( 'Image Hover Effect Settings', 'hitd' ); ?></button></h2>
    <div class="heb-settings">
        <div class="heb-image">
            <label class="setting hi_style">
                <?php $tpls = get_option( HIF_TEMPLATES ); ?>
                <span><?php _e( 'Hover Effect Template ID', 'hitd' ); ?></span>
                <select data-setting="hi_style" class="hi_style-selector">
                    <option value=""><?php _e( 'none', 'hitd' ); ?></option><?php
                    if( count( $tpls ) )
                    {
                        foreach( $tpls as $tpl_id => $tpl_data )
                        { ?>
                            <option value="<?php echo $tpl_id; ?>" <# if ( '<?php echo $tpl_id; ?>' == data.hi_style ) { #>selected="selected"<# } #> >
                                <?php echo $tpl_data[ 'name' ] . ' ( id: ' . $tpl_id . ' )'; ?>
                            </option><?php
                        }
                    } ?>
                </select>
            </label>

            <label class="setting hi_title">
                <span><?php _e( 'Title', 'hitd' ); ?></span>
                <input type="text" data-setting="hi_title" value="{{ data.hi_title }}">
                <p class="description"><?php _e( 'Set custom title for current post.', 'hitd' ); ?></p>
            </label>

            <label class="setting hi_link">
                <span><?php _e( 'Link', 'hitd' ); ?></span>
                <input type="text" data-setting="hi_link" value="{{ data.hi_link }}">
                <p class="description"><?php _e( 'Set custom URL for Title link or Link button.', 'hitd' ); ?></p>
            </label>

            <label class="setting hi_new_window">
                <span><?php _e( 'Open Link in', 'hitd' ); ?></span>
                <select data-setting="hi_new_window">
                    <option value="0" <# if ( '0' == data.hi_new_window ) { #>selected="selected"<# } #>><?php _e( 'Same Window', 'hitd' ); ?></option>
                    <option value="1" <# if ( '1' == data.hi_new_window ) { #>selected="selected"<# } #>><?php _e( 'New Window', 'hitd' ); ?></option>
                </select>
            </label>

            <label class="setting hi_view">
                <span><?php _e( 'View', 'hitd' ); ?></span>
                <input type="text" data-setting="hi_view" value="{{ data.hi_view }}">
                <p class="description"><?php _e( 'Custom URL on view button.', 'hitd' ); ?></p>
            </label>

            <label class="setting hi_text">
                <span><?php _e( 'Text', 'hitd' ); ?></span>
                <textarea data-setting="hi_text">{{ data.hi_text }}</textarea>
                <p class="description"><?php _e( 'Set custom text for Excerpt.', 'hitd' ); ?></p>
            </label>

            <label class="setting hi_share">
                <span><?php _e( 'Share', 'hitd' ); ?></span>
                <select data-setting="hi_share">
                    <option value="image" <# if ( 'image' == data.hi_share ) { #>selected="selected"<# } #>><?php _e( 'Image', 'hitd' ); ?></option>
                    <option value="post" <# if ( 'post' == data.hi_share ) { #>selected="selected"<# } #>><?php _e( 'Post', 'hitd' ); ?></option>
                </select>
                <p class="description"><?php _e( 'If you choose to share the image, you can add custom "Title", "Link" and "View" attributes to your shortcode.', 'hitd' ); ?></p>
            </label>

            <label class="setting hi_display">
                <span><?php _e( 'Display', 'hitd' ); ?></span>
                <select data-setting="hi_display">
                    <option value="block" <# if ( 'block' == data.hi_display ) { #>selected="selected"<# } #>><?php _e( 'Block', 'hitd' ); ?></option>
                    <option value="inline" <# if ( 'inline' == data.hi_display ) { #>selected="selected"<# } #>><?php _e( 'Inline', 'hitd' ); ?></option>
                </select>
            </label>


        </div>
    </div>
</div>
</script>

