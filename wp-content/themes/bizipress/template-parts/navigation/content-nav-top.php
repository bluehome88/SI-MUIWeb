<?php
$top_class		 = $menu_bg_color	 = '';


$menu = bizipress_get_option( 'mainmenu_style' );
//$top_color = bizipress_get_option( 'top_picker' );


if ( function_exists( '_dev_site_style_control' ) && 'post' != get_post_type() ) {
	$page_menu = fw_get_db_post_option( $post->ID, 'custom_menu_style' );

	if ( $page_menu[ 'page_menu' ] == 'yes' ) {
		$menu = $page_menu[ 'yes' ][ 'mainmenu_style' ];
		bizipress_menu_page_style( $page_menu, $menu );
	}
}
$top_menu = fw_akg( 'menu_style', $menu );


if ( $top_menu == 'menu-1' ) {
	$top_class = 'topbar-transparent';
} else if ( $top_menu == 'menu-2' ) {
	$top_class = 'topbar-transparent with-bg';
} else if ( $top_menu == 'menu-3' ) {

	$top_class = $menu[ 'menu-3' ][ 'boxed' ] == 'yes' ? 'topbar-transparent' : 'top-bar highlight';
} else if ( $top_menu == 'menu-4' ) {
	$top_class = 'topbar-transparent';
} else if ( $top_menu == 'menu-5' ) {
	$top_class = $menu[ 'menu-5' ][ 'center-color' ] == 'transparent' ? 'topbar-transparent border-down' : 'top-bar solid-bg';

//	$top_class = 'top-bar solid-bg';
}
?>


<div id="top-bar" class="<?php echo esc_attr( $top_class ); ?>"><div class="container"><div class="row"><div class="col-md-9 col-sm-9 col-xs-12"><?php if ( $top_menu != 'menu-5' ) { ?><ul class="top-info"><?phpif ( defined( 'FW' ) ):$top_details = bizipress_get_option( 'top_contact_details' );foreach ( $top_details as $details ):?><li><span class="info-icon"><i class="<?php echo esc_attr( $details[ 'icon' ] ) ?>"></i></span><div class="info-wrapper"><p class="info-text"><?php echo esc_html( $details[ 'info' ] ) ?></p></div></li><?phpendforeach;endif;?></ul><?php}else {wp_nav_menu( array('theme_location' => 'top_menu','container_class'	 => 'navbar-responsive-collapse ' . $pull_right,'menu_class'	 => 'top-menu unstyled ','fallback_cb'	 => 'news247_primary_menu_fallback','menu_id'		 => 'top-bar-menu',) );}?></div><!--/ Top info end --><div class="col-md-3 col-sm-3 col-xs-12 text-right"><div></div><ul class="top-social"><li><?phpif ( defined( 'FW' ) ):$top_social_details = bizipress_get_option( 'top_social_details' );foreach ( $top_social_details as $social_details ):?><a title="<?php echo esc_attr( $social_details[ 'title' ] ) ?>" href="<?php echo esc_url( $social_details[ 'link' ] ) ?>" target="_blank"><span class="social-icon"><i class="<?php echo esc_attr( $social_details[ 'icon' ] ) ?>"></i></span></a><?phpendforeach;endif;?></li></ul></div><!--/ Top social end --></div><!--/ Content row end --><div><!--/ Container end --></div><!--/ Topbar end -->