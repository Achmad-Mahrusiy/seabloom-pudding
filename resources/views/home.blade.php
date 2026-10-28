<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#e8fbff">

    <title>Seabloom Pudding</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <meta name="description"
        content="Seabloom Pudding adalah caramel pudding dengan bahan lokal: ubi jalar ungu, ubi jalar kuning, dan bunga telang.">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>

<body>

    <!-- Announcement -->
    <div class="announcement">
        <span class="announcement-dot"></span>
        Caramel pudding made with local ingredients
        <span class="announcement-star">✳</span>
    </div>

    <!-- Navigation -->
    <header class="site-header">
        <a href="#home" class="brand" aria-label="Seabloom Pudding - Beranda">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Seabloom Pudding" class="brand-logo">
            <span class="brand-fallback">Seabloom Pudding</span>
        </a>

        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Buka navigasi" aria-expanded="false"
            aria-controls="navLinks">
            <span></span>
            <span></span>
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="#home">Beranda</a>
            <a href="#collection">Varian</a>
            <a href="#story">Cerita Kami</a>
            <a href="#ingredients">Bahan Lokal</a>

            @if ($instagramUrl)
                <a href="{{ $instagramUrl }}" class="nav-order nav-outline" target="_blank"
                    rel="noopener noreferrer">Instagram ↗</a>
            @endif

            <a href="{{ $googleFormUrl ?: '#order' }}" class="nav-order form-link"
                data-form-configured="{{ $googleFormUrl ? 'true' : 'false' }}"
                @if ($googleFormUrl) target="_blank" rel="noopener noreferrer" @endif>
                Pesan Sekarang ↗
            </a>

        </nav>
    </header>

    <main>

        <!-- Hero -->
        <section class="hero" id="home">
            <div class="hero-copy">
                <p class="eyebrow">
                    <span class="eyebrow-line"></span>
                    Ocean-inspired local dessert
                </p>

                <h1>
                    A sweet escape<br>
                    in every <em>spoonful.</em>
                </h1>

                <p class="hero-description">
                    Seabloom Pudding adalah caramel pudding yang dibuat
                    menggunakan bahan alami dari pangan lokal:
                    ubi jalar ungu, ubi jalar kuning, dan bunga telang
                    yang memberikan warna berbeda pada setiap varian.
                </p>

                <div class="hero-actions">
                    <a href="#collection" class="button button-dark">
                        Temukan Varian Favoritmu <span>↘</span>
                    </a>

                    <a href="{{ $googleFormUrl ?: '#order' }}" class="button button-light form-link"
                        data-form-configured="{{ $googleFormUrl ? 'true' : 'false' }}"
                        @if ($googleFormUrl) target="_blank" rel="noopener noreferrer" @endif>
                        Pesan Sekarang <span>↗</span>
                    </a>
                </div>

                <div class="hero-note">
                    <span>✳ ✳ ✳</span>
                    <span>Taste the Ocean in Every Spoon.</span>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-orbit orbit-one"></div>
                <div class="hero-orbit orbit-two"></div>

                <div class="hero-photo photo-frame">
                    <img src="{{ asset('images/sunny-shore.png') }}"
                        alt="Sunny Shore, caramel pudding dengan ubi jalar kuning" fetchpriority="high">

                    <div class="image-placeholder">
                        <span>🍮</span>
                        <small>Seabloom Pudding</small>
                    </div>
                </div>

                <div class="hero-sticker">
                    <span>made with</span>
                    <strong>♡</strong>
                    <span>local ingredients</span>
                </div>

                <div class="hero-caption">
                    <span>THE SEABLOOM MOOD</span>
                    <span>Blue skies. Sweet bites.</span>
                </div>
            </div>
        </section>

        <!-- Brand statement -->
        <section class="intro-strip">
            <p>Bahan pangan lokal</p>
            <span>✳</span>
            <p>Warna dari bahan alami</p>
            <span>✳</span>
            <p>Caramel pudding</p>
        </section>

        <!-- Product collection -->
        <section class="collection section" id="collection">
            <div class="section-topline">
                <p class="eyebrow">THE FLAVOUR CLUB</p>
                <span class="section-index">COLLECTION NO. 01 — 03</span>
            </div>

            <div class="section-heading">
                <h2>
                    Choose your<br>
                    <em>kind of sweetness.</em>
                </h2>

                <p>
                    Tiga varian caramel pudding yang menggunakan
                    bahan lokal untuk menghasilkan warna berbeda.
                </p>
            </div>

            <div class="product-grid">
                @foreach ($products as $product)
                    <article class="product-card product-{{ $product['theme'] }}">
                        <div class="product-visual">
                            <span class="product-index">
                                0{{ $loop->iteration }}
                            </span>

                            <span class="product-sparkle" aria-hidden="true">
                                ✳
                            </span>

                            <div class="product-photo photo-frame">
                                <img src="{{ asset($product['image']) }}"
                                    alt="{{ $product['name'] }} — {{ $product['subtitle'] }}" loading="lazy">

                                <div class="image-placeholder">
                                    <span>🍮</span>
                                    <small>{{ $product['name'] }}</small>
                                </div>
                            </div>

                            <span class="product-colour">
                                {{ $product['emoji'] }}
                                {{ $product['subtitle'] }}
                            </span>
                        </div>

                        <div class="product-details">
                            <h3>{{ $product['name'] }}</h3>

                            <p>{{ $product['description'] }}</p>

                            <div class="product-buy">
                                <div>
                                    <small>Harga per cup</small>
                                    <strong>
                                        Rp{{ number_format($product['price'], 0, ',', '.') }}
                                    </strong>
                                </div>

                                <a href="{{ $googleFormUrl ?: '#order' }}" class="product-order form-link"
                                    data-form-configured="{{ $googleFormUrl ? 'true' : 'false' }}"
                                    aria-label="Pesan {{ $product['name'] }}"
                                    @if ($googleFormUrl) target="_blank" rel="noopener noreferrer" @endif>
                                    ↗
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <p class="collection-note">
                <span>✳</span>
                A Sweet Escape in Every Spoonful.
            </p>
        </section>

        <!-- Bundling -->
        <section class="bundle-section">
            <div class="bundle-copy">
                <p class="eyebrow">A LITTLE MORE TO LOVE</p>

                <h2>
                    Two flavours.<br>
                    <em>One happy deal.</em>
                </h2>

                <p>
                    Dapatkan ketiga varian, Sunny Shore, Twilight Sea, dan
                    Ocean Blue, dalam satu paket bundling yang lebih hemat.
                </p>

                <div class="bundle-price">
                    <span>Special bundle</span>

                    <strong>
                        Rp{{ number_format($bundlePrice, 0, ',', '.') }}
                    </strong>

                    <small>Untuk 3 cup · semua varian</small>
                </div>

                <a href="{{ $googleFormUrl ?: '#order' }}" class="button button-dark form-link"
                    data-form-configured="{{ $googleFormUrl ? 'true' : 'false' }}"
                    @if ($googleFormUrl) target="_blank" rel="noopener noreferrer" @endif>
                    Pesan Bundling ↗
                </a>
            </div>

            <div class="bundle-art" aria-label="Pilih dua varian pudding dari tiga pilihan">

                <div class="bundle-options">
                    <div class="bundle-option bundle-option-sunny">
                        <img src="{{ asset('images/sunny-shore.png') }}" alt="Sunny Shore - ubi jalar kuning"
                            loading="lazy">
                        <span>💛 Sunny Shore</span>
                    </div>

                    <div class="bundle-option bundle-option-twilight">
                        <img src="{{ asset('images/twilight-sea.png') }}" alt="Twilight Sea - ubi jalar ungu"
                            loading="lazy">
                        <span>💜 Twilight Sea</span>
                    </div>

                    <div class="bundle-option bundle-option-ocean">
                        <img src="{{ asset('images/ocean-blue.png') }}" alt="Ocean Blue - bunga telang"
                            loading="lazy">
                        <span>💙 Ocean Blue</span>
                    </div>
                </div>

                <div class="bundle-choice-note">
                    <strong>3 CUP</strong>
                    <span>Semua varian dalam satu paket</span>
                </div>

                <p class="bundle-caption">
                    ALL VARIANTS · Rp{{ number_format($bundlePrice, 0, ',', '.') }}
                </p>

            </div>

        </section>

        <!-- Story -->
        <section class="story section" id="story">
            <div class="story-visual photo-frame">
                <img src="{{ asset('images/twilight-sea.png') }}"
                    alt="Twilight Sea, caramel pudding dengan ubi jalar ungu" loading="lazy">

                <div class="image-placeholder">
                    <span>🍮</span>
                    <small>Twilight Sea</small>
                </div>

                <span class="story-photo-label">
                    Made with local ingredients
                </span>
            </div>

            <div class="story-copy">
                <p class="eyebrow">CERITA SEABLOOM PUDDING</p>

                <h2>
                    Bahan lokal.<br>
                    <em>Warna alami.</em>
                </h2>

                <p>
                    Seabloom Pudding merupakan caramel pudding yang
                    menggunakan bahan pangan lokal, yaitu ubi jalar
                    ungu, ubi jalar kuning, dan bunga telang.
                </p>

                <p>
                    Ketiga bahan tersebut digunakan dalam pembuatan
                    varian pudding dengan warna berbeda: ungu, kuning,
                    dan biru. Kami memadukan cita rasa caramel pudding
                    dengan tampilan menarik dan konsep ocean-inspired.
                </p>

                <a href="#ingredients" class="text-link">
                    Kenali bahan kami ↘
                </a>
            </div>
        </section>

        <!-- Local ingredients -->
        <section class="ingredients section" id="ingredients">
            <div class="ingredients-heading">
                <p class="eyebrow">BAHAN ALAMI SEABLOOM</p>

                <h2>
                    Local ingredients.<br>
                    <em>Natural colours.</em>
                </h2>

                <p>
                    Warna setiap varian berasal dari bahan alami
                    yang digunakan dalam pembuatan produk.
                </p>
            </div>

            <div class="ingredient-list">
                <div class="ingredient-item">
                    <span class="ingredient-number">01</span>
                    <span class="ingredient-emoji">🍠</span>

                    <div>
                        <h3>Ubi Jalar Kuning</h3>
                        <p>Digunakan untuk varian Sunny Shore.</p>
                    </div>
                </div>

                <div class="ingredient-item">
                    <span class="ingredient-number">02</span>
                    <span class="ingredient-emoji">🍠</span>

                    <div>
                        <h3>Ubi Jalar Ungu</h3>
                        <p>Digunakan untuk varian Twilight Sea.</p>
                    </div>
                </div>

                <div class="ingredient-item">
                    <span class="ingredient-number">03</span>
                    <span class="ingredient-emoji">❀</span>

                    <div>
                        <h3>Bunga Telang</h3>
                        <p>Digunakan untuk menghasilkan warna biru Ocean Blue.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA: menggantikan bagian empat langkah pre-order -->
        <section class="final-cta section" id="order">
            <p class="eyebrow">YOUR NEXT HAPPY BITE</p>

            <h2>
                Ready for a little<br>
                <em>sweet escape?</em>
            </h2>

            <p>
                Temukan varian favoritmu atau langsung isi formulir
                pre-order untuk memesan Seabloom Pudding.
            </p>

            <div class="final-cta-actions">
                <a href="#collection" class="button button-dark">
                    Temukan Varian Favoritmu <span>↘</span>
                </a>

                <a href="{{ $googleFormUrl ?: '#order' }}" class="button button-light form-link"
                    data-form-configured="{{ $googleFormUrl ? 'true' : 'false' }}"
                    @if ($googleFormUrl) target="_blank" rel="noopener noreferrer" @endif>
                    Pesan Sekarang <span>↗</span>
                </a>
            </div>

            <small>
                Harga per cup Rp7.000 · All Varian Rp18.000
            </small>
        </section>

        <!-- Delivery information -->
        <section class="delivery-info section" id="delivery">
            <p class="eyebrow">PICK-UP OR DELIVERY</p>

            <h2>
                Pilih cara menerima<br>
                <em>pesananmu.</em>
            </h2>

            <div class="delivery-grid">
                <article>
                    <span>📍</span>
                    <h3>Ambil di tempat</h3>
                    <p>Pengambilan langsung tanpa biaya pengantaran.</p>
                    <small>Gratis</small>
                </article>

                <article>
                    <span>🎓</span>
                    <h3>Antar kampus</h3>
                    <p>Pengantaran ke lokasi kampus sesuai kesepakatan.</p>
                    <small>Gratis ongkir</small>
                </article>

                <article>
                    <span>🛵</span>
                    <h3>Antar luar kampus</h3>
                    <p>Biaya pengantaran menyesuaikan jarak tujuan.</p>

                    <ul class="delivery-tiers">
                        <li>
                            <span>Kurang dari 2 km</span>
                            <strong class="tier-free">Gratis ongkir</strong>
                        </li>
                        <li>
                            <span>Jarak 2-5 km</span>
                            <strong>Rp5.000</strong>
                        </li>
                        <li>
                            <span>Lebih dari 5 km</span>
                            <strong>+Rp2.000 / km</strong>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <a href="#home" class="footer-brand" aria-label="Kembali ke beranda">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Seabloom Pudding" class="footer-logo">

            <span class="brand-fallback">Seabloom Pudding</span>
        </a>

        <p>A Sweet Escape in Every Spoonful.</p>

        <div class="footer-links">
            <a href="#collection">Varian</a>
            <a href="#story">Cerita Kami</a>
            <a href="#order">Pemesanan</a>
        </div>

        <div class="social-links">
            @if ($instagramUrl)
                <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer">
                    Instagram ↗
                </a>
            @endif

        </div>

        <small>
            &copy; {{ date('Y') }} Seabloom Pudding.
            Made with care in Jember.
        </small>
    </footer>
</body>

</html>
