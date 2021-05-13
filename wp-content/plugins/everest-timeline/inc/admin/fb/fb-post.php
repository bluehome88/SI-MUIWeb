<div class="et-post-setting-outer-wrap">
    <div class="et-fetch-facebook-wrap"  id="et-fetch-facebook-wrap">
        <style>
            .et-post-field-wrap .et-pages{
                width: 60%;

            }
            .et-post-field-wrap .et-pages .et-page
            {
                display: inline-block;
                width: 60%;
                margin-top: 5px;
            }
            .et-fb-page {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
            .et-fb-page:before, .et-fb-page:after {
                display: table;
                clear: both;
                content: "";
            }
            .et-post-field-wrap .et-fb-pages .et-fb-page:hover
            {
                cursor: pointer;
                background-color: #eee;
            }

            .et-post-field-wrap .et-fb-pages .et-fb-page .et-page-photo
            {
                float:left;
            }
            .et-post-field-wrap .et-fb-pages .et-fb-page .et-fb-profile-name
            {
                width: 50%;
                float: left;
                margin-left: 5px;
                margin-top: 15px;
            }
        </style>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Get Page Access Token', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <button type='button' id="et_fb_connect"><?php echo _e( 'Login and get access token', ET_TD ); ?></button>
                <div class="et-fb-pages"></div>
                <p class="description">
                    <?php echo _e( 'Generate your access token from above button', ET_TD ); ?>
                </p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Facebook Page Name', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-fb-profile-name" name="et_option[et_fb_profile_name]" value="<?php
                if ( isset( $et_option[ 'et_fb_profile_name' ] ) ) {
                    echo esc_attr( $et_option[ 'et_fb_profile_name' ] );
                }
                ?>" >
                <p class="description">
                    <?php echo _e( 'You can use another public page name too.', ET_TD ); ?>
                </p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Facebook Page ID', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-fb-profile-id" name="et_option[et_fb_profile_id]" value="<?php
                if ( isset( $et_option[ 'et_fb_profile_id' ] ) ) {
                    echo esc_attr( $et_option[ 'et_fb_profile_id' ] );
                }
                ?>" >
                <p class="description"><a href="https://findmyfbid.com/" target="_blank"><?php echo _e( 'Get your Facebook ID here', ET_TD ); ?></a></p>
                <p class="description">
                    <?php echo _e( 'You can use another public page id too.', ET_TD ); ?>
                </p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Facebook Page Access Token', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-fb-access-token" name="et_option[et_fb_access_token]" value="<?php
                if ( isset( $et_option[ 'et_fb_access_token' ] ) ) {
                    echo esc_attr( $et_option[ 'et_fb_access_token' ] );
                }
                ?>" >
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Number Of Feeds', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="number"  min="1" class="et-fb-count" name="et_option[et_fb_count]" value="<?php
                if ( isset( $et_option[ 'et_fb_count' ] ) ) {
                    echo esc_attr( $et_option[ 'et_fb_count' ] );
                } else {
                    echo '5';
                }
                ?>" >
            </div>
        </div>
        <div class="et-post-option-wrap">
            <label for="et-fb-like-count" class="et-fb-like">
                <?php _e( 'Like Count', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-fb-like et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_fb_like' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_fb_like' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="et_option[et_show_fb_like]" <?php if ( isset( $et_option[ 'et_show_fb_like' ] ) && $et_option[ 'et_show_fb_like' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show count of like. ', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-post-option-wrap">
            <label for="et-fb-comment-count" class="et-fb-comment">
                <?php _e( 'Comment Count', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-fb-comment et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_fb_comment' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_fb_comment' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="et_option[et_show_fb_comment]" <?php if ( isset( $et_option[ 'et_show_fb_comment' ] ) && $et_option[ 'et_show_fb_comment' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show count of comments. ', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-post-option-wrap">
            <label for="et-fb-share-count" class="et-fb-share">
                <?php _e( 'Share Count', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-fb-share et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_fb_share' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_fb_share' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="et_option[et_show_fb_share]" <?php if ( isset( $et_option[ 'et_show_fb_share' ] ) && $et_option[ 'et_show_fb_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show count of share. ', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-post-option-wrap">
            <label for="et-fb-read-more" class="et-fb-read-more">
                <?php _e( 'Read More', ET_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-fb-read-more et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_fb_read_more' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_fb_read_more' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="et_option[et_show_fb_read_more]" <?php if ( isset( $et_option[ 'et_show_fb_read_more' ] ) && $et_option[ 'et_show_fb_read_more' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show read more. ', ET_TD ) ?></p>
            </div>
        </div>
        <div class="et-fb-read-more-wrap" <?php if ( isset( $et_option[ 'et_show_fb_read_more' ] ) && $et_option[ 'et_show_fb_read_more' ] == '1' ) {
                        ?> style="display:block;" <?php } else { ?> style="display:none;" <?php }
                    ?>>
            <div class ="et-post-option-wrap">
                <label for="read-more-text" class="et-fb-read-more-text"><?php _e( 'Read More Text', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <input type="text" class="et-fb-link-text" placeholder="Read More" name="et_option[et_fb_link_text]" value="<?php
                    if ( isset( $et_option[ 'et_fb_link_text' ] ) ) {
                        echo esc_attr( $et_option[ 'et_fb_link_text' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
        <img src="<?php echo ET_IMG_DIR . '/demo/fb/' . 'fb1.jpg' ?>" onload="etFbinit()" style="display:none;">
    </div>
</div>
