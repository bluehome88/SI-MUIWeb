<?php
/**
 * page-news.php
 *
 * The template for displaying all pages.
 */
?>

<?php get_header(); 

get_template_part( 'template-parts/header/content', 'page-header' );
?>
<div class="main-content blog-wrap"  role="main">
    <div class="container">
		<div class="row">
            <div class="col-md-12 col-sm-12">
			<!-- Article header -->
						<header class="entry-header"> <?php
							if ( has_post_thumbnail() && !post_password_required() ) :
								?>
								<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
							<?php endif; ?>

							<h1 id="MainHeader252"><?php the_title(); ?></h1>
						</header> <!-- end entry-header -->
						<p class="text-center">Find out what’s going on at Massy United Insurance.</p>
			</div>
		</div>
        <div class="row">
		
            <div class="col-md-8 col-sm-9">
			
		
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						

						<!-- Article content -->
						<div class="entry-content">
							<?php 
							//the_content(); 
							
							
							$args = array(
							'post_type' => 'news',
							'orderby'   => 'date',
							'order' => 'DESC',
							);

							//$args = array( 'post_type' => 'news', 'posts_per_page' => -1 , 'orderby' => 'date' ,'order' => 'DESC' );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							?>
							<div class="row newsblogPadd252">
							  <div class="col-md-4 col-sm-12">
							  <?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
								<div class="entry-thumbnail post-media post-image text-center">
									<?php
									the_post_thumbnail( 'full' );
									?>
								</div>
							<?php endif; ?>
							  </div>
	
	
							  <div class="col-md-8 col-sm-12">
							  <h3 class="blue252"> <?php the_title();?> </h3>
							  <div class="slant252"> <?php	 echo  get_the_excerpt();  ?>
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
							
							
							
							
							
							
							
							 
							 
							 						 
						</div> <!-- end entry-content -->

					
					</article>

					<?php comments_template(); ?>
				<?php endwhile; ?>
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
						?>
							 <li class="catItem252"> <a href="<?php echo get_category_link( $cat->term_id ) ?>">
								   <?php echo $cat->name; ?>
							  </a>
							  </li>
						<?php
						   }
						?>
						</ul>
			</div>

			
        </div>
    </div>
</div>
<?php get_footer(); ?>