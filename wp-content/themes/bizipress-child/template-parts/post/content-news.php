<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>


<div class="post">
	<!-- post image start -->
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
									if ($cat->parent == 0) {
										echo ('<a href="../">'.$cat->name.'</a>');
									}
									
								} ?>
								</span>	
								</div>
							</div>
							
							</div>			  
							  

</div><!-- post end -->