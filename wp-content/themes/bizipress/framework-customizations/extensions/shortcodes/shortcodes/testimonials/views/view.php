<?php
if (!defined('FW')) {
    die('Forbidden');
}
$id = uniqid('testimonials-00');

$main_testimonial = $atts['testimonial_style_settings'];
$testimonial_style = $main_testimonial['testimonial_style'];

$testimonial_one = $main_testimonial['testimonial-1'];
$testimonial_two = $main_testimonial['testimonial-2'];
$testimonial_three = $main_testimonial['testimonial-3'];
$testimonial_four = $main_testimonial['testimonial-4'];
?>


    <?php if ($testimonial_style == 'testimonial-1') : ?>
        <div class="ts-testimonial-static <?php echo esc_html($atts['class']); ?>">
			<?php if (!empty($testimonial_one['quotation'])): ?>
			<p class="ts-testimonial-text"><?php echo wp_kses_post($testimonial_one['quotation']); ?></p>
			<?php endif; ?>
		
			<div class="quote-item-static-footer">
				<?php if (!empty($testimonial_one['image'])): ?>
					<img class="testimonial-thumb" src="<?php echo esc_url($testimonial_one['image']['url']); ?>" alt="<?php echo esc_html($testimonial_one['name']); ?>">
				<?php endif; ?>
				<div class="quote-item-info">
					<?php if ( !empty( $testimonial_one[ 'name' ]) && !empty($testimonial_one[ 'position' ] ) ): ?>
					<h3 class="quote-author"><?php echo esc_html( $testimonial_one[ 'name' ] ); ?>
					</h3>
					<span class="quote-subtext">
						<?php echo esc_html( $testimonial_one[ 'position' ] ); ?>
					</span>
					<?php endif; ?>
				</div><!-- Quote info end -->
			</div><!-- Quote item footer end -->
        </div><!-- Testimonial content end -->

    <?php elseif ($testimonial_style == 'testimonial-2') : ?>
		<div id="testimonial-slide" class="owl-carousel owl-theme testimonial-slide">
			<?php foreach ( $testimonial_two[ 'testimonials' ] as $testimonial ): ?>
			<div class="item">
				<div class="quote-item">
				<?php if ( !empty( $testimonial[ 'quotation' ] ) ): ?>
						<p class="quote-text">
							<?php echo wp_kses_post( $testimonial[ 'quotation' ] ); ?>
						</p>
					<?php endif; ?>
				<div class="quote-item-footer">
					<?php if ( !empty( $testimonial[ 'image' ] ) ): ?>
							<img class="testimonial-thumb" src="<?php echo esc_url( $testimonial[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $testimonial[ 'name' ] ); ?>">
						<?php endif; ?>
					<div class="quote-item-info">
						<?php if ( !empty( $testimonial[ 'name' ]) && !empty($testimonial[ 'position' ] ) ): ?>
							<h3 class="quote-author"><?php echo esc_html( $testimonial[ 'name' ] ); ?>
								<span class="quote-subtext">
									<?php echo esc_html( $testimonial[ 'position' ] ); ?></span>
							</h3>
							<?php endif; ?>
					</div><!-- Quote info end -->
				</div><!-- Quote item footer end -->
				</div><!-- Quote item end -->
			</div><!--/ Item end -->
			<?php endforeach; ?>
		</div><!--/ Testimonial carousel end-->

		<?php elseif ($testimonial_style == 'testimonial-3') : ?>
		<div id="testimonial-slide" class="owl-carousel owl-theme testimonial-slide-classic">
			<?php foreach ( $testimonial_three[ 'testimonials' ] as $testimonial ): ?>
			<div class="item">
				<div class="row quote-item-area">
					<div class="col-md-5">
						<div class="quote-thumb">
							<?php if ( !empty( $testimonial[ 'image' ] ) ): ?>
								<img class="quote-thumb-img" src="<?php echo esc_url( $testimonial[ 'image' ][ 'url' ] ); ?>" alt="<?php echo esc_html( $testimonial[ 'name' ] ); ?>">
							<?php endif; ?>

						</div><!-- Quote thumb end -->
					</div><!-- Col end -->
					
					<div class="col-md-7">
						<div class="quote-item-content">
							<?php if ( !empty( $testimonial[ 'name' ]) && !empty($testimonial[ 'position' ] ) ): ?>
								<h3 class="quote-name"><?php echo esc_html( $testimonial[ 'name' ] ); ?>
								</h3>
								<span class="quote-name-desg">
										<?php echo esc_html( $testimonial[ 'position' ] ); ?></span>
								<?php endif; ?>
								<?php if ( !empty( $testimonial[ 'quotation' ] ) ): ?>
									<p class="quote-message">
										<?php echo wp_kses_post( $testimonial[ 'quotation' ] ); ?>
									</p>
								<?php endif; ?>
						</div><!-- Quote content end -->
					</div><!-- Col end -->

					
				</div><!-- Quote item area end -->
			</div><!--/ Item end -->
			<?php endforeach; ?>
		</div><!--/ Testimonial carousel end-->

		<?php elseif ($testimonial_style == 'testimonial-4') : ?>
        <div class="ts-testimonial-static2 <?php echo esc_html($atts['class']); ?>">
			<div class="quote-item-static-footer clearfix">
				<?php if (!empty($testimonial_four['image'])): ?>
					<img class="testimonial-thumb" src="<?php echo esc_url($testimonial_four['image']['url']); ?>" alt="<?php echo esc_html($testimonial_one['name']); ?>">
				<?php endif; ?>
				<div class="quote-item-info">
					<?php if ( !empty( $testimonial_four[ 'name' ]) && !empty($testimonial_four[ 'position' ] ) ): ?>
					<h3 class="quote-author"><?php echo esc_html( $testimonial_four[ 'name' ] ); ?>
					</h3>
					<span class="quote-subtext">
						<?php echo esc_html( $testimonial_four[ 'position' ] ); ?>
					</span>
					<?php endif; ?>
				</div><!-- Quote info end -->
			</div><!-- Quote item footer end -->
			<?php if (!empty($testimonial_four['quotation'])): ?>
			<p class="quote-text"><?php echo wp_kses_post($testimonial_four['quotation']); ?></p>
			<?php endif; ?>
        </div><!-- Testimonial content end -->

		
    <?php endif; ?>