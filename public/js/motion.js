/**
 * Ngân Gia Nguyễn - Premium Motion Design System (inspired by ancuong.com)
 * Uses GSAP, Lenis, and SplitType to deliver smooth, elegant, hardware-accelerated animations.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Page Loading Overlay Logic
    const loader = document.getElementById('page-loader');
    const loaderContent = document.querySelector('.loader-content');

    if (loader && loaderContent) {
        // Logo / text fade-in and scale up
        gsap.to(loaderContent, {
            opacity: 1,
            scale: 1,
            duration: 0.9,
            ease: 'power2.out',
            onComplete: () => {
                // Remove loader when assets are loaded
                const removeLoader = () => {
                    gsap.to(loader, {
                        opacity: 0,
                        duration: 0.5,
                        onComplete: () => {
                            loader.style.display = 'none';
                            playHeroEntrance();
                        }
                    });
                };

                if (document.readyState === 'complete') {
                    removeLoader();
                } else {
                    window.addEventListener('load', removeLoader);
                    // Fallback timeout
                    setTimeout(removeLoader, 1600);
                }
            }
        });
    } else {
        playHeroEntrance();
    }

    // 2. Lenis Smooth Scrolling (Desktop only)
    if (window.innerWidth > 992 && typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smoothWheel: true,
            touchMultiplier: 1.5,
        });

        // Sync with GSAP ScrollTrigger
        lenis.on('scroll', ScrollTrigger.update);
        gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
        });
        gsap.ticker.lagSmoothing(0);
    }

    // 3. Header Scrolled Styling Toggle
    const header = document.querySelector('.header-wrapper');
    if (header) {
        const handleScroll = () => {
            if (window.scrollY > 80) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleScroll);
        handleScroll(); // Trigger initially in case page loaded scrolled down
    }

    // 4. Navbar Dropdown Smooth Transitions
    document.querySelectorAll('.navbar .dropdown').forEach((dropdown) => {
        const menu = dropdown.querySelector('.dropdown-menu');
        if (menu) {
            dropdown.addEventListener('show.bs.dropdown', () => {
                gsap.fromTo(menu,
                    { opacity: 0, y: 15 },
                    { opacity: 1, y: 0, duration: 0.25, ease: 'power2.out' }
                );
            });
        }
    });

    // 5. Section Entrance Animations
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Animate section entrances
        document.querySelectorAll('section:not(.hero-slider)').forEach((sec) => {
            gsap.fromTo(sec,
                { opacity: 0, y: 45 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.8,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: sec,
                        start: 'top 82%',
                        toggleActions: 'play none none none',
                        once: true
                    }
                }
            );
        });

        // Stagger stats block child elements
        const statsSection = document.querySelector('.stat-section');
        if (statsSection) {
            gsap.fromTo('.stat-item',
                { opacity: 0, y: 25 },
                {
                    opacity: 1,
                    y: 0,
                    stagger: 0.1,
                    duration: 0.7,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: statsSection,
                        start: 'top 85%',
                        once: true
                    }
                }
            );
        }
    }
});

// 6. Hero Entrance Sequence
function playHeroEntrance() {
    // Zoom out hero background
    const activeSlide = document.querySelector('.hero-slider .swiper-slide-active');
    if (activeSlide) {
        gsap.fromTo(activeSlide,
            { backgroundSize: '108%' },
            { backgroundSize: '100%', duration: 1.4, ease: 'power2.out' }
        );
    }

    // Split text into characters for premium stagger entrance
    const heroTitle = document.querySelector('.hero-slide-content h2');
    if (heroTitle) {
        if (typeof SplitType !== 'undefined') {
            const split = new SplitType(heroTitle, { types: 'chars' });
            gsap.fromTo(split.chars,
                { opacity: 0, y: 35 },
                { opacity: 1, y: 0, stagger: 0.03, duration: 0.8, ease: 'power3.out' }
            );
        } else {
            gsap.fromTo(heroTitle,
                { opacity: 0, y: 35 },
                { opacity: 1, y: 0, duration: 0.9, ease: 'power3.out' }
            );
        }
    }

    // Fade up subtitle and buttons
    const heroSub = document.querySelector('.hero-slide-content p');
    if (heroSub) {
        gsap.fromTo(heroSub,
            { opacity: 0, y: 25 },
            { opacity: 1, y: 0, delay: 0.35, duration: 0.8, ease: 'power2.out' }
        );
    }

    const heroButtons = document.querySelectorAll('.hero-slide-content .btn');
    if (heroButtons.length > 0) {
        gsap.fromTo(heroButtons,
            { opacity: 0, y: 25 },
            { opacity: 1, y: 0, delay: 0.55, duration: 0.8, ease: 'power2.out', stagger: 0.1 }
        );
    }
}
