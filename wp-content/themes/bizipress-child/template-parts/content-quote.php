<?php
	$country = $_COOKIE['country'];
	$open_link = "";
	if( $country == "trinidadandtobago" || $country == "barbados" || $country == "jamaica" || $country == "caymanislands" ){
		$open_link = "/open-cargo-application/".$country."/";
		$single_link = "/single-cargo-application/".$country."/";
	}

	if( $open_link ){
?>
<div id="exampleModalCenter" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h5 id="exampleModalLongTitle" class="modal-title">Select the option that best describes your Cargo Needs</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo $open_link; ?>">
							<div>
								<img class="alignnone size-medium wp-image-5659" src="/wp-content/uploads/2021/05/single_cargo_icon.png" alt="" width="193" height="157" />
								<h3>Multiple Shipments</h3>
								Get a quote for multiple annual shipments
							</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="<?php echo $single_link; ?>">
							<div>
								<img class="alignnone size-full wp-image-5658" src="/wp-content/uploads/2021/05/multiple_cargo_icon.png" alt="" width="193" height="157" />
								<h3>Single Shipment</h3>
								Get a quote for one single shipment
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>