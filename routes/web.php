<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\DailyNoteController;

// Halaman utama, redirect ke dashboard jika sudah login
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// ==========================
//  AUTENTIKASI
// ==========================
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

//  Lupa Password
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// ==========================
//  GROUP FITUR UTAMA (auth)
// ==========================
Route::middleware('auth')->group(function () {

    //  Dashboard & Kalender
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('/calendar/events', [CalendarController::class, 'events'])->name('calendar.events');

    //  Jadwal / Schedule
    Route::resource('schedule', ScheduleController::class);

    //  Tugas / Tasks
    Route::resource('tasks', TaskController::class);

    //  Events
    Route::resource('events', EventController::class);

    //  Notifikasi
    Route::prefix('notifications')->name('notifications.')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('index');
        Route::get('/due', [NotificationController::class, 'dueNotifications'])->name('due');
        Route::post('/{id}/sent', [NotificationController::class, 'markAsSent'])->name('markAsSent');
    });

    //  Pengaturan Akun
    Route::get('/account/settings', [UserPreferenceController::class, 'edit'])->name('account.settings');
    Route::put('/account/settings', [UserPreferenceController::class, 'update'])->name('account.settings.update');

    // Kategori Tugas
    Route::resource('task-categories', TaskCategoryController::class);

    //  Catatan Harian
    Route::resource('daily-notes', DailyNoteController::class);
});
