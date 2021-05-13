(function ($) {
    'use strict';
    jQuery('body').find('.wpcp-carousel-section.wpcp-ticker').each(function () {

        var carousel_id = $(this).attr('id');
        var _this = $(this);

        if (jQuery().bxSlider) {
            jQuery('#' + carousel_id).bxSlider({
                mode: _this.data('mode'),
                minSlides: _this.data('min-slides'),
                maxSlides: _this.data('max-slides'),
                slideWidth: _this.data('slide-width'),
                slideMargin: _this.data('slide-margin'),
                shrinkItems: false,
                ticker: true,
                speed: _this.data('speed'),
                tickerHover: _this.data('hover-pause'),
                wrapperClass: 'sp-wpcp-wrapper',
                autoDirection: _this.data('direction'),
            });
        }
        if (_this.data('mode') == 'vertical') {
            jQuery('#' + carousel_id).parents('.sp-wpcp-wrapper').css("margin", "auto");
        }
    });
})(jQuery);