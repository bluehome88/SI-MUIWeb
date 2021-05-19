<?php
$top_class		 = $menu_bg_color	 = '';


$menu = bizipress_get_option('mainmenu_style');
//$top_color = bizipress_get_option( 'top_picker' );


if (function_exists('_dev_site_style_control') && 'post' != get_post_type()) {
	$page_menu = fw_get_db_post_option($post->ID, 'custom_menu_style');

	if ($page_menu['page_menu'] == 'yes') {
		$menu = $page_menu['yes']['mainmenu_style'];
		bizipress_menu_page_style($page_menu, $menu);
	}
}
$top_menu = fw_akg('menu_style', $menu);


if ($top_menu == 'menu-1') {
	$top_class = 'topbar-transparent';
} else if ($top_menu == 'menu-2') {
	$top_class = 'topbar-transparent with-bg';
} else if ($top_menu == 'menu-3') {

	$top_class = $menu['menu-3']['boxed'] == 'yes' ? 'topbar-transparent' : 'top-bar highlight';
} else if ($top_menu == 'menu-4') {
	$top_class = 'topbar-transparent';
} else if ($top_menu == 'menu-5') {
	$top_class = $menu['menu-5']['center-color'] == 'transparent' ? 'topbar-transparent border-down' : 'top-bar solid-bg';

	//	$top_class = 'top-bar solid-bg';
}
?>

<div id="top-bar" class="<?php echo esc_attr($top_class); ?>">
	<div class="container">
		<div class="row">
			<!--/ Top info end -->
			<div class="col-md-12 col-sm-12 col-xs-12 topBarAlignment252">
				<ul class="top-social col-md-10 col-sm-10 col-xs-12">
					<li>
						<?php
						if (defined('FW')) :
							$top_social_details = bizipress_get_option('top_social_details');
							foreach ($top_social_details as $social_details) :
						?><a title="<?php echo esc_attr($social_details['title']) ?>" href="<?php echo esc_url($social_details['link']) ?>" target="_blank"><span class="social-icon"><i class="<?php echo esc_attr($social_details['icon']) ?>"></i></span></a>
						<?php
							endforeach;
						endif;
						?></li>
				</ul>
				<div class="col-md-2 col-sm-2 col-xs-12 padno252 ">
					<div class="countrysel dropdown">
						<button type="button" id="country_list_btn" class="conBTN btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						</button>
						<ul class="dropdown-menu contryList252">
							<li class="country_redirect_li" data-country_redirect="anguilla">
								<div class='sprite anguilla'></div> <span>Anguilla</span>
							</li>
							<li class="country_redirect_li" data-country_redirect="antiguaandbarbuda">
								<div class='sprite antiguaandbarbuda'></div> Antigua & Barbuda
							</li>
							<li> <a href="https://www.massyunited.com/">
									<div class='sprite aruba'></div> Aruba
								</a></li>
							<li class="country_redirect_li" data-country_redirect="bahamas">
								<div class='sprite bahamas'></div> Bahamas
							</li>
							<li class="country_redirect_li" data-country_redirect="barbados">
								<div class='sprite barbados'></div> <span>Barbados</span>
							</li>
							<li class="country_redirect_li" data-country_redirect="belize">
								<div class='sprite belize'></div> Belize
							</li>
							<li class="country_redirect_li" data-country_redirect="britishvirginislands">
								<div class='sprite bvi'></div> British Virgin Islands
							</li>
							<li class="country_redirect_li" data-country_redirect="caymanislands">
								<div class='sprite cayman'></div> Cayman Islands
							</li>
							<li> <a href="https://www.massyunited.com/">
									<div class='sprite curacao'></div> Curacao
								</a></li>
							<li class="country_redirect_li" data-country_redirect="dominica">
								<div class='sprite dominica'></div> Dominica
							</li>
							<li class="country_redirect_li" data-country_redirect="grenada">
								<div class='sprite grenada'></div> Grenada
							</li>
							<li class="country_redirect_li" data-country_redirect="montserrat">
								<div class='sprite montserrat'></div> Montserrat
							</li>
							<li class="country_redirect_li" data-country_redirect="guyana">
								<div class='sprite guyana'></div> Guyana
							</li>
							<li class="country_redirect_li" data-country_redirect="jamaica">
								<div class='sprite jamaica'></div> Jamaica
							</li>
							<li class="country_redirect_li" data-country_redirect="stkittsandnevis">
								<div class='sprite stkitts'></div> St. Kitts & Nevis
							</li>
							<li class="country_redirect_li" data-country_redirect="stlucia">
								<div class='sprite stlucia'></div> St. Lucia
							</li>
							<li class="country_redirect_li" data-country_redirect="stvincentandthegrenadines">
								<div class='sprite stvincentandthegrenadines'></div> St. Vincent & the Grenadines
							</li>
							<li class="country_redirect_li" data-country_redirect="trinidadandtobago">
								<div class='sprite trinidad_and_tobago'></div> Trinidad and Tobago
							</li>
							<li class="country_redirect_li" data-country_redirect="turksandcaicos">
								<div class='sprite turks'></div> Turks & Caicos
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--/ Top social end -->
		</div>
		<!--/ Content row end -->
	</div>
	<!--/ Container end -->
</div>
<!--/ Topbar end -->