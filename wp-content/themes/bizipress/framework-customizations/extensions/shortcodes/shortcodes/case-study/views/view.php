<?php
if ( !defined( 'FW' ) )
	die( 'Forbidden' );
$case_study = fw_akg( 'case_study', $atts, array() );
?>

<div id="featured-projects-slide" class="owl-carousel owl-theme featured-projects-slide">
	<?php
	foreach ( $case_study as $case ) :
		?>
		<div class="item">
			<div class="featured-projects-content">
				<div class="featured-projects-text pull-left">
					<h2 class="column-title"><span><?php echo esc_html( $case[ 'title' ] ) ?></span> <?php echo esc_html( $case[ 'subtitle' ] ) ?></h2>
					<p class="intro-desc"><?php echo esc_html( $case[ 'content' ] ) ?></p> 
					<p>
						<a class="btn btn-primary" href="<?php echo esc_url( $case[ 'button' ][ 'link' ] ) ?>" target="<?php echo esc_attr( $case[ 'button' ][ 'target' ] ) ?>"> <?php echo esc_html( $case[ 'button' ][ 'label' ] ) ?></a>
					</p>
				</div> 
				<div class="features-slider-img pull-right">
					<img src="<?php echo esc_html( $case[ 'image' ][ 'url' ] ) ?>" alt="">
				</div>   
			</div>
		</div><!-- Item 1 end -->

	<?php endforeach; ?>
</div><!-- Featured Projects slider end-->
<script>
    jQuery( document ).ready( function ( $ ) {
      jQuery( ".featured-projects-slide" ).owlCarousel( {
            loop: true,
            animateOut: 'fadeOut',
            autoplay: false,
            autoplayHoverPause: true,
            nav: true,
            margin: 0,
            dots: false,
            mouseDrag: true,
            touchDrag: true,
            slideSpeed: 500,
            navText: [ "<i class='icon icon-left-arrow2'></i>", "<i class='icon icon-right-arrow2'></i>" ],
            items: 1,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                }
            }

        } );
    } );
</script>