<?php

use Illuminate\Support\Facades\Route;

include __DIR__ . '/auth.php';

// Redirect all other routes to the root URL
Route::get('/{any}', function () {
    return response()->redirectTo(config('app.root_url'));
})->where('any', '.*');
