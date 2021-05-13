<?php
$post_id = $atts[ 'id' ];
if ( isset( $et_option[ 'et_display_pagination' ] ) && $et_option[ 'et_display_pagination' ] == 1 ) {

    $per_page = ($et_option[ 'et_post_number' ] == '') ? 1 : esc_attr( $et_option[ 'et_post_number' ] );
    $total_items = $rowCount;
    $total_page = $total_items / $per_page;
    if ( $total_items % $per_page != 0 ) {
        $total_page = intval( $total_page ) + 1;
    }

    if ( $et_option[ 'et_select_pagination' ] == 'standard_pagination' ) {
        $pagination_layout_class = isset( $et_option[ 'et_standard_page_template' ] ) ? 'et-standard-page-' . esc_attr( $et_option[ 'et_standard_page_template' ] ) : 'et-standard-page-template-1';
        $upper_limit = ($total_page <= 5) ? $total_page : 5;
        if ( isset( $et_option[ 'et_standard_page_template' ] ) && $et_option[ 'et_standard_page_template' ] == 'template-1' ) {
            $next_arrow = "<i class='fa fa-angle-double-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-angle-double-left' aria-hidden='true'></i>";
        } else if ( isset( $et_option[ 'et_standard_page_template' ] ) && $et_option[ 'et_standard_page_template' ] == 'template-2' ) {
            $next_arrow = "<i class='fa fa-arrow-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-arrow-left' aria-hidden='true'></i>";
        } else if ( isset( $et_option[ 'et_standard_page_template' ] ) && $et_option[ 'et_standard_page_template' ] == 'template-3' ) {
            $next_arrow = 'Next';
            $prev_arrow = 'Previous';
        } else if ( isset( $et_option[ 'et_standard_page_template' ] ) && $et_option[ 'et_standard_page_template' ] == 'template-4' ) {
            $next_arrow = 'Next';
            $prev_arrow = 'Prev';
        } else {
            $next_arrow = "<i class='fa fa-long-arrow-right' aria-hidden='true'></i>";
            $prev_arrow = "<i class='fa fa-long-arrow-left' aria-hidden='true'></i>";
        }
        ?>
        <div class="et-pagination-block <?php echo $pagination_layout_class; ?>">
            <ul class="et-inner-paginate">
                <?php
                for ( $i = 1; $i <= $upper_limit; $i ++ ) {
                    ?>
                    <li><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-layout-type="<?php echo esc_attr( $et_option[ 'timeline_layout' ] ); ?>" data-post-id="<?php echo $post_id; ?>" data-page-number="<?php echo $i; ?>" data-next-arrow="<?php echo $next_arrow; ?>" data-prev-arrow="<?php echo $prev_arrow; ?>" class= "<?php echo ($i == 1) ? 'et-current-page' : ''; ?> et-page-link"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                <li class="et-next-page-wrap"><a href="javascript:void(0);" data-total-page="<?php echo $total_page; ?>" data-layout-type="<?php echo esc_attr( $et_option[ 'timeline_layout' ] ); ?>" data-post-id="<?php echo $post_id; ?>" data-page-number="2" data-next-arrow="<?php echo $next_arrow; ?>" data-prev-arrow="<?php echo $prev_arrow; ?>" class="et-next-page"><?php echo $next_arrow; ?></a></li>
            </ul>
            <img src="<?php echo ET_IMG_DIR . '/ajax-loader-add.gif'; ?>" class="et-ajax-loader" style="display:none;"/>
        </div>
        <?php
    } else if ( $et_option[ 'et_select_pagination' ] == 'load_more_button' ) {
        $load_more_layout_class = isset( $et_option[ 'et_load_more_template' ] ) ? 'et-load-more-' . esc_attr( $et_option[ 'et_load_more_template' ] ) : 'et-load-more-template-1';
        ?>
        <div class="et-load-more-block <?php echo $load_more_layout_class; ?>">
            <a class="et-load-more-trigger" href="javascript:void(0);"
               data-page-number="1"
               data-layout-type="<?php echo $et_option[ 'timeline_layout' ]; ?>"
               data-post-id="<?php echo $post_id; ?>"
               data-total-page="<?php echo $total_page; ?>"
               >
                   <?php
                   if ( isset( $et_option[ 'et_load_more_template' ] ) && $et_option[ 'et_load_more_template' ] == 'template-4' ) {
                       ?>
                    <span class="et-top"></span><?php echo ($et_option[ 'et_load_more_text' ] != '') ? esc_attr( $et_option[ 'et_load_more_text' ] ) : __( 'Load More', ET_TD ); ?><span class="et-bottom"></span>

                    <?php
                } else {
                    echo ($et_option[ 'et_load_more_text' ] != '') ? esc_attr( $et_option[ 'et_load_more_text' ] ) : __( 'Load More', ET_TD );
                }
                ?>
            </a>
            <?php $loader = isset( $et_option[ 'et_loader_preview_type' ] ) ? esc_attr( $et_option[ 'et_loader_preview_type' ] ) : 'loader-1'; ?>
            <img src="<?php echo ET_IMG_DIR . '/loader/' . $loader . '.gif'; ?>" class="et-ajax-loader" style="display:none;"/>
        </div>
        <?php
    } else {
        ?>
        <div class="et-infinite-load">
            <a class="et-infinite-load-trigger" href="javascript:void(0);"
               data-page-number="1"
               data-layout-type="<?php echo $et_option[ 'timeline_layout' ]; ?>"
               data-post-id="<?php echo $post_id; ?>"
               data-total-page="<?php echo $total_page; ?>"
               >
            </a>
            <?php $loader = isset( $et_option[ 'et_loader_preview_type' ] ) ? esc_attr( $et_option[ 'et_loader_preview_type' ] ) : 'loader-1'; ?>
            <img src="<?php echo ET_IMG_DIR . '/loader/' . $loader . '.gif'; ?>" class="et-infinite-loader" style="display:none;"/>
        </div>
        <?php
    }
}