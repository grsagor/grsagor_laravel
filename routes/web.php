<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function() {
    Route::get('/', 'index')->name('front.index');
});