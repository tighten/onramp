export default {
    mounted(el, {value}) {
        const listener = (e) => {
            if (!(e.target === el || el.contains(e.target))) {
                value();
            }
        };

        document.addEventListener('click', listener);
        el._clickOutsideHandler = listener;
    },

    unmounted(el) {
        document.removeEventListener('click', el._clickOutsideHandler);
    },
};
