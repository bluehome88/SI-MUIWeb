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


<div id="main-container" class="main-container blog" role="main">
    <div class="sections">
        <div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'myvault' );

						echo "<a href='/barbados/dashboard'> Back to dashboard </a> ";
					

					endwhile;
					?>
				</div> <!-- end main-content -->

			</div>
        </div>
    </div>
</div> <!-- end main-content -->
<?php get_footer(); ?>