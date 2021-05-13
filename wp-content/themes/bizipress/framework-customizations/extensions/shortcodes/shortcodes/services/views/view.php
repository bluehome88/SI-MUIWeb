<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );

$posts_per_page = $atts[ 'posts_per_page' ];

$style	 = $atts['feature_picker']['service_style'];
echo '<div class="clearfix"></div>';
$argss	 = array( 'post_type' => 'service', 'posts_per_page' => $posts_per_page );
$loops	 = new WP_Query( $argss );
while ( $loops->have_posts() ) : $loops->the_post();
	if ( !empty($style) && $style == 'service-1' ):
		?>
		<div class="col-md-4">
			<div class="ts-service-overlay">
				<div class="ts-image-wrapper">
					<?php the_post_thumbnail( array( 350, 250 ) ); ?>
				</div><!-- Image end -->
				<div class="service-content">
					<h3 class="service-title">
					<span class="service-icon">
						<i class="<?php
						$icon = fw_get_db_post_option( get_the_ID(), 'service_icon' );
						echo esc_attr( $icon );
						?>"></i>
					</span>	
					<?php echo the_title(); ?></h3>
					<p><?php bizipress_excerpt(); ?></p>
					<p><a class="btn btn-primary icon-bg" href="<?php echo the_permalink(); ?>">
						<?php echo esc_html_e( 'Read More', 'bizipress' ) ?> 
						<i class="icon icon-arrow-right"></i></a>
					</p>  
				</div><!-- Image content end -->
			</div><!-- Service Overlay end -->
		</div><!-- Col end -->

	<?php elseif (!empty($style) && $style == 'service-2'): ?>
		<div class="col-md-4">
			<div class="ts-service-box">
				<div class="ts-service-image-wrapper">
					<?php the_post_thumbnail( array( 350, 250 ) ); ?>
				</div>
				<div class="ts-service-content">
					<span class="ts-service-icon">
						<i class="<?php
						$icon = fw_get_db_post_option( get_the_ID(), 'service_icon' );
						echo esc_attr( $icon );
						?>"></i>
					</span>
					<h3 class="service-title"><?php echo the_title(); ?></h3>
					<p><?php bizipress_excerpt(); ?></p>
					<p><a class="link-more" href="<?php echo the_permalink(); ?>"><?php echo esc_html_e( 'Read More', 'bizipress' ) ?> <i class="icon icon-right-arrow2"></i></a></p>  
				</div>
			</div><!-- Service1 end -->
		</div><!-- Col 1 end -->

	<?php
	 elseif (!empty($style) && $style == 'service-3') :
		?>
		  <div class="fw-iconbox clearfix fw-iconbox-3 xs-d-inline xs-service-style-3 col-md-4">
			  <?php 
			 $icon = fw_get_db_post_option( get_the_ID(), 'service_icon' ); 
			  if('' !=$icon) : 
			  ?>
			<div class="fw-iconbox-image">
				<i class="<?php echo esc_attr( $icon ); ?>">
				</i>
			</div>
	        <?php endif; ?>
			<div class="fw-iconbox-aside">
				<div class="fw-iconbox-title">
					<?php the_title( '<h4><a href="'.esc_url(get_the_permalink(get_the_ID()) ).'">', '</a></h4>' )?>
				</div>
					<div class="fw-iconbox-text">
					<p><?php bizipress_excerpt(15); ?></p>               
					</div>
			</div>
			</div>
		<?php 
	endif;
endwhile;
?>


