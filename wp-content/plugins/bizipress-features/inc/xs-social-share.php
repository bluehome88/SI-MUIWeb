<?php

function bizipress_social_share() {
	?>

	<ul class = "post-social-icons unstyled">
		<li><a href = "http://www.facebook.com/share.php?u=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>"><i class = "fa fa-facebook"></i></a></li>
		<li><a href = "http://twitter.com/intent/tweet?status=<?php echo get_the_title(); ?>+<?php echo get_the_permalink(); ?>"><i class = "fa fa-twitter"></i></a></li>
		<li><a href = "https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>"><i class = "fa fa-google-plus"></i></a></li>
		<li><a href = "http://pinterest.com/pin/create/bookmarklet/?url=<?php echo get_the_permalink(); ?>&is_video=false&description=<?php echo get_the_title(); ?>"><i class = "fa fa-pinterest"></i></a></li>
		<li><a href = "http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&source=<?php echo esc_url( home_url( '/' ) ); ?>"><i class = "fa fa-linkedin"></i></a></li>
	</ul>
<?php } ?>