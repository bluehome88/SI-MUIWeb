<div class="et-general-outer-wrap">
    <div class = "et-post-option-wrap">
        <label><?php _e( 'Post Content', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label><input type="radio" value="full-text" name="et_option[post_content]" <?php
                if ( isset( $et_option[ 'post_content' ] ) ) {
                    checked( $et_option[ 'post_content' ], 'full-text' );
                }
                ?> class="et-post-content"/><?php _e( "Full Text", ET_TD ); ?></label>
            <label><input type="radio" value="excerpt" name="et_option[post_content]" <?php
                if ( isset( $et_option[ 'post_content' ] ) ) {
                    checked( $et_option[ 'post_content' ], 'excerpt' );
                }
                ?>  class="et-post-content"/><?php _e( 'Excerpt Text', ET_TD ); ?></label>
            <div class="et-excerpt-wrap" <?php if ( isset( $et_option[ 'post_content' ] ) && $et_option[ 'post_content' ] == 'excerpt' ) { ?> style="display:block;" <?php } else {
                    ?>
                     style = "display:none;"
                     <?php
                 }
                 ?> >
                <input type="number" class="et-post-excerpt" min="10" name="et_option[et_post_excerpt]"  value="<?php
                if ( isset( $et_option[ 'et_post_excerpt' ] ) ) {
                    echo $et_option[ 'et_post_excerpt' ];
                } else {
                    echo '15';
                }
                ?>"/>
                <p class="description"><?php _e( 'Enter the excerpt length for post content', ET_TD ) ?></p>
            </div>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Number of Post', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <input type="number" class="et-post-number" min="1" name="et_option[et_post_number]"  value="<?php
            if ( isset( $et_option[ 'et_post_number' ] ) ) {
                echo $et_option[ 'et_post_number' ];
            } else {
                echo '5';
            }
            ?>"/>
            <p class="description"><?php _e( 'Enter the number of post to show in timeline', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-show-pagination" class="et-show-pagination">
            <?php _e( 'Show Pagination', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-display-pagination et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_display_pagination' ] ) ) {
                    echo esc_attr( $et_option[ 'et_display_pagination' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_display_pagination]" <?php if ( isset( $et_option[ 'et_display_pagination' ] ) && $et_option[ 'et_display_pagination' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show posts associated with certain taxonomy/category.', ET_TD ) ?></p>
            <p class="description"><?php _e( 'Note: This is only available for vertical and one side layout.', ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-pagination-wrapper"
    <?php if ( isset( $et_option[ 'et_display_pagination' ] ) && $et_option[ 'et_display_pagination' ] == '1' ) {
        ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Pagination', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[et_select_pagination]" class="et-select-pagination">
                    <option value="standard_pagination"  <?php if ( isset( $et_option[ 'et_select_pagination' ] ) && $et_option[ 'et_select_pagination' ] == 'standard_pagination' ) echo 'selected=="selected"'; ?>><?php _e( 'Standard Pagination', ET_TD ) ?></option>
                    <option value="load_more_button"  <?php if ( isset( $et_option[ 'et_select_pagination' ] ) && $et_option[ 'et_select_pagination' ] == 'load_more_button' ) echo 'selected=="selected"'; ?>><?php _e( 'Load More Button', ET_TD ) ?></option>
                    <option value="infinite_scroll"  <?php if ( isset( $et_option[ 'et_select_pagination' ] ) && $et_option[ 'et_select_pagination' ] == 'infinite_scroll' ) echo 'selected=="selected"'; ?>><?php _e( 'Infinite Scrolls', ET_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="et-standard-page-block">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Standard Pagination Template', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[et_standard_page_template]" class="et-standard-template">
                        <?php
                        $standard_pagination_styles = array(
                            'Circular angular template',
                            'Bold arrow template',
                            'Half border template',
                            'Next prev template',
                            'Long arrow template'
                        );
                        $p = 1;
                        foreach ( $standard_pagination_styles as $standard_pagination_style ) {
                            ?>
                            <option value="template-<?php echo $p; ?>" <?php if ( ! empty( $et_option[ 'et_standard_page_template' ] ) ) selected( $et_option[ 'et_standard_page_template' ], 'template-' . $p ); ?>><?php echo $standard_pagination_style; ?></option>
                            <?php
                            $p ++;
                        }
                        ?>
                    </select>
                    <div class="et-standard-pagination-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $et_option[ 'et_standard_page_template' ] ) ) {
                                $option_value = $et_option[ 'et_standard_page_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-standard-pagination-common" id="et-standard-pagination-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                                <img src="<?php echo ET_IMG_DIR . '/demo/pagination/' . 'pa' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="et-load-setting-block" style="display: none;">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Load More Template', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[et_load_more_template]" class="et-load-more-template">
                        <?php
                        $load_more_styles = array(
                            'Tab pagination template',
                            'Rectangle pagination template',
                            'Hover pagination template',
                            'Corner border template',
                            'Plain pagination template'
                        );
                        $l = 1;
                        foreach ( $load_more_styles as $load_more_style ) {
                            ?>
                            <option value="template-<?php echo $l; ?>" <?php if ( ! empty( $et_option[ 'et_load_more_template' ] ) ) selected( $et_option[ 'et_load_more_template' ], 'template-' . $l ); ?>><?php echo $load_more_style; ?></option>
                            <?php
                            $l ++;
                        }
                        ?>
                    </select>
                    <div class="et-load-more-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 5; $cnt ++ ) {
                            if ( isset( $et_option[ 'et_load_more_template' ] ) ) {
                                $option_value = $et_option[ 'et_load_more_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-load-more-common" id="et-load-more-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ET_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ET_TD ); ?></h4>
                                <img src="<?php echo ET_IMG_DIR . '/demo/loadmore/' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class ="et-post-option-wrap">
                <label for="load-more-text" class="et-load-more-text"><?php _e( 'Load More Text', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <input type="text" class="et-load-more-text" placeholder="Load More" name="et_option[et_load_more_text]" value="<?php
                    if ( isset( $et_option[ 'et_post_link_text' ] ) && ! empty( $et_option[ 'et_post_link_text' ] ) ) {
                        echo esc_attr( $et_option[ 'et_load_more_text' ] );
                    }
                    ?>">
                </div>
            </div>
        </div>
        <div class="et-loader-block" style="display: none;">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Loader', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <?php
                    $et_loader_previews = array( 'loader-1', 'loader-2', 'loader-3', 'loader-4', 'loader-5', 'loader-6', 'loader-7', 'loader-8', 'loader-9', 'loader-10', 'loader-11', 'loader-12', 'loader-13', 'loader-14', 'loader-15', 'loader-16' );
                    foreach ( $et_loader_previews as $et_loader_preview ) :
                        ?>
                        <div class="et-hide-radio">
                            <input type="radio" id="<?php echo $et_loader_preview; ?>" name="et_option[et_loader_preview_type]" class="et-loader-type" value="<?php echo esc_attr( $et_loader_preview ); ?>" <?php if ( isset( $et_option[ 'et_loader_preview_type' ] ) && $et_option[ 'et_loader_preview_type' ] == $et_loader_preview ) { ?>checked="checked"<?php } ?> <?php if ( ! isset( $et_option[ 'et_loader_preview_type' ] ) ) { ?>checked="checked"<?php } ?> />
                            <label class="et-loader-demo" for="<?php echo $et_loader_preview; ?>">
                                <img src="<?php echo ET_IMG_DIR . '/loader/' . $et_loader_preview . '.gif' ?>">
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-category-view-check" class="et-category-view">
            <?php _e( 'Display Post Category', ET_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-category et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_category' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_category' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_category]" <?php if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show category', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-tag-view-check" class="et-tag-view"><?php _e( 'Display Post Tag', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-tag et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_tag' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_tag' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_tag]" <?php if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post tag', ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-show-tag-wrapper">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Taxonomy/Category', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[show_post_tag_taxonomy]" class="et-select-taxonomy">
                    <option value="select" <?php if ( isset( $et_option[ 'show_post_tag_taxonomy' ] ) && $et_option[ 'show_post_tag_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', ET_TD ); ?></option>
                    <?php
                    $post_type = (isset( $et_option[ 'post_type' ] )) ? esc_attr( $et_option[ 'post_type' ] ) : 'post';
                    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
                    $exclude = array( 'post_format' );
                    // Filter out all unwanted post types
                    foreach ( $taxonomies as $key => $value ) {
                        if ( in_array( $key, $exclude ) ) {
                            unset( $taxonomies[ $key ] );
                        }
                    }
                    if ( is_array( $taxonomies ) ) {
                        foreach ( $taxonomies as $tax ) {
                            $value = $tax -> name;
                            $label = $tax -> label;
                            ?>
                            <option value="<?php echo $value;
                            ?>" <?php if ( isset( $et_option[ 'show_post_tag_taxonomy' ] ) && $et_option[ 'show_post_tag_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                    <?php
                                }
                            }
                            ?>
                </select>
                <p class="description"><?php _e( 'Please select the post type first', ET_TD ); ?></p>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-author-view-check" class="et-author-view"><?php _e( 'Display Post Author', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-author et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_author' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_author' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_author]" <?php if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post author', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-comment-view-check" class="et-comment-view"><?php _e( 'Display Post Comment Count', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-comment et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_comment' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_comment' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_comment]" <?php if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post comment count', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-date-view-check" class="et-date-view"><?php _e( 'Display Post Date', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-date et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_date' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_date' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_date]" <?php if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post date', ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-date-wrapper et-post-option-wrap" <?php if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) { ?> style="display:block;" <?php } else { ?> style="display: none;" <?php } ?>>
        <label><?php _e( 'Date Format', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_date_format_post]" class="et-select-date-format">
                <option value="F j, Y g:i a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F j, Y g:i a' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017 12:50 am', ET_TD ) ?></option>
                <option value="F j, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F j, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017', ET_TD ) ?></option>
                <option value="F, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March, 2017', ET_TD ) ?></option>
                <option value="j F  Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'j F  Y' ) echo 'selected=="selected"'; ?>><?php _e( '6 March 2017', ET_TD ) ?></option>
                <option value="g:i a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'g:i a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50 am', ET_TD ) ?></option>
                <option value="g:i:s a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'g:i:s a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50:48 am', ET_TD ) ?></option>
                <option value="l, F jS, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'l, F jS, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'Saturday, March 6th, 2017', ET_TD ) ?></option>
                <option value="M j, Y @ G:i"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'M j, Y @ G:i' ) echo 'selected=="selected"'; ?>><?php _e( 'Nov 6, 2010 @ 0:50', ET_TD ) ?></option>
                <option value="Y/m/d \a\t g:i A"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d \a\t g:i A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 at 12:50 AM', ET_TD ) ?></option>
                <option value="Y/m/d \a\t g:ia"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d \a\t g:ia' ) echo 'selected=="selected"'; ?>><?php _e( ' 2010/11/06 at 12:50am', ET_TD ) ?></option>
                <option value="Y/m/d g:i:s A"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d g:i:s A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 12:50:48 AM', ET_TD ) ?></option>
                <option value="Y/m/d"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06', ET_TD ) ?></option>
                <option value="d.m.Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'd.m.Y' ) echo 'selected=="selected"'; ?>><?php _e( '11.1.2017', ET_TD ) ?></option>
                <option value="d-m-Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'd-m-Y' ) echo 'selected=="selected"'; ?>><?php _e( '11-1-2017', ET_TD ) ?></option>
                <option value="Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y' ) echo 'selected=="selected"'; ?>><?php _e( '2017', ET_TD ) ?></option>
            </select>
            <p class="description"><?php echo _e( 'Note: The date format is only applicable for inner date.' ); ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-read-more-check" class="et-read-more-view"><?php _e( 'Display Read More Link', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-read-more et-checkbox" name="et_option[et_show_read_more]"  value="<?php
                if ( isset( $et_option[ 'et_show_read_more' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_read_more' ] );
                } else {
                    echo '0';
                }
                ?>" <?php if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show read more post link', ET_TD ) ?></p>
        </div>
    </div>
    <div class="et-read-more-wrap" <?php if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) {
                    ?> style="display:block;" <?php } else { ?> style="display:none;" <?php }
                ?>>
        <div class ="et-post-option-wrap">
            <label for="read-more-text" class="et-read-more-text"><?php _e( 'Read More Text', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-post-link-text" placeholder="Read More" name="et_option[et_post_link_text]" value="<?php
                if ( isset( $et_option[ 'et_post_link_text' ] ) ) {
                    echo esc_attr( $et_option[ 'et_post_link_text' ] );
                }
                ?>">
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-post-link" class="et-post-label"><?php _e( 'Post Link', ET_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label><input type="radio" value="post_link" name="et_option[post_url]" <?php
                    if ( isset( $et_option[ 'post_url' ] ) ) {
                        checked( $et_option[ 'post_url' ], 'post_link' );
                    }
                    ?> class="et-post-link"/><?php _e( "Post Link", ET_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="et_option[post_url]" <?php
                    if ( isset( $et_option[ 'post_url' ] ) ) {
                        checked( $et_option[ 'post_url' ], 'custom_link' );
                    }
                    ?>  class="et-post-link"/><?php _e( 'Custom Link', ET_TD ); ?></label>
            </div>
        </div>

        <div class="et-custom-link-wrap"  <?php if ( isset( $et_option[ 'post_url' ] ) && $et_option[ 'post_url' ] == 'post_link' ) {
                        ?> style="display:none;" <?php }
                    ?>>
            <div class="et-post-option-wrap">
                <label><?php _e( 'Custom Link Type', ET_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[custom_link_type]" class="et-custom-link-type">
                        <option value="common_link"  <?php if ( isset( $et_option[ 'custom_link_type' ] ) && $et_option[ 'custom_link_type' ] == 'common_link' ) echo 'selected=="selected"'; ?>><?php _e( 'Common Custom Link', ET_TD ) ?></option>
                        <option value="individual_link"  <?php if ( isset( $et_option[ 'custom_link_type' ] ) && $et_option[ 'custom_link_type' ] == 'individual_link' ) echo 'selected=="selected"'; ?>><?php _e( 'Individual Custom Link', ET_TD ) ?></option>
                    </select>
                </div>
            </div>
            <div class="et-common-custom-link-wrap">
                <div class ="et-post-option-wrap">
                    <label for="custom-link-url" class="et-custom-url"><?php _e( 'Custom Link URL', ET_TD ); ?></label>
                    <div class="et-post-field-wrap">
                        <input type="text" class="et-custom-link" placeholder="www.example.com" name="et_option[et_custom_url]" value="<?php
                        if ( isset( $et_option[ 'et_custom_url' ] ) ) {
                            echo esc_attr( $et_option[ 'et_custom_url' ] );
                        }
                        ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-title-link-check" class="et-title-link-view"><?php _e( 'Enable Title Link', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-title-link et-checkbox" name="et_option[et_show_title_link]"  value="<?php
                if ( isset( $et_option[ 'et_show_title_link' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_title_link' ] );
                } else {
                    echo '0';
                }
                ?>" <?php if ( isset( $et_option[ 'et_show_title_link' ] ) && $et_option[ 'et_show_title_link' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post link in the title', ET_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Link Target', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label><input type="radio" value="self" name="et_option[link_target]" <?php
                if ( isset( $et_option[ 'link_target' ] ) ) {
                    checked( $et_option[ 'link_target' ], 'self' );
                }
                ?> class="et-link-target"/><?php _e( "Same Tab", ET_TD ); ?></label>
            <label><input type="radio" value="blank" name="et_option[link_target]" <?php
                if ( isset( $et_option[ 'link_target' ] ) ) {
                    checked( $et_option[ 'link_target' ], 'blank' );
                }
                ?>  class="et-link-target"/><?php _e( 'New Tab', ET_TD ); ?></label>
            <p class="description"><?php _e( 'This link target is applicable for title and read more button link', ET_TD ); ?></p>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Image Size', ET_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_image_size]" class="et-select-image-size">
                <option value="full"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'full' ) echo 'selected=="selected"'; ?>><?php _e( 'Original', ET_TD ) ?></option>
                <option value="large"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'large' ) echo 'selected=="selected"'; ?>><?php _e( 'Large', ET_TD ) ?></option>
                <option value="medium"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'medium' ) echo 'selected=="selected"'; ?>><?php _e( 'Medium', ET_TD ) ?></option>
                <option value="thumbnail"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'thumbnail' ) echo 'selected=="selected"'; ?>><?php _e( 'Thumbnail', ET_TD ) ?></option>
            </select>
        </div>
    </div>
</div>