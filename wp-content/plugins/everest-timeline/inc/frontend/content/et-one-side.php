<?php
if ( isset( $et_option[ 'timeline_one_side_template' ] ) && $et_option[ 'timeline_one_side_template' ] == 'template-1' ) {
    ?>
    <div class="et-timeline-line"></div>
    <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>

        <div id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" class="et-timeline-history" data-time="<?php echo esc_attr( $timeline_date ); ?>" >
        <?php } ?>
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
        ?>">
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
                    <?php
                    include(ET_PATH . 'inc/frontend/inner/title.php');
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                <div class="et-inner-content">
                    <?php
                    /*
                     * Show Category
                     */
                    if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                        $separator = '';
                        include(ET_PATH . 'inc/frontend/content/et-category.php');
                    }
                    ?>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    include(ET_PATH . 'inc/frontend/inner/button.php');
                    ?>
                    <div class="et-content-outer-wrap et-meta-wrap">
                        <?php
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
                        <?php
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            $separator = '  ';
                            $pre_tag = '#';
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
        <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
            ?>

        </div>
        <?php
    }
} else if ( isset( $et_option[ 'timeline_one_side_template' ] ) && $et_option[ 'timeline_one_side_template' ] == 'template-2' ) {
    ?>
    <div class="et-timeline-line"></div>
    <?php
    if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>

        <div id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" class="et-timeline-history" data-time="<?php echo esc_attr( $timeline_date ); ?>" >
        <?php } ?>
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
        ?>">
                 <?php
                 //   if ( $timeline_date != $current_date ) {
                 ?>
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
                <div class="et-timeline-date-inner">
                    <div class="et-date-day">
                        <?php echo get_the_date( 'd' ); ?>
                    </div>
                    <div class="et-month">
                        <?php echo get_the_date( 'M' ); ?>
                    </div>
                </div>
            </div>
            <?php
            /*
             * Show Category
             */
            if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                $separator = '';
                include(ET_PATH . 'inc/frontend/content/et-category.php');
            }
            // }
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
                    <?php
                    include(ET_PATH . 'inc/frontend/inner/title.php');
                    /*
                     * Show Author
                     */
                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                        ?>
                        <div class="et-author-name">

                            <?php
                            _e( 'Posted by ', ET_TD );
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-content"><?php
                        include(ET_PATH . 'inc/frontend/content/et-content.php');
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    include(ET_PATH . 'inc/frontend/inner/button.php');
                    ?>
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
                            $separator = ' ';
                            $pre_tag = '#';
                            include(ET_PATH . 'inc/frontend/content/et-tag.php');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
            ?>
        </div>
        <?php
    }
} else if ( isset( $et_option[ 'timeline_one_side_template' ] ) && $et_option[ 'timeline_one_side_template' ] == 'template-3' ) {
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
                 <?php echo get_the_date( 'Y' ); ?>
        </div>
        <?php
    }
    if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>

        <div id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" class="et-timeline-history" data-time="<?php echo esc_attr( $timeline_date ); ?>" >
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
        ?>">
            <div class="et-icon-block">
                <div class="et-icon-block-main">
                    <?php
                    include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                    ?>
                </div>
                <div class="et-circle"></div>
                <?php
                /*
                 * Date
                 */
                if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                    ?>
                    <div class="et-date">
                        <?php echo get_the_date( $date_format ); ?></div>
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
                <div class="et-inner-content et-clearfix">
                    <?php
                    include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                    ?>
                    <div class="et-contain-main-inner">
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
                                $separator = ' | ';
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
        if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
            ?>
        </div>
        <?php
    }
} else if ( isset( $et_option[ 'timeline_one_side_template' ] ) && $et_option[ 'timeline_one_side_template' ] == 'template-4' ) {

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
                 <?php echo get_the_date( 'Y' ); ?>
        </div>
        <?php
    }
    if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>

        <div id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" class="et-timeline-history" data-time="<?php echo esc_attr( $timeline_date ); ?>" >
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
        ?>">
            <div class="et-icon-block">
                <div class="et-side-wrap">
                    <div class="et-icon">
                        <?php
                        include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                        ?>
                    </div>
                    <div class="et-first-date">
                        <?php echo get_the_date( 'd' ); ?>
                    </div>
                    <div class="et-second-date">
                        <?php echo get_the_date( 'M Y' ); ?>
                    </div>
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
                <div class="et-inner-content et-clearfix">
                    <div class="et-left-contain">
                        <?php
                        include(ET_PATH . 'inc/frontend/content/et-media-type.php');
                        ?>
                    </div>
                    <div class="et-contain-main-inner">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            $separator = '';
                            include(ET_PATH . 'inc/frontend/content/et-category.php');
                        }
                        ?>
                        <div class="et-title-n-author-wrap et-clearfix">
                            <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                            <div class="et-author-wrap">
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
                                ?>
                            </div>
                        </div>
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
                            ?>
                        </div>
                        <div class="et-content"><?php
                            include(ET_PATH . 'inc/frontend/content/et-content.php');
                            /*
                             * Read More
                             */
                            include(ET_PATH . 'inc/frontend/inner/button.php');
                            ?>
                        </div>
                        <div class="et-lower-meta et-clearfix">
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
        if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
            ?>
        </div>
        <?php
    }
} else {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-circle-n-date-wrap et-clearfix">
            <div class="et-date-circle">
                <span class="dashicons dashicons-calendar-alt"></span>
            </div>
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
                     <?php echo get_the_date( 'Y' ); ?>
            </div>
        </div>
        <?php
    }
    if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
        ?>

        <div id="<?php echo esc_attr( $id ); ?>" data-id="<?php echo esc_attr( $id ); ?>" class="et-timeline-history" data-time="<?php echo esc_attr( $timeline_date ); ?>" >
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
        ?>">
            <div class="et-circle"></div>
            <div <?php if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
            ?> data-wow-delay = ".25s"
                <?php } ?>  class="et-all-contain-here <?php
                if ( isset( $et_option[ 'et_show_animation' ] ) && $et_option[ 'et_show_animation' ] == '1' ) {
                    echo 'wow ';
                    echo esc_attr( $et_option[ 'animation_type' ] );
                    ?>
                <?php } ?>">
                <div class="et-outer-toggle-content">

                    <div class="et-side-wrap">
                        <?php
                        include(ET_PATH . 'inc/frontend/meta/et-icon.php');
                        ?>
                    </div>
                    <div class="et-date-open-wrap et-clearfix">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                            ?>
                            <div class="et-date">
                                <?php echo get_the_date( $date_format ); ?></div>
                            <?php
                        }
                        ?>
                        <div class="et-open-content">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <?php include(ET_PATH . 'inc/frontend/inner/title.php'); ?>
                </div>
                <div class="et-toggle-inner-content" <?php if ( $toggle_number !== 2 ) { ?>style="display: none; <?php } ?>">
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
                    <div class="et-contain-main-inner">
                        <div class="et-meta-wrap">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                                ?>
                                <div class="et-author-name">
                                    <?php
                                    _e( 'By: ', ET_TD );
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
                            ?>

                        </div>
                        <?php
                        /*
                         * Read More
                         */
                        include(ET_PATH . 'inc/frontend/inner/button.php');
                        ?>

                        <div class="et-lower-meta et-clearfix">
                            <?php
                            /*
                             * Show Tag
                             */
                            if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                                $separator = '  ';
                                $pre_tag = '#';
                                include(ET_PATH . 'inc/frontend/content/et-tag.php');
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
        <?php
        if ( isset( $et_option[ 'et_show_scrolling_nav' ] ) && $et_option[ 'et_show_scrolling_nav' ] == '1' ) {
            ?>
        </div>
        <?php
    }
}

$current_date = $timeline_date;

