<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Pesantren Fatkhul Ulum OKI Timur. Berdedikasi mencetak generasi rabbani yang berilmu, beramal, dan berakhlakul karimah.">
    <title>@yield('title', 'Pesantren Fatkhul Ulum OKI Timur')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container navbar-container">
            <a href="{{ url('/') }}" class="navbar-brand" style="display: flex; align-items: center; gap: 10px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 40px; width: auto;">
                <span>Fatkhul Ulum</span>
            </a>
            <button class="mobile-menu-btn" id="mobile-menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="{{ url('/') }}#home" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ url('/') }}#about" class="nav-link">Tentang Kami</a></li>
                <li><a href="{{ url('/') }}#programs" class="nav-link">Program</a></li>
                <li><a href="{{ url('/berita') }}" class="nav-link {{ request()->is('berita*') ? 'active' : '' }}">Berita</a></li>
                <li><a href="{{ url('/') }}#gallery" class="nav-link">Galeri</a></li>
                <li><a href="{{ url('/') }}#contact" class="nav-link">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-about">
                <h3 style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 40px; width: auto;"> 
                    Pesantren Fatkhul Ulum
                </h3>
                <p>Mencetak generasi rabbani yang berakhlakul karimah, mandiri, dan berprestasi. Pusat pendidikan Islam terpadu di OKI Timur.</p>
                <div class="social-links">
                    @if(isset($settings['facebook_url']) && $settings['facebook_url'] != '')
                    <a href="{{ $settings['facebook_url'] }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    
                    @if(isset($settings['instagram_url']) && $settings['instagram_url'] != '')
                    <a href="{{ $settings['instagram_url'] }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    
                    @if(isset($settings['youtube_url']) && $settings['youtube_url'] != '')
                    <a href="{{ $settings['youtube_url'] }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                    
                    @if(empty($settings['facebook_url']) && empty($settings['instagram_url']) && empty($settings['youtube_url']))
                    <!-- Contoh statis jika belum diatur -->
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                </div>
            </div>
            <div class="footer-links">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="{{ url('/') }}#home">Beranda</a></li>
                    <li><a href="{{ url('/') }}#about">Profil</a></li>
                    <li><a href="{{ url('/') }}#programs">Pendidikan</a></li>
                    <li><a href="{{ url('/') }}#gallery">Galeri</a></li>
                    <li><a href="{{ url('/admin/login') }}">Login</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h4>Hubungi Kami</h4>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i> {{ $settings['address'] ?? 'Jl. Lintas Timur, OKI Timur, Sumatera Selatan' }}</li>
                    <li><i class="fa-solid fa-phone"></i> {{ $settings['phone'] ?? '+62 812-3456-7890' }}</li>
                    <li><i class="fa-solid fa-envelope"></i> {{ $settings['email'] ?? 'info@fatkhululum.com' }}</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Pesantren Fatkhul Ulum OKI Timur. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Navbar Scroll Effect & Active Link
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Menu Toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const navMenu = document.getElementById('nav-menu');
        
        mobileBtn.addEventListener('click', () => {
            navMenu.classList.toggle('show');
            const icon = mobileBtn.querySelector('i');
            if(navMenu.classList.contains('show')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            } else {
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>
</html>
