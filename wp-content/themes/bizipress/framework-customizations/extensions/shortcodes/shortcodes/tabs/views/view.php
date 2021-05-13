<?php
if ( !defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'tab-cont-' );

$tab_style_settings	 = $atts[ 'tabs_style_settings' ];
$tab_style			 = $tab_style_settings[ 'tabs_style' ];

$tabs_1	 = $tab_style_settings[ 'tab-1' ];
$tabs_2	 = $tab_style_settings[ 'tab-2' ];
$tabs_3	 = $tab_style_settings[ 'tab-3' ];
?>

<?php if ( $tab_style == 'tab-1' ): ?>
	<div class="landing-tab clearfix">
		<ul class="nav nav-tabs nav-stacked col-md-3 col-sm-5">

			<?php
			$counter = 1;
			foreach ( $tabs_1[ 'tabs' ] as $tab ) :
				?>
				<li class="<?php echo ($counter == 1) ? 'active' : ''; ?>">
					<a class="animated fadeIn" href="#<?php echo esc_attr( $id ) . '-' . $counter; ?>" data-toggle="tab">
						<?php if ( !empty( $tab[ 'tab_main_icon' ] ) ): ?>
							<span class="tab-icon"><i class="<?php echo esc_attr( $tab[ 'tab_main_icon' ] ); ?>"></i></span>
						<?php endif; ?>


						<div class="tab-info">
							<h3><?php echo bizipress_theme_translate( esc_attr( $tab[ 'left_title' ] ) ); ?></h3>
						</div>
					</a>
				</li>
				<?php
				$counter++;
			endforeach;
			?>
		</ul>

		<div class="tab-content col-md-9 col-sm-7">

			<?php
			$cnt = 1;
			foreach ( $tabs_1[ 'tabs' ] as $tab ) :
				?>
				<div class="tab-pane <?php echo ($cnt == 1) ? 'active' : ''; ?> animated fadeInRight" id="<?php echo esc_attr( $id ) . '-' . $cnt; ?>">
					<?php if ( !empty( $tab[ 'tab_main_icon' ] ) ): ?>
						<i class="<?php echo esc_attr( $tab[ 'tab_main_icon' ] ); ?> big"></i>
					<?php endif; ?>


					<?php if ( !empty( $tab[ 'right_title' ] ) ): ?>
						<h3><?php echo bizipress_theme_translate( esc_attr( $tab[ 'right_title' ] ) ); ?></h3>
					<?php endif; ?>

					<?php if ( !empty( $tab[ 'right_description' ] ) ): ?>
						<p><?php echo bizipress_theme_translate( esc_textarea( do_shortcode( $tab[ 'right_description' ] ) ) ); ?></p>
					<?php endif; ?>
				</div>
				<?php
				$cnt++;
			endforeach;
			?>
		</div>
	</div>

<?php elseif ( $tab_style == 'tab-2' ): ?>
	<div class="featured-tab clearfix">
		<ul class="nav nav-tabs">

			<?php
			$counters = 1;
			foreach ( $tabs_2[ 'tabs' ] as $tab ) :
				?>
				<li class="<?php echo ($counters == 1) ? 'active' : ''; ?>">
					<a class="animated fadeIn" href="#<?php echo esc_attr( $id ) . '-' . $counters; ?>" data-toggle="tab">
						<?php if ( !empty( $tab[ 'left_icon' ] ) ): ?>
							<span class="tab-head"><i class="<?php echo esc_attr( $tab[ 'left_icon' ] ); ?>"></i></span>
						<?php endif; ?>


						<div class="tab-info">
							<span class="tab-text-title">
								<?php echo bizipress_theme_translate( esc_attr( $tab[ 'left_title' ] ) ); ?>
								</span>
						</div><!-- Tab info end -->
					</a>
				</li>
				<?php
				$counters++;
			endforeach;
			?>
		</ul>
		<div class="tab-content">

			<?php
			$cnts = 1;
			foreach ( $tabs_2[ 'tabs' ] as $tab ) :
				?>
				<div class="tab-pane <?php echo ($cnts == 1) ? 'active' : ''; ?> animated fadeInRight" id="<?php echo esc_attr( $id ) . '-' . $cnts; ?>">
				
						
					<?php if ( !empty( $tab[ 'right_image' ] ) ): ?>
						<div class="bg-contain-verticle <?php echo esc_attr( $tab[ 'image_position' ] ); ?>">
							<img class="img-center" src="<?php echo esc_url( $tab[ 'right_image' ][ 'url' ] ); ?>" alt="">
						</div>
					<?php endif; ?>
				
					<div class="tab-content-info">
						<?php if ( !empty( $tab[ 'right_title' ] ) ): ?>
							<h3 class="tab-content-title"><?php echo bizipress_theme_translate( esc_attr( $tab[ 'right_title' ] ) ); ?></h3>
						<?php endif; ?>

						<?php if ( !empty( $tab[ 'right_description' ] ) ): ?>
							<p><?php echo bizipress_theme_translate( esc_textarea( do_shortcode( $tab[ 'right_description' ] ) ) ); ?></p>
						<?php endif; ?>
					</div>
					

			
				</div>
				<?php
				$cnts++;
			endforeach;
			?>
		</div><!-- tab content -->
	</div><!-- Featured tab end -->

<?php elseif ( $tab_style == 'tab-3' ): ?>
	<div class="widget widget-tab">
		<ul class="nav nav-tabs">
			<?php
			$ctn3 = 1;
			foreach ( $tabs_3[ 'tabs' ] as $tab ) :
				?>
			<li class="<?php echo ($ctn3 == 1) ? 'active' : ''; ?>"><a href="#<?php echo esc_attr($id) . '-' . $ctn3; ?>" data-toggle="tab"><?php echo bizipress_theme_translate( esc_attr( $tab[ 'title' ] ) ); ?></a></li>
				<?php
				$ctn3++;
			endforeach;
			?>
		</ul>
		<div class="tab-content">
			<?php
			$cnts33 = 1;
			foreach ( $tabs_3[ 'tabs' ] as $tab ) :
				?>
				<div class="tab-pane <?php echo ($cnts33 == 1) ? 'active' : ''; ?>" id="<?php echo esc_attr($id) . '-' . $cnts33; ?>">
					<?php if ( !empty( $tab[ 'description' ] ) ): ?>
						<p><?php echo bizipress_theme_translate( esc_textarea( do_shortcode( $tab[ 'description' ] ) ) ); ?></p>
					<?php endif; ?>
				</div>
				<?php
				$cnts33++;
			endforeach;
			?>
		</div>
	</div><!-- End default tabs -->

	<?php
 endif;
