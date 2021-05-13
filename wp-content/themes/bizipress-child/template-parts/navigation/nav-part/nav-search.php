<div class="nav-search">
	<span><i class="icon icon-search"></i></span>
</div><!-- Search end -->

<form method="get" class="search-block" style="display: none;" action="<?php echo esc_url( home_url( '/' ) ) ?>" id="search">
	<input type="text" name="s" class="form-control" placeholder="<?php esc_html_e( 'Type what you want and enter', 'bizipress' ) ?>" value="<?php get_search_query() ?>">
	<span class="search-close">&times;</span>

</form>