/**
 * Project: Candy FAQ
 * Copyright: 2017-2018 @KonstruktStudio
 */
(function($) {

    'use strict';

    var GLOBAL_DATA = window.CandyFAQ;
    var ajaxPrefix = GLOBAL_DATA.ajaxPrefix;
    var ui = window.CandyFAQ_UI;
    var settings = GLOBAL_DATA.settings;
    var i18n = GLOBAL_DATA.i18n;

    function initFeedback() {
        $('#poststuff').on('click', '.fn-remove-feedback', function(e) {
            e.preventDefault();

            var $link = $(e.currentTarget);
            var $row = $link.parents('.mkb-article-feedback-item');

            $row.addClass('mkb-article-feedback-item--removing');

            ui.fetch({
                action: ajaxPrefix + '_remove_feedback',
                feedback_id: parseInt($link.data('id'))
            }).then(function() {
                $row.slideUp('fast', function() {
                    $row.remove();
                });
            });
        });
    }

    function init() {
        initFeedback();
    }

    $(document).ready(init);
})(jQuery);