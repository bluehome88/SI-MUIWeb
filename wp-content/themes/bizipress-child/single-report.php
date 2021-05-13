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

get_template_part( 'template-parts/header/content', 'blog-header' );
										
										
									



?>

<?php 
echo (get_field('file')[url]);
$attachment_id = get_field('file');
$url = wp_get_attachment_url( $attachment_id );


$image = get_field('thumbnailImage');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif;


	if( get_field('file') ):?>
	<a href="<?php echo (get_field('file')[url]); ?>" >Download File</a><?php
endif; ?>

				
				

</div> <!-- end main-content -->
<?php get_footer(); ?>