
<?php if (!is_front_page()) { ?>

<div class="breadcrumb_container">
<?php
	if ( function_exists('yoast_breadcrumb') )
	  	yoast_breadcrumb( '<div class="container">','</div>' );
?>	
</div>
<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $bg_image ); ?>>
	<?php
		echo bizipress_kses( $overlay );
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="banner-heading">
					<h1 class="banner-title"><?php echo esc_html( $heading ); ?></h1>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 
<?php } ?>