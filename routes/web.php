<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [PageController::class, 'bacaBerita'])->name('baca-berita');

// Redirect login ke aplikasi React
Route::redirect('/login', '/app/login');
Route::redirect('/admin/login', '/app/login');

// Route khusus untuk memperbaiki masalah gambar tidak tampil di Windows (php artisan serve symlink bug)
Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/' . $path);
    if (!file_exists($filePath)) {
        abort(404);
    }
    return response()->file($filePath);
})->where('path', '.*');

// Route khusus untuk melayani aplikasi JS (React/Vue/Svelte) dari folder dist
Route::get('/app/assets/{file}', function ($file) {
    $path = base_path('dist/assets/' . $file);
    if (file_exists($path)) {
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $headers = [];
        if ($extension === 'js') {
            $headers['Content-Type'] = 'application/javascript';
        } elseif ($extension === 'css') {
            $headers['Content-Type'] = 'text/css';
        }
        return response()->file($path, $headers);
    }
    abort(404);
})->where('file', '.*');

Route::get('/{file}', function ($file) {
    $path = base_path('dist/' . $file);
    if (file_exists($path)) {
        return response()->file($path);
    }
    abort(404);
})->where('file', '.*\.(png|jpg|jpeg|svg|ico|txt)');

Route::get('/app/{any?}', function () {
    $path = base_path('dist/index.html');
    if (file_exists($path)) {
        return file_get_contents($path);
    }
    abort(404, 'File index.html tidak ditemukan di folder dist.');
})->where('any', '.*');
