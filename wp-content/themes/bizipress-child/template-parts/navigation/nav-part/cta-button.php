<?php /*
$cta_button = bizipress_get_option( 'cta_button_settings' );
if ( isset( $cta_button[ 'cta_button' ] ) && $cta_button[ 'yes' ][ 'url' ] != '' ) {
	?>
	<li class="header-get-a-quote">
		<a class="btn btn-primary" href="<?php echo esc_url( $cta_button[ 'yes' ][ 'url' ] ); ?>"> <?php echo esc_html( $cta_button[ 'yes' ][ 'title' ] ); ?></a>
	</li>
<?php } */ ?>


<div class="menubar site-nav-inner">
	<!-- The WordPress Menu goes here -->
	<?php
	wp_nav_menu(
	array(
		'theme_location'	 => 'middle-new-menu',
		'container_class'	 => 'navbar-responsive-collapse ',
		'menu_class'		 => 'nav navbar-nav main-menu',
		'fallback_cb'		 => 'news247_primary_menu_fallback',
		'menu_id'			 => 'middle-menu',
	)
	);
	?>
</div> <!-- navbar menubar -->
<div id="responsive-menu" class="d-md-none d-lg-none">
	<div class="ts-navbar-inner">
		<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse2">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse2">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'middle-new-menu',
				'container'		 => false,
				'menu_class'	 => 'nav navbar-nav',
				'fallback_cb'	 => '',
				'depth'			 => 3,
				'walker'		 => new wp_main_mobile_navwalker()
			)
			);
		}
		?>
	</div>
</div><!--/.#mobile-menu-->