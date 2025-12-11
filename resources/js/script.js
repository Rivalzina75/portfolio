import './bootstrap';
import anime from 'animejs';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// ========== Projects Carousel ==========
document.addEventListener('DOMContentLoaded', () => {
    const swiperEl = document.querySelector('.projects-swiper');
    if (swiperEl) {
        new Swiper('.projects-swiper', {
            modules: [Navigation, Pagination],
            slidesPerView: 1,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            grabCursor: true,
            navigation: {
                nextEl: '.carousel-next',
                prevEl: '.carousel-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: 40,
                },
                1200: {
                    slidesPerView: 1,
                    spaceBetween: 60,
                },
            },
        });
    }
});

// ========== Hero Title Animation ==========
const heroSvg = document.querySelector('.hero-title');
if (heroSvg) {
    const textElement = heroSvg.querySelector('.line');
    if (textElement && textElement.tagName === 'text') {
        // Animation for text element
        const length = textElement.getComputedTextLength();
        textElement.style.strokeDasharray = length;
        textElement.style.strokeDashoffset = length;

        anime({
            targets: textElement,
            strokeDashoffset: [length, 0],
            duration: 2500,
            easing: 'easeInOutQuad',
            loop: true,
            direction: 'alternate'
        });
    }
}

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

                const data = await response.json().catch(() => ({}));

                if (response.ok && data.success) {
                    contactForm.reset();
                    status.textContent = 'Message envoyé ✓ Je reviens vers vous rapidement.';
                    status.style.color = '#7cffe3';
                    return;
                }

                // Gestion des erreurs de validation (422)
                if (response.status === 422 && data.errors) {
                    const firstError = Object.values(data.errors)[0]?.[0] || 'Validation échouée.';
                    status.textContent = firstError;
                    status.style.color = '#ff8686';
                    return;
                }

                status.textContent = data.message || 'Une erreur est survenue. Merci de réessayer.';
                status.style.color = '#ff8686';
            } catch (err) {
                console.error(err);
                status.textContent = 'Impossible d\'envoyer le message pour le moment.';
                status.style.color = '#ff8686';
            } finally {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.textContent = original;
                }
            }
        });
    }
});

// ========== Scroll to Top Button ==========
const scrollToTopBtn = document.getElementById('scrollToTop');

if (scrollToTopBtn) {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.add('visible');
        } else {
            scrollToTopBtn.classList.remove('visible');
        }
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}
