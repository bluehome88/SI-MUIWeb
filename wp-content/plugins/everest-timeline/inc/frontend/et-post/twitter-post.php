<?php
$twitteruser = isset( $et_option[ 'et_twitter_username' ] ) ? esc_attr( $et_option[ 'et_twitter_username' ] ) : 'apthemes'; //user name you want to reference
$notweets = isset( $et_option[ 'et_twitter_feed_number' ] ) ? esc_attr( $et_option[ 'et_twitter_feed_number' ] ) : '1';
//how many tweets you want to retrieve
$consumerkey = $et_option[ 'et_consumer_key' ]; //Noted keys from step 2
$consumersecret = $et_option[ 'et_consumer_secret' ]; //Noted keys from step 2
$accesstoken = $et_option[ 'et_access_token' ]; //Noted keys from step 2
$accesstokensecret = $et_option[ 'et_access_token_secret' ]; //Noted keys from step 2
$connection = ET_Everest_Timeline_Class::getConnectionWithAccessToken( $consumerkey, $consumersecret, $accesstoken, $accesstokensecret );

$tweets = $connection -> get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $twitteruser . "&count=" . $notweets );
//$this -> print_array( $tweets );
//die();
if ( is_array( $tweets ) ) {
    $current_date = '';

// to use with intents
    //echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';
    foreach ( $tweets as $tweet ) {
        $date = strtotime( $tweet -> created_at );
        $timeline_date = date( 'Y', $date );
        $profile_image = $tweet -> user -> profile_image_url_https;
        $user_name = $tweet -> user -> name;
        $user_tweeter_name = $tweet -> user -> screen_name;
        if ( isset( $et_option[ 'twitter_template' ] ) && $et_option[ 'twitter_template' ] == 'template-1' ) {
            if ( $timeline_date != $current_date ) {
                ?>
                <div class="et-timeline-line"></div>
                <div class="et-timeline-date et-clearfix">
                    <div class="et-timeline-date-inner">
                        <div class="et-timeline-date-inner-inner">
                            <span>
                                <?php echo date( 'Y', $date ); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="et-timeline-item">
                <div class="et-day-month-wrap">
                    <div class="et-day">
                        <?php
                        echo esc_attr( date( 'j', $date ) );
                        ?>
                    </div>
                    <div class="et-month">
                        <?php
                        echo esc_attr( date( 'F', $date ) );
                        ?>
                    </div>
                </div>
                <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                            ?> data-wow-delay = "0.1s"
                    <?php } ?>  class="et-all-contain-here <?php
                    if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        echo 'wow ';
                        echo esc_attr( $et_option[ 'animation_type' ] );
                        ?>
                    <?php } ?>">
                    <div class="et-author-detail-content">
                        <div class="et-author-detail">
                            <div class="et-author-image">
                                <img src="<?php echo esc_url( $profile_image ); ?>">
                            </div>
                            <div class="et-author-name">

                                <a href="http://twitter.com/<?php echo $tweet -> user -> screen_name; ?>" class="et-tweet-name" target="_blank">
                                    <?php echo $tweet -> user -> name; ?>
                                    <span class="et-tweet-username">@<?php echo $tweet -> user -> screen_name; ?></span>
                                </a>

                            </div>
                        </div>
                        <div class="et-tweet-content">
                            <?php include(ET_PATH . 'inc/frontend/tweet/et-content.php'); ?>
                        </div>
                    </div>
                    <?php if ( isset( $tweet -> extended_entities ) ) { ?>
                        <div class="et-main-image-wrap">
                            <?php include(ET_PATH . 'inc/frontend/tweet/et-media.php'); ?>
                        </div>
                    <?php }
                    ?><div class = "et-social-container">
                    <?php include(ET_PATH . 'inc/frontend/tweet/et-action.php');
                    ?>
                    </div>

                </div>
            </div>


            <?php
        } else if ( isset( $et_option[ 'twitter_template' ] ) && $et_option[ 'twitter_template' ] == 'template-2' ) {
            if ( $timeline_date != $current_date ) {
                ?>
                <div class="et-timeline-line"></div>
                <div class="et-timeline-date et-clearfix">
                    <span>
                        <?php echo date( 'Y', $date ); ?>
                    </span>
                </div>
                <?php
            }
            ?>
            <div class="et-timeline-item">
                <div class="et-timeline-circle"></div>
                <div class="et-day">
                    <?php
                    echo esc_attr( date( 'j F', $date ) );
                    ?>
                </div>
                <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        ?> data-wow-delay = "0.1s"
                    <?php } ?>  class="et-all-contain-here <?php
                    if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        echo 'wow ';
                        echo esc_attr( $et_option[ 'animation_type' ] );
                        ?>
                    <?php } ?>">
                    <div class="et-image-container">
                        <?php include(ET_PATH . 'inc/frontend/tweet/et-media.php'); ?>
                        <div class="et-author-detail">
                            <div class="et-author-image">
                                <img src="<?php echo esc_url( $profile_image ); ?>">
                            </div>
                            <div class="et-author-name">
                                <a href="http://twitter.com/<?php echo $tweet -> user -> screen_name; ?>" class="et-tweet-name" target="_blank">
                                    <?php echo $tweet -> user -> name; ?>
                                    <span class="et-tweet-username">@<?php echo $tweet -> user -> screen_name; ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="et-tweet-content">
                        <?php include(ET_PATH . 'inc/frontend/tweet/et-content.php'); ?>
                    </div>
                    <div class="et-social-container">
                        <?php include(ET_PATH . 'inc/frontend/tweet/et-action.php'); ?>
                    </div>
                </div>
            </div>
            <?php
        } else {
            if ( $timeline_date != $current_date ) {
                ?>
                <div class="et-timeline-line"></div>
                <div class="et-timeline-date et-clearfix">
                    <span>
                        <?php echo date( 'Y', $date ); ?>
                    </span>
                </div>
                <?php
            }
            ?>
            <div class="et-timeline-item">
                <div class="et-timeline-circle"></div>
                <div class="et-day">
                    <?php
                    echo esc_attr( date( 'F j', $date ) );
                    ?>
                </div>
                <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        ?> data-wow-delay = "0.1s"
                    <?php } ?>  class="et-all-contain-here <?php
                    if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        echo 'wow ';
                        echo esc_attr( $et_option[ 'animation_type' ] );
                        ?>
                    <?php } ?>">
                    <div class="et-content-main">
                        <?php // include(ET_PATH . 'inc/frontend/tweet/et-media.php');  ?>
                        <div class="et-content-layer">
                            <div class="et-author-detail">
                                <div class="et-author-image">
                                    <img src="<?php echo esc_url( $profile_image ); ?>">
                                </div>
                                <div class="et-author-name">
                                    <a href="http://twitter.com/<?php echo $tweet -> user -> screen_name; ?>" class="et-tweet-name" target="_blank">
                                        <?php echo $tweet -> user -> name; ?>
                                        <span class="et-tweet-username">@<?php echo $tweet -> user -> screen_name; ?></span>
                                    </a>
                                </div>
                            </div>
                            <div class="et-tweet-content">
                                <?php include(ET_PATH . 'inc/frontend/tweet/et-content.php'); ?>
                            </div>

                            <div class="et-social-container">
                                <?php include(ET_PATH . 'inc/frontend/tweet/et-action.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }


        $current_date = $timeline_date;
    }
}

