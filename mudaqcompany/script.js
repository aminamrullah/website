document.addEventListener('DOMContentLoaded', () => {
    /* ==============================================
       1. Navbar Scroll Effect & Mobile Menu
       ============================================== */
    const navbar = document.getElementById('navbar');
    const mobileToggle = document.getElementById('mobile-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-link');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    mobileToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        const icon = mobileToggle.querySelector('i');
        if (mobileMenu.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
        } else {
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }
    });

    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            mobileToggle.querySelector('i').classList.remove('fa-xmark');
            mobileToggle.querySelector('i').classList.add('fa-bars');
        });
    });

    /* ==============================================
       2. Scroll Reveal Animations (Intersection Observer)
       ============================================== */
    const revealElements = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right');

    const revealCallback = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                observer.unobserve(entry.target); // Optional: stop observing once revealed
            }
        });
    };

    const revealOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const revealObserver = new IntersectionObserver(revealCallback, revealOptions);

    revealElements.forEach(el => {
        revealObserver.observe(el);
    });

    /* ==============================================
       3. Counter Animation for Statistics
       ============================================== */
    const counters = document.querySelectorAll('.stat-number');
    let hasCounted = false;

    const runCounter = () => {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps

            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.innerText = Math.ceil(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target;
                }
            };
            
            updateCounter();
        });
    };

    const statsSection = document.getElementById('stats');
    
    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries) => {
            const [entry] = entries;
            if (entry.isIntersecting && !hasCounted) {
                hasCounted = true;
                runCounter();
            }
        }, { threshold: 0.5 });
        
        statsObserver.observe(statsSection);
    }

    /* ==============================================
       4. Service/Catalog Filtering
       ============================================== */
    const filterBtns = document.querySelectorAll('.filter-btn');
    const serviceCards = document.querySelectorAll('.service-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            serviceCards.forEach(card => {
                // Reset animation properties for smooth re-triggering
                card.style.display = 'block';
                card.classList.remove('active');
                
                setTimeout(() => {
                    if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                        card.style.display = 'block';
                        // Re-trigger animation
                        setTimeout(() => card.classList.add('active'), 50);
                    } else {
                        card.style.display = 'none';
                    }
                }, 300); // Wait for transition
            });
        });
    });

    /* ==============================================
       5. Active Nav Link on Scroll
       ============================================== */
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
});
