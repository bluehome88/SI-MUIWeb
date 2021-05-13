<?php
$parse_uri = explode( 'wp-content', $_SERVER[ 'SCRIPT_FILENAME' ] );
require_once( $parse_uri[ 0 ] . 'wp-load.php' );
if ( isset( $_POST[ 'page' ] ) ) {
    //$start = ! empty( $_POST[ 'page' ] ) ? $_POST[ 'page' ] : 0;
    $page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $offset = ( $page - 1 ) * $per_page;
    $limit = 10;
    //get number of rows
    $select_type = $_POST[ 'select_type' ];
    $args = get_terms( $select_type, array( 'hide_empty' => false ) );
    // $posts = new WP_Query( $args );
    $rowCount = $posts -> found_posts;
    //initialize Pagination class
    $url = ET_URL . 'inc/ajax/et-terms-paginate.php';
    $pagConfig = array( 'baseURL' => $url, 'select_type' => $select_type, 'totalRows' => $rowCount, 'currentPage' => $start, 'perPage' => $limit, 'contentDiv' => 'et_blog_content' );
    $pagination = new et_Pagination( $pagConfig );
    //get rows
    $args = array(
        'category_name' => $select_type,
        'posts_per_page' => $limit,
        'order' => 'DESC',
        'orderby' => 'ID',
        'offset' => $start,
    );
    $query = new WP_Query( $args );
    if ( $rowCount > 0 ) {
        ?>
        <div class="et-post-field-wrap">
            <?php while ( $query -> have_posts() ) : $query -> the_post(); ?>
                <div class="et-list-terms"><label><input type="checkbox" name="et_option[blogs][post_check][]" class="et-add-blog-check"
                                                           value="<?php echo the_ID(); ?>"
                                                           data-postname="<?php the_title(); ?>"/><?php the_title(); ?>
                    </label>
                </div>
            <?php endwhile; ?>
        </div>
        <?php echo $pagination -> createLinks(); ?>
        <?php
    }
    else {
        _e( 'Posts not found.', ET_TD );
    }
}

