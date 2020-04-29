export default {
    data() {
        return {
            isOpen: false,
        }
    },

    methods: {
        open() {
            this.isOpen = true;
            document.addEventListener('keydown', this.handleEscape);
        },

        close() {
            this.isOpen = false;
            document.removeEventListener('keydown', this.handleEscape);
        },

        toggle() {
            this.isOpen ? this.close() : this.open();
        },

        handleEscape(e) {
            if (e.key === 'Esc' || e.key === 'Escape') {
                this.close();
            }
        }
    }
}
