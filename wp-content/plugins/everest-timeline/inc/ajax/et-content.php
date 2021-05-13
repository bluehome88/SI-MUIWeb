<div class="et-each-post-wrap" data-post-key="<?php echo esc_attr( $post_key ); ?>">
    <div class="et-blog-wrap">
        <label><?php _e( 'Post Title', ET_TD ) ?></label>
        <div class="et-blog-field">
            <input type="text" class="et-post-title" name="et_option[post][<?php echo $post_key; ?>][title]" value="<?php echo esc_attr( $title ); ?>">
            <input type="hidden" class="et-post-link" name="et_option[post][<?php echo $post_key; ?>][post_link]" value="<?php echo esc_url( $link ); ?>">
        </div>
    </div>
    <div class="et-blog-wrap">
        <label><?php _e( 'Post Description', ET_TD ) ?></label>
        <div class="et-blog-field">
            <textarea class="et-post-description" name="et_option[post][<?php echo $post_key; ?>][description]" rows="8" cols="35"><?php echo esc_attr( wp_trim_words( $content, $desc_length ) ); ?></textarea>
        </div>
    </div>
    <div class="et-blog-wrap">
        <label><?php _e( 'Post Date', ET_TD ) ?></label>
        <div class="et-blog-field">
            <input type="text" class="et-post-date" name="et_option[post][<?php echo $post_key; ?>][post_date]" value="<?php echo esc_attr( $date ); ?>">
            <input type="hidden" class="et-post-tag" name="et_option[post][<?php echo $post_key; ?>][post_tags]" value="<?php echo esc_attr( $tag ); ?>">
            <input type="hidden" class="et-post-category" name="et_option[post][<?php echo $post_key; ?>][post_category]" value="<?php echo esc_attr( $category ); ?>">
            <input type="hidden" class="et-post-author" name="et_option[post][<?php echo $post_key; ?>][post_author]" value="<?php echo esc_attr( $author ); ?>">
            <input type="hidden" class="et-post-comment" name="et_option[post][<?php echo $post_key; ?>][post_comment_count]" value="<?php echo esc_attr( $comment ); ?>">
            <input type="hidden" class="et-post-link" name="et_option[post][<?php echo $post_key; ?>][post_link]" value="<?php echo esc_attr( $link ); ?>">
        </div>
    </div>
    <div class="et-media-wrap">
        <div class ="et-blog-wrap">
            <label><?php _e( 'Media Type', ET_TD ); ?></label>
            <div class="et-blog-field">
                <select name="et_option[post][<?php echo $post_key; ?>][media_type]" class="et-media-type">
                    <option value="image"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'media_type' ] == 'image' ) echo 'selected=="selected"'; ?>><?php _e( 'Image', ET_TD ) ?></option>
                    <option value="slider"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'media_type' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', ET_TD ) ?></option>
                    <option value="video"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'media_type' ] == 'video' ) echo 'selected=="selected"'; ?>><?php _e( 'Video', ET_TD ) ?></option>
                    <option value="sound_cloud"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'media_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'media_type' ] == 'sound_cloud' ) echo 'selected=="selected"'; ?>><?php _e( 'Sound Cloud', ET_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="et-post-slider-wrap" style="display:none;">
            <div class ="et-blog-wrap">
                <label><?php _e( 'Slider Images', ET_TD ); ?></label>
                <div class="et-blog-field">
                    <input type="button" class="et-upload-slider-button" name="et-upload-slider-image"  value="Upload Images" size="25"/>
                </div>
                <div class="et-slider-image-collection">
                </div>
            </div>
        </div>
        <div class="et-post-video-wrap">
            <div class ="et-blog-wrap">
                <label><?php _e( 'Choose Video Type', ET_TD ); ?></label>
                <div class="et-blog-field">
                    <select name="et_option[post][<?php echo $post_key; ?>][video_type]" class="et-video-type">
                        <option value="youtube"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'video_type' ] == 'youtube' ) echo 'selected=="selected"'; ?>><?php _e( 'Youtube', ET_TD ) ?></option>
                        <option value="vimeo"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'video_type' ] == 'vimeo' ) echo 'selected=="selected"'; ?>><?php _e( 'Vimeo', ET_TD ) ?></option>
                        <option value="html_video"  <?php if ( isset( $et_option[ 'post' ][ $post_key ][ 'video_type' ] ) && $et_option[ 'post' ][ $post_key ][ 'video_type' ] == 'html_video' ) echo 'selected=="selected"'; ?>><?php _e( 'Upload Your Own', ET_TD ) ?></option>
                    </select>
                    <div class="et-video-url-wrap">
                        <input type="text" name="et_option[post][<?php echo $post_key; ?>][video_url]" placeholder="Enter the video URL" class="et-video-url" value="" />
                    </div>
                    <div class="et-upload-video-wrap" style="display: none;">
                        <input type="text" class="et-upload-url" name="et_option[post][<?php echo $post_key; ?>][upload_video_url]"  value="" />
                        <input type="button" class="et-upload-video-button" name="et-upload-url"  value="Upload Video" size="25"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="et-sound-cloud-wrap" style="display: none;">
            <div class ="et-blog-wrap">
                <label><?php _e( 'Client ID', ET_TD ); ?></label>
                <div class="et-blog-field">
                    <input type="text" class="et-audio-client-id" name="et_option[post][<?php echo $post_key; ?>][audio-client-id]"  value="" />
                </div>
            </div>
            <div class ="et-blog-wrap">
                <label><?php _e( 'Audio URL', ET_TD ); ?></label>
                <div class="et-blog-field">
                    <input type="text" class="et-upload-url" name="et_option[post][<?php echo $post_key; ?>][upload_video_url]"  value="" />
                </div>
            </div>
        </div>
    </div>
    <div class="et-blog-wrap">
        <label><?php _e( 'Post Link Button', ET_TD ) ?></label>
        <div class="et-blog-field">
            <label class="et-button-check"><input type="checkbox" class="et-show-post-button" ><?php _e( 'Check to post link button', ET_TD ) ?></label>
            <input type="hidden" name="et_option[post][<?php echo $post_key; ?>][show-post-button]" class="et-post-button-val" value="0" />
        </div>
    </div>
    <div class="et-post-link-wrap" style="display: none;">
        <div class="et-blog-wrap">
            <label  class="et-button-text"><?php _e( 'Button Text', ET_TD ); ?></label>
            <div class="et-blog-field">
                <input type="text" class="et-button-text" name="et_option[post][<?php echo $post_key; ?>][button_text]" placeholder="<?php _e( 'Read More', ET_TD ); ?>" value=""/>
            </div>
        </div>
        <div class="et-blog-wrap">
            <label><?php _e( 'Button URL', ET_TD ); ?></label>
            <div class="et-blog-field">
                <label><input type="radio" value="post_link" name="et_option[post][<?php echo $post_key; ?>][choose_post_link]" <?php
                    if ( isset( $et_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ] ) ) {
                        checked( $et_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ], 'post_link' );
                    }
                    ?> class="et-select-post-link"/><?php _e( 'Post link', ET_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="et_option[post][<?php echo $post_key; ?>][choose_post_link]" <?php
                    if ( isset( $et_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ] ) ) {
                        checked( $et_option[ 'post' ][ '<?php echo $post_key; ?>' ][ 'choose_post_link' ], 'custom_link' );
                    }
                    ?>  class="et-select-post-link"/><?php _e( 'Custom link', ET_TD ); ?></label>
                <div class="et-custom-link" style="display:none;">
                    <input type="text" class="et-button-url" name="et_option[post][<?php echo $post_key; ?>][button_url]" placeholder="http://example.com" value=""/>
                </div>
            </div>
        </div>
    </div>
</div>