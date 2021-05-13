<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$et_extra_option = get_post_meta( $post_id, 'et_extra_option', true );
//$this -> print_array( $et_extra_option );
?>
<div class="et-media-wrap">
    <div class ="et-blog-wrap">
        <label><?php _e( 'Media Type', ET_TD ); ?></label>
        <div class="et-blog-field">
            <select name="et_extra_option[media_type]" class="et-media-type">
                <option value="image"  <?php if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'image' ) echo 'selected=="selected"'; ?>><?php _e( 'Image', ET_TD ) ?></option>
                <option value="slider"  <?php if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'slider' ) echo 'selected=="selected"'; ?>><?php _e( 'Slider', ET_TD ) ?></option>
                <option value="video"  <?php if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'video' ) echo 'selected=="selected"'; ?>><?php _e( 'Video', ET_TD ) ?></option>
                <option value="sound_cloud"  <?php if ( isset( $et_extra_option[ 'media_type' ] ) && $et_extra_option[ 'media_type' ] == 'sound_cloud' ) echo 'selected=="selected"'; ?>><?php _e( 'Sound Cloud', ET_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="et-post-slider-wrap" style="display:none;">
        <div class ="et-blog-wrap">
            <label><?php _e( 'Slider Images', ET_TD ); ?></label>
            <div class="et-blog-field">
                <input type="button" class="et-upload-slider-button button-secondary" name="et-upload-slider-image"  value="Upload Images" size="25"/>
            </div>
            <div class="et-slider-image-collection">
                <?php
                if ( isset( $et_extra_option[ 'image' ] ) ) {
                    foreach ( $et_extra_option[ 'image' ] as $image_key => $detail ) {
                        ?>
                        <div class="et-slider-wrap">
                            <div class="et-slider-image-preview">
                                <div class="et-each-slider-wrap clearfix">
                                    <a href="javascript:void(0)" class="et-sort-slider-image"><span class="dashicons dashicons-move"></span></a>
                                    <a href="javascript:void(0)" class="et-delete-slider-image"><span class="dashicons dashicons-trash"></span></a>
                                </div>
                                <div class="et-slider-collection-wrap">
                                    <img  class="et-slider-image" src="<?php
                                    if ( isset( $et_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] ) ) {
                                        echo esc_url( $et_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] );
                                    }
                                    ?>" alt="">
                                </div>
                                <input type="hidden" class="et-slider-image-url" name="et_extra_option[image][<?php echo $image_key; ?>][slider_image_url]"  value="<?php
                                if ( isset( $et_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] ) ) {
                                    echo esc_url( $et_extra_option[ 'image' ][ $image_key ][ 'slider_image_url' ] );
                                }
                                ?>" />
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="et-post-video-wrap">
        <div class ="et-blog-wrap">
            <label><?php _e( 'Choose Video Type', ET_TD ); ?></label>
            <div class="et-blog-field">
                <select name="et_extra_option[video_type]" class="et-video-type">
                    <option value="youtube"  <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'youtube' ) echo 'selected=="selected"'; ?>><?php _e( 'Youtube', ET_TD ) ?></option>
                    <option value="vimeo"  <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'vimeo' ) echo 'selected=="selected"'; ?>><?php _e( 'Vimeo', ET_TD ) ?></option>
                    <option value="html_video"  <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'html_video' ) echo 'selected=="selected"'; ?>><?php _e( 'Upload Your Own', ET_TD ) ?></option>
                </select>
                <div class="et-video-url-wrap" <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] == 'html_video' ) { ?> style="display: none;" <?php } ?>>
                    <input type="text" name="et_extra_option[video_url]" placeholder="Enter the video URL" class="et-video-url"
                           value="<?php
                           if ( isset( $et_extra_option[ 'video_url' ] ) ) {
                               echo esc_url( $et_extra_option[ 'video_url' ] );
                           }
                           ?>" />
                </div>
                <div class="et-upload-video-wrap" <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] != 'html_video' ) { ?> style="display: none;" <?php } ?>>
                    <input type="text" class="et-upload-url" name="et_extra_option[upload_video_url]"
                           value="<?php
                           if ( isset( $et_extra_option[ 'upload_video_url' ] ) ) {
                               echo esc_url( $et_extra_option[ 'upload_video_url' ] );
                           }
                           ?>" />
                    <input type="button" class="et-upload-video-button button-secondary" name="et-upload-url"  value="Upload Video" size="25"/>
                </div>
            </div>
        </div>
        <div class="et-upload-poster-wrap" <?php if ( isset( $et_extra_option[ 'video_type' ] ) && $et_extra_option[ 'video_type' ] != 'html_video' ) { ?> style="display: none;" <?php } ?>>
            <div class="et-blog-wrap">
                <label><?php _e( 'Video Poster Image', ET_TD ); ?></label>
                <div class="et-blog-field">
                    <input type="text" name="et_extra_option[poster_image_url]" class="et-poster-image-url" value="<?php
                    if ( isset( $et_extra_option[ 'poster_image_url' ] ) ) {
                        echo esc_url( $et_extra_option[ 'poster_image_url' ] );
                    }
                    ?>" />
                    <input type="button" class="et-upload-poster-image button-secondary" name="et-upload-poster-image"  value="Upload Image" size="25"/>
                    <div class="et-poster-image-preview" <?php if ( empty( $et_extra_option[ 'poster_image_url' ] ) ) { ?> style="display:none;" <?php } ?>>
                        <img  class="et-poster-img-wrap" src="<?php
                        if ( isset( $et_extra_option[ 'poster_image_url' ] ) ) {
                            echo esc_url( $et_extra_option[ 'poster_image_url' ] );
                        }
                        ?>" alt=""  width="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="et-sound-cloud-wrap" style="display: none;">
        <div class ="et-blog-wrap">
            <label><?php _e( 'Client ID', ET_TD ); ?></label>
            <div class="et-blog-field">
                <input type="text" class="et-audio-client-id" name="et_extra_option[audio_client_id]"
                       value="<?php
                       if ( isset( $et_extra_option[ 'audio_client_id' ] ) ) {
                           echo esc_attr( $et_extra_option[ 'audio_client_id' ] );
                       }
                       ?>" />
            </div>
        </div>
        <div class ="et-blog-wrap">
            <label><?php _e( 'Audio URL', ET_TD ); ?></label>
            <div class="et-blog-field">
                <input type="text" class="et-upload-audio-url" name="et_extra_option[upload_audio_url]"
                       value="<?php
                       if ( isset( $et_extra_option[ 'upload_audio_url' ] ) ) {
                           echo esc_attr( $et_extra_option[ 'upload_audio_url' ] );
                       }
                       ?>" />
            </div>
        </div>
    </div>
