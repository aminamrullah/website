@extends('layouts.app')

@section('title', 'Berita & Artikel - Pesantren Fatkhul Ulum')

@section('content')
<div style="padding-top: 100px;">
    <section class="news section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>Berita & Artikel</h2>
                <p>Kabar dan informasi terbaru dari Pesantren Fatkhul Ulum OKI Timur</p>
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
                        <p>{!! \Illuminate\Support\Str::limit(strip_tags($article->content), 120) !!}</p>
                        <a href="{{ route('baca-berita', $article->slug) }}" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary); padding: 0.5rem 1rem; margin-top: 1rem; font-size: 0.9rem;">Baca Selengkapnya</a>
                    </div>
                </div>
                @empty
                <div class="text-center" style="grid-column: 1 / -1;">
                    <p>Belum ada artikel yang diterbitkan.</p>
                </div>
                @endforelse
            </div>
            
            <div class="mt-4" style="display: flex; justify-content: center;">
                {{ $articles->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
