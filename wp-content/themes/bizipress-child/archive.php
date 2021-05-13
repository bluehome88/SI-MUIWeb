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
							<?php get_template_part( 'template-parts/post/content', 'news' ); ?>
						<?php endwhile; ?>

						<?php bizipress_paging_nav(); ?>
					<?php else : ?>
						<?php //get_template_part( 'template-parts/post/content', 'none' ); ?>
					<?php endif; ?>
                </div> <!-- end main-content -->

				<div class="col-md-3 col-sm-3 padblog252 col-md-offset-1">	
				
				<?php
						   $args = array(
									   'taxonomy' => 'news_categories',
									   'orderby' => 'name',
									   'order'   => 'ASC'
								   );

						   $cats = get_categories($args);
						?>
						<h2 class="cat252">Categories</h2>
						<ul class="catlist252">
						<?php
						   foreach($cats as $cat) {
						   		if ($cat->parent == 0) {
						?>
							 <li class="catItem252"> <a href="<?php echo get_category_link( $cat->term_id ) ?>">
								   <?php echo $cat->name; ?>
							  </a>
							  </li>
						<?php
						   }
						   }
						?>
						</ul>
			</div>
				
				
				
				
				
            </div>
        </div> 
    </div> 
</div> <!-- end main-content -->
<?php get_footer(); ?>