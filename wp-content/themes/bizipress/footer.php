<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 */
$widget		 = bizipress_get_option( 'footer_widget' );
$scrollup	 = bizipress_get_option( 'scrollup' );
?>

<!-- Footer start -->
<?php if ( defined( 'FW' ) ): ?>
	<?php if ( fw_akg( 'footer_bg', $widget, array() ) == 'yes' ): ?>
		<footer id="footer" class="footer">
			<div class="xs-main-overlay"></div>
			<?php
			$footer_top = bizipress_get_option( 'footer_top' );

			if ( $footer_top[ 'footer_top_part' ] == 'yes' ):

				$style = $footer_top[ 'yes' ][ 'footer_styles' ];
				if ( $style[ 'footer_style' ] == 'one' ):
					?>
					<div class="footer-top">
						<div class="container">
							<div class="footer-top-bg row">
								<?php foreach ( (array) $style[ 'one' ][ 'top_contact_details' ] as $top ): ?>
									<div class="col-md-4 footer-box">
										<i class="<?php echo esc_attr( $top[ 'icon' ] ) ?>"></i>
										<div class="footer-box-content">
											<h3><?php echo bizipress_kses( $top[ 'title' ] ) ?></h3>
											<p><?php echo bizipress_kses( $top[ 'info' ] ) ?></p>
										</div>
									</div><!--/ Box 1 end -->
								<?php endforeach; ?>

							</div><!--/ Content row end -->
						</div><!--/ Container end -->
					</div><!--/ Footer top end -->

					<?php
				else:
					?>
					<div class="footer-icon"><i class="icon icon-invest"></i></div>

					<div class="ts-oval-shape"></div>
					<div class="newsletter-bg text-center">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h3><?php echo bizipress_return( $style[ 'two' ][ 'title' ] ); ?></h3>
									<p><?php echo bizipress_kses( $style[ 'two' ][ 'desc' ] ); ?></p>

									<?php
									if ( $style[ 'two' ][ 'shortcode' ] != '' ) {
										echo do_shortcode( $style[ 'two' ][ 'shortcode' ] );
									}
									?>
								</div><!-- Col end -->
							</div><!--/ Content row end -->
						</div><!--/ Container end -->
					</div><!--/ Footer top end -->


				<?php
				endif;
			endif;
			?>



			<div class="footer-main <?php echo isset( $style ) && $style[ 'footer_style' ] == 'two' ? esc_attr( 'footer-style-2' ) : '' ?>">
				<div class="container">
					<div class="row">
						<?php
						$widget_count = fw_akg( 'yes/widgets_count', bizipress_get_option( 'footer_widget' ) );
						for ( $i = 1; $i <= $widget_count; $i++ ) {
							?>
						<div class="col-md-<?php echo esc_attr(12/$widget_count) ?> col-sm-12">
								<?php
								if ( is_active_sidebar( 'footer-'.$i ) ) : dynamic_sidebar( 'footer-'.$i );
								endif;
								?>
							</div><!--/ End Recent Posts-->
						<?php } ?>

					</div><!-- Row end -->
				</div><!-- Container end -->
			</div>
		</footer><!-- Footer end -->
	<?php endif; ?>
<?php endif; ?>

<?php $footer_bg_setting = bizipress_get_option( 'copyright_style', array( 'main_footer_logo' => 'one' ) );
?>

<!-- Copyright start -->
<div class="copyright <?php echo!defined( 'FW' ) ? 'extra-color' : ''; ?> <?php echo esc_attr( $footer_bg_setting[ 'main_footer_logo' ] ) == 'two' ? 'copyright-style-2' : '' ?>">
	<div class="container">
		<div class="row border-top">
			<?php
			if ( $footer_bg_setting[ 'main_footer_logo' ] == 'one' ) {
				?>
				<div class="col-sm-6"><div class="copyright-info">
						<span><?php echo bizipress_kses( bizipress_get_option( 'footer_copyright_text' ) ) ?></span>
					</div></div>

				<div class="col-sm-6">
					<?php
					if ( defined( 'FW' ) ):
						wp_nav_menu( array( 'theme_location' => 'footer', 'container_class' => 'footer-menu', 'menu_class' => 'nav unstyled', 'menu_id' => 'footer-menu', ) );
					endif;
					?>
				</div>

				<?php
			} else {
				?>

				<div class="col-sm-2">
					<?php if ( !empty( $footer_bg_setting[ 'two' ][ 'footer_logo' ] ) ): ?>
						<div class="footer-logo"><img src="<?php echo esc_url( $footer_bg_setting[ 'two' ][ 'footer_logo' ][ 'url' ] ) ?>" alt="<?php esc_html_e( 'footer logo', 'bizipress' ) ?>"></div>
					<?php endif; ?>
				</div>
				<div class="col-sm-7">
					<p><?php echo bizipress_kses( $footer_bg_setting[ 'two' ][ 'footer_text' ] ) ?></p>
				</div>

				<div class="col-sm-3 text-center">
					<div class="footer-social social-color">
						<ul>
							<?php foreach ( (array) $footer_bg_setting[ 'two' ][ 'footer_social' ] as $social ): ?>
								<li><a title="<?php echo esc_html( $social[ 'title' ] ); ?>" href="<?php echo esc_url( $social[ 'link' ] ); ?>"><i class="<?php echo esc_attr( $social[ 'icon' ] ); ?>"></i></a></li>
							<?php endforeach; ?>
						</ul>
					</div><!-- Footer social end -->
					<div class="copyright-info">
						<span><?php echo bizipress_kses( bizipress_get_option( 'footer_copyright_text' ) ) ?></span>
					</div>
				</div>
			<?php } ?>
		</div><!--/ Row end -->

		<div class="row">
			<div class="col-md-12 text-center">
				<?php if ( !empty( $copyright ) ): ?>
					<div class="copyright-info"><?php echo wp_kses_post( $copyright ); ?></div>
				<?php endif; ?>
			</div>
		</div><!--/ Row end -->

		<?php if ( $scrollup == 'yes' ): ?>
			<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
				<button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-double-up"></i></button>
			</div>
		<?php endif; ?>
	</div><!--/ Container end -->
</div><!--/ Copyright end -->

</div>
<?php wp_footer(); ?>
</body>
</html>