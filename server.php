<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<!DOCTYPE html>";
    echo "<html lang='pt-br'>";
    echo "<head><meta charset='UTF-8'><title>Dados Recebidos</title></head>";
    echo "<body>";
    echo "<h1>Informações Enviadas:</h1>";
    echo "<ul>";
    echo "<li><strong>Nome de Usuário:</strong> " . htmlspecialchars($_POST['nome'] ?? '') . "</li>";
    echo "<li><strong>Data de Nascimento:</strong> " . htmlspecialchars($_POST['nascimento'] ?? '') . "</li>";
    echo "<li><strong>Telefone:</strong> " . htmlspecialchars($_POST['telefone'] ?? '') . "</li>";
    echo "<li><strong>Comportamento:</strong> " . htmlspecialchars($_POST['comportamento'] ?? '') . "</li>";
    echo "<li><strong>Estilo de Namoro:</strong> " . htmlspecialchars($_POST['tiponamoro'] ?? '') . "</li>";
    echo "<li><strong>Link para Redes Sociais:</strong> " . htmlspecialchars($_POST['perfilLink'] ?? '') . "</li>";
    echo "<li><strong>Relacionamentos no Banco de Dados:</strong> " . htmlspecialchars($_POST['emocoes'] ?? '') . "</li>";
    echo "<li><strong>Descrição do Algoritmo de Amor:</strong> " . htmlspecialchars($_POST['codigoAmor'] ?? '') . "</li>";
    echo "<li><strong>E-mail:</strong> " . htmlspecialchars($_POST['email'] ?? '') . "</li>";

    if (isset($_FILES['fotoAvatar']) && $_FILES['fotoAvatar']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['fotoAvatar'];
        $destination = 'uploads/' . basename($uploadedFile['name']);

        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        if (move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
            echo "<li><strong>Foto do Avatar:</strong> <a href='" . htmlspecialchars($destination) . "'>Clique aqui para visualizar</a></li>";
        } else {
            echo "<li><strong>Foto do Avatar:</strong> Erro ao salvar a foto.</li>";
        }
    } else {
        echo "<li><strong>Foto do Avatar:</strong> Nenhuma foto enviada.</li>";
    }

    echo "</ul>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Acesso inválido. Este script aceita apenas requisições POST.";
}
