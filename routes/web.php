<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\ProjectTaskController;
use App\Http\Middleware\AuthorizeProject;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/', 'index')->name('dashboard');
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'index')->name('profile');
        Route::get('/notification', 'notification')->name('notification');
    });

    Route::prefix('project')->group(function() {
        Route::match(['get', 'post'], '/create', [ProjectController::class, 'create'])->name('project.create');
        Route::prefix('{project_id}')->middleware(AuthorizeProject::class)->group(function() {
            Route::controller(ProjectController::class)->group(function() {
                Route::get('/view', 'view')->name('project.view');
                Route::match(['get', 'post'], '/edit', 'edit')->name('project.edit');
                Route::post('/delete', 'delete')->name('project.delete');
            });
            Route::controller(ProjectMemberController::class)->group(function() {
                Route::get('/member', 'list')->name('project.member');
                Route::post('/member/add', 'add')->name('project.member.add');
                Route::post('/member/remove', 'remove')->name('project.member.remove');
                Route::post('/member/edit_role', 'edit_role')->name('project.member.edit_role');
            });
            Route::controller(ProjectTaskController::class)->prefix('task')->group(function() {
                Route::match(['get', 'post'], '/create', [ProjectController::class, 'create'])->name('project.task.create');
                Route::prefix('{task_id}')->group(function() {
                    Route::get('/view', 'view')->name('project.task.view');
                    Route::match(['get', 'post'], '/edit', 'edit')->name('project.task.edit');
                    Route::post('/delete', 'delete')->name('project.task.delete');
                });
            });
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::controller(LoginController::class)->group(function(){
        Route::match(['get', 'post'], '/login', 'form')->name('login');
        Route::match(['get', 'post'], '/forgot_password', 'forgot_password')->name('forgot_password');
    });
});
