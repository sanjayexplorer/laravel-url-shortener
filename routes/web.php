<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\SuperAdmin\InviteController as SuperAdminInviteController;
use App\Http\Controllers\SuperAdmin\ShortUrlController as SuperAdminShortUrlController;

use App\Http\Controllers\Admin\InviteController;
use App\Http\Controllers\Admin\ShortUrlController as AdminShortUrlController;

use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\ShortUrlController as MemberShortUrlController;


use App\Http\Controllers\ShortUrlRedirectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public homepage
Route::get('/', function () {
    return view('welcome');
});



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/s/{code}', [ShortUrlRedirectController::class, 'redirect'])->name('short.redirect');

// For superadmin
Route::middleware(['auth', 'role:SuperAdmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('superadmin.dashboard');
    })->name('dashboard');

    Route::get('invite-admin', [SuperAdminInviteController::class, 'create'])->name('invite-admin.create');
    Route::post('invite-admin', [SuperAdminInviteController::class, 'store'])->name('invite-admin.store');

    Route::get('short-urls', [SuperAdminShortUrlController::class, 'index'])->name('short-urls.index');
});



// For admin
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Invite other Admin/Member
    Route::get('invite', [InviteController::class, 'create'])->name('invite.create');
    Route::post('invite', [InviteController::class, 'store'])->name('invite.store');


    // Short URLs
    Route::get('short-urls', [AdminShortUrlController::class, 'index'])->name('short-urls.index');
    Route::get('short-urls/create', [AdminShortUrlController::class, 'create'])->name('short-urls.create');
    Route::post('short-urls', [AdminShortUrlController::class, 'store'])->name('short-urls.store');

});

// For member
Route::middleware(['auth', 'role:Member'])->prefix('member')->name('member.')->group(function () {
    Route::get('/dashboard', function () {
        return view('member.dashboard');
    })->name('dashboard');

     // Short URLs
    Route::get('short-urls', [MemberShortUrlController::class, 'index'])->name('short-urls.index');
    Route::get('short-urls/create', [MemberShortUrlController::class, 'create'])->name('short-urls.create');
    Route::post('short-urls', [MemberShortUrlController::class, 'store'])->name('short-urls.store');

});



// Public invitation acceptance
Route::get('invitations/accept/{token}', [App\Http\Controllers\InvitationController::class, 'showAcceptForm'])->name('invitations.accept');
Route::post('invitations/accept/{token}', [App\Http\Controllers\InvitationController::class, 'acceptInvitation'])->name('invitations.accept.submit');