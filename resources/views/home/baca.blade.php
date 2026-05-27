@extends('layouts.app')

@section('title', $article->title . ' - Pesantren Fatkhul Ulum')

@section('content')
<div style="padding-top: 100px;">
    <section class="section-padding">
        <div class="container" style="max-width: 800px;">
            <div class="fade-in-up">
                <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-dark);">{{ $article->title }}</h1>
                <p style="color: var(--text-muted); margin-bottom: 2rem;">
                    <i class="fa-regular fa-calendar"></i> Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
                </p>
                
                @if($article->image)
                <div style="width: 100%; max-height: 400px; overflow: hidden; border-radius: 16px; margin-bottom: 2.5rem; box-shadow: var(--shadow-md);">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100%; object-fit: cover;">
                </div>
                @endif
                
                <div class="article-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-main);">
                    {!! $article->content !!}
                </div>
                
                <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid #E5E7EB;">
                    <a href="{{ route('berita') }}" class="btn btn-outline" style="color: var(--primary); border-color: var(--primary);">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Berita
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
