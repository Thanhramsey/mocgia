/**
 * Ngân Gia Nguyễn - Premium Motion Design System (inspired by ancuong.com)
 * Uses GSAP, Lenis, and SplitType to deliver smooth, elegant, hardware-accelerated animations.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Page Loading Overlay Logic
    const loader = document.getElementById('page-loader');
    const loaderContent = document.querySelector('.preloader-content');

    if (loader && loaderContent) {
        const removeLoader = () => {
            gsap.to(loader, {
                opacity: 0,
                duration: 0.6,
                ease: 'power2.out',
                onComplete: () => {
                    loader.style.display = 'none';
                    playHeroEntrance();
                }
            });
        };

        if (document.readyState === 'complete') {
            setTimeout(removeLoader, 650);
        } else {
            window.addEventListener('load', () => setTimeout(removeLoader, 250));
            setTimeout(removeLoader, 2600); // Fallback
        }
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

// 6. Hero Entrance Sequence & Slide Transitions (Handled natively by CSS .swiper-slide-active for loop stability)
function animateHeroSlide(slide) {
    // CSS-driven transitions prevent loop jump flickering
}

// Make it globally accessible
window.animateHeroSlide = animateHeroSlide;

function playHeroEntrance() {
    // CSS-driven transitions prevent loop jump flickering
}
