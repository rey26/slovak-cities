<?php

use App\Http\Controllers\SettlementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(SettlementController::class)
    ->group(function () {
        Route::get('', 'search');
        Route::post('', 'searchApi');
        Route::get('settlements', 'index');
        Route::get('settlements/{settlement}', 'show');
    });
