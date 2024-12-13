export default {
    mounted(el, binding) {
        const listener = (e) => {
            if (e.target === el || el.contains(e.target)) {
                return;
            }

            binding.value();
        };

        document.addEventListener("click", listener);

        el._clickOutsideHandler = listener;
    },

    unmounted(el) {
        document.removeEventListener("click", el._clickOutsideHandler);
    },
};
