class ShowMoreLess {
    constructor() {
        this.components = [];
        this.showLessText = 'Show less';
        this.resizeTimeout = null;
        this.init();
    }
    
    init() {
        this.components = document.querySelectorAll('.js-show-more-less');

        if (!this.components.length) {
            return;
        }

        this.setupComponents();
        this.setupResizeListener();
    }

    /**
     * Set up each component with show more/less functionality
     */
    setupComponents() {
        this.components.forEach(function (component) {
            try {
                const itemsContainer = component.querySelector('.js-show-more-less-items');

                if (!itemsContainer) {
                    console.warn('Missing items container in show more/less component');
                    return;
                }

                const items = itemsContainer.children;
                const button = component.querySelector('.js-show-more-less-button');

                if (!button) {
                    console.warn('Missing button in show more/less component');
                    return;
                }

                const initialButtonText = button.textContent;
                const defaultLimit = this.getDefaultLimit();

                // Store component data as properties on the component element
                component._showMoreLess = {
                    items: items,
                    button: button,
                    initialButtonText: initialButtonText,
                    defaultLimit: defaultLimit
                };

                this.updateComponentDisplay(component);
                this.setupComponentButton(component);
            } catch (error) {
                console.error('Error setting up show more/less component:', error);
            }
        }, this);
    }

    /**
     * Set up the button click event for a component
     */
    setupComponentButton(component) {
        const data = component._showMoreLess;
        const button = data.button;

        button.addEventListener('click', function (e) {
            e.preventDefault();
            this.toggleComponentItems(component);
        }.bind(this));
    }

    /**
     * Toggle between showing all items and showing limited items
     */
    toggleComponentItems(component) {
        const data = component._showMoreLess;
        const items = data.items;
        const button = data.button;
        const defaultLimit = data.defaultLimit;

        const visibleItems = Array.from(items).filter(function (item) {
            return item.style.display !== 'none';
        });

        if (visibleItems.length <= defaultLimit) {
            this.showAllItems(items);
            button.textContent = this.showLessText;
        } else {
            this.hideItemsAfterLimit(items, defaultLimit);
            button.textContent = data.initialButtonText;
        }
    }

    /**
     * Update component display based on current state
     */
    updateComponentDisplay(component) {
        const data = component._showMoreLess;
        const items = data.items;
        const button = data.button;
        const defaultLimit = data.defaultLimit;

        if (items.length <= defaultLimit) {
            button.style.display = 'none';
        } else {
            this.hideItemsAfterLimit(items, defaultLimit);
            button.style.display = 'block';
            button.textContent = data.initialButtonText;
        }
    }

    /**
     * Set up window resize event listener
     */
    setupResizeListener() {
        window.addEventListener('resize', function () {
            clearTimeout(this.resizeTimeout);

            this.resizeTimeout = setTimeout(function () {
                this.handleResize();
            }.bind(this), 250);
        }.bind(this));
    }

    /**
     * Handle window resize event
     */
    handleResize() {
        const newLimit = this.getDefaultLimit();

        this.components.forEach(function (component) {
            if (!component._showMoreLess) {
                return;
            }

            const data = component._showMoreLess;
            const oldLimit = data.defaultLimit;

            if (oldLimit !== newLimit) {
                data.defaultLimit = newLimit;
                this.showAllItems(data.items);
                this.updateComponentDisplay(component);
            }
        }, this);
    }

    /**
     * Show all items in a collection
     */
    showAllItems(items) {
        Array.from(items).forEach(function (item) {
            item.style.display = '';
        });
    }

    /**
     * Hide items after the specified limit
     */
    hideItemsAfterLimit(items, limit) {
        Array.from(items).forEach(function (item, index) {
            if (index >= limit) {
                item.style.display = 'none';
            } else {
                item.style.display = '';
            }
        });
    }

    /**
     * Get the default limit based on screen width
     */
    getDefaultLimit() {
        return window.innerWidth < 992 ? 3 : 7;
    }
}

let showMoreLess;
showMoreLess = new ShowMoreLess();
