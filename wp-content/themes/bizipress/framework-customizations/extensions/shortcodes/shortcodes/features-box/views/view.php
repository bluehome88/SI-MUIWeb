<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$features = $atts[ 'feature_picker' ];
?>
<?php if ( $features[ 'features_style' ] == 'feature-1' ): ?>
	<div class = "ts-feature-box <?php echo esc_attr($atts['class']); ?>">
		<div class="ts-feature-info">
			<?php if ( !empty( $features[ 'feature-1' ][ 'icon' ] ) ): ?>
				<span class="feature-icon">
					<i class="<?php echo esc_attr( $features[ 'feature-1' ][ 'icon' ] ); ?>"></i>
				</span>
			<?php endif; ?>
			<div class = "feature-content">
				<?php if ( !empty( $atts[ 'title' ] ) ): ?>
					<h3 class="ts-feature-title"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $atts[ 'content' ] ) ): ?>
					<p><?php echo esc_html( $atts[ 'content' ] ); ?></p>
				<?php endif; ?>
			</div><!-- feature content end -->
		</div><!-- Feature info end -->
	</div><!--/ End featurebox icon 1-->

<?php elseif ( $features[ 'features_style' ] == 'feature-2' ): ?>
	<div class = "ts-feature-classic <?php echo esc_attr($atts['class']); ?>">
		<div class="ts-feature-info icon-left">
			<?php if ( !empty( $features[ 'feature-2' ][ 'icon' ] ) ): ?>
				<span class="feature-icon">
					<i class="<?php echo esc_attr( $features[ 'feature-2' ][ 'icon' ] ); ?>"></i>
				</span>
			<?php endif; ?>
			<div class = "feature-content">
				<?php if ( !empty( $atts[ 'title' ] ) ): ?>
					<h3 class="ts-feature-title"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $atts[ 'content' ] ) ): ?>
					<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
				<?php endif; ?>
			</div><!-- feature content end -->
		</div><!-- Feature info end -->
	</div><!--/ End featurebox icon 2 -->

<?php elseif ( $features[ 'features_style' ] == 'feature-3' ): ?>
	<div class="feature-img-box <?php echo esc_attr($atts['class']); ?>">
		<?php if ( !empty( $features[ 'feature-3' ] ) ): ?>
			<?php if(!empty($features[ 'feature-3' ][ 'image' ])): ?>
				<div class="feature-img-content">
					<img src="<?php echo esc_attr( $features[ 'feature-3' ][ 'image' ][ 'url' ] ); ?>" alt="" />
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class ="feature-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'content' ] ) ): ?>
				<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
			<?php endif; ?>
		</div>
	</div><!--/ End FeatureImg Box 1 -->

	<?php elseif ( $features[ 'features_style' ] == 'feature-4' ): ?>
	<div class="feature-img-box-left <?php echo esc_attr($atts['class']); ?>">
		<?php if ( !empty( $features[ 'feature-4' ] ) ): ?>
			<div class="feature-img-content">
				<img class="pull-left" src="<?php echo esc_attr( $features[ 'feature-4' ][ 'image' ][ 'url' ] ); ?>" alt="" />
			</div>
		<?php endif; ?>

		<div class ="feature-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'content' ] ) ): ?>
				<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
			<?php endif; ?>
		</div>
	</div><!--/ End FeatureImg Box 2 -->

	<?php elseif ( $features[ 'features_style' ] == 'feature-5' ): ?>
	<div class="feature-intro-box <?php echo esc_attr($atts['class']); ?>">
		<?php if ( !empty( $features[ 'feature-5' ] ) ): ?>
			<div class="feature-intro-img">
				<img class="img-responsive" src="<?php echo esc_attr( $features[ 'feature-5' ][ 'image' ][ 'url' ] ); ?>" alt="" />
			</div>
		<?php endif; ?>
		<div class ="feature-intro-content">
			<?php if ( !empty( $atts[ 'title' ] ) ): ?>
				<h3><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
			<?php endif; ?>

			<?php if ( !empty( $atts[ 'content' ] ) ): ?>
				<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
			<?php endif; ?>
		</div>
		<div class="intro-shape"></div>
	</div><!--/ End Feature Intro Box -->

	<?php elseif ( $features[ 'features_style' ] == 'feature-6' ): ?>
	<div class = "ts-feature-classic <?php echo esc_attr($atts['class']); ?>">
		<div class="ts-feature-info icon-left icon-round">
			<?php if ( !empty( $features[ 'feature-6' ][ 'icon' ] ) ): ?>
				<span class="feature-icon">
					<i class="<?php echo esc_attr( $features[ 'feature-6' ][ 'icon' ] ); ?>"></i>
				</span>
			<?php endif; ?>
			<div class = "feature-content">
				<?php if ( !empty( $atts[ 'title' ] ) ): ?>
					<h3 class="ts-feature-title"><?php echo esc_html( $atts[ 'title' ] ); ?></h3>
				<?php endif; ?>

				<?php if ( !empty( $atts[ 'content' ] ) ): ?>
					<p><?php echo wp_kses_post( $atts[ 'content' ] ); ?></p>
				<?php endif; ?>
			</div><!-- feature content end -->
		</div><!-- Feature info end -->
	</div><!--/ End featurebox icon Left Round 2 -->


	<?php endif;