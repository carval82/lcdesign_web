<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Ruta temporal para crear admin (ELIMINAR DESPUÉS)
Route::get('/setup-admin-2024', function () {
    $user = User::updateOrCreate(
        ['email' => 'pcapacho24@gmail.com'],
        [
            'name' => 'Luis Carlos Correa',
            'password' => Hash::make('lcdesign2024'),
        ]
    );
    return 'Admin creado/actualizado: ' . $user->email;
});

// Ruta temporal para login directo (ELIMINAR DESPUÉS)
Route::get('/auto-login-2024', function () {
    $user = User::where('email', 'pcapacho24@gmail.com')->first();
    if ($user) {
        \Illuminate\Support\Facades\Auth::login($user, true);
        return redirect('/admin');
    }
    return 'Usuario no encontrado';
});

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/producto/{slug}', [HomeController::class, 'product'])->name('product.show');

// Rutas de administración (temporalmente sin middleware auth para debugging)
Route::prefix('admin')->name('admin.')->group(function () {
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
