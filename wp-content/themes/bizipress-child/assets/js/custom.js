jQuery( document ).ready( function ( $ ) {
  // claim button
  $(".vc_tta-tab a[href='#1622128225297-ce9475cb-8388']").click(function(e){ 
    e.stopPropagation();
    e.preventDefault(); 

    window.location.href = "https://www.massyunitedcargo.com/claims/claim-form";
    return; 
  })
});