<div class ="et-post-option-wrap">
    <label for="et-show-keyword-query" class="et-keyword-relation">
        <?php _e( 'Filter Keyword Search', ET_TD ); ?>
    </label>
    <div class="et-post-field-wrap">
        <label class="et-switch">
            <input type="checkbox" class="et-show-keyword-relation et-checkbox" value="<?php
            if ( isset( $et_option[ 'et_show_keyword_query' ] ) ) {
                echo esc_attr( $et_option[ 'et_show_keyword_query' ] );
            } else {
                echo '0';
            }
            ?>" name="et_option[et_show_keyword_query]" <?php if ( isset( $et_option[ 'et_show_keyword_query' ] ) && $et_option[ 'et_show_keyword_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="et-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts based on a keyword search.', ET_TD ) ?></p>
    </div>
</div>
<div class="et-keyword-inner-wrap"  <?php if ( isset( $et_option[ 'et_show_keyword_query' ] ) && $et_option[ 'et_show_keyword_query' ] == '1' ) { ?>
         style="display: block;" <?php } else { ?>
         style="display: none;" <?php } ?>>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Enter the keyword', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <input type="text" class="et-search-keyword"  name="et_option[et_search_keyword]"  value="<?php
                   if ( isset( $et_option[ 'et_search_keyword' ] ) ) {
                       echo $et_option[ 'et_search_keyword' ];
                   }
                   ?>"/>
        </div>
    </div>
</div>