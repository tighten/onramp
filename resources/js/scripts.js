class ShowMoreLess {
    constructor() {
        this.init();
    }

    init() {
        const components = document.querySelectorAll('.js-show-more-less');

        if (!components.length) {
            return;
        }

        components.forEach((component) => {
            const items = component.querySelector(
                '.js-show-more-less-items'
            ).children;
            const button = component.querySelector('.js-show-more-less-button');
            const initialButtonText = button.textContent;
            const showLessText = 'Show less';
            let defaultLimit = this.getDefaultLimit();

            if (items.length <= defaultLimit) {
                button.style.display = 'none';
                return;
            }

            this.truncateItems(items, defaultLimit);
            button.style.display = 'block';

            button.addEventListener('click', (e) => {
                e.preventDefault();

                const visibleItems = Array.from(items).filter(
                    (item) => item.style.display !== 'none'
                );

                if (visibleItems.length <= defaultLimit) {
                    Array.from(items).forEach(
                        (item) => (item.style.display = '')
                    );
                    button.textContent = showLessText;
                } else {
                    this.truncateItems(items, defaultLimit);
                    button.textContent = initialButtonText;
                }
            });

            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    const cachedLimit = defaultLimit;
                    defaultLimit = this.getDefaultLimit();

                    if (cachedLimit === defaultLimit) {
                        return;
                    }

                    Array.from(items).forEach(
                        (item) => (item.style.display = '')
                    );

                    if (items.length <= defaultLimit) {
                        button.style.display = 'none';
                        return;
                    }

                    this.truncateItems(items, defaultLimit);
                    button.style.display = 'block';
                    button.textContent = initialButtonText;
                }, 250);
            });
        });
    }

    truncateItems(items, limit) {
        Array.from(items).forEach((item, index) => {
            if (index > limit - 1) {
                item.style.display = 'none';
            }
        });
    }

    getDefaultLimit() {
        return window.innerWidth < 992 ? 3 : 7;
    }
}

// Initialize the component
new ShowMoreLess();
