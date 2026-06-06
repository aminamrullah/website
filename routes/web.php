<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\PageController;

// Proxy endpoint for frontend built app: try multiple upstream paths so
// the SPA can remain unchanged. This will attempt several possible
// landing endpoints and return the first successful response.
Route::get('/api/public/landing/{host}', function ($host) {
    $upstreams = [
        'https://pesantren.pospoinplus.com/public/landing/',
        'https://pesantren.pospoinplus.com/landing/',
        'https://pesantren.pospoinplus.com/api/public/landing/',
        'https://pesantren.pospoinplus.com/api/landing/',
    ];

    $tried = [];
    foreach ($upstreams as $base) {
        $url = $base . $host;
        $tried[] = $url;
        try {
            $resp = Http::withHeaders(['Accept' => 'application/json'])->get($url);
            if ($resp->successful()) {
                return response()->json($resp->json(), $resp->status());
            }
        } catch (\Exception $e) {
            // ignore and try next
        }
    }

    return response()->json([
        'success' => false,
        'statusCode' => 404,
        'message' => 'Landing page tidak ditemukan (upstream)',
        'tried' => $tried,
    ], 404);
});

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'bacaBerita'])->name('baca-berita');

Route::get('/fix-storage', function () {
    $targetPath = storage_path('app/public');
    
    // Gunakan DOCUMENT_ROOT agar symlink dibuat tepat di mana web server membaca file
    $publicPath = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/storage';

    // Hapus file/symlink lama jika ada agar tidak bentrok
    if (file_exists($publicPath)) {
        if (is_link($publicPath)) {
            unlink($publicPath);
        } else {
            rename($publicPath, $publicPath . '_backup_' . time());
        }
    }

    // Eksekusi pembuatan symlink
    try {
        symlink($targetPath, $publicPath);
        return "SUKSES!<br><br>Symlink dibuat di folder website: <b>{$publicPath}</b><br>Menunjuk ke penyimpanan asli: <b>{$targetPath}</b>";
    } catch (\Exception $e) {
        return "GAGAL. Pesan Error: " . $e->getMessage();
    }
});

// Redirect login dihapus karena website memiliki login sendiri

// Route khusus untuk memperbaiki masalah gambar tidak tampil di Windows (php artisan serve symlink bug)
Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);
    if (!file_exists($filePath)) {
        abort(404);
    }
    return response()->file($filePath);
})->where('path', '.*');

// Route untuk assets dari folder dist
Route::get('/app/assets/{file}', function ($file) {
    $path = base_path('dist/assets/' . $file);
    if (!file_exists($path) || !is_file($path)) {
        abort(404, "Asset tidak ditemukan: {$file}");
    }
    
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    $mimeTypes = [
        'js' => 'application/javascript; charset=utf-8',
        'css' => 'text/css; charset=utf-8',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2',
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'svg' => 'image/svg+xml',
        'webp' => 'image/webp'
    ];
    
    $headers = ['Cache-Control' => 'public, max-age=31536000'];
    if (isset($mimeTypes[$extension])) {
        $headers['Content-Type'] = $mimeTypes[$extension];
    }
    
    return response()->file($path, $headers);
})->where('file', '.*');

// Route untuk static files di root dist (favicon, images, dll)
Route::get('/app/{file}', function ($file) {
    // Hanya serve files dengan extension yang valid
    if (!str_contains($file, '.')) {
        return null; // Biarkan fallback ke /app/{any?}
    }
    
    // Hanya allow file extensions tertentu (untuk security)
    $allowed = ['png', 'jpg', 'jpeg', 'svg', 'ico', 'txt', 'webp', 'json', 'manifest', 'gif', 'woff', 'woff2'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($ext, $allowed)) {
        abort(403, 'File type tidak diizinkan');
    }
    
    $path = base_path('dist/' . $file);
    if (!file_exists($path) || !is_file($path)) {
        abort(404, "File tidak ditemukan: {$file}");
    }
    
    $mimeTypes = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'svg' => 'image/svg+xml',
        'ico' => 'image/x-icon',
        'webp' => 'image/webp',
        'gif' => 'image/gif',
        'json' => 'application/json',
        'txt' => 'text/plain',
        'manifest' => 'application/manifest+json',
        'woff' => 'font/woff',
        'woff2' => 'font/woff2'
    ];
    
    $headers = ['Cache-Control' => 'public, max-age=31536000'];
    if (isset($mimeTypes[$ext])) {
        $headers['Content-Type'] = $mimeTypes[$ext];
    }
    
    return response()->file($path, $headers);
})->where('file', '^[a-zA-Z0-9._/-]+\.[a-zA-Z0-9]+$');

// Route fallback untuk SPA - serve index.html untuk semua route lainnya
Route::get('/app/debug-spa', function () {
    $path = base_path('dist/index.html');
    return response()->json([
        'base_path' => base_path(),
        'index_path' => $path,
        'exists' => file_exists($path),
        'is_file' => is_file($path),
        'dist_dir' => base_path('dist'),
        'dist_exists' => is_dir(base_path('dist')),
        'dist_contents' => file_exists(base_path('dist')) ? array_slice(scandir(base_path('dist')), 2, 10) : 'N/A'
    ]);
});

Route::get('/app/{any?}', function ($any = null) {
    $publicPath = public_path();
    $indexPath = base_path('dist/index.html');
    
    // Try multiple paths untuk fallback
    $possiblePaths = [
        base_path('dist/index.html'),
        public_path('../dist/index.html'),
        $_SERVER['DOCUMENT_ROOT'] . '/../dist/index.html',
    ];
    
    $content = null;
    foreach ($possiblePaths as $path) {
        if (file_exists($path)) {
            $content = file_get_contents($path);
            break;
        }
    }
    
    if (!$content) {
        return response('SPA fallback failed. Tried: ' . json_encode($possiblePaths), 500);
    }
    
    return response($content, 200, [
        'Content-Type' => 'text/html; charset=utf-8',
        'Cache-Control' => 'public, must-revalidate, max-age=0'
    ]);
})->where('any', '.*');
