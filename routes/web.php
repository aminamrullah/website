<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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
    if (file_exists($path) && is_file($path)) {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $headers = [
            'Cache-Control' => 'public, max-age=31536000'
        ];
        if ($extension === 'js') {
            $headers['Content-Type'] = 'application/javascript; charset=utf-8';
        } elseif ($extension === 'css') {
            $headers['Content-Type'] = 'text/css; charset=utf-8';
        } elseif (in_array($extension, ['woff', 'woff2'])) {
            $headers['Content-Type'] = 'font/' . $extension;
        }
        return response()->file($path, $headers);
    }
    abort(404);
})->where('file', '.*');

// Route untuk static files di root dist (favicon, images, dll)
Route::get('/app/{file}', function ($file) {
    $path = base_path('dist/' . $file);
    if (file_exists($path) && is_file($path)) {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        $mimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'json' => 'application/json',
            'txt' => 'text/plain',
            'manifest' => 'application/manifest+json'
        ];
        $headers = [];
        if (isset($mimeTypes[$extension])) {
            $headers['Content-Type'] = $mimeTypes[$extension];
        }
        return response()->file($path, $headers);
    }
    return null;
})->where('file', '.*\.(png|jpg|jpeg|svg|ico|txt|webp|json|manifest)');

// Route fallback untuk SPA - serve index.html untuk semua route lainnya
Route::get('/app/{any?}', function () {
    $path = base_path('dist/index.html');
    if (file_exists($path)) {
        $content = file_get_contents($path);
        return response($content, 200, [
            'Content-Type' => 'text/html; charset=utf-8',
            'Cache-Control' => 'public, must-revalidate, max-age=0'
        ]);
    }
    abort(404, 'File index.html tidak ditemukan di folder dist.');
})->where('any', '.*');
