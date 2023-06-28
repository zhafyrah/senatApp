<?php

use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\DokumenPlenoController;
use App\Http\Controllers\Api\DokumenSenatController;
use App\Http\Controllers\Api\FungsiKerjaController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\KeanggotaanController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\SambutanController;
use App\Http\Controllers\Api\SejarahController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth',
], function () {

    Route::post('login', LoginController::class);
});


Route::group(
    [
        'middleware' => ['auth.api']
    ],
    function () {
        Route::group([
            'prefix' => 'dashboard',
        ], function () {
            Route::get('/', [DashboardController::class, 'show']);
        });

        Route::group([
            'prefix' => 'users',
        ], function () {
            Route::get('/', [UserController::class, 'show']);

            Route::get('/{id}', [UserController::class, 'show']);

            Route::post('/save', [UserController::class, 'store']);

            Route::put('/update/{id}', [UserController::class, 'edit']);

            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'berita',
        ], function () {
            Route::get('/', [BeritaController::class, 'show']);

            Route::get('/{id}', [BeritaController::class, 'show']);

            Route::post('/save', [BeritaController::class, 'store']);

            Route::put('/update/{id}', [BeritaController::class, 'edit']);

            Route::delete('/delete/{id}', [BeritaController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'dokumen-pleno',
        ], function () {
            Route::get('/', [DokumenPlenoController::class, 'show']);

            Route::get('/{id}', [DokumenPlenoController::class, 'show']);

            Route::post('/save', [DokumenPlenoController::class, 'store']);

            Route::put('/update/{id}', [DokumenPlenoController::class, 'edit']);

            Route::delete('/delete/{id}', [DokumenPlenoController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'dokumen-senat',
        ], function () {
            Route::get('/', [DokumenSenatController::class, 'show']);

            Route::get('/{id}', [DokumenSenatController::class, 'show']);

            Route::post('/save', [DokumenSenatController::class, 'store']);

            Route::put('/update/{id}', [DokumenSenatController::class, 'edit']);

            Route::delete('/delete/{id}', [DokumenSenatController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'gallery',
        ], function () {
            Route::get('/', [GalleryController::class, 'show']);

            Route::get('/{id}', [GalleryController::class, 'show']);

            Route::post('/save', [GalleryController::class, 'store']);

            Route::put('/update/{id}', [GalleryController::class, 'edit']);

            Route::delete('/delete/{id}', [GalleryController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'keanggotaan',
        ], function () {
            Route::get('/', [KeanggotaanController::class, 'show']);

            Route::get('/{id}', [KeanggotaanController::class, 'show']);

            Route::post('/save', [KeanggotaanController::class, 'store']);

            Route::put('/update/{id}', [KeanggotaanController::class, 'edit']);

            Route::delete('/delete/{id}', [KeanggotaanController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'profile',
        ], function () {
            Route::get('/', [ProfileController::class, 'show']);

            Route::get('/{id}', [ProfileController::class, 'show']);

            Route::post('/save', [ProfileController::class, 'store']);

            Route::put('/update/{id}', [ProfileController::class, 'edit']);

            Route::delete('/delete/{id}', [ProfileController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'master',
        ], function () {
            Route::get('/roles', [RolesController::class, 'show']);
        });

        Route::group([
            'prefix' => 'fungsi-kerja',
        ], function () {
            Route::get('/', [FungsiKerjaController::class, 'show']);

            Route::get('/{id}', [FungsiKerjaController::class, 'show']);

            Route::post('/save', [FungsiKerjaController::class, 'store']);

            Route::put('/update/{id}', [FungsiKerjaController::class, 'edit']);

            Route::delete('/delete/{id}', [FungsiKerjaController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'sejarah',
        ], function () {
            Route::get('/', [SejarahController::class, 'show']);

            Route::get('/{id}', [SejarahController::class, 'show']);

            Route::post('/save', [SejarahController::class, 'store']);

            Route::put('/update/{id}', [SejarahController::class, 'edit']);

            Route::delete('/delete/{id}', [SejarahController::class, 'destroy']);
        });

        Route::group([
            'prefix' => 'sambutan',
        ], function () {
            Route::get('/', [SambutanController::class, 'show']);

            Route::get('/{id}', [SambutanController::class, 'show']);

            Route::post('/save', [SambutanController::class, 'store']);

            Route::put('/update/{id}', [SambutanController::class, 'edit']);

            Route::delete('/delete/{id}', [SambutanController::class, 'destroy']);
        });
    }
);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
