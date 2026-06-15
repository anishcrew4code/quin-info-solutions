/**
 * QUIN INFO SOLUTIONS – main.js
 * All custom JavaScript for the frontend
 */

(function () {
    'use strict';

    /* ─── DOM READY ─── */
    document.addEventListener('DOMContentLoaded', function () {

        initNavbar();
        initScrollTop();
        initCounterAnimation();
        initSmoothScroll();
        initContactForm();
        initCardAnimations();

    });


    /* ════════════════════════════════════════════
       1. NAVBAR – sticky + scroll class
       ════════════════════════════════════════════ */
    function initNavbar() {
        const nav = document.querySelector('.site-navbar');
        if (!nav) return;

        // On pages with solid navbar (inner pages), always keep scrolled class
        const isInnerPage = document.querySelector('.page-banner') !== null;

        function handleNavScroll() {
            if (window.scrollY > 60 || isInnerPage) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        }

        window.addEventListener('scroll', handleNavScroll, { passive: true });
        handleNavScroll(); // run once on load

        // Close mobile menu on nav-link click
        document.querySelectorAll('.site-navbar .nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                var collapse = document.getElementById('mainMenu');
                if (collapse && collapse.classList.contains('show')) {
                    var bsCollapse = bootstrap.Collapse.getInstance(collapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            });
        });
    }


    /* ════════════════════════════════════════════
       2. SCROLL-TO-TOP BUTTON
       ════════════════════════════════════════════ */
    function initScrollTop() {
        var btn = document.getElementById('scrollTop');
        if (!btn) return;

        window.addEventListener('scroll', function () {
            btn.classList.toggle('visible', window.scrollY > 400);
        }, { passive: true });

        btn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }


    /* ════════════════════════════════════════════
       3. COUNTER ANIMATION (Stats section)
       ════════════════════════════════════════════ */
    function initCounterAnimation() {
        var statsSection = document.querySelector('.stats-section');
        if (!statsSection) return;

        function animateCounter(el) {
            var raw    = el.dataset.target || el.textContent;
            var target = parseInt(raw, 10);
            var suffix = raw.replace(/[0-9]/g, '');
            if (isNaN(target)) return;

            // Store original so re-triggers work
            el.dataset.target = raw;

            var duration = 1400; // ms
            var steps    = 60;
            var increment= target / steps;
            var count    = 0;
            var interval = duration / steps;

            var timer = setInterval(function () {
                count = Math.min(count + increment, target);
                el.textContent = Math.floor(count) + suffix;
                if (count >= target) clearInterval(timer);
            }, interval);
        }

        var observed = false;
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !observed) {
                    observed = true;
                    entry.target.querySelectorAll('.stat-number').forEach(animateCounter);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.35 });

        observer.observe(statsSection);
    }


    /* ════════════════════════════════════════════
       4. SMOOTH SCROLL (anchor links)
       ════════════════════════════════════════════ */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var href   = this.getAttribute('href');
                var target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    var navH = (document.querySelector('.site-navbar') || {}).offsetHeight || 80;
                    var top  = target.getBoundingClientRect().top + window.scrollY - navH - 10;
                    window.scrollTo({ top: top, behavior: 'smooth' });
                }
            });
        });
    }


    /* ════════════════════════════════════════════
       5. CONTACT FORM – submit state
       ════════════════════════════════════════════ */
    function initContactForm() {
        var form = document.getElementById('contactForm');
        if (!form) return;

        form.addEventListener('submit', function () {
            var btn  = document.getElementById('submitBtn');
            if (!btn) return;
            btn.disabled     = true;
            btn.innerHTML    = '<i class="fas fa-spinner fa-spin me-2"></i>Sending…';
        });

        // Contact page social icon hover (inline style override)
        document.querySelectorAll('.social-link-ct').forEach(function (el) {
            el.addEventListener('mouseenter', function () {
                this.style.background = 'var(--secondary)';
                this.style.color      = '#000';
            });
            el.addEventListener('mouseleave', function () {
                this.style.background = 'rgba(255,255,255,.15)';
                this.style.color      = '#fff';
            });
        });
    }


    /* ════════════════════════════════════════════
       6. SCROLL-TRIGGERED CARD ANIMATIONS
          Adds .animated class when cards enter viewport
       ════════════════════════════════════════════ */
    function initCardAnimations() {
        // Inject fade-up keyframe once
        if (!document.getElementById('quin-anim-style')) {
            var style = document.createElement('style');
            style.id = 'quin-anim-style';
            style.textContent = [
                '@keyframes fadeInUp {',
                '  from { opacity:0; transform:translateY(28px); }',
                '  to   { opacity:1; transform:translateY(0);    }',
                '}',
                '.anim-ready { opacity:0; }',
                '.animated  { animation: fadeInUp .55s ease forwards; }',
            ].join('\n');
            document.head.appendChild(style);
        }

        var targets = document.querySelectorAll(
            '.service-card, .value-card, .portfolio-card, .tech-card, .stat-item'
        );

        if (!targets.length || !window.IntersectionObserver) return;

        targets.forEach(function (el) { el.classList.add('anim-ready'); });

        var cardObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    var el = entry.target;
                    // staggered delay based on sibling index
                    var siblings = Array.from(el.parentElement.children);
                    var idx = siblings.indexOf(el);
                    el.style.animationDelay = (idx * 80) + 'ms';
                    el.classList.remove('anim-ready');
                    el.classList.add('animated');
                    cardObserver.unobserve(el);
                }
            });
        }, { threshold: 0.15 });

        targets.forEach(function (el) { cardObserver.observe(el); });
    }

})();
