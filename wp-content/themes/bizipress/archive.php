<?php
/**
 * archive.php
 *
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div class="blog" role="main">
	<?php echo get_template_part( 'template-parts/header/content', 'blog-header' );
 ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
					<?php if ( have_posts() ) : ?>
						<header class="xs-page-header">
							<?php
							the_archive_title( '<h2>', '</h2>' );
							?>
						</header>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>
						<?php endwhile; ?>

						<?php bizipress_paging_nav(); ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
					<?php endif; ?>
                </div> <!-- end main-content -->

				<?php get_sidebar(); ?>
            </div>
        </div> 
    </div> 
</div> <!-- end main-content -->
<?php get_footer(); ?>