import {ref, onMounted, onUnmounted} from 'vue';

export function useToggle() {
    const isOpen = ref(false);

    const handleEscape = (e) => {
        if (e.key === 'Escape' || e.key === 'Esc') close();
    };

    const open = () => {
        if (!isOpen.value) {
            isOpen.value = true;
            document.addEventListener('keydown', handleEscape);
        }
    };

    const close = () => {
        if (isOpen.value) {
            isOpen.value = false;
            document.removeEventListener('keydown', handleEscape);
        }
    };

    const toggle = () => (isOpen.value ? close() : open());

    onUnmounted(() => {
        document.removeEventListener('keydown', handleEscape);
    });

    return {isOpen, open, close, toggle};
}
