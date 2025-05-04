<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;

Route::get('locale/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');
