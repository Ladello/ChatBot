<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return redirect()->route('chat.index');
});

Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
// rota para enviar mensagens ao chatbot
Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
