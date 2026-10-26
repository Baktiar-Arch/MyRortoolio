import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('theme', () => ({
    dark: localStorage.theme === 'dark'
        || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),

    toggle() {
        this.dark = !this.dark;
        localStorage.theme = this.dark ? 'dark' : 'light';
    },
}));

Alpine.data('nav', () => ({
    open: false,

    close() {
        this.open = false;
    },
}));

Alpine.data('contactForm', () => ({
    submitting: false,
    success: false,
    error: false,

    async submit(event) {
        event.preventDefault();
        this.submitting = true;
        this.success = false;
        this.error = false;

        const form = event.target;
        const body = new URLSearchParams(new FormData(form)).toString();

        try {
            const response = await fetch('/', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body,
            });

            if (!response.ok) {
                throw new Error('Gagal mengirim');
            }

            this.success = true;
            form.reset();
        } catch (e) {
            this.error = true;
        } finally {
            this.submitting = false;
        }
    },
}));

Alpine.data('toast', () => ({
    show: false,

    init() {
        setTimeout(() => {
            this.show = false;
        }, 5000);
    },
}));

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.reveal');

    if (!('IntersectionObserver' in window) || elements.length === 0) {
        elements.forEach((el) => el.classList.add('is-visible'));

        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -40px 0px' },
    );

    elements.forEach((el) => observer.observe(el));
});
