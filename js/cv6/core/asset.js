!function($, window, document, _undefined)
{
    "use strict";

	XF.Element.extend("asset-upload", {
		__backup: {
			"ajaxResponse": "_afterAjaxResponseCv6Core"
		},
		ajaxResponse: function (data) {
			this._afterAjaxResponseCv6Core(data);
			if (data.path) {
				this.$path.css('background-image', 'url(' + data.path + ')');
			}
		}
	});
	
	XF.cv6AssetImage = XF.Element.newHandler({

		oldval: null,

		init: function () {
			this.$target.css('background-image', 'url(' + this.$target.val() + ')');
			var self = this;
			this.$target.on('blur', XF.proxy(this, 'blur'))
				.on('focus', XF.proxy(this, 'focus'));;
		},

		focus: function (e) {
			this.$target.addClass('cv6-noimg').css('background-image', 'url()');
			this.oldval = this.$target.val();
		},

		blur: function (e) {
			this.$target.removeClass('cv6-noimg').css('background-image', 'url(' + this.$target.val() + ')');
		},

	});

	XF.Element.register('cv6AssetImage', 'XF.cv6AssetImage');

}(jQuery, window, document);


