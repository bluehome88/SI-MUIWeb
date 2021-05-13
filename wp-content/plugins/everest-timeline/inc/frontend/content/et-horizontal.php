<?php
$random_num = rand( 10000, 99999 );
if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-1' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <?php //if ( $timeline_date != $current_date ) {
                ?>
                <div class="et-top-date-line">
                    <div class="et-timeline-date-one">
                        <?php echo get_the_date( $date_format ); ?>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <?php //}
                ?>
                <div class="et-hor-inner-block">
                    <div class="et-hor-inner-block-inner">
                        <div class="et-hor-top-header">
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
                        <div class="et-img-share-wrap">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                            ?>
                            <?php
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <div class="et-share-wrap-another">
                                        <div class="et-share-wrap-inner">
                                            <i class="fa fa-share" aria-hidden="true"></i>
                                        </div>
                                        <div class="et-share-wrap-inner-wrap">
                                            <?php
                                            include(ET_PATH . 'inc/frontend/inner/social.php');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="et-bottom-wrap-main">
                            <div class="et-content-outer-wrap">
                                <div class="et-content">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?>
                                </div>
                                <?php
                                include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                ?>
                            </div>
                            <div class= "et-bottom-wrap">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = '';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                ?>
                            </div>
                        </div>
                    </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-2' ) {
    ?>
    <div class="et-outer-date-container et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-timeline-hor-line"></div>
                        <div class="et-horiz-title">
                            <?php echo wp_trim_words( get_the_title(), 4, '...' ); ?>
                        </div>
                        <div class="et-horizontal-circle"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-outer-post-container et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li class="et-clearfix">
                    <div class="et-sidebar-wrap">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                            ?>
                            <div class="et-date-main">
                                <div class="et-date-day">
                                    <?php echo get_the_date( 'd' ); ?>
                                </div>
                                <div class="et-month">
                                    <?php echo get_the_date( 'M Y' ); ?>
                                </div>
                            </div>
                            <?php
                        }
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <i class="fa fa-user-o" aria-hidden="true"></i>
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
                            ?>
                            <div class="et-category-wrap">
                                <?php
                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                    $categories = get_the_category();
                                } else {
                                    $categories = $categories = get_the_terms( get_the_ID(), $et_option[ 'select_post_taxonomy' ] );
                                }
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                    }
                                    ?>
                                    <div class="et-category-list">
                                        <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                                        <?php
                                        echo trim( $output, $separator );
                                        ?>
                                    </div>
                                <?php }
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
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            global $post;
                            if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                $tags = get_the_tags();
                            } else {
                                $tags = get_the_terms( get_the_ID(), $et_option[ 'select_post_taxonomy' ] );
                            }
                            $separator = '  ';
                            $output = '';

                            if ( ! empty( $tags ) ) {
                                $item = 1;
                                foreach ( $tags as $tag ) {
                                    if ( $item == 1 ) {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . '<span class="icon_tag_alt" aria-hidden="true"></span>' . esc_html( $tag -> name ) . '</a>' . $separator;
                                    } else {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                    }
                                    $item ++;
                                }
                                ?>
                                <div class="et-tag-list">
                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="et-content-block">
                        <?php
                        include(ET_PATH . 'inc/frontend/inner/title.php');
                        include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                        ?>
                        <div class="et-content">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-content.php');
                            ?>
                        </div>
                        <div class="et-lower-meta et-clearfix">
                            <?php
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <div class="et-share-wrap-contain">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                        ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-3' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-timeline-hor-line"></div>
                        <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                        <div class="et-horizontal-circle"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-three-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-clearfix">
                        <div class="et-image-container">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <?php
                                    echo get_avatar( get_the_author_meta( 'ID' ), 46 );
                                    the_author_posts_link();
                                    ?>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="et-bottom-wrap">
                            <div class="et-content-container">
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
                                <div class="et-meta-and-content-wrap et-clearfix">
                                    <div class="et-meta-wrap">
                                        <?php
                                        /*
                                         * Date
                                         */

                                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                                            ?>
                                            <div class="et-date-main">
                                                <div class="et-date-day">
                                                    <?php echo get_the_date( 'd' ); ?>
                                                </div>
                                                <div class="et-month">
                                                    <?php echo get_the_date( 'M Y' ); ?>
                                                </div>
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
                                    <div class="et-content">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?>
                                    </div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                    ?>
                                </div>
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    global $post;
                                    if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {
                                        $tags = get_the_tags();
                                    } else {
                                        $tags = get_the_terms( get_the_ID(), $et_option[ 'select_post_taxonomy' ] );
                                    }
                                    $separator = '  ';
                                    $output = '';
                                    if ( ! empty( $tags ) ) {
                                        foreach ( $tags as $tag ) {
                                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                        }
                                        ?>
                                        <div class="et-tag-list">
                                            <span>
                                                <?php
                                                _e( 'Tags', ET_TD );
                                                ?>
                                            </span>
                                            <?php
                                            echo "<div class='et-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="et-lower-meta et-clearfix">
                                <?php
                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="et-share-wrap">
                                        <?php _e( 'Share: ', ET_TD ); ?>
                                        <div class = "et-share-wrap-contain">
                                            <?php
                                            include(ET_PATH . 'inc/frontend/inner/social.php');
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-4' ) {
    ?>
    <div class="et-horizontal-line"> </div>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-bottom-date-line">
                    <?php if ( $timeline_date != $current_date ) {
                        ?>
                        <div class="et-timeline-line"></div>
                        <div class="et-timeline-date ">
                            <span>
                                <?php echo get_the_date( 'Y' ); ?>
                            </span>
                        </div>
                    <?php }
                    ?>
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
                    <div class="et-timeline-date-one">
                        <span><?php echo get_the_date( 'd' ); ?></span>
                        <span><?php echo get_the_date( 'M' ); ?></span>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <?php
                    /*
                     * Show Category
                     */
                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                        $separator = '';
                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                    }
                    ?>
                    <div class="et-content-block-wrap">
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
                                    _e( 'By ', ET_TD );
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
                            <div class="et-content"> <?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                            ?>
                        </div>
                        <div class="et-bottom-wrap et-clearfix">
                            <?php
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = ' ';
                                $pre_tag = '#';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
                            }
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/social.php');
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-5' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
                    <div class="et-timeline-line"></div>
                    <div class="et-timeline-date-one">
                        <span><?php echo get_the_date( $date_format ); ?></span>
                    </div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <div class="et-first-wrap">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-media-type.php');
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
                        <div class="et-second-wrap">
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-meta-wrap">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <?php
                                        _e( 'by ', ET_TD );
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
                                <div class="et-content"> <?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?></div>
                                <?php
                                include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                ?>
                            </div>
                            <div class="et-bottom-wrap  et-clearfix">
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
                                    <div class="et-inner-share">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-6' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
                    <div class="et-timeline-date-one">
                        <span><?php echo get_the_date( $date_format ); ?></span>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-inner-wrap-contain-main">
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
                                    _e( 'By ', ET_TD );
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
                            <div class="et-content"> <?php
                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                ?></div>
                            <?php
                            include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                            ?>
                        </div>
                        <div class="et-bottom-wrap">
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
                                    <i class="fa fa-share-alt" aria-hidden="true"></i>
                                    <div class="et-inner-share">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-7' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <?php
                if ( $timeline_date != $current_date ) {
                    ?>
                    <div class="et-side-date">
                        <div class="et-timeline-year">
                            <?php //echo get_the_date( 'Y' );     ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="et-top-date-line">
                    <div class="et-timeline-date-one">
                        <?php echo get_the_date( 'F d, Y' ); ?>
                    </div>
                </div>
                <div class="et-timeline-line"></div>
                <div class="et-hor-inner-block">
                    <div class="et-main-block">
                        <div class="et-main-blog-line"></div>
                        <div class="et-main-blog-circle"></div>
                        <div class="et-icon-block">
                            <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                        </div>
                        <?php include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        ?>
                        <div class="et-bottom-grid-wrap">
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
                                 * Show Category
                                 */
                                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                    $separator = '';
                                    include(ET_PATH . 'inc/frontend/content/et-category.php');
                                }
                                ?>
                            </div>
                            <div class="et-content-outer-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                <div class="et-content">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                </div>
                                <?php
                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="et-share-wrap">
                                        <div class="et-share-wrap-contain">
                                            <?php
                                            include(ET_PATH . 'inc/frontend/inner/social.php');
                                            ?>
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
                                        <span class="icon_comment_alt" aria-hidden="true"></span>
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
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-8' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <?php if ( $timeline_date != $current_date ) {
                    ?>
                    <div class="et-side-date">
                        <div class="et-timeline-year">
                            <span><?php //echo get_the_date( 'Y' );                                                                                                                                                                                                         ?></span>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="et-top-date-line">
                    <div class="et-timeline-date-one">
                        <?php echo get_the_date( $date_format ); ?>
                    </div>
                    <div class="et-timeline-line"></div>
                    <div class="etn-icon-line-block">
                        <div class="etn-icon-line"></div>
                        <div class="et-icon-block">
                            <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                        </div>
                    </div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-wrap-contain">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        ?>
                        <div class="et-center-wrap">
                            <div class="et-template-column-content">
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
                                        include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                        /*
                                         * Read More
                                         */
                                        include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                        ?>
                                    </div>
                                    <?php
                                    if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                        ?>
                                        <div class="et-share-wrap">
                                            <div class="et-share-wrap-contain">
                                                <?php
                                                include(ET_PATH . 'inc/frontend/inner/social.php');
                                                ?>
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
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-9' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                        <div class="et-horizontal-circle"></div>
                        <div class="et-timeline-hor-line"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-three-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class=" et-list-inner-wrap ">
                        <div class="et-outer-wrap et-clearfix">
                            <div class="et-first-inner-wrap ">
                                <div class="et-image">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-bottom-wrap et-second-inner-wrap">
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
                                            _e( 'By ', ET_TD );
                                            the_author_posts_link();
                                            ?>
                                        </div>
                                    <?php }
                                    ?>
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
                                <div class="et-content">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                    ?>
                                </div>
                                <?php
                                include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                /*
                                 * Read More
                                 */
                                include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                ?>
                            </div>
                        </div>
                        <div class="et-meta-two-wrap et-clearfix">
                            <?php
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                global $post;
                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                    $tags = get_the_tags();
                                } else {
                                    if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
                                        $taxonomy_tag = 'product_tag';
                                    } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
                                        $taxonomy_tag = 'download_tag';
                                    } else {
                                        $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
                                    }
                                    $tags = get_the_terms( $post -> ID, $taxonomy_tag );
                                }
                                $separator = '  ';
                                $output = '';
                                if ( ! empty( $tags ) ) {
                                    foreach ( $tags as $tag ) {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                    }
                                    ?>
                                    <div class="et-tag-list">
                                        <?php
                                        echo trim( $output, $separator );
                                        ?>
                                        <?php
                                        _e( 'Tags', ET_TD );
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                ?>
                                <div class="et-share-wrap">
                                    <?php
                                    _e( 'Share: ', ET_TD );
                                    include(ET_PATH . 'inc/frontend/inner/social.php');
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-10' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                        <div class="et-horizontal-circle">
                            <div class="et-icon-block">
                                <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                            </div>
                        </div>
                        <div class="et-timeline-hor-line"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-three-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class=" et-list-inner-wrap ">
                        <div class="et-outer-wrap et-clearfix">
                            <div class="et-first-inner-wrap ">
                                <div class="et-image">
                                    <?php
                                    include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-center-wrap">
                                <div class="et-second-inner-wrap">
                                    <div class="et-meta-wrap">
                                        <?php
                                        /*
                                         * Show Author
                                         */
                                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                            ?>
                                            <div class="et-author-name">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                <?php
                                                the_author_posts_link();
                                                ?>
                                            </div>
                                        <?php }
                                        ?>
                                        <?php
                                        /*
                                         * Display comment count
                                         */
                                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                            ?>
                                            <div class="et-comment-wrap">
                                                <i class="fa fa-comment" aria-hidden="true"></i>
                                                <?php
                                                echo comments_number();
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/title.php');
                                    /*
                                     * Show Category
                                     */
                                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                        $separator = '';
                                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                                    }
                                    ?>
                                    <div class="et-content">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?>
                                    </div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                    <div class="et-meta-two-wrap et-clearfix">
                                        <?php
                                        /*
                                         * Show Tag
                                         */
                                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                            $separator = '  ';
                                            $pre_tag = '';
                                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                        }
                                        ?>
                                        <?php
                                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                            ?>
                                            <div class="et-share-wrap">
                                                <?php
                                                _e( 'Share ', ET_TD );
                                                include(ET_PATH . 'inc/frontend/inner/social.php');
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-11' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <?php
                //  if ( $timeline_date != $current_date ) {
                ?>
                <div class="et-timeline-date-one">
                    <span><?php echo get_the_date( 'F' ); ?>
                        <?php echo get_the_date( 'Y' ); ?>
                    </span>
                </div>
                <?php
                //  }
                ?>
                <div class="et-top-date-line">
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
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
                                </div>
                                <?php
                            }
                            ?>
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
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-bottom-wrap et-clearfix">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' ';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="et-share-wrap">
                                        <?php
                                        _e( 'Share: ', ET_TD );
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-12' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-icon-block">
                    <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                </div>
                <div class="et-timeline-line"></div>
                <div class="et-timeline-date-one">
                    <?php echo get_the_date( $date_format ); ?>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <div class="et-image-layer">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                            ?>
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                $separator = '';
                                include(ET_PATH . 'inc/frontend/content/et-category.php');
                            }
                            ?>
                        </div>
                        <div class="et-main-content">
                            <div class="et-meta-wrap et-clearfix">
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
                                </div>
                                <?php
                            }
                            ?>
                            <div class="et-main-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                <div class="et-content-outer-wrap">
                                    <div class="et-content"><?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?></div>
                                    <?php
                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-bottom-wrap et-clearfix">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' ';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="et-share-wrap">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-13' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-top-date-line-circle et-timeline-date-one">
                        <div class="et-top-date-line-circle-inner">
                            <div class="et-icon-block">
                                <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                            </div>
                            <?php echo get_the_date( 'M j Y' ); ?>
                        </div>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        ?>
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                        <div class="et-bottom-wrap-main-content et-second-wrap">
                            <div class="et-main-wrap">
                                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                <div class="et-meta-wrap et-clearfix">
                                    <?php
                                    /*
                                     * Show Author
                                     */
                                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                        ?>
                                        <div class="et-author-name">
                                            By
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
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="et-content-outer-wrap">
                                    <div class="et-content"><?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?></div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-bottom-wrap et-clearfix ">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' ';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="et-share-wrap et-inner-share">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-14' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-timeline-date-one">
                        <div class="et-icon-block">
                            <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                        </div>
                        <div class="et-date-inner">
                            <div class="et-month-date">
                                <?php echo get_the_date( 'M j' ); ?>
                            </div>
                            <div class="et-date">
                                <?php echo get_the_date( 'Y' ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <div class="et-image-wrap">
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
                        <div class="et-main-content">
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
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="et-main-wrap">
                                <div class="et-content-outer-wrap">
                                    <div class="et-content"><?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?></div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="et-bottom-wrap et-car-metadata-wrap">
                            <?php
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
                                <div class="et-share-wrap et-share-container">
                                    <?php include(ET_PATH . 'inc/frontend/inner/social.php'); ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-15' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
                    <div class="et-timeline-date-one">
                        <?php echo get_the_date( 'M d Y' ); ?>
                    </div>
                    <div class="et-timeline-line"></div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <div class="et-image-container">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                            ?>
                        </div>
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
                                ?>
                                <div class="et-content-outer-wrap">
                                    <div class="et-content"><?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?></div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                </div>
                            </div>
                            <div class="et-bottom-wrap et-clearfix">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' ';
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
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-16' ) {
    ?>
    <ul class="et-timeline-one" data-id = "<?php echo $random_num ?>" data-template = "<?php echo esc_attr( $et_option[ 'timeline_horizontal_template' ] ); ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
            $timeline_date = get_the_date( 'Y' );
            ?>
            <li>
                <div class="et-top-date-line">
                    <div class="et-icon-block">
                        <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                    </div>
                    <div class="et-timeline-date-one">
                        <span><?php echo get_the_date( 'M j, Y' ); ?></span>
                    </div>
                </div>
                <div class="et-hor-inner-block">
                    <div class="et-inner-block">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        ?>
                        <div class="et-center-wrap">
                            <div class="et-bottom-wrap-main-content">
                                <div class="et-meta-wrap et-clearfix">
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
                                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                    <div class="et-content-outer-wrap">
                                        <div class="et-content"><?php
                                            include(ET_PATH . 'inc/frontend/content/et-content.php');
                                            ?></div>
                                        <?php
                                        include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                        /*
                                         * Read More
                                         */
                                        include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                        ?>
                                    </div>
                                </div>
                                <div class="et-bottom-wrap et-clearfix">
                                    <?php
                                    /*
                                     * Show Tag
                                     */
                                    if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                        $separator = ' ';
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
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-17' ) {
    ?>
    <div class="et-hor-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-clearfix">
                        <div class="et-inner-wrap">
                            <div class="et-date"><?php echo get_the_date( 'M j Y' ); ?></div>
                            <div class="et-inner-wrap-contain ">
                                <?php
                                include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                                ?>
                                <div class="et-center-wrap">
                                    <div class="et-bottom-grid-wrap">
                                        <div class="et-upper-layer">
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
                                             * Show Category
                                             */
                                            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                                $separator = '';
                                                include(ET_PATH . 'inc/frontend/content/et-category.php');
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
                                        <div class="et-bottom-wrap">
                                            <div class="et-content-container">
                                                <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                                <div class="et-content">
                                                    <?php
                                                    include(ET_PATH . 'inc/frontend/content/et-content.php');
                                                    ?>
                                                </div>
                                                <?php
                                                include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                                /*
                                                 * Read More
                                                 */
                                                include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                                ?>
                                            </div>
                                            <?php
                                            /*
                                             * Show Tag
                                             */
                                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                                global $post;
                                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                                    $tags = get_the_tags();
                                                } else {
                                                    if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
                                                        $taxonomy_tag = 'product_tag';
                                                    } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
                                                        $taxonomy_tag = 'download_tag';
                                                    } else {
                                                        $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
                                                    }
                                                    $tags = get_the_terms( $post -> ID, $taxonomy_tag );
                                                }
                                                $separator = '  ';
                                                $output = '';
                                                if ( ! empty( $tags ) ) {
                                                    foreach ( $tags as $tag ) {
                                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                                    }
                                                    ?>
                                                    <div class="et-tag-list">
                                                        <?php
                                                        echo "<div class='et-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="et-lower-meta et-clearfix">
                                                <?php
                                                if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                                    ?>
                                                    <div class="et-share-wrap">
                                                        <div class = "et-share-wrap-contain">
                                                            <?php
                                                            include(ET_PATH . 'inc/frontend/inner/social.php');
                                                            ?>
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
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-timeline-hor-line"></div>
                        <div class="et-horizontal-circle"></div>
                        <div class="et-icon-block">
                            <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                        </div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-18' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-icon-block">
                            <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                        </div>
                        <div class="et-timeline-hor-line"></div>
                        <div class="et-date"><?php echo get_the_date( 'M j Y' ); ?></div>
                        <div class="et-horizontal-circle"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-three-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-item-inner et-clearfix">
                        <div class="et-image-container">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                            ?>
                            <div class="et-first-layer">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                    ?>
                                    <div class="et-author-name">
                                        <i class="fa fa-user-o" aria-hidden="true"></i>
                                        <?php
                                        echo
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
                            <div class="et-second-layer">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                    $separator = ' ';
                                    $pre_tag = '';
                                    include(ET_PATH . 'inc/frontend/content/et-tag.php');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="et-center-wrap">
                            <div class="et-side-wrap">
                                <div class="et-content-container">
                                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                    <div class="et-content">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?>
                                    </div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    ?>
                                    <div class="et-meta-and-content-wrap et-clearfix">
                                        <div class="et-car-bottom-wrap">
                                            <?php
                                            /*
                                             * Display comment count
                                             */
                                            if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                                                ?>
                                                <div class="et-comment-outer-wrap">
                                                    <div class="et-comment-wrap">
                                                        <?php
                                                        echo get_comments_number();
                                                        ?>
                                                    </div>
                                                    <div class="et-comment-icon">
                                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <?php
                                            }

                                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                                ?>
                                                <div class=" et-share-container">
                                                    <i class="fa fa-share" aria-hidden="true"></i>
                                                    <div class = "et-share-wrap">
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
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-19' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <div class="et-date-icon-wrap">
                        <a data-slide-index="<?php echo $count ++; ?>" href="">
                            <?php if ( $count % 2 == 0 ) { ?>
                                <div class="et-date et-up"><?php echo get_the_date( 'M j Y' ); ?></div>
                                <div class="et-timeline-hor-line"></div>
                                <div class="et-icon-block et-down">
                                    <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                                </div>
                            <?php } else {
                                ?>
                                <div class="et-icon-block et-up">
                                    <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                                </div>
                                <div class="et-timeline-hor-line"></div>
                                <div class="et-date et-down"><?php echo get_the_date( 'M j Y' ); ?></div>
                            <?php }
                            ?>
                            <div class="et-horizontal-circle"></div>
                        </a>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-inner-wrap">
                        <div class="et-inner-wrap-contain ">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                            ?>
                            <div class="et-center-wrap">
                                <div class="et-bottom-grid-wrap">
                                    <div class="et-upper-layer">
                                        <?php
                                        /*
                                         * Show Category
                                         */
                                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                            $separator = '';
                                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                                        }
                                        ?>
                                    </div>
                                    <div class="et-second-layer">
                                        <?php
                                        /*
                                         * Show Author
                                         */
                                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                            ?>
                                            <div class="et-author-name">
                                                <?php
                                                echo _e( 'By ', ET_TD );
                                                echo the_author_posts_link();
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
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="et-bottom-wrap">
                                        <div class="et-content-container">
                                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                            <div class="et-content">
                                                <?php
                                                include(ET_PATH . 'inc/frontend/content/et-content.php');
                                                ?>
                                            </div>
                                            <?php
                                            include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                            /*
                                             * Read More
                                             */
                                            include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                            ?>
                                        </div>
                                        <?php
                                        /*
                                         * Show Tag
                                         */
                                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                            global $post;
                                            if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                                $tags = get_the_tags();
                                            } else {
                                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
                                                    $taxonomy_tag = 'product_tag';
                                                } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
                                                    $taxonomy_tag = 'download_tag';
                                                } else {
                                                    $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
                                                }
                                                $tags = get_the_terms( $post -> ID, $taxonomy_tag );
                                            }
                                            $separator = '  ';
                                            $output = '';
                                            if ( ! empty( $tags ) ) {
                                                foreach ( $tags as $tag ) {
                                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                                }
                                                ?>
                                                <div class="et-tag-list">
                                                    <?php
                                                    echo "<div class='et-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="et-lower-meta et-clearfix">
                                            <?php
                                            if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                                ?>
                                                <div class="et-share-wrap">
                                                    <div class = "et-share-wrap-contain">
                                                        <?php
                                                        include(ET_PATH . 'inc/frontend/inner/social.php');
                                                        ?>
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
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_horizontal_template' ] ) && $et_option[ 'timeline_horizontal_template' ] == 'template-20' ) {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <div class="et-icon-line-wrap">
                        <a data-slide-index="<?php echo $count ++; ?>" href="">
                            <div class="et-date"><?php echo get_the_date( 'M j Y' ); ?></div>
                            <div class="et-timeline-hor-line"></div>
                            <div class="et-icon-block">
                                <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                            </div>

                            <div class="et-horizontal-circle"></div>
                        </a>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-inner-wrap ">
                        <div class="et-inner-wrap-contain ">
                            <div class="et-image-category-wrap">
                                <?php
                                include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                                ?>
                                <div class="et-upper-layer">
                                    <?php
                                    /*
                                     * Show Category
                                     */
                                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                        $separator = '';
                                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="et-contain-all">
                                <div class="et-second-layer">
                                    <?php
                                    /*
                                     * Show Author
                                     */
                                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                        ?>
                                        <div class="et-author-name">
                                            <?php
                                            echo _e( 'By: ', ET_TD );
                                            echo the_author_posts_link();
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
                                    <?php }
                                    ?>
                                </div>
                                <div class="et-content-container">
                                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                    <div class="et-bottom-wrap et-clearfix">
                                        <?php
                                        /*
                                         * Show Tag
                                         */
                                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                            global $post;
                                            if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                                $tags = get_the_tags();
                                            } else {
                                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
                                                    $taxonomy_tag = 'product_tag';
                                                } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
                                                    $taxonomy_tag = 'download_tag';
                                                } else {
                                                    $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
                                                }
                                                $tags = get_the_terms( $post -> ID, $taxonomy_tag );
                                            }
                                            $separator = '  ';
                                            $output = '';
                                            if ( ! empty( $tags ) ) {
                                                foreach ( $tags as $tag ) {
                                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . '#' . esc_html( $tag -> name ) . '</a>' . $separator;
                                                }
                                                ?>
                                                <div class="et-tag-list">
                                                    <?php
                                                    echo "<div class='et-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                        }

                                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                            ?>
                                            <div class="et-share-wrap">
                                                <div class = "et-share-wrap-contain">
                                                    <?php
                                                    include(ET_PATH . 'inc/frontend/inner/social.php');
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="et-content">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        ?>
                                    </div>
                                    <?php
                                    /*
                                     * Read More
                                     */
                                    include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else {
    ?>
    <div class="et-hor-three-outer-wrap et-horz-bx">
        <ul class="et-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="et-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                ?>
                <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="et-icon-date-wrap-line">
                            <div class="et-timeline-hor-line"></div>
                            <div class="et-icon-date-wrap">
                                <div class="et-icon-block">
                                    <?php include(ET_PATH . 'inc/frontend/meta/et-icon.php'); ?>
                                </div>
                                <div class="et-date"><?php echo get_the_date( 'M j Y' ); ?></div>
                            </div>
                        </div>
                    </a>

                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="et-hor-outer-wrap et-post-bx">
        <ul class="et-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $et_extra_option = get_post_meta( $post -> ID, 'et_extra_option', true );
                ?>
                <li>
                    <div class="et-clearfix">
                        <div class="et-first-inner-wrap">
                            <?php
                            include(ET_PATH . 'inc/frontend/content/et-slide-media.php');
                            ?>
                            <div class="et-upper-layer">
                                <?php
                                /*
                                 * Show Category
                                 */
                                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                                    $separator = '';
                                    include(ET_PATH . 'inc/frontend/content/et-category.php');
                                }
                                ?>
                            </div>
                        </div>
                        <div class="et-second-inner-wrap">
                            <div class="et-second-layer">
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
                                <?php }
                                ?>
                            </div>
                            <div class="et-bottom-wrap">
                                <div class="et-content-container">
                                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                                    <div class="et-content">
                                        <?php
                                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                                        /*
                                         * Read More
                                         */
                                        include(ET_PATH . 'inc/frontend/inner/horizontal-button.php');
                                        ?>
                                    </div>
                                    <?php
                                    include(ET_PATH . 'inc/frontend/inner/woo-buttons.php');

                                    /*
                                     * Show Author
                                     */
                                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                        ?>
                                        <div class="et-author-name">
                                            <?php
                                            echo _e( 'Posted By ', ET_TD );
                                            echo the_author_posts_link();
                                            ?>
                                        </div>
                                    <?php }
                                    ?>
                                    <div class="et-lower-meta et-clearfix">
                                        <?php
                                        /*
                                         * Show Tag
                                         */
                                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                            global $post;
                                            if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'post' ) {

                                                $tags = get_the_tags();
                                            } else {
                                                if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'product' ) {
                                                    $taxonomy_tag = 'product_tag';
                                                } else if ( isset( $et_option[ 'post_type' ] ) && $et_option[ 'post_type' ] == 'download' ) {
                                                    $taxonomy_tag = 'download_tag';
                                                } else {
                                                    $taxonomy_tag = isset( $et_option[ 'show_post_tag_taxonomy' ] ) ? esc_attr( $et_option[ 'show_post_tag_taxonomy' ] ) : 'post_tag';
                                                }
                                                $tags = get_the_terms( $post -> ID, $taxonomy_tag );
                                            }
                                            $separator = '  ';
                                            $output = '';
                                            if ( ! empty( $tags ) ) {
                                                foreach ( $tags as $tag ) {
                                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ET_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                                }
                                                ?>
                                                <div class="et-tag-list">
                                                    <?php
                                                    echo "<div class='et-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                        }

                                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                                            ?>
                                            <div class="et-share-wrap">
                                                <div class = "et-share-wrap-contain">
                                                    <?php
                                                    include(ET_PATH . 'inc/frontend/inner/social.php');
                                                    ?>
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
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
