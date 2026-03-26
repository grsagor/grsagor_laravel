/**
 * Scroll Animations
 * Animates elements when they come into viewport
 */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        // Migrate existing custom animation markup to AOS.
        const animateElements = document.querySelectorAll('.animate-on-scroll');
        animateElements.forEach(function(el) {
            if (!el.hasAttribute('data-aos')) {
                el.setAttribute('data-aos', 'fade-up');
            }

            const rawDelay = el.style.animationDelay;
            if (rawDelay && !el.hasAttribute('data-aos-delay')) {
                const delayInMs = Math.round(parseFloat(rawDelay) * 1000);
                if (!Number.isNaN(delayInMs) && delayInMs > 0) {
                    el.setAttribute('data-aos-delay', String(delayInMs));
                }
            }

            // Prevent old inline animation-delay from affecting AOS timing.
            if (rawDelay) {
                el.style.animationDelay = '';
            }
        });

        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 700,
                once: true,
                easing: 'ease-out-cubic',
                offset: 80
            });
        }

        // Animate progress bars
        const progressBars = document.querySelectorAll('.progress-bar[data-proficiency]');
        const progressObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const proficiency = bar.getAttribute('data-proficiency');
                    bar.style.width = proficiency + '%';
                    bar.setAttribute('aria-valuenow', proficiency);
                    progressObserver.unobserve(bar);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        progressBars.forEach(bar => progressObserver.observe(bar));
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Navbar scroll effect
    let lastScroll = 0;
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });
    }

    // Parallax effect for hero section
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * 0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }

})();
