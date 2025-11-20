(() => {
    const root = document.documentElement;
    const body = document.body;
    const THEME_KEY = 'ultramodern-theme';

    const storage = {
        get: (key, fallback) => {
            try {
                const value = window.localStorage.getItem(key);
                return value || fallback;
            } catch (e) {
                console.warn(e);
                return fallback;
            }
        },
        set: (key, value) => {
            try {
                window.localStorage.setItem(key, value);
            } catch (e) {
                console.warn(e);
            }
        }
    };

    const switchTheme = (theme) => {
        body.classList.remove('theme--light', 'theme--dark');
        body.classList.add(`theme--${theme}`);
        storage.set(THEME_KEY, theme);
    };

    const initTheme = () => {
        const saved = storage.get(THEME_KEY, window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        switchTheme(saved);
        document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                const next = body.classList.contains('theme--dark') ? 'light' : 'dark';
                switchTheme(next);
            });
        });
    };

    const initHeader = () => {
        const header = document.querySelector('[data-header]');
        const burger = document.querySelector('[data-burger]');
        const nav = document.querySelector('[data-nav]');
        if (!header) return;

        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const current = window.scrollY;
            header.classList.toggle('header--scrolled', current > 40);
            header.classList.toggle('header--hidden', current > lastScroll && current > 200);
            lastScroll = current;
        });

        if (burger && nav) {
            burger.addEventListener('click', () => {
                burger.classList.toggle('is-active');
                nav.classList.toggle('is-open');
            });
        }
    };

    const initSearch = () => {
        const toggle = document.querySelector('[data-search-toggle]');
        const panel = document.querySelector('[data-search-panel]');
        if (!toggle || !panel) return;
        toggle.addEventListener('click', () => {
            panel.classList.toggle('is-open');
        });
    };

    const initLazy = () => {
        const lazyImages = document.querySelectorAll('img[loading="lazy"], [data-lazy]');
        if (!('IntersectionObserver' in window) || lazyImages.length === 0) {
            return;
        }
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                if (el.dataset.src) {
                    el.src = el.dataset.src;
                }
                if (el.dataset.srcset) {
                    el.srcset = el.dataset.srcset;
                }
                el.classList.add('is-loaded');
                obs.unobserve(el);
            });
        }, { rootMargin: '200px' });

        lazyImages.forEach((img) => observer.observe(img));
    };

    document.addEventListener('DOMContentLoaded', () => {
        initTheme();
        initHeader();
        initSearch();
        initLazy();
    });
})();

