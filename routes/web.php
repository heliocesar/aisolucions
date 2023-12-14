<?php

use App\Http\Controllers\DocumentsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [DocumentsController::class, 'showForm'])->name('upload.form');
Route::post('/upload', [DocumentsController::class, 'handleUpload'])->name('upload.post');

Route::get('/queue-start', [DocumentsController::class, 'process'])->name('queue.start');
