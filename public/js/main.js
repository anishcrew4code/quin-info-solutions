/**
 * QUIN INFO SOLUTIONS – main.js
 * Custom JavaScript: particles, navbar, counters, animations, form
 */

(function () {
    'use strict';

    /* ─── DOM READY ─── */
    document.addEventListener('DOMContentLoaded', function () {
        initParticles();
        initNavbar();
        initScrollTop();
        initCounterAnimation();
        initSmoothScroll();
        initContactForm();
        initCardAnimations();
    });


    /* ════════════════════════════════════════════
       1. PARTICLE SYSTEM – canvas-based
       Renders animated dots with connecting lines,
       colour-matched to the Quin brand palette.
       ════════════════════════════════════════════ */
    function initParticles() {
        var canvas = document.getElementById('hero-particles');
        if (!canvas) return;

        var ctx    = canvas.getContext('2d');
        var W, H, particles, raf;

        /* ── colours ── */
        var PALETTE = [
            'rgba(244,185,66,',   // --secondary gold
            'rgba(255,255,255,',  // white
            'rgba(100,160,255,',  // light blue accent
        ];

        /* ── config ── */
        var CFG = {
            count:      120,   // number of particles
            maxRadius:  2.8,   // largest dot radius
            minRadius:  0.6,
            speed:      0.35,  // base speed
            linkDist:   140,   // max distance for connecting lines
            linkWidth:  0.55,
            mouseRadius:160,   // interaction radius
        };

        var mouse = { x: -9999, y: -9999 };

        /* ── resize handler ── */
        function resize() {
            var rect = canvas.parentElement.getBoundingClientRect();
            W = canvas.width  = rect.width  || window.innerWidth;
            H = canvas.height = rect.height || window.innerHeight;
        }

        /* ── Particle class ── */
        function Particle() {
            this.reset(true);
        }
        Particle.prototype.reset = function (init) {
            this.x  = Math.random() * W;
            this.y  = init ? Math.random() * H : (Math.random() < .5 ? -5 : H + 5);
            this.vx = (Math.random() - .5) * CFG.speed * 2;
            this.vy = (Math.random() - .5) * CFG.speed * 2;
            this.r  = CFG.minRadius + Math.random() * (CFG.maxRadius - CFG.minRadius);
            this.baseAlpha  = 0.3 + Math.random() * 0.55;
            this.alpha      = this.baseAlpha;
            this.colorBase  = PALETTE[Math.floor(Math.random() * PALETTE.length)];
            /* twinkle */
            this.twinkleSpeed = 0.005 + Math.random() * 0.012;
            this.twinkleDir   = Math.random() < .5 ? 1 : -1;
            /* pulse size */
            this.pulseT = Math.random() * Math.PI * 2;
            this.pulseSpeed = 0.012 + Math.random() * 0.018;
        };
        Particle.prototype.update = function () {
            /* twinkle */
            this.alpha += this.twinkleSpeed * this.twinkleDir;
            if (this.alpha > this.baseAlpha + 0.25 || this.alpha < 0.1) {
                this.twinkleDir *= -1;
            }

            /* pulse size */
            this.pulseT += this.pulseSpeed;
            var rMod = Math.sin(this.pulseT) * 0.3;

            /* mouse repulsion */
            var dx = this.x - mouse.x;
            var dy = this.y - mouse.y;
            var d  = Math.sqrt(dx * dx + dy * dy);
            if (d < CFG.mouseRadius) {
                var force = (CFG.mouseRadius - d) / CFG.mouseRadius * 0.8;
                this.vx += (dx / d) * force;
                this.vy += (dy / d) * force;
            }

            /* damping */
            this.vx *= 0.98;
            this.vy *= 0.98;

            /* clamp speed */
            var spd = Math.sqrt(this.vx * this.vx + this.vy * this.vy);
            if (spd > CFG.speed * 3) {
                this.vx = (this.vx / spd) * CFG.speed * 3;
                this.vy = (this.vy / spd) * CFG.speed * 3;
            }
            if (spd < CFG.speed * 0.4 && d > CFG.mouseRadius) {
                this.vx += (Math.random() - .5) * 0.04;
                this.vy += (Math.random() - .5) * 0.04;
            }

            this.x += this.vx;
            this.y += this.vy;

            /* wrap edges */
            if (this.x < -10) this.x = W + 10;
            if (this.x > W + 10) this.x = -10;
            if (this.y < -10) this.y = H + 10;
            if (this.y > H + 10) this.y = -10;

            /* draw dot */
            ctx.beginPath();
            ctx.arc(this.x, this.y, Math.max(0.2, this.r + rMod), 0, Math.PI * 2);
            ctx.fillStyle = this.colorBase + Math.min(1, this.alpha) + ')';
            ctx.fill();
        };

        /* ── draw connecting lines ── */
        function drawLinks() {
            for (var i = 0; i < particles.length; i++) {
                for (var j = i + 1; j < particles.length; j++) {
                    var a = particles[i], b = particles[j];
                    var dx = a.x - b.x, dy = a.y - b.y;
                    var dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < CFG.linkDist) {
                        var alpha = (1 - dist / CFG.linkDist) * 0.28;
                        ctx.beginPath();
                        ctx.moveTo(a.x, a.y);
                        ctx.lineTo(b.x, b.y);
                        ctx.strokeStyle = 'rgba(255,255,255,' + alpha + ')';
                        ctx.lineWidth   = CFG.linkWidth;
                        ctx.stroke();
                    }
                }
            }
        }

        /* ── draw mouse attraction lines ── */
        function drawMouseLinks() {
            if (mouse.x === -9999) return;
            for (var i = 0; i < particles.length; i++) {
                var p  = particles[i];
                var dx = p.x - mouse.x, dy = p.y - mouse.y;
                var d  = Math.sqrt(dx * dx + dy * dy);
                if (d < CFG.mouseRadius * 1.2) {
                    var a = (1 - d / (CFG.mouseRadius * 1.2)) * 0.45;
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(mouse.x, mouse.y);
                    ctx.strokeStyle = 'rgba(244,185,66,' + a + ')';
                    ctx.lineWidth   = 0.8;
                    ctx.stroke();
                }
            }
        }

        /* ── shooting stars ── */
        var stars = [];
        function spawnStar() {
            stars.push({
                x: Math.random() * W,
                y: 0,
                len: 80 + Math.random() * 120,
                speed: 6 + Math.random() * 8,
                angle: Math.PI / 4 + (Math.random() - .5) * 0.4,
                alpha: 1,
            });
        }
        setInterval(spawnStar, 3800 + Math.random() * 2000);

        function drawStars() {
            stars = stars.filter(function (s) {
                s.x += Math.cos(s.angle) * s.speed;
                s.y += Math.sin(s.angle) * s.speed;
                s.alpha -= 0.018;
                if (s.alpha <= 0 || s.x > W || s.y > H) return false;
                var grd = ctx.createLinearGradient(
                    s.x, s.y,
                    s.x - Math.cos(s.angle) * s.len,
                    s.y - Math.sin(s.angle) * s.len
                );
                grd.addColorStop(0,   'rgba(244,185,66,' + s.alpha + ')');
                grd.addColorStop(0.5, 'rgba(255,255,255,' + s.alpha * .6 + ')');
                grd.addColorStop(1,   'rgba(255,255,255,0)');
                ctx.beginPath();
                ctx.moveTo(s.x, s.y);
                ctx.lineTo(
                    s.x - Math.cos(s.angle) * s.len,
                    s.y - Math.sin(s.angle) * s.len
                );
                ctx.strokeStyle = grd;
                ctx.lineWidth   = 2;
                ctx.stroke();
                return true;
            });
        }

        /* ── animation loop ── */
        function loop() {
            ctx.clearRect(0, 0, W, H);
            drawLinks();
            drawMouseLinks();
            drawStars();
            for (var i = 0; i < particles.length; i++) {
                particles[i].update();
            }
            raf = requestAnimationFrame(loop);
        }

        /* ── init ── */
        function init() {
            resize();
            particles = [];
            for (var i = 0; i < CFG.count; i++) {
                particles.push(new Particle());
            }
            if (raf) cancelAnimationFrame(raf);
            loop();
        }

        /* ── events ── */
        window.addEventListener('resize', function () {
            resize();
        }, { passive: true });

        canvas.parentElement.addEventListener('mousemove', function (e) {
            var rect   = canvas.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        }, { passive: true });

        canvas.parentElement.addEventListener('mouseleave', function () {
            mouse.x = -9999;
            mouse.y = -9999;
        });

        /* stop animation when hero leaves viewport (performance) */
        if (window.IntersectionObserver) {
            var heroObs = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        if (!raf) loop();
                    } else {
                        cancelAnimationFrame(raf);
                        raf = null;
                    }
                });
            }, { threshold: 0.05 });
            heroObs.observe(canvas.parentElement);
        }

        init();
    }


    /* ════════════════════════════════════════════
       2. NAVBAR – sticky + scroll class
       ════════════════════════════════════════════ */
    function initNavbar() {
        var nav = document.querySelector('.site-navbar');
        if (!nav) return;

        var isInnerPage = !!document.querySelector('.page-banner');

        function handleNavScroll() {
            if (window.scrollY > 60 || isInnerPage) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        }

        window.addEventListener('scroll', handleNavScroll, { passive: true });
        handleNavScroll();

        /* close mobile menu on link click */
        document.querySelectorAll('.site-navbar .nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                var col = document.getElementById('mainMenu');
                if (col && col.classList.contains('show')) {
                    var bsc = bootstrap.Collapse.getInstance(col);
                    if (bsc) bsc.hide();
                }
            });
        });
    }


    /* ════════════════════════════════════════════
       3. SCROLL-TO-TOP BUTTON
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
       4. COUNTER ANIMATION (Stats section)
       ════════════════════════════════════════════ */
    function initCounterAnimation() {
        var statsSection = document.querySelector('.stats-section');
        if (!statsSection) return;

        function animateCounter(el) {
            var raw    = el.dataset.target || el.textContent;
            var target = parseInt(raw, 10);
            var suffix = raw.replace(/[0-9]/g, '');
            if (isNaN(target)) return;
            el.dataset.target = raw;

            var duration = 1600;
            var steps    = 70;
            var step     = target / steps;
            var count    = 0;
            var iv       = duration / steps;

            var t = setInterval(function () {
                count = Math.min(count + step, target);
                el.textContent = Math.floor(count) + suffix;
                if (count >= target) clearInterval(t);
            }, iv);
        }

        var done = false;
        new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting && !done) {
                    done = true;
                    entry.target.querySelectorAll('.stat-number').forEach(animateCounter);
                }
            });
        }, { threshold: 0.35 }).observe(statsSection);
    }


    /* ════════════════════════════════════════════
       5. SMOOTH SCROLL (anchor links)
       ════════════════════════════════════════════ */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (a) {
            a.addEventListener('click', function (e) {
                var t = document.querySelector(this.getAttribute('href'));
                if (t) {
                    e.preventDefault();
                    var navH = (document.querySelector('.site-navbar') || {}).offsetHeight || 80;
                    window.scrollTo({
                        top: t.getBoundingClientRect().top + window.scrollY - navH - 10,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }


    /* ════════════════════════════════════════════
       6. CONTACT FORM – submit loading state
       ════════════════════════════════════════════ */
    function initContactForm() {
        var form = document.getElementById('contactForm');
        if (!form) return;

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
       7. SCROLL-TRIGGERED CARD ANIMATIONS
       ════════════════════════════════════════════ */
    function initCardAnimations() {
        if (!document.getElementById('quin-anim-style')) {
            var s = document.createElement('style');
            s.id  = 'quin-anim-style';
            s.textContent = [
                '@keyframes fadeInUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}',
                '.anim-ready{opacity:0}',
                '.animated{animation:fadeInUp .55s ease forwards}',
            ].join('');
            document.head.appendChild(s);
        }

        var els = document.querySelectorAll(
            '.service-card,.value-card,.portfolio-card,.tech-card,.stat-item'
        );
        if (!els.length || !window.IntersectionObserver) return;

        els.forEach(function (el) { el.classList.add('anim-ready'); });

        new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var el  = entry.target;
                    var idx = Array.from(el.parentElement.children).indexOf(el);
                    el.style.animationDelay = (idx * 75) + 'ms';
                    el.classList.remove('anim-ready');
                    el.classList.add('animated');
                    this.unobserve(el);
                }
            }.bind(this));
        }, { threshold: 0.12 }).observe
            ? (function (obs, list) { list.forEach(function (el) { obs.observe(el); }); })(
                new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            var el  = entry.target;
                            var idx = Array.from(el.parentElement.children).indexOf(el);
                            el.style.animationDelay = (idx * 75) + 'ms';
                            el.classList.remove('anim-ready');
                            el.classList.add('animated');
                        }
                    });
                }, { threshold: 0.12 }), els
              )
            : null;
    }

})();
