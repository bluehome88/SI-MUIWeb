<?php
/**
 * single.php
 *
 * The template for displaying single posts.
 */
$display_settings = array();
if ( defined( 'FW' ) ) {
	$display_settings = fw_get_db_settings_option( 'blog_display_settings' );
}

get_header();

get_template_part( 'template-parts/header/content', 'blog-header' )
?>

<style>
#banner-area {
    background: #0f2765 url(<?php the_post_thumbnail_url( 'full' ); ?>) !important;
}
</style>
<div id="main-container" class="main-container blog" role="main">
    <div class="sections">
        <div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-9">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'post' );

						bizipress_post_nav();

						if ( defined( 'FW' ) ) {
							if ( $display_settings[ 'post_comment' ] != 'no' ) :
								comments_template();
							endif;
						}else {
							comments_template();
						}

					endwhile;
					?>
				</div> <!-- end main-content -->
				
				<div class="col-md-3 col-sm-3 padblog252 col-md-offset-1">	
				
				<h2 class="cat252">Recent Posts</h2>
					<ul class="catlist252">
					<?php
						$recent_posts = wp_get_recent_posts(array('post_type'=>'post'));
						foreach( $recent_posts as $recent ){
							echo '<li class="catItem252"><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
						}
					?>
					</ul>

				</div>

			</div>
        </div>
    </div>
</div> <!-- end main-content -->
<?php get_footer(); ?>