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
    // ========== Skills Tabs ==========
    const tabs = document.querySelectorAll('.skill-tab');
    const groups = document.querySelectorAll('.panel-group');
    if (tabs.length && groups.length) {
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetId = tab.getAttribute('data-target');
                tabs.forEach(t => {
                    t.classList.toggle('is-active', t === tab);
                    t.setAttribute('aria-selected', String(t === tab));
                });
                groups.forEach(g => {
                    const isTarget = g.id === targetId;
                    g.classList.toggle('is-active', isTarget);
                    if (isTarget) {
                        g.removeAttribute('aria-hidden');
                    } else {
                        g.setAttribute('aria-hidden', 'true');
                    }
                });
            });
        });
    }

    // ========== Veille Technologique (rotation avec RSS) ==========
    const veilleCards = document.querySelectorAll('#veilleCards .veille-card');
    let veilleArticles = [];
    let veilleIndex = 0;

    // Fallback articles if RSS fails
    const fallbackArticles = [
        { title: "ChatGPT et Copilot peinent sur les interactions UI complexes", date: "12/12/2025", image: null, link: "#" },
        { title: "Pourquoi les assistants IA surestiment le swipe mobile", date: "10/12/2025", image: null, link: "#" },
        { title: "Front-end low-code : limites sur les micro-interactions", date: "08/12/2025", image: null, link: "#" },
        { title: "Code qualité : valider le CSS animé proposé par l'IA", date: "05/12/2025", image: null, link: "#" },
        { title: "Debugging du code IA pour les gestures", date: "03/12/2025", image: null, link: "#" },
        { title: "Copilot UI : du rôle de rédacteur à validateur", date: "30/11/2025", image: null, link: "#" },
        { title: "Accessibilité : focus states oubliés par l'IA", date: "28/11/2025", image: null, link: "#" },
        { title: "Performance : animations générées et reflow", date: "26/11/2025", image: null, link: "#" }
    ];

    const fallbackImage = (imageEl) => {
        if (!imageEl) return;
        const colors = [
            ['#00d9ff', '#00ffcc'],
            ['#ff0080', '#ff8c00'],
            ['#7f39fb', '#ec4899'],
            ['#06b6d4', '#0891b2'],
            ['#3b82f6', '#8b5cf6'],
            ['#ec4899', '#f59e0b'],
        ];
        const randomColor = colors[Math.floor(Math.random() * colors.length)];
        imageEl.style.background = `linear-gradient(135deg, ${randomColor[0]}33, ${randomColor[1]}22)`;
        imageEl.innerHTML = '📰';
        imageEl.classList.add('no-image');
    };

    const renderVeille = () => {
        veilleCards.forEach((card, slot) => {
            const art = veilleArticles[(veilleIndex + slot) % veilleArticles.length];
            const imageEl = card.querySelector('.veille-image');
            const titleEl = card.querySelector('.veille-title');
            const dateEl = card.querySelector('.veille-date');
            const linkEl = card.querySelector('.veille-link');

            // Update image with validation + onerror fallback
            if (imageEl) {
                if (art.image && /^https?:\/\//i.test(art.image)) {
                    imageEl.classList.remove('no-image');
                    imageEl.innerHTML = `<img src="${art.image}" alt="${art.title}" loading="lazy" referrerpolicy="no-referrer">`;
                    const imgTag = imageEl.querySelector('img');
                    if (imgTag) {
                        imgTag.onerror = () => fallbackImage(imageEl);
                    }
                } else {
                    fallbackImage(imageEl);
                }
            }

            if (titleEl) titleEl.textContent = art.title;
            if (dateEl) dateEl.textContent = `Date : ${art.date}`;
            if (linkEl) linkEl.setAttribute('href', art.link || '#');
        });
    };

    const startRotation = () => {
        if (!veilleArticles.length) return;

        renderVeille();

        const progressBar = document.getElementById('veilleProgress');
        setInterval(() => {
            // Slide out
            veilleCards.forEach(card => card.classList.add('slide-out'));

            // Wait for slide out, then update content and slide in
            setTimeout(() => {
                veilleIndex = (veilleIndex + veilleCards.length) % veilleArticles.length;
                renderVeille();

                // Slide in
                veilleCards.forEach(card => {
                    card.classList.remove('slide-out');
                    card.classList.add('slide-in');
                });

                // Remove slide-in class for next cycle
                setTimeout(() => {
                    veilleCards.forEach(card => card.classList.remove('slide-in'));
                }, 400);
            }, 400);

            // Reset progress bar animation
            if (progressBar) {
                progressBar.style.animation = 'none';
                setTimeout(() => {
                    progressBar.style.animation = 'veilleCountdown 8s linear infinite';
                }, 10);
            }
        }, 8000);
    };

    // Fetch articles from RSS API
    if (veilleCards.length) {
        // Try to get articles from server data first, otherwise fetch from API
        const serverArticles = window.__VEILLE_ARTICLES__ || null;

        if (serverArticles && serverArticles.length) {
            veilleArticles = serverArticles;
            startRotation();
        } else {
            fetch('/api/veille/articles')
                .then(response => response.json())
                .then(data => {
                    veilleArticles = data && data.length ? data : fallbackArticles;
                    startRotation();
                })
                .catch(error => {
                    console.warn('Failed to fetch RSS articles, using fallback:', error);
                    veilleArticles = fallbackArticles;
                    startRotation();
                });
        }
    }

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
