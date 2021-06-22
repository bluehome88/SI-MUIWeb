jQuery( document ).ready( function ( $ ) {
  // claim button
  $(".vc_tta-tab a[href='#1622128225297-ce9475cb-8388']").click(function(e){ 
    e.stopPropagation();
    e.preventDefault(); 

    window.location.href = "https://www.massyunitedcargo.com/claims/claim-form";
    return; 
  })

  var country = getCookie('country'); 
  if( country == "barbados" || country == "jamaica" || country == "caymanislands" || country == "trinidadandtobago"){
    $(".page.page-id-52 ul.vc_tta-tabs-list .vc_tta-tab a[href='#marine']").on("click", function(e){
      console.log("button clicked");
      e.stopPropagation();
      e.preventDefault();

      $("#exampleModalCenter").modal('show');
    });
  }
});