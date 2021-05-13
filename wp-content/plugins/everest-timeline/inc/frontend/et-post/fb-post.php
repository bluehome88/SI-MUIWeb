<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$token = sanitize_text_field( $et_option[ 'et_fb_access_token' ] );
$page_id = sanitize_text_field( $et_option[ 'et_fb_profile_id' ] );
$limit = sanitize_text_field( $et_option[ 'et_fb_count' ] );
$fetch_story = "https://graph.facebook.com/v2.10/$page_id/posts?fields=full_picture,picture,link,message,shares,likes.limit(0).summary(true),comments.limit(0).summary(true),created_time&limit=$limit&access_token=$token";
$request = wp_remote_get( $fetch_story );
$json = wp_remote_retrieve_body( $request );
$story = json_decode( $json, true, 512, JSON_BIGINT_AS_STRING );
$user_profile = 'https://graph.facebook.com/v2.10/' . $page_id . '/picture?type=small&access_token=' . $token . '';
$current_date = '';
for ( $x = 0; $x < $limit; $x ++ ) {
    $created_date = $story[ 'data' ][ $x ][ 'created_time' ];
    if ( isset( $story[ 'data' ][ $x ][ 'message' ] ) ) {
        $description = $story[ 'data' ][ $x ][ 'message' ];
    }
    if ( isset( $story[ 'data' ][ $x ][ 'full_picture' ] ) ) {
        $image = $story[ 'data' ][ $x ][ 'full_picture' ];
    }
    if ( isset( $story[ 'data' ][ $x ][ 'link' ] ) ) {
        $link = $story[ 'data' ][ $x ][ 'link' ];
    }
    if ( isset( $story[ 'data' ][ $x ][ 'likes' ][ 'summary' ][ 'total_count' ] ) ) {
        $like = $story[ 'data' ][ $x ][ 'likes' ][ 'summary' ][ 'total_count' ];
    } else {
        $like = 0;
    }
    if ( isset( $story[ 'data' ][ $x ][ 'comments' ][ 'summary' ][ 'total_count' ] ) ) {
        $comment = $story[ 'data' ][ $x ][ 'comments' ][ 'summary' ][ 'total_count' ];
    } else {
        $comment = 0;
    }
    if ( isset( $story[ 'data' ][ $x ][ 'shares' ][ 'count' ] ) ) {
        $share = $story[ 'data' ][ $x ][ 'shares' ][ 'count' ];
    } else {
        $share = 0;
    }
    $date = strtotime( $created_date );
    $timeline_date = date( 'Y', $date );
    $elapsed_time = ET_Everest_Timeline_Class::et_time_format( $created_date );
    //$timeline_date = $created_date;
    if ( isset( $et_option[ 'fb_template' ] ) && $et_option[ 'fb_template' ] == 'template-1' ) {

        if ( $timeline_date != $current_date ) {
            ?>
            <div class="et-timeline-line"></div>
            <div class="et-timeline-date et-clearfix">
                <span>
                    <?php echo date( 'Y', strtotime( $created_date ) ); ?>
                </span>
            </div>
            <?php
        }
        ?>
        <div class="et-timeline-item">
            <div class="et-timeline-circle"></div>
            <div class="et-time">
                <?php echo esc_attr( $elapsed_time ); ?>
            </div>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    ?> data-wow-delay = "0.1s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-img-container">
                    <div class="et-profile-image">
                        <a href="https://www.facebook.com/<?php echo esc_attr( $page_id ); ?>" target="_blank"> <img src="<?php echo esc_attr( $user_profile ); ?>"></a>
                    </div>
                    <div class="et-profile-name">
                        <div class="et-profile-name-tag"><a href="https://www.facebook.com/<?php echo esc_attr( $page_id ); ?>" target="_blank"> <?php echo esc_attr( $et_option[ 'et_fb_profile_name' ] ); ?></a></div>
                    </div>
                </div>
                <div class="et-main-content-wrap">
                    <div class="et-content">
                        <?php
                        if ( isset( $description ) ) {
                            echo esc_attr( $description );
                        }
                        ?>

                        <?php if ( isset( $et_option[ 'et_show_fb_read_more' ] ) && $et_option[ 'et_show_fb_read_more' ] == '1' ) {
                            ?> <div class="et-fb-read-button">
                                <a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_attr( $et_option[ 'et_fb_link_text' ] ); ?></a>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-image-container">
                        <div class="et-image">
                            <a class="et-lightbox-image" href="<?php echo esc_attr( $image ); ?>"><img src="<?php echo esc_attr( $image ); ?>" alt=""></a>

                        </div>
                    </div>
                    <div class="et-inner-content">
                        <?php if ( isset( $et_option[ 'et_show_fb_like' ] ) && $et_option[ 'et_show_fb_like' ] == '1' ) { ?>
                            <div class="et-like-count">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                <?php echo esc_attr( $like ); ?>
                            </div>
                            <?php
                        }
                        if ( isset( $et_option[ 'et_show_fb_comment' ] ) && $et_option[ 'et_show_fb_comment' ] == '1' ) {
                            ?>

                            <div class="et-comment-count">
                                <span class="dashicons dashicons-admin-comments"></span>
                                <?php echo esc_attr( $comment ); ?>
                            </div>
                            <?php
                        }
                        if ( isset( $et_option[ 'et_show_fb_share' ] ) && $et_option[ 'et_show_fb_share' ] == '1' ) {
                            ?>
                            <div class="et-share-count">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <?php echo esc_attr( $share ); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if ( isset( $et_option[ 'fb_template' ] ) && $et_option[ 'fb_template' ] == 'template-2' ) {
        if ( $timeline_date != $current_date ) {
            ?>
            <div class="et-timeline-line"></div>
            <div class="et-timeline-date et-clearfix">
                <span>
                    <?php echo date( 'Y', strtotime( $created_date ) ); ?>
                </span>
            </div>
            <?php
        }
        ?>
        <div class="et-timeline-item">
            <div class="et-timeline-circle"></div>
            <div class="et-timeline-date-inner et-clearfix">
                <span>
                    <?php echo date( 'd,F', strtotime( $created_date ) ); ?>
                </span>
            </div>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                        ?> data-wow-delay = "0.1s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">

                <div class="et-img-container">
                    <div class="et-profile-image">
                        <a href="https://www.facebook.com/<?php echo esc_attr( $page_id ); ?>" target="_blank"> <img src="<?php echo esc_attr( $user_profile ); ?>"></a>
                    </div>
                    <div class="et-profile-name">
                        <a href="https://www.facebook.com/<?php echo esc_attr( $page_id ); ?>" target="_blank"> <?php echo esc_attr( $et_option[ 'et_fb_profile_name' ] ); ?></a>
                    </div>
                </div>
                <div class="et-image-container">
                    <div class="et-image">
                        <a class="et-lightbox-image" href="<?php echo esc_attr( $image ); ?>"><img src="<?php echo esc_attr( $image ); ?>" alt=""></a>
                    </div>
                </div>
                <div class="et-content"><?php
        echo esc_attr( $description );
                ?>

                    <?php if ( isset( $et_option[ 'et_show_fb_read_more' ] ) && $et_option[ 'et_show_fb_read_more' ] == '1' ) {
                        ?> <div class="et-fb-read-button">
                            <a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_attr( $et_option[ 'et_fb_link_text' ] ); ?></a>
                        </div>

                        <?php
                    }
                    ?>
                </div>

                <div class="et-inner-content">
                    <?php if ( isset( $et_option[ 'et_show_fb_like' ] ) && $et_option[ 'et_show_fb_like' ] == '1' ) { ?>
                        <div class="et-like-count">
                            <span class="dashicons dashicons-heart"></span>
                            <?php echo esc_attr( $like ); ?>
                        </div>
                        <?php
                    }
                    if ( isset( $et_option[ 'et_show_fb_comment' ] ) && $et_option[ 'et_show_fb_comment' ] == '1' ) {
                        ?>

                        <div class="et-comment-count">
                            <span class="dashicons dashicons-admin-comments"></span>
                            <?php echo esc_attr( $comment ); ?>
                        </div>
                        <?php
                    }
                    if ( isset( $et_option[ 'et_show_fb_share' ] ) && $et_option[ 'et_show_fb_share' ] == '1' ) {
                        ?>
                        <div class="et-share-count">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <?php
                            if ( isset( $share ) ) {
                                echo esc_attr( $share );
                            }
                            ?>
                        </div>
                    <?php } ?>
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
                    <?php echo date( 'M j, Y', strtotime( $created_date ) ); ?>
                </span>
            </div>
            <?php
        }
        ?>
        <div class="et-timeline-item">
            <div class="et-timeline-circle"></div>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
            ?> data-wow-delay = "0.1s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-image-container">
                    <div class="et-image">
                        <a class="et-lightbox-image" href="<?php echo esc_attr( $image ); ?>"><img src="<?php echo esc_attr( $image ); ?>" alt=""></a>

                    </div>
                </div>
                <div class="et-inner-content">

                    <div class="et-meta-wrap">

                        <div class="et-date"><?php echo date( 'M j, Y', strtotime( $created_date ) ); ?></div>

                    </div>
                    <div class="et-content"><?php
        echo esc_attr( $description );
        if ( isset( $et_option[ 'et_show_fb_read_more' ] ) && $et_option[ 'et_show_fb_read_more' ] == '1' ) {
                    ?> <div class="et-fb-read-button">
                                <a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo esc_attr( $et_option[ 'et_fb_link_text' ] ); ?></a>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-button-count">
                        <?php if ( isset( $et_option[ 'et_show_fb_like' ] ) && $et_option[ 'et_show_fb_like' ] == '1' ) { ?>
                            <div class="et-like-count">
                                <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                <?php echo esc_attr( $like ); ?>
                            </div>
                            <?php
                        }
                        if ( isset( $et_option[ 'et_show_fb_comment' ] ) && $et_option[ 'et_show_fb_comment' ] == '1' ) {
                            ?>

                            <div class="et-comment-count">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php echo esc_attr( $comment ); ?>
                            </div>
                            <?php
                        }
                        if ( isset( $et_option[ 'et_show_fb_share' ] ) && $et_option[ 'et_show_fb_share' ] == '1' ) {
                            ?>
                            <div class="et-share-count">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <?php
                                if ( isset( $share ) ) {
                                    echo esc_attr( $share );
                                }
                                ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    $current_date = $timeline_date;
}




