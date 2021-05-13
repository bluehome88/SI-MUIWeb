<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$et_common_settings = get_option( 'et_common_settings' );
?>
<div class="et-about-main-wrapper">
    <div class="et-intro-wrap">
        <div class="et-header">
            <div>
                <div id="et-fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <script>!function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + '://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'twitter-wjs');</script>
            </div>
            <div class="et-header-section">
                <div class="et-header-left">
                    <div class="et-title"><?php _e( 'Everest Timeline', ET_TD ); ?></div>
                    <div class="et-version-wrap">
                        <span>Version <?php echo ET_VERSION; ?></span>
                    </div>
                </div>
                <div class="et-header-social-link">
                    <p class="et-follow-us"><?php _e( 'Follow us for new updates', ET_TD ); ?></p>
                    <div class="fb-like" data-href="https://www.facebook.com/accesspressthemes" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div>
                    <a href="https://twitter.com/accesspressthemes" class="twitter-follow-button" data-show-count="false">Follow @accesspressthemes</a>
                </div>
            </div>
        </div>

        <div class="et-how-to-use-container">
            <div class="et-column-one-wrap">
                <div class="et-panel-body">
                    <div class="et-row">
                        <div class="et-col-three-third">
                            <form method="post" id="et-save-form" action="<?php echo admin_url( 'admin-post.php' ); ?>"  >
                                <input type="hidden" name="action" value="et_settings_save"/>
                                <h3><?php _e( 'Common Settings', ET_TD ); ?></h3>
                                <div class="et-post-option-wrap">
                                    <label><?php _e( 'Fontawesome Version', ET_TD ); ?></label>
                                    <div class="et-post-field-wrap">
                                        <label><input type="radio" value="old_version" name="et_common_settings[font_version]" <?php
                                            if ( isset( $et_common_settings[ 'font_version' ] ) ) {
                                                checked( $et_common_settings[ 'font_version' ], 'old_version' );
                                            }
                                            ?> class="et-version"/><?php _e( "Old Version", ET_TD ); ?></label>
                                        <label><input type="radio" value="new_version" name="et_common_settings[font_version]" <?php
                                            if ( isset( $et_common_settings[ 'font_version' ] ) ) {
                                                checked( $et_common_settings[ 'font_version' ], 'new_version' );
                                            }
                                            ?>  class="et-version"/><?php _e( 'Latest Version', ET_TD ); ?></label>

                                        <p class="description">
<?php _e( 'To use the latest version of the fontawesome please use the Latest Version.', ET_TD ); ?>
                                        </p>
                                        <div class="et-save-buton">
<?php wp_nonce_field( 'et_form_nonce', 'et_form_nonce_field' ); ?>
                                            <a class="button button-primary button-large" href="javascript:;" onclick="document.getElementById('et-save-form').submit();"><span><?php _e( 'Save', ET_TD ); ?></span></a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>