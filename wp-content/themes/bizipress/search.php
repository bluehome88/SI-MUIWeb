<?php
/**
 * search.php
 *
 * The template for displaying search results.
 */
get_header();
?>

<div class="blog" role="main">
	<?php get_template_part( 'template-parts/header/content', 'search-header' ) ?>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', get_post_format() );
						endwhile;
						bizipress_paging_nav();
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif;
					?>
                </div> <!-- end main-content -->

				<?php get_sidebar(); ?>
            </div>
        </div> 
    </div> 
</div> <!-- end main-content -->
<?php get_footer(); ?>