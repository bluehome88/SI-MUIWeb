<div class="et-filter-wrap  et-clearfix et-filter-<?php echo esc_attr( $et_option[ 'et_filter_template' ] ); ?>">
    <ul>
        <?php $all = (isset( $et_option[ 'et_all_items_label' ] ) && $et_option[ 'et_all_items_label' ] != '') ? esc_attr( $et_option[ 'et_all_items_label' ] ) : __( 'All', 'ET_TD' ); ?>
        <li><a href="javascript:void(0);" class="et-filter-trigger et-active-filter" data-filter-key="et-filter-all" data-layout-type="<?php echo esc_attr( $et_option[ 'timeline_layout' ] ); ?>"><?php echo $all; ?></a></li>
        <?php
        if ( isset( $et_option[ 'filter_terms_type' ] ) && $et_option[ 'filter_terms_type' ] == 'specific' ) {
            if ( count( $et_option[ 'filter' ] ) ) {
                foreach ( $et_option[ 'filter' ] as $filter_key => $filter_details ) {
                    $name = get_term_by( 'slug', $filter_details, $et_option[ 'select_filter_taxonomy' ] );
                    ?>
                    <li><a href="javascript:void(0);" data-filter-key="et-filter-cat-<?php echo esc_attr( $filter_details ); ?>" class="et-filter-trigger" data-layout-type="<?php echo esc_attr( $et_option[ 'timeline_layout' ] ); ?>"><?php echo esc_attr( $name -> name ); ?></a></li>
                    <?php
                }
            }
        } else {
            $et_terms = get_terms( $et_option[ 'select_filter_taxonomy' ], 'orderby=count&hide_empty=0' );
            foreach ( $et_terms as $et_term ) {
                ?>
                <li><a href="javascript:void(0);" data-filter-key="et-filter-cat-<?php echo esc_attr( $et_term -> slug ); ?>" class="et-filter-trigger" data-layout-type="<?php echo esc_attr( $et_option[ 'timeline_layout' ] ); ?>"><?php echo esc_attr( $et_term -> name ); ?></a></li>
                    <?php
                }
            }
            ?>
    </ul>
</div>
