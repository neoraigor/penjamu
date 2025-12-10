<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuditScheduleController;
use App\Http\Controllers\AuditFindingController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// SIAKAD Routes
Route::prefix('siakad')->name('siakad.')->group(function () {
    Route::resource('programs', ProgramController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::resource('courses', CourseController::class);
});

// AMI Routes
Route::prefix('ami')->name('ami.')->group(function () {
    Route::resource('audits', AuditScheduleController::class);
    Route::resource('findings', AuditFindingController::class);
});
