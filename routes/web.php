<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::middleware( [ 'auth:sanctum', 'verified' ] )->get( '/', [
    IndexController::class,
    'index'
] )->name( 'index' );

Route::middleware( [ 'auth:sanctum', 'verified' ] )->post( '/contact_add', [
    UserController::class,
    'contactAdd'
] )->name( 'user.contact.add' );

Route::middleware( [ 'auth:sanctum', 'verified' ] )->post( '/contact_remove', [
    UserController::class,
    'contactRemove'
] )->name( 'user.contact.remove' );
