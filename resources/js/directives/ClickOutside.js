export default {
    bind(el, binding, vnode) {
        const listener = e => {
            if (e.target === el || el.contains(e.target)) {
                return;
            }

            binding.value();
        };

        document.addEventListener('click', listener);

        vnode.context.$once('hook:beforeDestroy', () => {
            document.removeEventListener('click', listener)
        });
    },
}
