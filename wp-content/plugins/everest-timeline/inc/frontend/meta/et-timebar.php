<div class="et-nav-history-bar et-nav-<?php echo esc_attr( $et_option[ 'et_nav_template' ] ); ?>">
    <?php
    //$i = 0;
    if ( isset( $et_option[ 'et_nav_template' ] ) && $et_option[ 'et_nav_template' ] == 'template-1' ) {
        ?>
        <div class="et-nav-one">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <?php
    }
    ?>
    <div class="et-time-wrap">
        <?php
        $year_array = array();
        $month_array = array();
        $id_array = array();
        $post_day_month_array = array();
        while ( $query -> have_posts() ) {
            $month_flag = array();
            $query -> the_post();
            $timeline_date = get_the_date( 'Y' );
            $post_month = get_the_date( 'm' );
            $post_day = get_the_date( 'j' );
            $day_month = $post_day . '_' . $post_month;
            $post_id = get_the_ID();
            $timeline_year = $timeline_date = get_the_date( 'Y' );
            $timeline_month = get_the_date( 'j M' );

            if ( ! in_array( $timeline_year, $year_array ) ) {
                $year_array[] = $timeline_year;
                $month_array[ $timeline_year ][] = $timeline_month;
                $id_array[ $timeline_year ][] = $post_id;
                $post_day_month_array[ $timeline_year ][] = $day_month;
            } else {
                if ( ! in_array( $timeline_month, $month_array[ $timeline_year ] ) ) {
                    $month_array[ $timeline_year ][] = $timeline_month;
                    $id_array[ $timeline_year ][] = $post_id;
                    $post_day_month_array[ $timeline_year ][] = $day_month;
                }
            }
        }

        if ( isset( $et_option[ 'et_nav_template' ] ) && $et_option[ 'et_nav_template' ] == 'template-2' ) {
            foreach ( $year_array as $timebar_year ) {
                ?>
                <div class="et-date-outer-wrap">
                    <div class="et-date-history">
                        <div class="et-year-wrap">
        <?php echo $timebar_year; ?>
                        </div>
                    </div>
                    <div class="et-month-day-wrap" style="display:none;">
        <?php
        $i = 0;
        foreach ( $month_array[ $timebar_year ] as $timebar_month ) {
            $href = 'et_' . $id_array[ $timebar_year ][ $i ] . '_' . $post_day_month_array[ $timebar_year ][ $i ] . '_' . $timebar_year;
            ?>
                            <a class="et-time-bar" id="et-each-history-<?php echo $i; ?>" href="#<?php echo $href; ?>">
                            <?php echo $timebar_month; ?>                 </a>
                                <?php
                                $i ++;
                            }
                            ?>
                    </div>
                </div>
        <?php
    }
} else {

    foreach ( $year_array as $timebar_year ) {
        $i = 0;
        foreach ( $month_array[ $timebar_year ] as $timebar_month ) {
            $href = 'et_' . $id_array[ $timebar_year ][ $i ] . '_' . $post_day_month_array[ $timebar_year ][ $i ] . '_' . $timebar_year;
            // echo $previous_date;
            $date = $timebar_month . ' ' . $timebar_year;
            if ( isset( $et_option[ 'et_nav_template' ] ) && $et_option[ 'et_nav_template' ] == 'template-1' ) {
                ?>
                        <a class="et-time-bar" id="et-each-history-<?php echo $i; ?>" href="#<?php echo $href; ?>">
                        <?php
                        echo $date;
                        ?>
                        </a>
                            <?php
                        } else if ( isset( $et_option[ 'et_nav_template' ] ) && $et_option[ 'et_nav_template' ] == 'template-3' ) {
                            ?>
                        <div class="et-icon-bar">
                            <a class="et-time-bar" id="et-each-history-<?php echo $i; ?>" href="#<?php echo $href; ?>">
                        <?php
                        $icon_type = isset( $et_extra_option[ 'icon_type' ] ) ? esc_attr( $et_extra_option[ 'icon_type' ] ) : 'icon';
                        if ( $icon_type == 'icon' ) {
                            ?>
                                    <i class="<?php echo esc_attr( $font_array[ $i ] ); ?>" aria-hidden="true"></i>
                            <?php
                        } else {
                            ?>
                                    <img src="<?php echo esc_url( $et_extra_option[ 'icon_image_url' ] ); ?>">
                                    <?php
                                }
                                echo $date;
                                ?>
                            </a>
                        </div>
                                <?php
                            } else if ( isset( $et_option[ 'et_nav_template' ] ) && $et_option[ 'et_nav_template' ] == 'template-4' ) {
                                ?>
                        <div class="et-icon-bar">
                            <div class="et-circle">
                                <a title="" class="et-time-bar" id="et-each-history-<?php echo $i; ?>" href="#<?php echo $href; ?>">
                                    <span class="et-initia-icon"></span>
                                </a>
                                <div class="et-tooltip">
                        <?php
                        $icon_type = isset( $et_extra_option[ 'icon_type' ] ) ? esc_attr( $et_extra_option[ 'icon_type' ] ) : 'icon';
                        if ( $icon_type == 'icon' ) {
                            ?>
                                        <i class="<?php echo esc_attr( $font_array[ $i ] ); ?>" aria-hidden="true"></i>
                    <?php
                } else {
                    ?>
                                        <img src="<?php echo esc_url( $et_extra_option[ 'icon_image_url' ] ); ?>">
                                        <?php
                                    }
                                    echo $date;
                                    ?>
                                </div>
                            </div>
                        </div>
                                <?php
                                } else {
                                    ?>
                        <div class = "et-icon-bar">
                            <a class = "et-time-bar" id = "et-each-history-<?php echo $i; ?>" href = "#<?php echo $href; ?>">
                                    <?php
                                    $icon_type = isset( $et_extra_option[ 'icon_type' ] ) ? esc_attr( $et_extra_option[ 'icon_type' ] ) : 'icon';
                                    if ( $icon_type == 'icon' ) {
                                        ?>
                                    <i class="<?php echo esc_attr( $font_array[ $i ] ); ?>" aria-hidden="true"></i>
                            <?php
                        } else {
                            ?>
                                    <img src="<?php echo esc_url( $et_extra_option[ 'icon_image_url' ] ); ?>">
                                    <?php
                                }
                                echo $date;
                                ?>
                            </a>
                        </div>
                                <?php
                            }

                            $i ++;
                        }
                    }
                }
                ?>
    </div>
</div>