</div>
<div class="et-icon-setting-container">
    <div class="et-blog-wrap">
        <label><?php _e( 'Icon Type', ET_TD ); ?></label>
        <div class="et-blog-field">
            <label><input type="radio" value="icon" name="et_extra_option[icon_type]" <?php
                if ( isset( $et_extra_option[ 'icon_type' ] ) ) {
                    checked( $et_extra_option[ 'icon_type' ], 'icon' );
                }
                ?> class="et-icon-type"/><?php _e( "Icon", ET_TD ); ?></label>
            <label><input type="radio" value="image" name="et_extra_option[icon_type]" <?php
                if ( isset( $et_extra_option[ 'icon_type' ] ) ) {
                    checked( $et_extra_option[ 'icon_type' ], 'image' );
                }
                ?>  class="et-icon-type"/><?php _e( 'Image', ET_TD ); ?></label>
            <div class="et-icon-inner-container" <?php if ( isset( $et_extra_option[ 'icon_type' ] ) && $et_extra_option[ 'icon_type' ] == 'icon' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> >
                <input class="regular-text" type="hidden" id="et_icon_picker_id" name="et_extra_option[font_icon]" value="<?php
                if ( isset( $et_extra_option[ 'font_icon' ] ) ) {
                    echo esc_attr( $et_extra_option[ 'font_icon' ] );
                }
                ?>"/>
                <div id="preview_icon_picker_example_icon1" data-target="#et_icon_picker_id" class="et-icon-picker button icon-picker <?php
                if ( isset( $et_extra_option[ 'font_icon' ] ) ) {
                    $v = explode( '|', $et_extra_option[ 'font_icon' ] );
                    echo $v[ 0 ] . ' ' . $v[ 1 ];
                } else {
                    echo esc_attr( 'dashicons dashicons-admin-generic' );
                }
                ?>"></div>
            </div>
            <div class="et-image-container" <?php if ( isset( $et_extra_option[ 'icon_type' ] ) && $et_extra_option[ 'icon_type' ] == 'image' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?> >
                <input type="text" name="et_extra_option[icon_image_url]" class="et-icon-image-url" value="<?php
                if ( isset( $et_extra_option[ 'icon_image_url' ] ) ) {
                    echo esc_url( $et_extra_option[ 'icon_image_url' ] );
                }
                ?>" />
                <input type="button" class="et-upload-icon-image button-secondary" name="et-upload-icon-image"  value="Upload Image" size="25"/>
                <div class="et-icon-image-preview" <?php if ( empty( $et_extra_option[ 'icon_image_url' ] ) ) { ?> style="display:none;" <?php } ?>>
                    <img  class="et-icon-img-wrap" src="<?php
                    if ( isset( $et_extra_option[ 'icon_image_url' ] ) ) {
                        echo esc_url( $et_extra_option[ 'icon_image_url' ] );
                    }
                    ?>" alt=""  width="250">
                </div>
            </div>
            <p class="description">
                <?php _e( 'Note: Icon is only avaliable for especific templates which include fonts icon.' ) ?>
            </p>
        </div>
    </div>
</div>
<div class="et-link-setting-container">
    <div class ="et-blog-wrap">
        <label><?php _e( 'Individual Custom Link', ET_TD ); ?></label>
        <div class="et-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="et-tooltip-info"><?php _e( 'This is used to show the individual custom link for individual custom link.', ET_TD ); ?></span>
        </div>
        <div class="et-blog-field">
            <input type="text" name="et_extra_option[individual_custom_url]" class="et-individual-url" value="<?php
                   if ( isset( $et_extra_option[ 'individual_custom_url' ] ) ) {
                       echo esc_url( $et_extra_option[ 'individual_custom_url' ] );
                   }
                   ?>" />
        </div>
    </div>
</div>