!function($, window, document, _undefined)
{
    "use strict";

    XF.XfaColorPicker = XF.extend(XF.ColorPicker, {
        __backup: {
            'updateBox': '_updateBox'
        },

        start: true,

        options: $.extend({}, XF.ColorPicker.prototype.options, {
            callback: null,
            callbackParam: null
        }),

        updateBox: function()
        {
            this._updateBox();

            var color = this.getInputColor();

            if (this.options.callback)
            {
                this.$target.val(color);

                // Don't callback on load
                if (this.start)
                {
                    this.start = false;
                }
                else
                {
                    if (this.options.callbackParam != null)
                    {
                        window[this.options.callback](this.options.callbackParam);
                    }
                    else
                    {
                        window[this.options.callback]();
                    }
                }
            }
            else
            {
                this.$target.val('');
            }
        }
    });

    XF.Element.register('xfa-color-picker', 'XF.XfaColorPicker');
}
(jQuery, window, document);