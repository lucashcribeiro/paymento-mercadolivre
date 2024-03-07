!function($, window, document, _undefined)
{
    "use strict";

    XF.cv6CheckIconStyle = XF.Element.newHandler({
        eventNameSpace: 'cv6CheckIconStyle',
        options: {
            target: null,
            icon: null,
        },

        $container: null,
        $icon: null,

        init: function () {
            
            if (!this.options.target) {
                console.error('Element must have a data-target value');
                return;
            }
            if (!this.options.icon) {
                console.error('Element must have a data-icon value');
                return;
            }
            var $container = $(this.options.target);
            if ($container == undefined) {
                console.error('Element must have a valid target inside data-target. Not found: ' + this.options.target);
                return;
            }
            var $icon = $(this.options.icon);
            if ($icon == undefined) {
                console.error('Element must have a valid target inside data-icon. Not found: ' + this.options.target);
                return;
            }
            this.$container = $container;
            this.$icon = $icon;
            this.$target.find('.menu-linkRow').on('click', XF.proxy(this, 'click'));

        },

        click: function (e) {
            var elm = $(e.target);
            var parent = elm.parent();
            var self = this;
            var newValue = this.$container.val();
            parent.find('.menu-linkRow').removeClass('is-active');
            parent.find('.menu-linkRow').each(function(k,e) {
                var f = $(e).attr('data-class');
                self.$icon.removeClass(f);
                newValue = newValue.replace(f, '').replace(/\s+/g, " ").trim();
            });
            var faClass = elm.attr('data-class');
            if (faClass == '_default')
            {
                this.$icon.addClass('far');
                this.$container.val(newValue);
            }
            else
            {
                this.$container.val(newValue + " " + faClass);
                this.$icon.addClass(faClass);
            }
            elm.addClass('is-active');
        },

        checkForClass: function(className) {
            return this.$icon.hasClass(className);
        },

    });

    XF.cv6ChangeIcon = XF.Element.newHandler({
        eventNameSpace: 'cv6ChangeIcon',
        options: {
            target: null,
        },

        oldIcon: null,
        loading: null,
        $container: null,
        $icon: null,

        init: function () 
        {
            var $container = this.$target;
			if (!this.options.target) {
			    console.error('Element must have a data-target value');
			    return;
			}
            this.$icon = $(this.options.target);
            this.loading = "fal fa-spinner fa-spin cv6-loading";
            this.$container = $container;
            this.oldIcon = this.$target.val();
            this.$target.on('blur', XF.proxy(this, 'blur'));
            this.$target.on('focus', XF.proxy(this, 'focus'));
            this.blur();
        },

        blur: function () {
            this.$icon.removeClass(this.loading).addClass(this.$container.val());
        },

        focus: function () {
            this.$icon.removeClass(this.$container.val()).addClass(this.loading);
        },

    });

    XF.Element.register('cv6ChangeIcon', 'XF.cv6ChangeIcon');
    XF.Element.register('cv6CheckIconStyle', 'XF.cv6CheckIconStyle');

}(jQuery, window, document);
