(function($) {
    let ShowMoreLess = (function() {
        const init = function() {
            let component = $('.js-show-more-less');

            if(! component.length) {
                return;
            }

            $.each(component, function(index, c) {
                let component = $(c)
                    , defaultLimit = 3
                    , items = component.find('.js-show-more-less-items').children()
                    , button = component.find('.js-show-more-less-button')
                    , initialButtonText = button.text()
                    , showLessText = 'Show less';

                console.log(items.length)

                if(! items.length > defaultLimit || items.length === defaultLimit) {
                    button.hide();
                    return;
                }

                truncateItems(items, defaultLimit);

                button.show();

                button.click(function(e) {
                    e.preventDefault();

                    let visibleItems = items.filter(':visible');

                    if(visibleItems.length <= defaultLimit) {
                        items.show();
                        button.text(showLessText);
                    }else {
                        truncateItems(items, defaultLimit);
                        button.text(initialButtonText);
                    }
                });
            });
        };

        const truncateItems = function(items, limit) {
            items.each(function(i) {
                if(i > (limit - 1)) $(items[i]).hide();
            });
        };

        return {
            init: init,
        }
    })();

    ShowMoreLess.init();
})(window.jQuery);
