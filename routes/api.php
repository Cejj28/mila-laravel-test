<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    $user = $request->user();
    $name = $user ? $user->name : 'Clint John Mila';

    echo "<html><body>";
    echo "<h1>Hello There!</h1>";
    echo "<p>- " . $name . "</p>";
    echo "</body></html>";
});

Route::apiResource('users', UserController::class);