<?php
if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-1' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span>
                <?php echo get_the_date( 'Y' ); ?>
            </span>
        </div>
        <?php
    }
    ?>

    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
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
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                /*
                 * Show Category
                 */
                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                    $separator = '';
                    include(ET_PATH . 'inc/frontend/content/et-category.php');
                }
                ?>
            </div>
            <div class="et-inner-content">
                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                <div class="et-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                        ?>
                        <div class="et-author-name">
                            <span class="icon_pencil-edit" aria-hidden="true"></span>
                            <?php
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                        ?>
                        <div class="et-date">
                            <span class="icon_clock_alt" aria-hidden="true"></span>
                            <?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    /*
                     * Display comment count
                     */
                    if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                        ?>
                        <div class="et-comment-wrap">
                            <span class="icon_comment_alt" aria-hidden="true"></span>
                            <?php
                            echo comments_number();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="et-content"><?php
                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                    ?></div>
                <?php
                /*
                 * Read More
                 */
                include(ET_PATH . 'inc/frontend/inner/button.php');
                ?>
                <div class="et-content-outer-wrap et-clearfix">
                    <?php
                    /*
                     * Show Tag
                     */
                    if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                        $pre_tag = '#';
                        $separator = '';
                        //echo 'eee';
                        include(ET_PATH . 'inc/frontend/content/et-tag.php');
                    }
                    if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                        ?>
                        <div class="et-share-wrap">
                            <div class="et-share-wrap-contain">
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>

                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-2' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?>
    <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle"></div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
             ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
            <div class="et-contain-main">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-inner-content">
                    <div class="et-meta-wrap">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        /*
                         * Date
                         */
                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                            ?>
                            <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    include(ET_PATH . 'inc/frontend/inner/button.php');
                    ?>
                    <div class="et-meta-wrap-1">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = '';
                            $pre_tag = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <div class="et-share-wrap-contain">
                                    <?php if ( isset( $et_option[ 'et_show_facebook_share' ] ) && $et_option[ 'et_show_facebook_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Facebook', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_twitter_share' ] ) && $et_option[ 'et_show_twitter_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Twitter', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_google_share' ] ) && $et_option[ 'et_show_google_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://plus.google.com/share?url=<?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Google +', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_linkedin_share' ] ) && $et_option[ 'et_show_linkedin_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Linkedin', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_mail_share' ] ) && $et_option[ 'et_show_mail_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Email', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_pinterest_share' ] ) && $et_option[ 'et_show_pinterest_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $post -> ID ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Pinterest', ET_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-3' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
                 <?php echo get_the_date( 'Y' ); ?>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item et-clearfix <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-author-block">
            <?php
            /*
             * Show Author
             */
            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                ?>
                <div class="et-author-name">
                    <?php
                    echo get_avatar( get_the_author_meta( 'ID' ), 56 );
                    the_author_posts_link();
                    ?>
                </div>
                <?php
            }

            /*
             * Date
             */

            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <?php echo get_the_date( $date_format ); ?>
                </div>
                <?php
            }

            /*
             * Show Category
             */
            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                $separator = '';
                include(ET_PATH . 'inc/frontend/content/et-category.php');
            }
            ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-content">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-contain-main-inner">
                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                    <div class="et-meta-wrap">
                        <?php
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = ' , ';
                            $pre_tag = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        ?>
                    </div>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <div class="et-lower-meta et-clearfix">
                        <?php
                        /*
                         * Read More
                         */
                        include(ET_PATH . 'inc/frontend/inner/button.php');
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social-class.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-4' ) {
    ?>
    <div class="et-timeline-line"></div>
    <?php
    if ( $timeline_date != $current_date ) {
        ?>  <div class="et-year-date">
        <?php echo get_the_date( 'Y' ); ?>
        </div>
    <?php }
    ?>
    <div class="et-timeline-date et-clearfix <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" >

        <div class="et-timeline-date-inner-wrap">
            <div class="et-date-day">
                <?php echo get_the_date( 'd' ); ?>
            </div>
            <div class="et-month">
                <?php echo get_the_date( 'M' ); ?>
            </div>
        </div>
    </div>

    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle"></div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
             ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-content">
                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                <div class="et-another-wrap">
                    <?php
                    /*
                     * Show Category
                     */
                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                        $separator = '';
                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                    }
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-meta-wrap">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    include(ET_PATH . 'inc/frontend/inner/button.php');
                    ?>
                    <div class="et-lower-meta-wrap et-clearfix">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $pre_tag = '';
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-5' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle"></div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
             ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-bottom-wrap-main-content">
                    <div class="et-meta-wrap et-clearfix">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo get_comments_number();
                                ?>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-main-wrap">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        include(ET_PATH . 'inc/frontend/inner/title.php');
                        /*
                         * Date
                         */
                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                            ?>
                            <div class="et-date"><?php
                                _e( 'POSTED: ', ET_TD );
                                echo get_the_date( $date_format );
                                ?></div>
                        <?php }
                        ?>
                        <div class="et-content-outer-wrap">
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                    <div class="et-bottom-wrap et-clearfix">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $pre_tag = '';
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php _e( 'Share: ', ET_TD ); ?>
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-6' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle-date">
            <?php echo get_the_date( $date_format ); ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <div class="et-top-header">
                    <?php
                    /*
                     * Show Category
                     */
                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                        $separator = '';
                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                    }
                    include(ET_PATH . 'inc/frontend/inner/title.php');
                    ?>
                    <div class="et-meta-wrap">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-bottom-wrap-main">
                    <div class="et-content-outer-wrap">
                        <div class="et-content"><?php
                            include(ET_PATH . 'inc/frontend/content/et-content.php');
                            ?></div>
                        <?php
                        /*
                         * Read More
                         */
                        include(ET_PATH . 'inc/frontend/inner/button.php');
                        ?>
                    </div>
                    <div class= "et-bottom-wrap">
                        <?php
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = '';
                            $pre_tag = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-7' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item et-clearfix <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-icon-date-wrap">
            <div class="et-icon-block">
                <?php
                include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                ?>
            </div>
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-timeline-circle-date">
                    <?php echo get_the_date( $date_format ); ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-content">
                <div class="et-image-tag-wrap">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    /*
                     * Show Tag
                     */
                    if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                        $separator = ' / ';
                        $pre_tag = '';
                        include(ET_PATH . 'inc/frontend/content/et-tag.php');
                    }
                    ?>
                </div>
                <?php
                /*
                 * Show Category
                 */
                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                    $separator = '';
                    include(ET_PATH . 'inc/frontend/content/et-category.php');
                }
                ?>
                <div class="et-contain-main-inner">
                    <div class="et-title-meta-wrap">
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-meta-wrap et-clearfix">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <span class="dashicons dashicons-admin-users"></span>
                                    <?php
                                    the_author_posts_link();
                                    ?>
                                </div>
                                <?php
                            }
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-wrap">
                                    <span class="dashicons dashicons-admin-comments"></span>
                                    <div class="et-comment">
                                        <?php
                                        echo comments_number();
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <div class="et-lower-meta et-clearfix">
                        <?php
                        /*
                         * Read More
                         */
                        include(ET_PATH . 'inc/frontend/inner/button.php');
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social-class.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-8' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item et-clearfix <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-main-wrap-contain">
            <div class="et-icon-block">
                <?php
                include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                ?>
            </div>
            <div class="et-circle"></div>
        </div>
        <div class="et-template-outer-contain">
            <?php
            /*
             * Date
             */

            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date">
                    <div class="et-date-second-wrap">
                        <div class="et-date-day">
                            <?php echo get_the_date( 'd' ); ?>
                        </div>
                        <div class="et-month">
                            <?php echo get_the_date( 'M' ); ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-inner-content">
                    <div class="et-first-layer">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');

                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                    </div>
                    <div class="et-contain-main-inner">
                        <div class="et-main-wrap-middle">
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-meta-wrap">
                                <?php
                                /*
                                 * Display comment count
                                 */
                                if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                    ?>
                                    <div class="et-comment-wrap">
                                        <span class="dashicons dashicons-admin-comments"></span>
                                        <?php
                                        echo comments_number();
                                        ?>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' / ';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                ?>
                            </div>
                            <div class="et-content">
                                <?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');

                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/button.php');
                                ?>
                            </div>
                        </div>
                        <div class="et-lower-meta et-clearfix">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <div class="et-author-actual-name">
                                        <?php
                                        echo get_avatar( get_the_author_meta( 'ID' ), 56 );
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <?php include(ET_PATH . 'inc/frontend/inner/social-class.php'); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-9' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle et-clearfix">
            <div class="et-timeline-inner-circle"></div>
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date"><?php
                    echo get_the_date( $date_format );
                    ?></div>
                <?php
            }

            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-bottom-wrap-main-content">
                    <div class="et-meta-wrap et-clearfix">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <span>
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                </span>
                            </div>

                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-main-wrap">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-content-outer-wrap">
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                    <div class="et-bottom-wrap et-clearfix">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $pre_tag = '';
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php _e( 'Share: ', ET_TD ); ?>
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-10' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle">
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date"><?php
                    echo get_the_date( $date_format );
                    ?></div>
                <?php
            }

            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block et-clearfix">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-bottom-wrap-main-content">
                    <div class="et-main-wrap">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-meta-wrap et-clearfix">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php
                                    the_author_posts_link();
                                    ?>
                                </div>
                                <?php
                            }
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-wrap">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="et-content-outer-wrap">
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                    <div class="et-bottom-wrap et-clearfix">
                        <?php
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }

                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = ' , ';
                            $pre_tag = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-11' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" data-current="<?php echo $current_date; ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>" >
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
             ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <?php
                /*
                 * Date
                 */
                if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                    ?>
                    <div class="et-date"><?php
                        echo get_the_date( $date_format );
                        ?></div>
                    <?php
                }
                ?>
                <?php
                include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                ?>
                <div class="et-image-inner-right-content-wrap et-clearfix">
                    <div class="et-image-inner-block">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-right-content">
                        <div class="et-main-wrap">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            ?>
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-meta-wrap et-clearfix">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <?php
                                        echo _e( 'By ', ET_TD );
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Display comment count
                                 */
                                if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                    ?>
                                    <div class="et-comment-wrap">
                                        <?php
                                        echo comments_number();
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <div class="et-bottom-wrap et-clearfix">
                                <?php
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/button.php');
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $pre_tag = '';
                                    $separator = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-12' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-upper-wrap">
            <div class="et-timeline-ring"></div>
            <?php
            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <div class="et-date-meet-wrap">
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date"><?php
                    echo get_the_date( $date_format );
                    ?></div>
            <?php }
            ?>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-inner-block">
                    <div class="et-image-header-wrap">
                        <?php
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }

                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <?php
                                echo _e( 'By ', ET_TD );
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-bottom-wrap-main-content">
                        <div class="et-main-wrap">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            ?>
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-content-outer-wrap">
                                <div class="et-content"><?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?></div>
                                <?php
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/button.php');
                                ?>
                            </div>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = ' , ';
                                $pre_tag = '';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    <div class="et-inner-share">
                                        <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-13' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-upper-wrap">
            <div class="et-timeline-ring"></div>
            <?php
            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <?php
        /*
         * Date
         */
        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
            ?>
            <div class="et-date"><?php
                echo get_the_date( $date_format );
                ?></div>
        <?php }
        ?>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
            ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <div class="et-image-contain">
                    <?php
                    /*
                     * Show Category
                     */
                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                        $separator = '';
                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                    }
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                </div>
                <div class="et-bottom-wrap-main-content">
                    <div class="et-main-wrap">
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-image-header-wrap">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <?php
                                    echo _e( 'By ', ET_TD );
                                    the_author_posts_link();
                                    ?>
                                </div>
                                <?php
                            }
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-wrap">
                                    <?php
                                    echo comments_number();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="et-content-outer-wrap">
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                    <div class="et-bottom-wrap et-clearfix">
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = ', ';
                            $pre_tag = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-14' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle">
            <?php
            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block">
                <?php
                /*
                 * Date
                 */
                if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                    ?>
                    <div class="et-date"><?php
                        echo get_the_date( $date_format );
                        ?></div>
                <?php }
                ?>
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-bottom-wrap-main-content">
                    <div class="et-main-wrap">
                        <div class="et-author-and-cat-wrap">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <?php
                                    the_author_posts_link();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-content-outer-wrap">
                            <div class="et-content"><?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                    <div class="et-bottom-wrap et-clearfix">
                        <div class="et-comment-outer-wrap">
                            <?php
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-icon">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                </div>
                                <div class="et-comment-wrap">
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-container">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                                <div class="et-share-wrap">
                                    <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                </div>
                            </div>
                            <?php
                        }

                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $pre_tag = '';
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-15' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <div class="et-timeline-date-inner">
                <div class="et-timeline-date-inner-inner">
                    <span><?php echo get_the_date( 'Y' ); ?></span>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"

         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-item-main-inner">
            <div class="et-icon-main-wrap">
                <?php
                include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                ?>
            </div>
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date"><?php
                    echo get_the_date( $date_format );
                    ?>
                </div>
                <div class="et-square"></div>
                <div class="et-line"></div>
            <?php }
            ?>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-inner-block">
                    <div class="et-image-layer">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                    </div>
                    <div class="et-bottom-wrap-main-content">
                        <div class="et-main-wrap">
                            <div class="et-author-layer">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <?php
                                        echo _e( 'By: ', ET_TD );
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="et-comment-outer-wrap">
                                    <?php
                                    /*
                                     * Display comment count
                                     */
                                    if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                        ?>
                                        <div class="et-comment-wrap">
                                            <?php
                                            echo comments_number();
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-content-outer-wrap">
                                <div class="et-content"><?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?></div>
                                <?php
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/button.php');
                                ?>
                            </div>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $pre_tag = '#';
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-container">
                                    <div class="et-share-wrap">
                                        <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-16' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-fonts-wrap">
            <?php
            include(ET_PATH . 'inc/frontend/meta/et-icon.php');
            ?>
        </div>
        <div class="et-date-meet-wrap">
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-date"><?php
                    echo get_the_date( $date_format );
                    ?></div>
            <?php }
            ?>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-inner-block">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-bottom-wrap-main-content">
                        <div class="et-main-wrap">
                            <div class="et-meta-wrap">
                                <?php
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <?php
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Show Category
                                 */
                                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                    $separator = '';
                                    include(ET_PATH . 'inc/frontend/content/et-category.php');
                                }
                                ?>
                            </div>
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-content-outer-wrap">
                                <div class="et-content">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/button.php');
                                    ?>
                                </div>
                            </div>
                            <?php
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <div class="et-share-main-wrap">
                                        <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-wrap">
                                    <span class="dashicons dashicons-testimonial"></span>
                                    <?php
                                    echo comments_number();
                                    ?>
                                </div>
                                <?php
                            }
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = ', ';
                                $pre_tag = '';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-17' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-item-inner">
            <div class="et-timeline-circle">
                <div class="et-fonts-wrap">
                    <?php
                    include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                    ?>
                </div>
                <?php
                /*
                 * Date
                 */
                if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                    ?>
                    <div class="et-month-date"><?php
                        echo get_the_date( 'F' );
                        ?></div>
                    <div class="et-day-date"><?php
                        echo get_the_date( 'd' );
                        ?></div>
                    <?php
                }
                ?>
                <div class="et-triangle"></div>
            </div>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-inner-block et-clearfix">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-bottom-wrap-main-content">
                        <div class="et-main-wrap">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            ?>
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-meta-wrap et-clearfix">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <?php
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Display comment count
                                 */
                                if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                    ?>
                                    <div class="et-comment-wrap">
                                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                                        <?php
                                        echo get_comments_number();
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="et-content-outer-wrap">
                                <div class="et-content"><?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?></div>
                                <?php
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/button.php');
                                ?>
                            </div>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                </div>
                                <?php
                            }

                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = ', ';
                                $pre_tag = '';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix <?php
        if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
            $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo ' et-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item <?php
    if ( isset( $et_option[ 'et_display_filter' ] ) && $et_option[ 'et_display_filter' ] == '1' ) {
        $categories = get_the_terms( $post -> ID, $et_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= ' et-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo ' et-filter-all ' . trim( $output, $separator );
        }
    }
    ?> <?php
    if ( $timeline_date != $current_date ) {
        echo 'et-new-time-wrap';
    }
    ?>" <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>
             id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>"
         <?php } ?> data-time="<?php echo esc_attr( $timeline_date ); ?>">
        <div class="et-timeline-circle">
            <?php
            /*
             * Date
             */
            if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                ?>
                <div class="et-month-day-wrap">
                    <div class="et-month-date"><?php
                        echo get_the_date( 'M' );
                        ?></div>
                    <div class="et-day-date"><?php
                        echo get_the_date( 'j' );
                        ?></div>
                </div>

                <?php
            }
            ?>
            <div class="et-fonts-wrap">
                <?php
                include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                ?>
            </div>
        </div>
        <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    ?> data-wow-delay = ".25s"
            <?php } ?>  class="et-all-contain-here <?php
            if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                echo 'wow ';
                echo esc_attr( $et_option[ 'animation_type' ] );
                ?>
            <?php } ?>">
            <div class="et-inner-block et-clearfix">
                <?php
                include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-main-content">
                    <div class="et-main-wrap">
                        <div class="et-car-meta-wrap">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            ?>
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <?php
                                    the_author_posts_link();
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                        <div class="et-content"><?php
                            include(ET_PATH . 'inc/frontend/content/et-content.php');
                            ?>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            /*
                             * Display comment count
                             */
                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                ?>
                                <div class="et-comment-wrap">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                </div>
                                <?php
                            }
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = ',';
                                $pre_tag = '';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="et-content-outer-wrap">
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
$current_date = $timeline_date;
//include(ET_PATH . 'inc/frontend/inner/et-price.php');
