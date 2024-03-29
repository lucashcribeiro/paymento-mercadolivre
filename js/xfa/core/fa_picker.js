!function($, window, document, _undefined)
{
    "use strict";

    XF.XFAFAPicker = XF.Element.newHandler({
        options: {
            input: '| .input',
            hideOnSelect: true,
            component: '.xfaFaPickerBox',
            withSearch: true,
            additionalInputUpdate: null,
            callback: null,
            callbackParam: null
        },

        $additionalInput: null,

        init: function()
        {
            var $target = this.$target;

            if (this.options.withSearch)
            {
                $target.iconpicker({
                    hideOnSelect: this.options.hideOnSelect,
                    component: this.options.component,
                    templates: {
                        search: '<input type="search" class="form-control iconpicker-search" placeholder="' + XF.phrase('xfa_core_type_to_filter') + '" />',
                    }
                });
            }
            else
            {
                $target.iconpicker({
                    hideOnSelect: this.options.hideOnSelect,
                    component: this.options.component
                });
            }

            if (this.options.additionalInputUpdate)
            {
                this.$additionalInput = $(this.options.additionalInputUpdate);
            }

            if (this.options.additionalInputUpdate || this.options.callback)
            {
                $target.on('iconpickerSelected', $.proxy(this, 'onInputUpdate'));
            }
        },

        onInputUpdate: function()
        {
            if (this.options.additionalInputUpdate)
            {
                this.$additionalInput.val(this.$target.val());
            }

            if (this.options.callback)
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
    });

    XF.Element.register('xfa-fa-picker', 'XF.XFAFAPicker');
}
(jQuery, window, document);