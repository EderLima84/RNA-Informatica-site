<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $titulo = htmlspecialchars($_POST['titulo']);
        $arquivo = $_FILES['video'];

        // Diretório para salvar vídeos
        $diretorio = 'videos/';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Caminho completo do arquivo
        $caminhoArquivo = $diretorio . basename($arquivo['name']);
        
        // Mover o arquivo para o diretório de destino
        if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {
            echo "<p>Aula '$titulo' enviada com sucesso!</p>";
        } else {
            echo "<p>Falha ao enviar a aula. Por favor, tente novamente.</p>";
        }
    } else {
        echo "<p>Erro no upload do arquivo.</p>";
    }
}
?>
