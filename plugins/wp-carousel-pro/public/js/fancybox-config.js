jQuery(document).ready(function ($) {

	$('.wpcp-carousel-section').each(function () {
		var carousel_id = jQuery(this).attr('id');
		var lightbox_infobar = jQuery(this).data('infobar');
		var lightbox_toolbar = jQuery(this).data('lb_control');
		var thumb_button = jQuery(this).data('thumbs');
		var slick = jQuery(this).data('slick');
		var thumb = (thumb_button == 'thumbs') ? true : false;
		if (slick) {
			var selector = '#' + carousel_id + '.wpcp-carousel-section .slick-slide:not(.slick-cloned) [data-fancybox="wpcp_view"]';
		} else {
			var selector = '#' + carousel_id + '.wpcp-carousel-section .wpcp-single-item:not(.bx-clone) [data-fancybox="wpcp_view"]';
		}
		$().fancybox({
			selector: selector,
			backFocus: false,
			margin: [44, 0, 22, 0],
			baseClass: carousel_id + ' wpcp-fancybox-wrapper',
			loop: true,
			thumbs: {
				autoStart: thumb,
				axis: 'x'
			},
			toolbar: lightbox_toolbar,
			infobar: lightbox_infobar,
			beforeShow: function () {
				this.title = this.title + " - " + $(this.element).data("caption");
			},

            // Image and Video url share with social link .
			share : {
				url : function( instance, item ) {
				  if (item.type === 'inline' && item.contentType === 'video') {
					return item.$content.find('source:first').attr('src');
				  }
				  return item.src;
			    },
		    },
			
			// Images look sharper on retina displays.
			afterLoad: function (instance, current) {
				var pixelRatio = window.devicePixelRatio || 1;

				if (pixelRatio > 1.5) {
					current.width = current.width / pixelRatio;
					current.height = current.height / pixelRatio;
				}

			}
		})

		$('#' + carousel_id + '.wpcp-carousel-section').on('click', '.slick-cloned,.bx-clone', function (e) {
			$(selector)
				.eq(($(e.currentTarget).attr("data-slick-index") || 0) % $(selector).length)
				.trigger("click", {
					$trigger: $(this)
				});
			return false;
		});

		// Fancybox doesn't support Dailymotion by default. This code helps to embed Dailymotion video in Fancybox popup.
		$.fancybox.defaults.media.dailymotion = {
			matcher: /dailymotion.com\/video\/(.*)\/?(.*)/,
			params: {
				autoplay: 1,
			},
			type: 'iframe',
			url: '//www.dailymotion.com/embed/video/$1'
		};
	})

	$(".wcp-light-box-caption").on('click', function (e) {
		e.preventDefault();
		var current_product = $(this).parents(".wpcp-single-item");
		$(current_product).find('[data-fancybox="wpcp_view"]').trigger('click');
	})
});
