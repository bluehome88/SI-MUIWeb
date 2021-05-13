<?php
/**
 * category.php
 *
 * The template for displaying category pages.
 */
?>

<?php get_header(); ?>

<div class="blog" role="main">
    <?php get_template_part('template-parts/header/content', 'blog-header')?>
    <div class="main-content">
        <div class="container">
        	<div class="row">
	            <div class="col-md-12 col-sm-12">
				</div>
			</div>
            <div class="row">
		
            	<div class="col-md-8 col-sm-9">
                    <?php if (have_posts()) : ?>

                        <header class="xs-page-header">
                            <h2>
                                <?php
                                printf(esc_html__('Category Archives for %s', 'bizipress'), single_cat_title('', false));
                                ?>
                            </h2>

                            <?php
                            // Show an optional category description.
                            if (category_description()) {
                                echo '<p>' . category_description() . '</p>';
                            }
                            ?>
                        </header>

                        <?php while (have_posts()) : the_post(); ?>

                        	<div class="row newsblogPadd252">
								<div class="col-md-4 col-sm-12"><?php the_post_thumbnail( 'full' ); ?></div>
	
	
								<div class="col-md-8 col-sm-12">
							  		<h3 class="blue252"> <?php the_title();?> </h3>
							  		<div class="slant252"> <?php echo  get_the_excerpt();  ?>
							  		<a href="<?php echo get_permalink();?>">[<span class="orange252">Read More</span>]</a> </div>
							  	</div>
							
							</div>
							<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="entry-meta"> 
								<span class="published"><i class="fa fa-clock-o blue252 " aria-hidden="true"></i> <span class="padblog"> <?php echo get_the_date(); ?></span></span>
								<span class="author vcard"><i class="fa fa-user blue252" aria-hidden="true"></i> <?php the_author_posts_link(); ?></span>
								<span class="category"><i class="fa fa-newspaper-o blue252" aria-hidden="true"></i>
								<?php  $category = get_the_terms( $post->ID, 'news_categories' );     
								foreach ( $category as $cat){
								   echo ('<a href="../">'.$cat->name.'</a>');
								} ?>
								</span>	
								</div>
							</div>
						</div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div> <!-- end main-content -->

                <div class="col-md-3 col-sm-3 padblog252 col-md-offset-1">	
				
				<?php
						   $args = array(
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