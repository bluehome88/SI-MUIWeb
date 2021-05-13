<?php
global $post_ID;
$menu			 = bizipress_get_option( 'mainmenu_style' );
$menu_class		 = $menu_style		 = $header_wrapper	 = $pull_right		 = '';
?>


<?php 
$sectionURLS252 = explode("/",  $_SERVER['REQUEST_URI']); 

if ((wp_get_post_parent_id( $post_ID ) == 56)  || ($sectionURLS252[2] == 'business' )) $menu252='bi-new-menu';
		else $menu252='primary'; ?>
			
<div class="menubar site-nav-inner">
	<!-- The WordPress Menu goes here -->
	<?php
	wp_nav_menu(
	array(
		'theme_location'	 => $menu252,
		'container_class'	 => 'navbar-responsive-collapse ' . $pull_right,
		'menu_class'		 => 'nav navbar-nav main-menu',
		'fallback_cb'		 => 'news247_primary_menu_fallback',
		'menu_id'			 => 'main-menu',
	)
	);
	?>
</div> <!-- navbar menubar -->
<div id="responsive-menu" class="d-md-none d-lg-none">
	<div class="ts-navbar-inner">
		<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse">
		<?php
		if ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'primary',
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
