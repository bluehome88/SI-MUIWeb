<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );

	/**
	 * @var array $atts
	 */
}

$term_id = (int) $atts[ 'category' ];


if ( $term_id == 0 ) {
	$args = array(
		'posts_per_page' => 3,
		'post_type'		 => 'post',
		'orderby'		 => 'date'
	);
} else {
	$args = array(
		'posts_per_page' => 3,
		'post_type'		 => 'post',
		'orderby'		 => 'date',
		'tax_query'		 => array(
			array(
				'taxonomy'	 => 'category',
				'field'		 => 'id',
				'terms'		 => $term_id
			)
		)
	);
}

$query = new WP_Query( $args );
extract($atts);

?>

<?php if ( $query->have_posts() ) : $i = 1; ?>
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<?php
        if($class == 'default') :
		if ( $i == 1 ) :
			$thumbnail	 = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '' );
			$popup_img	 = $thumbnail[ 0 ];
			$img		 = fw_resize( $thumbnail[ 0 ], 555, 345 );
			?>
			<div class="col-md-6">
				<div class="latest-post post-large">
					<div class="latest-post-media">
						<a href="<?php the_permalink(); ?>" class="latest-post-img">
							<img class="img-responsive" src="<?php echo esc_url( $img ); ?>" alt="<?php echo the_title(); ?>">
						</a>
						<div class="post-cat">
							<?php echo get_the_category_list( ', ' ); ?>
						</div>
						<div class="post-body">
							<span class="post-item-date"><?php echo get_the_date( 'M d, Y' ); ?></span>
							<h4 class="post-title">
								<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
							</h4>
							<a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'bizipress' ) ?></a>
						</div><!-- Post body end -->   
					</div><!-- Post media end -->
				</div><!-- Latest post end -->
			</div><!-- Col big news end -->
		<?php else : ?>
			<div class="col-md-3">
				<div class="latest-post">
					<div class="post-body">
						<div class="post-cat">
							<?php echo get_the_category_list( ', ' ); ?>
						</div>
						<h4 class="post-title">
							<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
						</h4>
						<span class="post-item-date"><?php the_time( 'M d, Y' ); ?></span>
						<div class="post-text">
							<p><?php bizipress_excerpt( '10' ); ?>
							</p>
							<div class="text-right">
								<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'bizipress' ) ?> <i class="fa fa-long-arrow-right"> </i></a>
							</div>
						</div>
					</div>   
				</div><!-- Latest post end -->
			</div><!--Col end -->
		<?php
		endif;
		 else  :
		    ?>
             <div class="col-md-4 post-style-classic">
                 <div class="post-thum">
                     <?php the_post_thumbnail(array(350, 250)); ?>
                 </div>
                 <div class="latest-post">
                     <div class="post-body">
                         <div class="classic-post-meta">
                             <span class="text-left"><?php _e('Posted by', 'bizipress'); ?> <strong><?php the_author(); ?></strong></span>
                             <span class="post-item-date"><?php _e('Date : ', 'bizipress'); the_time( 'M d, Y' ); ?></span>
                         </div>
                         <h4 class="post-title">
                             <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
                         </h4>
                         <div class="post-text">
                             <p><?php bizipress_excerpt( '10' ); ?>
                             </p>
                             <div class="text-left">
                                 <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'bizipress' ) ?> <i class="fa fa-long-arrow-right"> </i></a>
                             </div>
                         </div>
                     </div>
                 </div><!-- Latest post end -->
             </div><!--Col end -->
          <?php
        endif;
		$i+=1;
	endwhile;
else :
	// If no content, include the "No posts found" template.
	get_template_part( 'content', 'none' );

endif;

wp_reset_postdata(); ?>

