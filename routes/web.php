<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Laravel\Fortify\Features;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminUsersConroller;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('Home');

Route::get('/Abouth', function () {
    return Inertia::render('Abouth' , []);
})->name('Abouth');

Route::get('/Product', function () {
    return Inertia::render('Product' , []);
})->name('Product');


Route::get('/dashboard', function (Request $request) {
    $user = $request->user();
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if ($user->role === 'user') {
        return redirect()->route('user.dashboard');
    }
    return redirect('/');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        // halamann bagian admin.pengguna pake crud di controller laravel
        Route::get('Users' , [AdminUsersConroller::class, 'users'])
            ->name('users');
        Route::delete('Users/{user}', [AdminUsersConroller::class, 'delete'])
            ->name('users.delete');
        Route::post('Users', [AdminUsersConroller::class, 'store'])
            ->name('users.store');
        Route::put('Users/{user}', [AdminUsersConroller::class, 'update'])
            ->name('users.update');

    });

Route::middleware(['auth', 'user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');
    });


Route::get('/Daftar',function () {
   return Inertia::render('auth/Daftar' , []);
})->name('daftar');


require __DIR__.'/settings.php';
