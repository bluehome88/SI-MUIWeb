<div class="et-post-setting-outer-wrap">
    <div class="et-fetch-twitter-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Twitter Consumer Key', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-consumer-key" name="et_option[et_consumer_key]" value="<?php
                if ( isset( $et_option[ 'et_consumer_key' ] ) ) {
                    echo esc_attr( $et_option[ 'et_consumer_key' ] );
                }
                ?>" >
                <p class="description"><?php echo _e( 'Please create an app on Twitter through this link:', ET_TD ); ?>
                    <a href='https://dev.twitter.com/apps'><?php echo _e( 'https://dev.twitter.com/apps', ET_TD ); ?></a>
                    <?php echo _e( 'and get this information.', ET_TD ); ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Twitter Consumer Secret', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-consumer-secret" name="et_option[et_consumer_secret]" value="<?php
                if ( isset( $et_option[ 'et_consumer_secret' ] ) ) {
                    echo esc_attr( $et_option[ 'et_consumer_secret' ] );
                }
                ?>" >
                <p class="description"><?php echo _e( 'Please create an app on Twitter through this link:', ET_TD ); ?>
                    <a href='https://dev.twitter.com/apps'><?php echo _e( 'https://dev.twitter.com/apps', ET_TD ); ?></a>
                    <?php echo _e( 'and get this information.', ET_TD ); ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Twitter Access Token', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-access-token" name="et_option[et_access_token]" value="<?php
                if ( isset( $et_option[ 'et_access_token' ] ) ) {
                    echo esc_attr( $et_option[ 'et_access_token' ] );
                }
                ?>" >
                <p class="description"><?php echo _e( 'Please create an app on Twitter through this link:', ET_TD ); ?>
                    <a href='https://dev.twitter.com/apps'><?php echo _e( 'https://dev.twitter.com/apps', ET_TD ); ?></a>
                    <?php echo _e( 'and get this information.', ET_TD ); ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Twitter Access Token Secret', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-access-token-secret" name="et_option[et_access_token_secret]" value="<?php
                if ( isset( $et_option[ 'et_access_token_secret' ] ) ) {
                    echo esc_attr( $et_option[ 'et_access_token_secret' ] );
                }
                ?>" >
                <p class="description"><?php echo _e( 'Please create an app on Twitter through this link:', ET_TD ); ?>
                    <a href='https://dev.twitter.com/apps'><?php echo _e( 'https://dev.twitter.com/apps', ET_TD ); ?></a>
                    <?php echo _e( 'and get this information.', ET_TD ); ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Twitter UserName', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-twitter-name" placeholder="e.g: @apthemes" name="et_option[et_twitter_username]" value="<?php
                if ( isset( $et_option[ 'et_twitter_username' ] ) ) {
                    echo esc_attr( $et_option[ 'et_twitter_username' ] );
                }
                ?>" >
                <p class="description">
                    <?php echo _e( 'Please enter the username of twitter account from which the feeds need to be fetched.', ET_TD ); ?>
                </p>
            </div>
        </div>

        <div class ="et-post-option-wrap">
            <label><?php _e( 'Total Number Of Feed', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="number" min="1" class="et-twitter-feed-number" name="et_option[et_twitter_feed_number]" value="<?php
                if ( isset( $et_option[ 'et_twitter_feed_number' ] ) ) {
                    echo esc_attr( $et_option[ 'et_twitter_feed_number' ] );
                } else {
                    echo '5';
                }
                ?>" >
                <p class="description">
                    <?php echo _e( 'Please enter the number of feeds to be fetched.Default number of feeds is 5.', ET_TD ); ?>
                </p>
            </div>
        </div>
    </div>
</div>