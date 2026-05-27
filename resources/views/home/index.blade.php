@extends('layouts.app')

@section('content')

<!-- Hero Section -->
@php 
    $heroValue = $settings['hero_image'] ?? 'https://images.unsplash.com/photo-1564683214965-3619addd900d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80';
    $heroBg = str_starts_with($heroValue, 'http') || str_starts_with($heroValue, 'data:image') ? $heroValue : asset('storage/' . $heroValue);
@endphp
<section id="home" class="hero" style="background-image: url('{{ $heroBg }}');">
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <h1 class="fade-in-up">{{ $settings['hero_title'] ?? 'Mencetak Generasi Rabbani' }}</h1>
        <p class="fade-in-up delay-1">{{ $settings['hero_subtitle'] ?? 'Berilmu, Beramal, dan Berakhlakul Karimah. Mari bergabung bersama Pesantren Fatkhul Ulum OKI Timur.' }}</p>
        <div class="hero-buttons fade-in-up delay-2">
            <a href="#programs" class="btn btn-primary">Lihat Program</a>
            <a href="#contact" class="btn btn-outline">Hubungi Kami</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2>Tentang Kami</h2>
            <p>Mengenal lebih dekat Pesantren Fatkhul Ulum</p>
        </div>
        <div class="about-grid">
            <div class="about-image slide-in-left">
                @if(isset($settings['about_image']))
                @php
                    $aboutImg = str_starts_with($settings['about_image'], 'http') || str_starts_with($settings['about_image'], 'data:image') 
                        ? $settings['about_image'] 
                        : asset('storage/' . $settings['about_image']);
                @endphp
                <div style="width: 100%; height: 100%; border-radius: 20px; overflow: hidden; box-shadow: var(--shadow-lg);">
                    <img src="{{ $aboutImg }}" alt="Tentang Kami" style="width: 100%; height: 100%; object-fit: cover; min-height: 400px;">
                </div>
                @else
                <!-- Using a placeholder pattern as placeholder image -->
                <div class="image-placeholder">
                    <i class="fa-solid fa-book-quran"></i>
                </div>
                @endif
            </div>
            <div class="about-text slide-in-right">
                <h3>{{ $settings['about_title'] ?? 'Sejarah & Visi Misi' }}</h3>
                <div style="margin-bottom: 1.5rem; color: var(--text-muted);">
                    {!! $settings['about_content'] ?? '<p>Pesantren Fatkhul Ulum didirikan dengan semangat untuk menyebarkan agama Islam dan mencetak kader-kader ulama yang berwawasan luas, mandiri, dan mampu menjawab tantangan zaman.</p><p>Kami memadukan kurikulum pesantren salaf dengan pendidikan modern sehingga para santri tidak hanya menguasai ilmu agama (tafaqquh fiddin) tetapi juga ilmu pengetahuan umum.</p>' !!}
                </div>
                
                @if(isset($settings['about_features']))
                <ul class="feature-list">
                    @foreach(explode("\n", $settings['about_features']) as $feature)
                    @if(trim($feature))
                    <li><i class="fa-solid fa-check-circle"></i> {{ trim($feature) }}</li>
                    @endif
                    @endforeach
                </ul>
                @else
                <ul class="feature-list">
                    <li><i class="fa-solid fa-check-circle"></i> Kurikulum Terpadu</li>
                    <li><i class="fa-solid fa-check-circle"></i> Tenaga Pendidik Profesional</li>
                    <li><i class="fa-solid fa-check-circle"></i> Lingkungan Asri dan Nyaman</li>
                    <li><i class="fa-solid fa-check-circle"></i> Fasilitas Lengkap</li>
                </ul>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section id="programs" class="programs section-padding bg-light">
    <div class="container">
        <div class="section-title text-center">
            <h2>Program Pendidikan</h2>
            <p>Pilihan jenjang pendidikan di Pesantren Fatkhul Ulum</p>
        </div>
        <div class="cards-grid">
            @forelse($programs as $index => $program)
            <div class="card fade-in-up delay-{{ $index % 4 }}">
                <div class="card-icon">
                    <i class="{{ $program->icon ?? 'fa-solid fa-school' }}"></i>
                </div>
                <div class="card-content">
                    <h3>{{ $program->title }}</h3>
                    <p>{{ $program->description }}</p>
                </div>
            </div>
            @empty
            <div class="text-center" style="grid-column: 1 / -1;">
                <p>Belum ada program pendidikan yang ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="gallery section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2>Galeri Kegiatan</h2>
            <p>Dokumentasi aktivitas santri dan fasilitas pesantren</p>
        </div>
        <div class="gallery-grid">
            @forelse($galleries as $index => $gallery)
            <div class="gallery-item fade-in-up delay-{{ $index % 4 }}">
                <div style="width: 100%; height: 100%;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @if($gallery->title)
                <div style="position: absolute; bottom: 0; left: 0; width: 100%; background: rgba(0,0,0,0.6); color: white; padding: 0.5rem; text-align: center; font-size: 0.9rem;">
                    {{ $gallery->title }}
                </div>
                @endif
            </div>
            @empty
            <div class="text-center" style="grid-column: 1 / -1;">
                <p>Belum ada foto galeri yang ditambahkan.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section id="news" class="news section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2>Berita & Artikel</h2>
            <p>Kabar terbaru dari Pesantren Fatkhul Ulum</p>
        </div>
        
        <div class="cards-grid">
            @forelse($articles as $article)
            <div class="card fade-in-up">
                @if($article->image)
                <div style="height: 200px; overflow: hidden; border-radius: 12px 12px 0 0; margin: -2.5rem -1.5rem 1.5rem -1.5rem;">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                @else
                <div class="card-icon">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                @endif
                <div class="card-content text-left">
                    <h3 style="margin-bottom: 0.5rem;"><a href="{{ route('baca-berita', $article->slug) }}">{{ $article->title }}</a></h3>
                    <p style="font-size: 0.85rem; color: var(--primary); margin-bottom: 1rem;"><i class="fa-regular fa-calendar"></i> {{ $article->created_at->format('d M Y') }}</p>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($article->content), 100) !!}</p>
                    <a href="{{ route('baca-berita', $article->slug) }}" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary); padding: 0.5rem 1rem; margin-top: 1rem; font-size: 0.9rem;">Baca Selengkapnya</a>
                </div>
            </div>
            @empty
            <div class="text-center" style="grid-column: 1 / -1;">
                <p>Belum ada artikel yang diterbitkan.</p>
            </div>
            @endforelse
        </div>
        
        @if($articles->count() > 0)
        <div class="text-center mt-4">
            <a href="{{ route('berita') }}" class="btn btn-primary">Lihat Semua Berita</a>
        </div>
        @endif
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact section-padding bg-light">
    <div class="container">
        <div class="section-title text-center">
            <h2>{{ $settings['contact_title'] ?? 'Hubungi Kami' }}</h2>
            <p>{{ $settings['contact_subtitle'] ?? 'Punya pertanyaan atau ingin mendaftar? Jangan ragu untuk menghubungi kami.' }}</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info slide-in-left">
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <h4>Alamat</h4>
                        <p>{{ $settings['address'] ?? 'Jl. Lintas Timur, OKI Timur, Sumatera Selatan' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <h4>Telepon / WA</h4>
                        <p>{{ $settings['phone'] ?? '+62 812-3456-7890' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <h4>Email</h4>
                        <p>{{ $settings['email'] ?? 'info@fatkhululum.com' }}</p>
                    </div>
                </div>
                <div class="map-container mt-4">
                    <!-- Embed Google Maps -->
                    {!! $settings['google_maps_iframe'] ?? '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127606.58784196149!2d104.5936355!3d-4.2234035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e389e1c31f4007d%3A0xc3b86927d6d9c61!2sOgan%20Komering%20Ilir%20Regency%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1716500000000!5m2!1sen!2sid" width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>' !!}
                </div>
            </div>
            <div class="contact-form slide-in-right">
                @php
                    $waNumber = $settings['phone'] ?? '+6281234567890';
                    // Bersihkan karakter non-angka
                    $waNumber = preg_replace('/[^0-9]/', '', $waNumber);
                    // Jika dimulai dengan 0, ubah ke 62
                    if (str_starts_with($waNumber, '0')) {
                        $waNumber = '62' . substr($waNumber, 1);
                    }
                @endphp
                <form id="waContactForm" onsubmit="sendToWhatsApp(event, '{{ $waNumber }}')">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" class="form-control" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email / No. WA</label>
                        <input type="text" id="email" class="form-control" placeholder="Email atau Nomor WhatsApp" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" class="form-control" placeholder="Tujuan pesan" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" rows="5" class="form-control" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim via WhatsApp <i class="fa-brands fa-whatsapp"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function sendToWhatsApp(e, phone) {
    e.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const subject = document.getElementById('subject').value;
    const message = document.getElementById('message').value;
    
    const text = `Halo Admin Pesantren Fatkhul Ulum,\nSaya ${name}\n\n*Kontak:* ${email}\n*Subjek:* ${subject}\n\n*Pesan:*\n${message}`;
    const encodedText = encodeURIComponent(text);
    
    window.open(`https://wa.me/${phone}?text=${encodedText}`, '_blank');
}
</script>

@endsection
