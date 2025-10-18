<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mini Chat IA - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5" style="max-width: 700px;">
    <h3 class="mb-4 text-center">💬 Chat com IA (Gemini)</h3>

    <div class="card shadow-sm border-0">
        <div id="chat-box" class="p-3 bg-white border rounded overflow-auto" style="height: 400px;">
            <!-- As mensagens aparecerão aqui -->
        </div>

        <form id="chat-form" class="mt-3">
            <div class="input-group">
                <textarea id="message" class="form-control" rows="2" placeholder="Digite sua pergunta..." required></textarea>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>

        <div class="text-end mt-3">
            <button id="clear-chat" class="btn btn-outline-secondary btn-sm">Limpar Chat</button>
        </div>
    </div>
</div>



</body>
</html>
