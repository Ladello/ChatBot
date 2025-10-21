<?php

namespace App\Http\Controllers;

use App\Services\GeminiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

    // Comando para gerar controller: php artisan make:controller ChatController

/**
 * Controlador responsável pela interface de chat com a IA
 * 
 * Gerencia a exibição da interface de chat e o processamento
 * das mensagens enviadas pelo usuário para a IA.
 */
class ChatController extends Controller
{
    /**
     * Serviço de comunicação com a API Gemini
     * @var GeminiService
     */
    protected $geminiService;

    /**
     * Chave da API para autenticação nas requisições
     * @var string
     */
    protected $apiKey;

    /**
     * Inicializa o controlador com o serviço Gemini
     * 
     * @param GeminiService $geminiService Serviço injetado via DI do Laravel
     */
    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
        $this->apiKey = env('GEMINI_API_KEY'); // Pega a chave do arquivo .env
    }

    /**
     * Exibe a interface principal do chat
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('chat.index');
    }

    /**
     * Processa a mensagem do usuário e retorna a resposta da IA
     * 
     * @param Request $request Requisição contendo a mensagem do usuário
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        // Obtém a mensagem do usuário da requisição
        $userMessage = $request->input('message');
        
        try {
            // Envia a mensagem para o serviço Gemini e obtém a resposta
            $response = $this->geminiService->ask($userMessage);
            return response()->json($response);
        } catch (\Exception $e) {
            // Retorna mensagem de erro em caso de falha
            return response()->json('Erro: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Lista todos os modelos disponíveis na API Gemini
     * 
     * @return array Informações sobre os modelos disponíveis
     */
    public function listarModelos()
    {
        $response = Http::get("https://generativelanguage.googleapis.com/v1/models?key=" . $this->apiKey);
        return $response->json();
    }
}