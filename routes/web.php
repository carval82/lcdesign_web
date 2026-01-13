<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Login personalizado para admin (no depende de sesiones de Laravel)
Route::get('/admin-login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin-login', function (Request $request) {
    $password = $request->input('password');
    
    if ($password === 'lcdesign2024') {
        $token = hash('sha256', 'lcdesign2024_admin_secret');
        return redirect('/admin')->cookie('admin_token', $token, 60 * 24 * 30, '/', null, true, true);
    }
    
    return back()->with('error', 'Contraseña incorrecta');
});

Route::get('/admin-logout', function () {
    return redirect('/')->cookie('admin_token', '', -1);
})->name('admin.logout');

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/producto/{slug}', [HomeController::class, 'product'])->name('product.show');

// Rutas de administración con middleware personalizado
Route::prefix('admin')->name('admin.')->middleware(['admin.auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('services', ServiceController::class);
});

// Rutas de perfil (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
