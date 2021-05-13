<?php
/*
 * This is for nav style
 *  */
$menu			 = bizipress_get_option( 'mainmenu_style' );
$logo			 = bizipress_get_image( 'menu_logo', BIZIPRESS_IMAGES . '/logo.png' );
$menu_class		 = $menu_style		 = $header_wrapper	 = $pull_right		 = '';

if ( function_exists( '_dev_site_style_control' ) && 'post' != get_post_type() ) {
	$page_menu = fw_get_db_post_option( $post->ID, 'custom_menu_style' );
	if ( $page_menu[ 'page_menu' ] == 'yes' ) {
		$menu = $page_menu[ 'yes' ][ 'mainmenu_style' ];
		if ( isset( $page_menu[ 'yes' ][ 'menu_logo' ] ) && $page_menu[ 'yes' ][ 'menu_logo' ] != '' ) {
			$logo = $page_menu[ 'yes' ][ 'menu_logo' ][ 'url' ];
		}
	}
}
//fw_print( $page_menu );
//Default style
$nav_class = 'site-navigation';
if ( defined( 'FW' ) ) {
	$menu_style = fw_akg( 'menu_style', $menu );

//	fw_print($menu_style);
	if ( $menu_style == 'menu-1' ) {
		$menu_class		 = 'header-trans-leftbox';
		$header_wrapper	 = 'header-wrapper';
		$pull_right		 = 'pull-right';
	} else if ( $menu_style == 'menu-2' ) {
		$menu_class = 'header-standard header-transparent';
	} else if ( $menu_style == 'menu-3' ) {

		$boxed		 = $menu[ 'menu-3' ][ 'boxed' ] == 'yes' ? 'header-boxed' : '';
		$menu_class	 = 'header-standard' . ' ' . $boxed;
	} else if ( $menu_style == 'menu-4' ) {
		$menu_class	 = 'header-standard header-boxed highlight';
		$nav_class	 = 'site-navigation navdown nav-transparent';
	} else if ( $menu_style == 'menu-5' ) {
		$menu_center_color	 = $menu[ 'menu-5' ][ 'center-color' ] == 'transparent' ? 'nav-boxed-transparent' : 'nav-box';
		$menu_class			 = $menu[ 'menu-5' ][ 'boxed' ] == 'yes' ? 'header nav-down ' . $menu_center_color : 'header nav-down';
		$nav_class			 = $menu[ 'menu-5' ][ 'boxed' ] == 'yes' ? 'site-navigation navdown' : 'site-navigation navdown';
	}
	if ( $menu_style != 'menu-4' ) {
		get_template_part( 'template-parts/navigation/content', 'nav-top' );
	}
} else {$menu_class = 'header-trans-leftbox';}

if ( $menu_style == 'menu-5' ) {?><header id="header" class="<?php echo esc_attr( $menu_class ) ?>"><div class="container"><div class="row"><div class="logo-area clearfix"><div class="col-md-3 col-xs-12 navbar-header"><div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div><!-- Site logo end --></div><!-- Navbar header end --><div class="col-xs-12 col-md-9 pull-right"><ul class="top-info unstyled"><?php if ( defined( 'FW' ) ):$top_details = bizipress_get_option( 'top_contact_details' ); foreach ( (array) $top_details as $details ):?><li class="top-info-content"><span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span><div class="info-wrapper"><p class="info-title"><?php echo esc_html( $details[ 'info' ] ) ?></p><p class="info-subtitle"><?php echo esc_html( $details[ 'title' ] ) ?></p></div></li><?php endforeach;endif;get_template_part( 'template-parts/navigation/nav-part/cta', 'button' );?></ul><!-- Ul end --></div><!-- header right end --></div><!-- logo area end --></div><!-- Row end --></div><!-- Container end --><nav class="<?php echo esc_attr( $nav_class ); ?>"><div class="container"><div class="row"><div class="col-sm-12"><?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?></div><!--/ Col end --></div><!--/ Row end --><?php get_template_part( 'template-parts/navigation/nav-part/nav', 'search' ); ?></div><!--/ Container end --></nav><!--/ Navigation end -->header><!--/ Header end --><?php } elseif ( $menu_style == 'menu-4' ) { ?>
<header id="header" class="header nav-down header-solid"><div class="container"><div class="row"><div class="logo-area clearfix"><div class="logo col-xs-12 col-md-3"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div><!-- logo end --><div class="col-xs-12 col-md-9 pull-right"><ul class="top-info unstyled"><?phpif ( defined( 'FW' ) ):$top_details = bizipress_get_option( 'top_contact_details' );foreach ( (array) $top_details as $details ):?><li><span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span><div class="info-wrapper"><p class="info-title"><?php echo esc_html( $details[ 'info' ] ) ?></p><p class="info-subtitle"><?php echo esc_html( $details[ 'title' ] ) ?></p></div></li><?phpendforeach;endif;get_template_part( 'template-parts/navigation/nav-part/cta', 'button' );?></ul><!-- Ul end --></div><!-- logo area end --></div><!-- Row end --></div><!-- Container end --><nav class="<?php echo esc_attr( $nav_class ); ?>"><div class="container"><div class="row"><div class="col-sm-12"><?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?><?php get_template_part( 'template-parts/navigation/nav-part/nav', 'search' ); ?></div><!--/ Col end --></div><!--/ Row end --></div><!-- Container end --></nav><!-- End of navigation --></header><!--/ Header end --><?php } else { ?><header id="header" class="<?php echo esc_attr( $menu_class ) ?> clearfix"><div class="container"><div class="row"><div class="<?php echo esc_attr( $header_wrapper ) ?> clearfix"><div class="col-md-3 col-sm-3 col-xs-12 navbar-header"><div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div><!-- Site logo end --></div><!-- Navbar header end --><div class="col-md-9 col-sm-9 col-xs-12"><!-- Navigation start --><nav class="<?php echo esc_attr( $nav_class ); ?>"><?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?></nav><!-- End of navigation --><?php get_template_part( 'template-parts/navigation/nav-part/nav', 'search' );?></div><!-- Col end --></div><!-- Header wrapper end --></div><!--/ Row end --></div><!--/ Container end --></header><!--/ Header end --><?php } ?>

