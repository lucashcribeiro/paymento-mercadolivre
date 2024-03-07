! function ($, window, document, _undefined) {
    "use strict";

    XF.cv6MarkAsRead = XF.Element.newHandler({
        eventNameSpace: 'cv6MarkAsRead',

        init: function () {
            this.$target.one('dblclick', function () 
            {
                var $this = $(this);
                $this.parent().parent()
                    .removeClass('node--unread').addClass('node--read')
                    .find('.subNodeLink').removeClass('subNodeLink--unread');

                XF.ajax(
                    'POST',
                    $this.data('cv6-href')
                );
            });
        },

    });

    XF.Element.register('cv6-mark-as-read', 'XF.cv6MarkAsRead');

}(jQuery, window, document);
