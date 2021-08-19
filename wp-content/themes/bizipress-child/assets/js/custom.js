jQuery( document ).ready( function ( $ ) {
  // claim button
  var country = getCookie('country'); 
  $(".vc_tta-tab a[href='#1622128225297-ce9475cb-8388']").click(function(e){ 
    e.stopPropagation();
    e.preventDefault(); 
  
  if( country == "barbados" )
      window.location.href = "/cargo-claim-form-barbados/";
  if( country == "jamaica" )
      window.location.href = "/cargo-claim-form-jamaica/";
  if( country == "caymanislands" )
      window.location.href = "/cargo-claim-form-cayman-islands/";
  if( country == "trinidadandtobago" )
      window.location.href = "/cargo-claim-form-trinidad-and-tobago/";
      
    return; 
  })

  if( country == "barbados" || country == "jamaica" || country == "caymanislands" || country == "trinidadandtobago"){
    $(".page.page-id-52 ul.vc_tta-tabs-list .vc_tta-tab a[href='#marine']").on("click", function(e){
      console.log("button clicked");
      e.stopPropagation();
      e.preventDefault();

      $("#exampleModalCenter").modal('show');
    });
  }
});