/**
 * Visual Composer controls
 */
(function($) {

    'use strict';

    var GLOBAL_DATA = window.CandyFAQ;
    var ui = window.CandyFAQ_UI;
    var i18n = GLOBAL_DATA.i18n;

    var $vcContainer = $('#vc_ui-panel-edit-element.vc_active');

    ui.setupTopicsSelect($vcContainer);
    ui.setupTermsSelect($vcContainer);
    ui.setupImageSelect($vcContainer);
    ui.setupCSSSize($vcContainer);
    ui.setupVCToggle($vcContainer);
}(jQuery));