const countries = [
  'antiguaandbarbuda',
  'bahamas',
  'barbados',
  'stlucia',
  'jamaica',
  'guyana',
  'grenada',
  'montserrat',
  'belize',
  'britishvirginislands',
  'caymanislands',
  'dominica',
  'stkittsandnevis',
  'stvincentandthegrenadines',
  'trinidadandtobago',
  'turksandcaicos',
  'anguilla',
];

const numbers = {
  anguilla: '1 264 497 3525',
  antiguaandbarbuda: '1 268 480 3050',
  bahamas: null,
  barbados: '1 246 430 1900',
  belize: '1 501 227 7310',
  britishvirginislands: '1 284 393 8920',
  caymanislands: '1 345 743 1900',
  dominica: null,
  grenada: '1 473 440 1193',
  guyana: '1 592 226 1926',
  jamaica: '1 876 633 7085',
  montserrat: '1 664 491 2055',
  stkittsandnevis: '1 869 466 5006',
  stlucia: '1 758 456 6560',
  stvincentandthegrenadines: null,
  trinidadandtobago: '1 868 627 7530',
  turksandcaicos: null,
};

const nameOfCountry = {
  anguilla: 'Anguilla',
  antiguaandbarbuda: 'Antigua and Barbuda',
  bahamas: 'Bahamas',
  barbados: 'Barbados',
  belize: 'Belize',
  britishvirginislands: 'British Virgin Islands',
  caymanislands: 'Cayman Island',
  dominica: 'Dominica',
  grenada: 'Grenada',
  guyana: 'Guyana',
  jamaica: 'Jamaica',
  montserrat: 'Montserrat',
  stkittsandnevis: 'St. Kitts and Nevis',
  stlucia: 'St. Lucia',
  stvincentandthegrenadines: 'St. Vincent And Hegrenadines',
  trinidadandtobago: 'Trinidad And Tobago',
  turksandcaicos: 'Turks and Caicos',
};

var url_loc = document.location.pathname;
var country = getCookie('country');
var country_name;

// redirect

if (url_loc == '/news/') {
  location.replace('/news_categories/' + country + '-news/');
}
if (url_loc == '/news_categories/events/') {
  location.replace('/news_categories/' + country + '/');
}
// if (url_loc == '/resource-centre/blog/') {
//   location.replace('/' + country + '/');
// }
if (url_loc == '/news_categories/news/') {
  location.replace('/news_categories/' + country + '-news/');
}

const replaceUrl = (url) => {
  for (let v of countries) {
    if (url) {
      if (url.includes(v)) {
        url = url.replace(v, country);
        break;
      }
    }
  }

  return url;
};

$(document).on('ready', function () {
  country = getCookie('country');
console.log(country);
  if (country != undefined) {
    country_name = $('.country_redirect_li[data-country_redirect="' + country + '"]')[0]['innerText'];
    $('#country_list_btn').html(
      '<div class="sprite ' + country + '"></div>' + country_name + '<span class="caret caret252"></span>'
    );

    if ($('.social252 a').eq(0).length) {
      $('.social252 a')
        .eq(0)
        .attr('href', replaceUrl($('.social252 a').eq(0).attr('href')));
    }

    if ($('.social252 a').eq(1).length) {
      $('.social252 a')
        .eq(1)
        .attr('href', replaceUrl($('.social252 a').eq(1).attr('href')));
    }

    if ($('.social252 a').eq(2).length) {
      $('.social252 a')
        .eq(2)
        .attr('href', replaceUrl($('.social252 a').eq(2).attr('href')));
    }

    // Add number to header
    if (numbers[country]) {
      $('.callUs a')
        .attr('href', 'tel:' + numbers[country])
        .text('+' + numbers[country]);
    } else {
      $('.callUs').html('');
    }

    // Always set country name in hidden input for forms
    $('.country_choose_input').val(nameOfCountry[country]);

    // Visible contact menu
    $('.contact-menu.' + country).removeClass('d-none');

    // Visible insurance menu
    $('.insurance-menu.' + country).removeClass('d-none');

    // Visible social contributor menu
    $('.social-contribution-menu.' + country).removeClass('d-none');

    // Visible manage menu tab on specific pages
    switch (country) {
      case 'trinidadandtobago':
        $('.manage-teams-menu.tt').removeClass('d-none');
        break;
      case 'barbados':
        $('.manage-teams-menu.mm').removeClass('d-none');
        break;
      case 'guyana':
        $('.manage-teams-menu.gy').removeClass('d-none');
        break;
      case 'caymanislands':
        $('.manage-teams-menu.mm').removeClass('d-none');
        break;
      case 'stlucia':
        $('.manage-teams-menu.sl').removeClass('d-none');
        break;
      default:
        break;
    }
  } else {
 
    setCookie("country", "barbados", 1);
    country = getCookie('country');
    country_name = $('.country_redirect_li[data-country_redirect="' + country + '"]')[0]['innerText'];
    $('#country_list_btn').html(
      '<div class="sprite ' + country + '"></div>' + country_name + '<span class="caret caret252"></span>'
    );
  }

  $('.country_redirect_li').on('click', function () {
    var country_redirect = $(this)['context']['attributes']['data-country_redirect'].nodeValue;
 
    setCookie("country", country_redirect, 1);
    if (url_loc == '/' + country + '/') {
      location.replace('/' + country_redirect + '/');
    } else if (url_loc == '/news_categories/' + country + '-news/') {
      location.replace('/news_categories/' + country + '-news/');
    } else {
      document.location.reload();
    }
  });
});
