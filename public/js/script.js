// MOBILE NAVIGATION
const menuToggle = document.getElementById('menuToggle');
const navLinks = document.getElementById('navLinks');

function closeMenu() {
    if (!menuToggle || !navLinks) return;

    navLinks.classList.remove('is-open');
    menuToggle.setAttribute('aria-expanded', 'false');
    menuToggle.setAttribute('aria-label', 'Buka navigasi');
}

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        const open = navLinks.classList.toggle('is-open');

        menuToggle.setAttribute('aria-expanded', String(open));
        menuToggle.setAttribute(
            'aria-label',
            open ? 'Tutup navigasi' : 'Buka navigasi'
        );
    });

    navLinks.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 700) {
            closeMenu();
        }
    });
}

// Beri tahu pengguna jika link Google Form belum diisi.
document.querySelectorAll(
    '.form-link[data-form-configured="false"]'
).forEach((link) => {
    link.addEventListener('click', (event) => {
        event.preventDefault();

        alert(
            'Link Google Form belum diisi. ' +
            'Buka HomeController.php dan masukkan URL Google Form ' +
            'pada variabel $googleFormUrl.'
        );
    });
});

// Placeholder jika file gambar lokal tidak ditemukan.
document.querySelectorAll('.photo-frame img').forEach((image) => {
    const frame = image.closest('.photo-frame');

    if (!frame) return;

    const showFallback = () => {
        frame.classList.add('image-missing');
    };

    image.addEventListener('error', showFallback);

    if (image.complete && image.naturalWidth === 0) {
        showFallback();
    }
});

// Placeholder untuk logo lokal jika file tidak ditemukan.
document.querySelectorAll(
    '.brand-logo, .footer-logo'
).forEach((logo) => {
    const brand = logo.closest('.brand, .footer-brand');

    if (!brand) return;

    const showFallback = () => {
        brand.classList.add('logo-missing');
        logo.hidden = true;
    };

    logo.addEventListener('error', showFallback);

    if (logo.complete && logo.naturalWidth === 0) {
        showFallback();
    }
});
