import './bootstrap';

// ========== Particles ==========
const canvas = document.getElementById('particles');
if (canvas) {
    const ctx = canvas.getContext('2d');
    const particles = [];
    const count = 120;

    const resize = () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    };

    class Particle {
        constructor() {
            this.reset();
        }
        reset() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 2 + 1;
            this.speedX = (Math.random() - 0.5) * 0.6;
            this.speedY = (Math.random() - 0.5) * 0.6;
            this.opacity = Math.random() * 0.4 + 0.2;
        }
        update() {
            this.x += this.speedX;
            this.y += this.speedY;
            if (this.x < 0 || this.x > canvas.width || this.y < 0 || this.y > canvas.height) {
                this.reset();
            }
        }
        draw() {
            ctx.fillStyle = `rgba(99, 209, 255, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    const connect = () => {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const dist = Math.sqrt(dx * dx + dy * dy);
                if (dist < 140) {
                    ctx.strokeStyle = `rgba(124, 255, 227, ${0.22 - dist / 600})`;
                    ctx.lineWidth = 0.7;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
    };

    const animate = () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => { p.update(); p.draw(); });
        connect();
        requestAnimationFrame(animate);
    };

    resize();
    window.addEventListener('resize', resize);
    for (let i = 0; i < count; i++) particles.push(new Particle());
    animate();
}

document.addEventListener('DOMContentLoaded', () => {
    // ========== Mobile Nav Toggle ==========
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', () => {
            const isOpen = navMenu.classList.toggle('open');
            navToggle.setAttribute('aria-expanded', String(isOpen));
        });
    }

    // ========== Navigation Active State (fixed) ==========
    const sections = document.querySelectorAll('.section[id]');
    const navLinks = document.querySelectorAll('.nav a[href^="#"]');

    const updateActiveNav = () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= sectionTop - 120) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === `#${current}`) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    };

    window.addEventListener('scroll', updateActiveNav);
    updateActiveNav();

    // ========== Smooth Scroll ==========
    navLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const href = link.getAttribute('href');
            const target = document.querySelector(href);
            if (target) {
                const top = target.offsetTop - 70;
                window.scrollTo({ top, behavior: 'smooth' });
                navMenu?.classList.remove('open');
            }
        });
    });

    // ========== Carousel Projects ==========
    const track = document.getElementById('carouselTrack');
    const prevBtn = document.querySelector('.carousel-prev');
    const nextBtn = document.querySelector('.carousel-next');
    const dots = document.querySelectorAll('.dot');
    if (track && prevBtn && nextBtn && dots.length > 0) {
        const originals = Array.from(track.querySelectorAll('.carousel-slide'));
        const firstClone = originals[0].cloneNode(true);
        const lastClone = originals[originals.length - 1].cloneNode(true);
        track.insertBefore(lastClone, track.firstChild);
        track.appendChild(firstClone);

        const slides = Array.from(track.querySelectorAll('.carousel-slide'));
        const logicalCount = originals.length;
        let index = 1; // start on first real slide
        let isDragging = false;
        let startX = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;
        let slideWidth = 0;

        const setTransition = (enabled) => {
            track.style.transition = enabled ? 'transform 0.45s ease' : 'none';
        };

        const translate = () => {
            track.style.transform = `translateX(${currentTranslate}px)`;
        };

        const updateDots = () => {
            const logicalIndex = (index - 1 + logicalCount) % logicalCount;
            dots.forEach((dot, i) => dot.classList.toggle('active', i === logicalIndex));
        };

        const goTo = (nextIndex) => {
            index = nextIndex;
            setTransition(true);
            currentTranslate = -index * slideWidth;
            translate();
            updateDots();
        };

        prevBtn.addEventListener('click', () => goTo(index - 1));
        nextBtn.addEventListener('click', () => goTo(index + 1));

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => goTo(i + 1)); // dots map to real slides
        });

        const pointerDown = (e) => {
            isDragging = true;
            setTransition(false);
            startX = e.clientX || (e.touches && e.touches[0].clientX) || 0;
            prevTranslate = currentTranslate;
        };

        const pointerMove = (e) => {
            if (!isDragging) return;
            const x = e.clientX || (e.touches && e.touches[0].clientX) || 0;
            const delta = x - startX;
            currentTranslate = prevTranslate + delta;
            translate();
        };

        const pointerUp = () => {
            if (!isDragging) return;
            isDragging = false;
            const moved = currentTranslate + index * slideWidth; // negative if swiped left
            const threshold = slideWidth * 0.12;
            if (moved < -threshold) {
                goTo(index + 1);
            } else if (moved > threshold) {
                goTo(index - 1);
            } else {
                goTo(index);
            }
        };

        track.addEventListener('mousedown', pointerDown);
        track.addEventListener('touchstart', pointerDown, { passive: true });
        window.addEventListener('mousemove', pointerMove);
        window.addEventListener('touchmove', pointerMove, { passive: true });
        window.addEventListener('mouseup', pointerUp);
        window.addEventListener('touchend', pointerUp);

        const measure = () => slides[0]?.getBoundingClientRect().width || track.clientWidth || 1;

        const handleResize = () => {
            const prevWidth = slideWidth || measure();
            slideWidth = measure();
            const ratio = slideWidth / (prevWidth || slideWidth);
            currentTranslate *= ratio;
            prevTranslate = currentTranslate;
            setTransition(false);
            translate();
            requestAnimationFrame(() => setTransition(true));
        };
        window.addEventListener('resize', handleResize);

        track.addEventListener('transitionend', () => {
            if (index === 0) {
                index = logicalCount;
                setTransition(false);
                currentTranslate = -index * slideWidth;
                translate();
            } else if (index === slides.length - 1) {
                index = 1;
                setTransition(false);
                currentTranslate = -index * slideWidth;
                translate();
            }
            requestAnimationFrame(() => setTransition(true));
        });

        // Init position without animation
        setTransition(false);
        slideWidth = measure();
        currentTranslate = -index * slideWidth;
        translate();
        updateDots();
        requestAnimationFrame(() => setTransition(true));
    }

    // ========== Contact Form AJAX ==========
    const contactForm = document.getElementById('contactForm');
    const status = document.getElementById('formStatus');
    if (contactForm) {
        contactForm.addEventListener('submit', async e => {
            e.preventDefault();
            const submitBtn = contactForm.querySelector('.btn-submit');
            const original = submitBtn ? submitBtn.textContent : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Envoi...';
            }
            status.textContent = '';
            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: new FormData(contactForm),
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const data = await response.json();
                if (data.success) {
                    contactForm.reset();
                    status.textContent = 'Message envoyé ✓ Je reviens vers vous rapidement.';
                    status.style.color = '#7cffe3';
                } else {
                    status.textContent = data.message || 'Une erreur est survenue. Merci de réessayer.';
                }
            } catch (err) {
                console.error(err);
                status.textContent = 'Impossible d\'envoyer le message pour le moment.';
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = original;
                }
            }
        });
    }
});
