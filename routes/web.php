<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/queue-mail', [MailController::class, 'index']);
Route::post('/queue-mail', [MailController::class, 'sendEmail'])->name('queue.mail');
