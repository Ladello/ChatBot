<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// Redireciona a rota raiz para a interface do chat
Route::get('/', function () {
    return redirect()->route('chat.index');
});

// Exibe a interface do chat
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// Endpoint da API para processamento de mensagens
Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');

// Rota para listar modelos
Route::get('/modelos', [ChatController::class, 'listarModelos'])->name('chat.modelos');