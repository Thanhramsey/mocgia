<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    $fontPresets = [
        'mocgia_font' => [
            'google'  => 'family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700;800&family=Manrope:wght@400;500;600;700;800',
            'heading' => "'Be Vietnam Pro', 'Inter', sans-serif",
            'body'    => "'Inter', sans-serif",
        ],
        'helvetica' => [
            'google'  => 'family=Plus+Jakarta+Sans:wght@400;500;600;700;800',
            'heading' => "Helvetica, Arial, sans-serif",
            'body'    => "Helvetica, Arial, sans-serif",
        ],
        'inter_outfit' => [
            'google'  => 'family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800',
            'heading' => "'Outfit', 'Inter', sans-serif",
            'body'    => "'Inter', sans-serif",
        ],
        'manrope_plusjakarta' => [
            'google'  => 'family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800',
            'heading' => "'Plus Jakarta Sans', 'Manrope', sans-serif",
            'body'    => "'Manrope', sans-serif",
        ],
        'nunito_poppins' => [
            'google'  => 'family=Nunito:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800',
            'heading' => "'Poppins', 'Nunito', sans-serif",
            'body'    => "'Nunito', sans-serif",
        ],
        'montserrat_lato' => [
            'google'  => 'family=Lato:wght@400;700;900&family=Montserrat:wght@400;500;600;700;800',
            'heading' => "'Montserrat', 'Lato', sans-serif",
            'body'    => "'Lato', sans-serif",
        ],
        'spacemono_dmsans' => [
            'google'  => 'family=DM+Sans:wght@400;500;700;800&family=Space+Grotesk:wght@400;500;600;700',
            'heading' => "'Space Grotesk', 'DM Sans', sans-serif",
            'body'    => "'DM Sans', sans-serif",
        ],
        'playfair_sourcesans' => [
            'google'  => 'family=Playfair+Display:wght@500;600;700&family=Source+Sans+3:wght@400;500;600;700',
            'heading' => "'Playfair Display', 'Source Sans 3', serif",
            'body'    => "'Source Sans 3', sans-serif",
        ],
        'merriweather_worksans' => [
            'google'  => 'family=Merriweather:wght@400;700;900&family=Work+Sans:wght@400;500;600;700',
            'heading' => "'Merriweather', 'Work Sans', serif",
            'body'    => "'Work Sans', sans-serif",
        ],
        'raleway_urbanist' => [
            'google'  => 'family=Raleway:wght@500;600;700;800&family=Urbanist:wght@400;500;600;700',
            'heading' => "'Raleway', 'Urbanist', sans-serif",
            'body'    => "'Urbanist', sans-serif",
        ],
        'oswald_mulish' => [
            'google'  => 'family=Mulish:wght@400;500;600;700;800&family=Oswald:wght@400;500;600;700',
            'heading' => "'Oswald', 'Mulish', sans-serif",
            'body'    => "'Mulish', sans-serif",
        ],
    ];

    $colorPresets = [
        'mocgia' => [
            'primary' => '#333333', 'dark' => '#1a1a1a', 'light' => '#f8f6f2', 'accent' => '#c5a880',
            'text' => '#1f1f1f', 'muted' => '#6e6e6e', 'bg_light' => '#f9f9f9',
            'primary_rgb' => '51, 51, 51', 'dark_rgb' => '26, 26, 26',
        ],
        'huongvietsinh' => [
            'primary' => '#e41e26', 'dark' => '#9f212e', 'light' => '#fff1f2', 'accent' => '#f3be17',
            'text' => '#111111', 'muted' => '#7f8c8d', 'bg_light' => '#f3f5f5',
            'primary_rgb' => '228, 30, 38', 'dark_rgb' => '159, 33, 46',
        ],
        'ocean_blue' => [
            'primary' => '#0b5ed7', 'dark' => '#0a369d', 'light' => '#eef2ff', 'accent' => '#f59e0b',
            'text' => '#2c3e50', 'muted' => '#6c757d', 'bg_light' => '#f8f9fa',
            'primary_rgb' => '11, 94, 215', 'dark_rgb' => '10, 54, 157',
        ],
        'emerald' => [
            'primary' => '#0f766e', 'dark' => '#115e59', 'light' => '#e8f7f5', 'accent' => '#d97706',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f6faf9',
            'primary_rgb' => '15, 118, 110', 'dark_rgb' => '17, 94, 89',
        ],
        'sunset_orange' => [
            'primary' => '#ea580c', 'dark' => '#c2410c', 'light' => '#fff1e9', 'accent' => '#0369a1',
            'text' => '#2b2b2b', 'muted' => '#6b7280', 'bg_light' => '#fffaf7',
            'primary_rgb' => '234, 88, 12', 'dark_rgb' => '194, 65, 12',
        ],
        'ruby_red' => [
            'primary' => '#c81e3a', 'dark' => '#9f1239', 'light' => '#ffecef', 'accent' => '#0e7490',
            'text' => '#1f2937', 'muted' => '#6b7280', 'bg_light' => '#fff9fa',
            'primary_rgb' => '200, 30, 58', 'dark_rgb' => '159, 18, 57',
        ],
        'indigo_night' => [
            'primary' => '#4338ca', 'dark' => '#312e81', 'light' => '#eeedff', 'accent' => '#0891b2',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f7f7ff',
            'primary_rgb' => '67, 56, 202', 'dark_rgb' => '49, 46, 129',
        ],
        'teal_cyan' => [
            'primary' => '#0f766e', 'dark' => '#155e75', 'light' => '#e9fbfb', 'accent' => '#f59e0b',
            'text' => '#0f172a', 'muted' => '#64748b', 'bg_light' => '#f5fcfc',
            'primary_rgb' => '15, 118, 110', 'dark_rgb' => '21, 94, 117',
        ],
        'royal_purple' => [
            'primary' => '#6d28d9', 'dark' => '#4c1d95', 'light' => '#f3e8ff', 'accent' => '#f59e0b',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#faf5ff',
            'primary_rgb' => '109, 40, 217', 'dark_rgb' => '76, 29, 149',
        ],
        'rose_pink' => [
            'primary' => '#e11d48', 'dark' => '#9f1239', 'light' => '#ffe4ec', 'accent' => '#0e7490',
            'text' => '#1f2937', 'muted' => '#6b7280', 'bg_light' => '#fff7fa',
            'primary_rgb' => '225, 29, 72', 'dark_rgb' => '159, 18, 57',
        ],
        'forest_green' => [
            'primary' => '#166534', 'dark' => '#14532d', 'light' => '#eaf7ee', 'accent' => '#d97706',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f4fbf6',
            'primary_rgb' => '22, 101, 52', 'dark_rgb' => '20, 83, 45',
        ],
    ];

    $fontKey = get_setting('theme_font_preset', 'mocgia_font');
    if (!array_key_exists($fontKey, $fontPresets)) {
        $fontKey = 'mocgia_font';
    }
    $fontPreset = $fontPresets[$fontKey];

    $colorKey = get_setting('theme_color_preset', 'mocgia');
    if (!array_key_exists($colorKey, $colorPresets)) {
        $colorKey = 'mocgia';
    }
    $themeColors = $colorPresets[$colorKey];

    $siteLogoFile = (string) get_setting('site_logo', '');
    $faviconUrl = base_url('favicon.ico');
    if ($siteLogoFile !== '' && file_exists(FCPATH . 'uploads/settings/' . $siteLogoFile)) {
        $faviconUrl = base_url('uploads/settings/' . $siteLogoFile);
    }
    ?>
    <script>
        (function() {
            const savedTheme = localStorage.getItem('site_theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= esc($seo_title ?? get_setting('seo_title')) ?></title>
    <meta name="description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta name="keywords" content="<?= esc($seo_keywords ?? get_setting('seo_keywords')) ?>">
    <link rel="canonical" href="<?= esc($canonical_url ?? current_url()) ?>">
    <link rel="icon" href="<?= esc($faviconUrl) ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= esc($faviconUrl) ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= esc($faviconUrl) ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc(current_url()) ?>">
    <meta property="og:title" content="<?= esc($seo_title ?? get_setting('seo_title')) ?>">
    <meta property="og:description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta property="og:image" content="<?= esc($og_image ?? base_url('uploads/settings/og_default.webp')) ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?<?= esc($fontPreset['google']) ?>&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Swiper JS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        :root {
            --primary-color: <?= esc($themeColors['primary']) ?>;
            --primary-dark: <?= esc($themeColors['dark']) ?>;
            --primary-light: <?= esc($themeColors['light']) ?>;
            --accent-color: <?= esc($themeColors['accent']) ?>;
            --text-color: <?= esc($themeColors['text']) ?>;
            --text-muted: <?= esc($themeColors['muted']) ?>;
            --bg-light: <?= esc($themeColors['bg_light']) ?>;
            --primary-rgb: <?= esc($themeColors['primary_rgb']) ?>;
            --primary-dark-rgb: <?= esc($themeColors['dark_rgb']) ?>;
            --font-heading: <?= $fontPreset['heading'] ?>;
            --font-body: <?= $fontPreset['body'] ?>;

            /* Sync Bootstrap semantic colors with site theme */
            --bs-primary: <?= esc($themeColors['primary']) ?>;
            --bs-primary-rgb: <?= esc($themeColors['primary_rgb']) ?>;
            --bs-link-color: <?= esc($themeColors['primary']) ?>;
            --bs-link-hover-color: <?= esc($themeColors['dark']) ?>;

            --bs-btn-hover-bg: <?= esc($themeColors['dark']) ?>;
            --bs-btn-hover-border-color: <?= esc($themeColors['dark']) ?>;
            --bs-btn-active-bg: <?= esc($themeColors['dark']) ?>;
            --bs-btn-active-border-color: <?= esc($themeColors['dark']) ?>;

            /* Theme mode variables */
            --bg-body: #F8F6F2;
            --bg-card: #F8F6F2;
            --bg-navbar: #F8F6F2;
            --border-color: #e9ecef;
            --text-main: <?= esc($themeColors['text']) ?>;
            --text-muted-custom: <?= esc($themeColors['muted']) ?>;

            /* Dynamic border radius overrides */
            --border-radius-sm: <?= esc(get_setting('theme_border_radius_btn', '8px')) ?>;
            --border-radius-md: <?= esc(get_setting('theme_border_radius_block', '12px')) ?>;
            --border-radius-lg: calc(<?= esc(get_setting('theme_border_radius_block', '12px')) ?> * 1.5);
        }

        [data-theme="dark"] {
            --bg-body: #0b1329;
            --bg-card: #111b35;
            --bg-navbar: #0b1329;
            --border-color: #1e293b;
            --text-main: #f8fafc;
            --text-muted-custom: #94a3b8;
            --bg-light: #111b35;

            /* Override primary light and text */
            --primary-light: #111b35;
            --text-color: #f8fafc;
            --text-muted: #94a3b8;
        }
        /* Force override border-radius based on user configuration */
        .btn, 
        .btn-custom, 
        .btn-lg, 
        .btn-sm,
        .btn-outline-light,
        .btn-outline-primary,
        .btn-light,
        .btn-primary,
        .form-control,
        .form-select {
            border-radius: var(--border-radius-sm) !important;
        }

        .card, 
        .why-card, 
        .service-card, 
        .news-card, 
        .gallery-item, 
        .cta-section, 
        .footer-map-container, 
        .certificate-doc-icon-wrap,
        .timeline-slides-container,
        .timeline-year-btn,
        .navbar .dropdown-menu {
            border-radius: var(--border-radius-md) !important;
        }

        /* Override elements on the site that use raw Bootstrap rounded utilities */
        .rounded-3 {
            border-radius: var(--border-radius-sm) !important;
        }
        .rounded-4 {
            border-radius: var(--border-radius-md) !important;
        }
        .rounded-5 {
            border-radius: var(--border-radius-lg) !important;
        }
        
        /* Apply dynamic theme variables globally */
        body {
            background-color: var(--bg-body);
            color: var(--text-main);
        }
        .bg-white {
            background-color: var(--bg-card) !important;
        }
        .bg-light-gray, .bg-light {
            background-color: var(--bg-light) !important;
        }
        .card {
            background-color: var(--bg-card) !important;
            border-color: var(--border-color) !important;
        }
        .text-dark {
            color: var(--text-main) !important;
        }
        .text-muted {
            color: var(--text-muted-custom) !important;
        }
        .border, .border-bottom, .border-top, .border-start, .border-end {
            border-color: var(--border-color) !important;
        }
        hr {
            border-color: var(--border-color);
            opacity: 0.15;
        }
        
        /* Dark theme deep overrides */
        [data-theme="dark"] h1, 
        [data-theme="dark"] h2, 
        [data-theme="dark"] h3, 
        [data-theme="dark"] h4, 
        [data-theme="dark"] h5, 
        [data-theme="dark"] h6 {
            color: #ffffff !important;
        }
        [data-theme="dark"] label {
            color: var(--text-main) !important;
        }
        [data-theme="dark"] .form-control {
            background-color: var(--bg-light) !important;
            border-color: var(--border-color) !important;
            color: var(--text-main) !important;
        }
        [data-theme="dark"] .form-control::placeholder {
            color: var(--text-muted-custom) !important;
            opacity: 0.7;
        }
        [data-theme="dark"] .sector-link {
            color: var(--primary-color) !important;
        }
        [data-theme="dark"] .section-eyebrow {
            background-color: rgba(59, 130, 246, 0.15) !important;
            color: var(--primary-color) !important;
        }
        [data-theme="dark"] .vmv-number {
            color: rgba(255, 255, 255, 0.08) !important;
        }
        [data-theme="dark"] .about-stats-strip {
            background-color: var(--bg-card) !important;
            border-bottom: 1px solid var(--border-color);
        }
        [data-theme="dark"] .about-stats-strip .stat-number {
            color: var(--primary-color) !important;
        }
        [data-theme="dark"] .about-stats-strip .stat-label {
            color: var(--text-muted-custom) !important;
        }
        [data-theme="dark"] .timeline-slides-container {
            background-color: var(--bg-card) !important;
            border: 1px solid var(--border-color) !important;
        }
        [data-theme="dark"] .timeline-slide-img-fallback {
            background-color: var(--bg-light) !important;
        }
        [data-theme="dark"] .timeline-year-dot {
            background-color: var(--bg-body) !important;
            border-color: var(--border-color) !important;
            box-shadow: 0 0 0 4px var(--bg-body) !important;
        }
        [data-theme="dark"] .timeline-year-btn.active .timeline-year-dot {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            box-shadow: 0 0 0 6px var(--bg-body) !important;
        }

        /* Luxury Preloader Styles */
        .preloader-wrap {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #F8F6F2;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .preloader-content {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .gold-ring {
            stroke-dasharray: 283;
            stroke-dashoffset: 283;
            transform-origin: 50px 50px;
            animation: drawRing 2.2s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }
        .gold-path-n {
            stroke-dasharray: 180;
            stroke-dashoffset: 180;
            animation: drawPath 1.8s cubic-bezier(0.25, 1, 0.5, 1) 0.3s forwards;
        }
        .gold-path-g {
            stroke-dasharray: 120;
            stroke-dashoffset: 120;
            animation: drawPath 1.6s cubic-bezier(0.25, 1, 0.5, 1) 0.6s forwards;
        }
        @keyframes drawRing {
            from { stroke-dashoffset: 283; transform: rotate(0deg); }
            to { stroke-dashoffset: 0; transform: rotate(360deg); }
        }
        @keyframes drawPath {
            to { stroke-dashoffset: 0; }
        }
        .loader-brand-text {
            font-family: 'Be Vietnam Pro', sans-serif;
            font-weight: 700;
            font-size: 1.6rem;
            letter-spacing: 4px;
            color: #c5a880;
            text-transform: uppercase;
            margin-top: 24px;
            opacity: 0;
            animation: letterSpacingExpand 2.2s cubic-bezier(0.25, 1, 0.5, 1) 0.2s forwards;
        }
        .loader-brand-sub {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            font-size: 0.72rem;
            letter-spacing: 6px;
            color: rgba(197, 168, 128, 0.6);
            text-transform: uppercase;
            margin-top: 6px;
            opacity: 0;
            animation: fadeInSub 1.8s cubic-bezier(0.25, 1, 0.5, 1) 0.8s forwards;
        }
        @keyframes letterSpacingExpand {
            from {
                letter-spacing: 2px;
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                letter-spacing: 8px;
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInSub {
            from {
                opacity: 0;
                transform: translateY(6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <!-- Page Loader Overlay -->
    <div id="page-loader" class="preloader-wrap">
        <div class="preloader-content text-center">
            <svg class="loader-logo-svg" viewBox="0 0 100 100" style="width: 85px; height: 85px; margin-bottom: 12px;">
                <!-- Outer delicate ring -->
                <circle cx="50" cy="50" r="45" fill="none" stroke="#c5a880" stroke-width="1.5" class="gold-ring"/>
                <!-- Stylized premium monogram pattern -->
                <path d="M32 68 V32 L50 56 L68 32 V68" fill="none" stroke="#c5a880" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="gold-path-n" />
                <path d="M50 44 A 9 9 0 1 1 50 62 A 9 9 0 0 1 44 59" fill="none" stroke="#c5a880" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="gold-path-g" />
            </svg>
            <h2 class="loader-brand-text">NGÂN GIA NGUYỄN</h2>
            <div class="loader-brand-sub">Premium Wood & Interior</div>
        </div>
    </div>

    <!-- Header Section -->
    <?= $this->include('layouts/header') ?>

    <!-- Main Content Body -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Section -->
    <?= $this->include('layouts/footer') ?>

    <!-- JS CDN Scripts -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Lenis Smooth Scroll -->
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/dist/lenis.min.js"></script>
    <!-- GSAP & ScrollTrigger -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <!-- SplitType -->
    <script src="https://unpkg.com/split-type"></script>
    <!-- Motion JS -->
    <script src="<?= base_url('js/motion.js') ?>"></script>
    
    <!-- Custom scripts -->
    <script>
        // Init AOS (Animations)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        const heroSwiper = new Swiper('.hero-slider', {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 1000, // Smooth transition duration
            autoplay: {
                delay: 6000, // Slightly longer delay for premium viewing
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Partners Swiper slider
        const partnersSwiper = new Swiper('.partners-slider', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                576: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });

        if (document.querySelector('.certificates-slider')) {
            const certificatesSwiper = new Swiper('.certificates-slider', {
                slidesPerView: 1,
                spaceBetween: 18,
                loop: true,
                autoplay: {
                    delay: 3200,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    }
                }
            });
        }

        // Sticky header transition on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-wrapper');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        });

        // Bind Fancybox
        Fancybox.bind("[data-fancybox]", {});

        // Animate counters when statistic blocks enter viewport.
        (function () {
            var counters = Array.prototype.slice.call(document.querySelectorAll('.stat-number[data-count]'));
            if (!counters.length) {
                return;
            }

            var runCounter = function (el) {
                if (el.dataset.animated === '1') {
                    return;
                }

                var target = parseInt(el.getAttribute('data-count') || '0', 10);
                if (!Number.isFinite(target) || target < 0) {
                    target = 0;
                }

                var originalText = (el.textContent || '').trim();
                var prefixMatch = originalText.match(/^\D+/);
                var suffixMatch = originalText.match(/\D+$/);
                var prefix = prefixMatch ? prefixMatch[0] : '';
                var suffix = suffixMatch ? suffixMatch[0] : '';
                var duration = parseInt(el.getAttribute('data-duration') || '1400', 10);
                var start = null;

                var step = function (timestamp) {
                    if (start === null) {
                        start = timestamp;
                    }
                    var progress = Math.min((timestamp - start) / duration, 1);
                    var current = Math.ceil(target * progress);
                    el.textContent = prefix + current.toLocaleString('vi-VN') + suffix;

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.dataset.animated = '1';
                    }
                };

                window.requestAnimationFrame(step);
            };

            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (!entry.isIntersecting) {
                            return;
                        }
                        runCounter(entry.target);
                        obs.unobserve(entry.target);
                    });
                }, { threshold: 0.35 });

                counters.forEach(function (counter) {
                    observer.observe(counter);
                });
            } else {
                counters.forEach(function (counter) {
                    runCounter(counter);
                });
            }
        })();
    </script>

    <!-- ===== FLOATING ACTION BUTTONS ===== -->
    <?php $zaloNumber = get_setting('zalo_phone') ?: (get_setting('zalo') ?: get_setting('phone')); ?>
    <div class="floating-buttons" id="floatingButtons">
        <!-- Phone / Zalo Button -->
        <a href="https://zalo.me/<?= esc($zaloNumber) ?>" target="_blank" rel="noopener" class="float-btn float-btn-zalo" aria-label="Liên hệ Zalo">
            <div class="float-btn-icon">
                <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.5 11.5a.75.75 0 01.75-.75h11.5a.75.75 0 01.54 1.27l-8.23 8.73h7.69a.75.75 0 010 1.5H9.75a.75.75 0 01-.54-1.27l8.23-8.73H10.25a.75.75 0 01-.75-.75z" fill="#FFFFFF"/>
                </svg>
            </div>
            <span class="float-btn-label">Chat Zalo</span>
        </a>
        <!-- Contact Button -->
        <a href="<?= base_url('lien-he') ?>" class="float-btn float-btn-contact" aria-label="Liên hệ">
            <div class="float-btn-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>
            <span class="float-btn-label">Liên Hệ</span>
        </a>
    </div>

    <!-- Scroll To Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Scroll to top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Scroll To Top Logic (placed after button is in DOM) -->
    <script>
        (function() {
            var btn = document.getElementById('scrollTopBtn');
            if (!btn) return;

            // Show/hide on scroll
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    btn.classList.add('visible');
                } else {
                    btn.classList.remove('visible');
                }
            });

            // Smooth scroll to top on click
            btn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        })();

        // Theme Switcher Logic
        (function() {
            var themeBtn = document.getElementById('theme-toggle-btn');
            if (!themeBtn) return;
            var icon = document.getElementById('theme-toggle-icon');

            function updateTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
                localStorage.setItem('site_theme', theme);
                if (theme === 'dark') {
                    icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                } else {
                    icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                }
            }

            themeBtn.addEventListener('click', function() {
                var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
                var nextTheme = currentTheme === 'dark' ? 'light' : 'dark';
                updateTheme(nextTheme);
            });

            // Sync icon on startup
            var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            if (currentTheme === 'dark') {
                icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            }
        })();
    </script>

</body>
</html>
