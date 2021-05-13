<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content post-single' ); ?>>


	<div class="post-body clearfix">
	<!-- Article header -->
		<header class="entry-header clearfix">
			<?php //bizipress_post_meta(); ?>
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>
		</header><!-- header end -->
		
		
		
		
		

		

		<!-- Article content -->
		<div class="entry-content slant252">
		
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( esc_html__( 'Continue reading &rarr;', 'bizipress' ) );

				bizipress_link_pages();
			}
			?>
		</div> <!-- end entry-content -->
		<?php //bizipress_single_post_footer
		//bizipress_single_post_footer();
		?>
    </div> <!-- end post-body -->

</article>