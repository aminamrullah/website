<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Mudaq Company | Solusi Teknologi Modern">
    <meta name="description"
        content="Mudaq Company adalah mitra teknologi terbaik Anda, menghadirkan solusi inovatif dan aplikasi modern untuk kebutuhan bisnis Anda.">
    <title>Mudaq Company | Solusi Teknologi Modern</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
    <!-- Navbar -->
    <header class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">
                <span class="logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                Mudaq
            </a>

            <nav class="nav-links">
                <a href="#home" class="nav-link active">Beranda</a>
                <a href="#services" class="nav-link">Layanan</a>
                <a href="#about" class="nav-link">Tentang Kami</a>
                <a href="#stats" class="nav-link">Pencapaian</a>
                <a href="#founder" class="nav-link">Founder</a>
            </nav>

            <div class="nav-actions">
                <a href="#contact" class="btn btn-primary">Hubungi Kami</a>
                <button class="mobile-toggle" id="mobile-toggle">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <a href="#home" class="mobile-link">Beranda</a>
        <a href="#services" class="mobile-link">Layanan</a>
        <a href="#about" class="mobile-link">Tentang Kami</a>
        <a href="#stats" class="mobile-link">Pencapaian</a>
        <a href="#founder" class="mobile-link">Founder</a>
        <a href="#contact" class="btn btn-primary mt-4">Hubungi Kami</a>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-bg-elements">
            <div class="glow-circle gc-1"></div>
            <div class="glow-circle gc-2"></div>
        </div>

        <div class="container hero-container">
            <div class="hero-content reveal-left">
                <div class="badge">Inovasi Teknologi Terdepan</div>
                <h1 class="hero-title">Berkolaborasi, Membangun Negeri Melalui <span
                        class="text-gradient">Teknologi</span></h1>
                <p class="hero-desc">Mudaq Company hadir sebagai katalisator transformasi digital Anda. Kami menciptakan
                    aplikasi cerdas dengan desain elegan dan performa tinggi untuk mempercepat pertumbuhan bisnis Anda.
                </p>

                <div class="hero-buttons">
                    <a href="#services" class="btn btn-primary btn-lg">Lihat Layanan Kami <i
                            class="fa-solid fa-arrow-right"></i></a>
                    <a href="#about" class="btn btn-outline btn-lg"><i class="fa-solid fa-play"></i> Pelajari Lebih
                        Lanjut</a>
                </div>

                <div class="hero-trusted">
                    <p>Dipercaya oleh 50+ perusahaan terkemuka</p>
                    <div class="trusted-logos">
                        <i class="fa-brands fa-microsoft"></i>
                        <i class="fa-brands fa-aws"></i>
                        <i class="fa-brands fa-google"></i>
                        <i class="fa-brands fa-apple"></i>
                    </div>
                </div>
            </div>

            <div class="hero-image-wrapper reveal-right">
                <div class="glass-card main-hero-card">
                    <img src="{{ asset('assets/hero-illustration.jpg') }}" alt="Teknologi Modern" class="hero-img" id="hero-image"
                        onerror="this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1000&auto=format&fit=crop'">
                    <div class="floating-badge fb-1">
                        <div class="fb-icon"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="fb-text">
                            <strong>+120%</strong>
                            <span>Pertumbuhan</span>
                        </div>
                    </div>
                    <div class="floating-badge fb-2">
                        <div class="fb-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="fb-text">
                            <strong>Aman</strong>
                            <span>Sistem Terenkripsi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section (Catalog Style) -->
    <section id="services" class="services section-padding bg-light">
        <div class="container">
            <div class="section-header reveal-up">
                <h2 class="section-title">Katalog <span class="text-gradient">Aplikasi & Layanan</span></h2>
                <p class="section-subtitle">Berbagai solusi digital yang kami rancang khusus untuk memenuhi setiap
                    kebutuhan industri.</p>
            </div>

            <div class="services-filter reveal-up">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="web">Website</button>
                <button class="filter-btn" data-filter="mobile">Aplikasi Mobile</button>
                <button class="filter-btn" data-filter="system">Sistem Informasi</button>
            </div>

            <div class="services-grid">
                <!-- Service Card 1 -->
                <div class="service-card reveal-up" data-category="system">
                    <div class="card-icon"><i class="fa-solid fa-server"></i></div>
                    <h3>Sistem Manajemen Pemerintahan</h3>
                    <p>Aplikasi terintegrasi untuk optimalisasi layanan tata kelola berbasis digital.</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Service Card 2 -->
                <div class="service-card reveal-up" data-category="mobile" style="transition-delay: 0.1s;">
                    <div class="card-icon"><i class="fa-brands fa-android"></i></div>
                    <h3>Layanan Publik Android</h3>
                    <p>Memudahkan masyarakat mengakses layanan dengan aplikasi responsif di genggaman.</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Service Card 3 -->
                <div class="service-card reveal-up" data-category="web" style="transition-delay: 0.2s;">
                    <div class="card-icon"><i class="fa-solid fa-globe"></i></div>
                    <h3>Portal Website Interaktif</h3>
                    <p>Landing page dan company profile dinamis yang dirancang untuk konversi optimal.</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Service Card 4 -->
                <div class="service-card reveal-up" data-category="system" style="transition-delay: 0.3s;">
                    <div class="card-icon"><i class="fa-solid fa-database"></i></div>
                    <h3>Manajemen Basis Data Terpusat</h3>
                    <p>Infrastruktur data yang aman dan terukur untuk analisis bisnis real-time.</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Service Card 5 -->
                <div class="service-card reveal-up" data-category="mobile" style="transition-delay: 0.4s;">
                    <div class="card-icon"><i class="fa-brands fa-apple"></i></div>
                    <h3>iOS Ecosystem Integration</h3>
                    <p>Pengembangan aplikasi natif iOS dengan standar kualitas antarmuka premium.</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Service Card 6 -->
                <div class="service-card reveal-up" data-category="web" style="transition-delay: 0.5s;">
                    <div class="card-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <h3>E-Commerce & Transaksi</h3>
                    <p>Platform jual beli cerdas dengan integrasi gateway pembayaran digital (PSE).</p>
                    <a href="#" class="card-link">Pelajari <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section-padding">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card reveal-up">
                    <div class="stat-icon"><i class="fa-solid fa-code"></i></div>
                    <h3 class="stat-number" data-target="150">0</h3>
                    <p class="stat-label">Aplikasi Website</p>
                </div>
                <div class="stat-card reveal-up" style="transition-delay: 0.1s;">
                    <div class="stat-icon"><i class="fa-brands fa-android"></i></div>
                    <h3 class="stat-number" data-target="99">0</h3>
                    <p class="stat-label">Aplikasi Layanan Publik</p>
                </div>
                <div class="stat-card reveal-up" style="transition-delay: 0.2s;">
                    <div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                    <h3 class="stat-number" data-target="60">0</h3>
                    <p class="stat-label">Sistem Manajemen</p>
                </div>
                <div class="stat-card reveal-up" style="transition-delay: 0.3s;">
                    <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
                    <h3 class="stat-number" data-target="159">0</h3>
                    <p class="stat-label">Total Aplikasi Dibuat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section-padding bg-light">
        <div class="container">
            <div class="about-grid">
                <div class="about-image reveal-left">
                    <div class="image-grid">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop"
                            alt="Tim Mudaq" class="img-1">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop"
                            alt="Kerja Mudaq" class="img-2">
                    </div>
                </div>
                <div class="about-content reveal-right">
                    <div class="section-header left">
                        <h2 class="section-title">Dedikasi Untuk <span class="text-gradient">Inovasi Digital</span></h2>
                    </div>
                    <p class="about-text">Mudaq Company adalah tim Software Engineer yang antusias dalam merancang dan
                        mengembangkan solusi perangkat lunak yang tangguh dan estetis. Terinspirasi dari portfolio
                        berkelas dan katalog layanan publik yang terintegrasi, kami membangun sistem yang tidak hanya
                        bekerja dengan baik, tetapi juga memanjakan mata penggunanya.</p>

                    <ul class="feature-list">
                        <li><i class="fa-solid fa-circle-check"></i> Desain Premium dan Responsif</li>
                        <li><i class="fa-solid fa-circle-check"></i> Kode Bersih dan Terukur</li>
                        <li><i class="fa-solid fa-circle-check"></i> Dukungan Tim Ahli Berpengalaman</li>
                        <li><i class="fa-solid fa-circle-check"></i> Keamanan Sistem Tingkat Lanjut</li>
                    </ul>

                    <a href="#contact" class="btn btn-primary mt-4">Mulai Proyek Anda</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Founder / CV Section -->
    <section id="founder" class="founder section-padding">
        <div class="container">
            <div class="section-header reveal-up">
                <h2 class="section-title">Kenali <span class="text-gradient">Pendiri Kami</span></h2>
                <p class="section-subtitle">Di balik Mudaq Company, terdapat dedikasi dan visi untuk terus memajukan
                    teknologi Indonesia.</p>
            </div>

            <div class="founder-card reveal-up">
                <div class="founder-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=800&auto=format&fit=crop"
                        alt="Amin Amrullah - Founder" class="founder-img">
                    <div class="founder-socials">
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div class="founder-info">
                    <div class="founder-header">
                        <h3>Amin Amrullah</h3>
                        <span class="founder-role">Founder & CEO Mudaq Company</span>
                    </div>

                    <p class="founder-bio">Seorang <em>tech-enthusiast</em> dan <em>software engineer</em> berpengalaman
                        dengan rekam jejak panjang dalam membangun solusi digital berskala besar. Berkomitmen untuk
                        membawa inovasi teknologi yang tidak hanya estetis namun juga berdampak nyata bagi masyarakat
                        dan industri.</p>

                    <div class="cv-highlights">
                        <div class="cv-item">
                            <div class="cv-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div class="cv-text">
                                <strong>Pendidikan</strong>
                                <span>Teknik Informatika (S1)</span>
                            </div>
                        </div>
                        <div class="cv-item">
                            <div class="cv-icon"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="cv-text">
                                <strong>Pengalaman</strong>
                                <span>5+ Tahun di Industri IT</span>
                            </div>
                        </div>
                        <div class="cv-item">
                            <div class="cv-icon"><i class="fa-solid fa-code"></i></div>
                            <div class="cv-text">
                                <strong>Keahlian</strong>
                                <span>Software Architecture, Full-stack Dev</span>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-primary mt-4">Unduh CV Lengkap <i class="fa-solid fa-download"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-col brand-col">
                <a href="#" class="logo footer-logo">
                    <span class="logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                    Mudaq
                </a>
                <p class="footer-desc">Menghadirkan masa depan ke dalam genggaman Anda melalui inovasi teknologi yang
                    brilian.</p>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Layanan</h4>
                <ul class="footer-links">
                    <li><a href="#">Website Development</a></li>
                    <li><a href="#">Mobile Apps</a></li>
                    <li><a href="#">UI/UX Design</a></li>
                    <li><a href="#">IT Consultant</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Perusahaan</h4>
                <ul class="footer-links">
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Kontak</a></li>
                    <li><a href="{{ url('/admin/login') }}">Login Admin</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4 class="footer-title">Berlangganan</h4>
                <p class="footer-desc">Dapatkan update terbaru seputar teknologi dan layanan kami.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Email Anda" required>
                    <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2026 Mudaq Company. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Custom Script -->
    <script src="{{ asset('script.js') }}"></script>
</body>

</html>